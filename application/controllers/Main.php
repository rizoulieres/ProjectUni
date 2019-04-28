<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function home()
	{
		$data = array();

		if($this->session->has_userdata('id')){

			$this->layout->set_titre('Accueil');
			$this->layout->view('Main/accueil',$data);


		}else{
			redirect('/Welcome/connexion','refresh');
		}
	}

	public function deco()
	{
		if($this->session->has_userdata('id')){
			session_destroy();
			redirect('/Welcome/connexion','refresh');
		}else{
			redirect('/Welcome/connexion','refresh');
		}
	}

	public function profil()
	{
		if($this->session->has_userdata('id')){

			$this->layout->set_titre('Profil');
			$this->layout->view('Main/profil');


		}else{
			redirect('/Welcome/connexion','refresh');
		}
	}

}

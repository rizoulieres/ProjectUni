<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function home()
	{
		$data = array();

		if($this->session->has_userdata('id')){
			$this->load->model('UserModel');
			$id = $this->session->id;
			$informations = $this->UserModel->getUserById($id);

			$newdata = array(
				'username'  => $informations->username,
				'mail'     => $informations->mail,
				'university' => $informations->id_univ,
				'nom' => $informations->nom,
				'prenom' => $informations->prenom
			);

			$this->session->set_userdata($newdata);

			$this->layout->view('Main/vue_test',$data);


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

}

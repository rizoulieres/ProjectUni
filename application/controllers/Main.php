<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function home()
	{
		if($this->session->has_userdata('id')){
			$id = $this->session->id;

			//TO DO charger vue

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

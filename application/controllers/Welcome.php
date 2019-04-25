<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function connexion()
	{
		if($_POST){
			$username = $this->input->post('username');
			$mdp = $this->input->post('pass');

			//TO DO Créer fonction de vérification dans le model
			//Rediriger vers acceuil si OK Sinon $error;

			//créer une nouveau controlleur pour acceuil
		}


		$this->layout->set_theme('welcome');
		$this->layout->set_titre('Page de connexion');
		$this->layout->view('login_page');
	}

	public function inscription()
	{
		$this->load->model('UserModel');
		$data = array();

		if($_POST){
			$username= $this->input->post('username');
			$nom= $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$univ = $this->input->post('univ');
			$mdp = $this->input->post('pass');
			$mdp = sha1($mdp);
			$mail = $this->input->post('mail');


			if($this->UserModel->checkUsername($username)) {
					$this->UserModel->createUser($username, $nom, $prenom, $mdp, $univ,$mail);
			}else
				$data["checkUsername"]="Username déjà utilisé";
		}




		$data['univ'] = $this->UserModel->getUniv();
		$this->layout->set_theme('welcome');
		$this->layout->set_titre('Inscription');
		$this->layout->view('inscription_page',$data);
	}
}

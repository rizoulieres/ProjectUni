<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function connexion()
	{
		$data=array();
		$this->load->model('UserModel');

		if($_POST){
			$username = $this->input->post('username');
			$mdp = $this->input->post('pass');

			if($this->UserModel->etablirConnexion($username,$mdp)){
				//redirect vers acceuil
			}else{
				$data['login_error']="Les données fournies n'ont pas permis de vous identifier";
			}

		}


		$this->layout->set_theme('welcome');
		$this->layout->set_titre('Page de connexion');
		$this->layout->view('login_page',$data);
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
			$mail = $this->input->post('email');


			if($this->UserModel->checkUsername($username) && $this->UserModel->checkMail($mail) ) {
					$this->UserModel->createUser($username, $nom, $prenom, $mdp, $univ,$mail);
			}else{
				if(!$this->UserModel->checkUsername($username)){
					$data["checkUsername"]="Username déjà utilisé";
				}

				if(!$this->UserModel->checkMail($mail)){
					$data["checkMail"]="Mail déjà utilisé";
				}


			}

		}




		$data['univ'] = $this->UserModel->getUniv();
		$this->layout->set_theme('welcome');
		$this->layout->set_titre('Inscription');
		$this->layout->view('inscription_page',$data);
	}
}

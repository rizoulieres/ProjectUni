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
		$this->load->model('UserModel');
		$data = array();

		if($_POST){
			if($this->input->post('case') == 'pass'){
				$old = $this->input->post('ancien');
				$new = $this->input->post('new');
				$confirm = $this->input->post('confirm');

				if(sha1($old) == $this->UserModel->getHashPass($this->session->id)){
					if($new == $confirm){
						$this->UserModel->updatePass($this->session->id,sha1($new));
						$data['success'] = "Votre mot de passe a bien été modifié";
					}else{
						$data['diff'] = "Les mots de passe ne correspondent pas";
					}
				}else{
					$data['old_error'] = "L'ancien mot de passe est incorrect";
				}
			}elseif ($this->input->post('case') == 'photo'){
				//TO DO
			}elseif($this->input->post('case') == 'infos'){
				//TO DO
			}
		}

		if($this->session->has_userdata('id')){
			$data['name_univ'] = $this->UserModel->getUnivById($this->session->university);
			$this->layout->set_titre('Profil');
			$this->layout->ajouter_js('profile');
			$this->layout->view('Main/profil',$data);


		}else{
			redirect('/Welcome/connexion','refresh');
		}
	}

}

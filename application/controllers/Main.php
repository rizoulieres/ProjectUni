<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function home()
	{
		$data = array();

		if ($this->session->has_userdata('id')) {

			$this->layout->set_titre('Accueil');
			$this->layout->view('Main/accueil', $data);


		} else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}

	public function deco()
	{
		if ($this->session->has_userdata('id')) {
			session_destroy();
			redirect('/Welcome/connexion', 'refresh');
		} else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}

	public function profil()
	{
		$this->load->model('UserModel');
		$data = array();

		if ($_POST) {
			if ($this->input->post('case') == 'pass') {
				$old = $this->input->post('ancien');
				$new = $this->input->post('new');
				$confirm = $this->input->post('confirm');

				if (sha1($old) == $this->UserModel->getHashPass($this->session->id)) {
					if ($new == $confirm) {
						$this->UserModel->updatePass($this->session->id, sha1($new));
						$data['success'] = "Votre mot de passe a bien été modifié";
					} else {
						$data['diff'] = "Les mots de passe ne correspondent pas";
					}
				} else {
					$data['old_error'] = "L'ancien mot de passe est incorrect";
				}
			} elseif ($this->input->post('case') == 'photo') {

					if (!empty($_FILES['photo']['name'])) {
						// Set preference
						$config['upload_path'] = 'uploads/profil';
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['max_size'] = '200000'; // max_size in kb
						$config['file_name'] = $this->session->id;

						// Load upload library
						$this->load->library('upload', $config);

						if($this->upload->do_upload('photo')){
							// Get data about the file
							$uploadData = $this->upload->data();
							$new = $uploadData['file_name'];

							if($this->UserModel->getPhoto($this->session->id)!=''){
								unlink('C:/wamp64/www/univShop/uploads/profil/'.$this->UserModel->getPhoto($this->session->id));
								$this->UserModel->updatePhoto($this->session->id,$new);
								$_SESSION['photo'] = $new;
							}else{
								$this->UserModel->updatePhoto($this->session->id,$new);
								$_SESSION['photo'] = $new;
							}


							$data['photoChanged'] = 'OK';
						}else{
							$data['photoChanged'] = ' pas OK';
						}

					}


			} elseif ($this->input->post('case') == 'infos') {
				//TO DO
			}
		}

		if ($this->session->has_userdata('id')) {
			$data['name_univ'] = $this->UserModel->getUnivById($this->session->university);
			$this->layout->set_titre('Profil');
			$this->layout->ajouter_js('profile');
			$this->layout->view('Main/profil', $data);


		} else {
			redirect('/Welcome/connexion', 'refresh');
		}


	}

	public function note_prof($id)
	{
		$this->load->model('UserModel');
		$data = array();

		if ($this->session->has_userdata('id')) {
			$user =$this->UserModel-> getUserById($id);
			$data['user'] = $user;
			$data['name_univ'] = $this->UserModel->getUnivById($user->id_univ);
			$data['note_1'] = $this->UserModel->avg($id,1);
			$data['note_2'] = $this->UserModel->avg($id,2);
			$data['note_3'] = $this->UserModel->avg($id,3);
			$data['note_4'] = $this->UserModel->avg($id,4);

			$this->layout->set_titre($user->nom." ".$user->prenom);
			$this->layout->view('Main/notes_profil', $data);


		} else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}

	public function noter_prof($id)
	{
		$this->load->model('UserModel');
		$data = array();

		if($_POST){
			$note = $this->input->post('note');
			$desc = $this->input->post('description');
			$this->UserModel->noter($note,3,$id,$this->session->id,$desc);
			redirect('/Main/note_prof/'.$id, 'refresh');
		}

		if ($this->session->has_userdata('id')) {
			$data['user'] =$this->UserModel->getUserById($id);
			$data['metier'] = "Professeur";

			$this->layout->set_titre("Noter un prof");
			$this->layout->view('Main/note', $data);


		} else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}

	public function noter_elev($id)
	{
		$this->load->model('UserModel');
		$data = array();

		if($_POST){
			$note = $this->input->post('note');
			$desc = $this->input->post('description');
			$this->UserModel->noter($note,4,$id,$this->session->id,$desc);
			redirect('/Main/note_prof/'.$id, 'refresh');
		}

		if ($this->session->has_userdata('id')) {
			$data['user'] =$this->UserModel->getUserById($id);
			$data['metier'] = "élève";

			$this->layout->set_titre("Noter un élève");
			$this->layout->view('Main/note', $data);


		} else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}

	public function noter_vendeur($id)
	{
		$this->load->model('UserModel');
		$data = array();

		if($_POST){
			$note = $this->input->post('note');
			$desc = $this->input->post('description');
			$this->UserModel->noter($note,1,$id,$this->session->id,$desc);
			redirect('/Main/note_prof/'.$id, 'refresh');
		}

		if ($this->session->has_userdata('id')) {
			$data['user'] =$this->UserModel->getUserById($id);
			$data['metier'] = "vendeur";

			$this->layout->set_titre("Noter un vendeur");
			$this->layout->view('Main/note', $data);


		} else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}

	public function noter_acheteur($id)
	{
		$this->load->model('UserModel');
		$data = array();

		if($_POST){
			$note = $this->input->post('note');
			$desc = $this->input->post('description');
			$this->UserModel->noter($note,2,$id,$this->session->id,$desc);
			redirect('/Main/note_prof/'.$id, 'refresh');
		}

		if ($this->session->has_userdata('id')) {
			$data['user'] =$this->UserModel->getUserById($id);
			$data['metier'] = "acheteur";

			$this->layout->set_titre("Noter un acheteur");
			$this->layout->view('Main/note', $data);


		} else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}



}

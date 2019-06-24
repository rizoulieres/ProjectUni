<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manuel extends CI_Controller {

	public function vendre(){
		$this->load->model('ManuelModel');
		$data = array();

		if($_POST){


			$titre = $this->input->post('titre');
			$theme = $this->input->post('theme');
			$anneeEdit = $this->input->post('anneeEdit');
			$auteur = $this->input->post('auteur');
			$editeur = $this->input->post('editeur');
			$description = $this->input->post('description');
			$prix = $this->input->post('prix');
			$photo = "";

			if (!empty($_FILES['photo']['name'])) {
				// Set preference
				$config['upload_path'] = 'uploads/manuel';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '200000'; // max_size in kb
				$config['file_name'] = genererChaineAleatoire();

				// Load upload library
				$this->load->library('upload', $config);

				if($this->upload->do_upload('photo')){
					// Get data about the file
					$uploadData = $this->upload->data();
					$data['file'] = $uploadData['file_name'];

					$data['photoChanged'] = 'OK';
				}else{
					$data['photoChanged'] = ' pas OK';
				}

			}

			if($this->input->post('type') == 1){

				$this->ManuelModel->venteManuel($titre,$prix,$this->session->id,$data['file'],$description,$anneeEdit,$editeur,$auteur,$theme);
				redirect('/Manuel/listeMesManuels', 'refresh');
			}elseif ($this->input->post('type')== 2){
				$duree = $this->input->post('dureePret');
				$this->ManuelModel->pretManuel($titre,$prix,$this->session->id,$data['file'],$description,$anneeEdit,$editeur,$auteur,$theme,$duree);
				redirect('/Manuel/listeMesManuels', 'refresh');
			}

		}

		if ($this->session->has_userdata('id')) {
			$data['mat'] = $this->ManuelModel->getAllMat();
			$this->layout->set_titre('Vente');
			$this->layout->ajouter_js('vente');
			$this->layout->view('Manuel/vente',$data);
		}else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}


	public function liste(){
		$this->load->model('ManuelModel');
		$data = array();

		if ($this->session->has_userdata('id')) {
			$data['liste'] = $this->ManuelModel->getListeManuelDispo();
			$this->layout->set_titre('Liste manuels');

			$this->layout->view('Manuel/liste',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function reserver($id_support){
	    $this->load->model('ManuelModel');

        if ($this->session->has_userdata('id')) {
       			$this->ManuelModel->reserver($id_support,$this->session->id);
            	redirect('/Manuel/Listereserver', 'refresh');
       		
        }else {
            redirect('/Welcome/connexion', 'refresh');
        }

    }

    public function Listereserver(){
        $this->load->model('ManuelModel');
        if ($this->session->has_userdata('id')) {
            $data['liste'] = $this->ManuelModel->afficherManuelReserve($this->session->id);
            $this->layout->set_titre('Liste manuels reservés');
            $this->layout->view('Manuel/reserve',$data);
        }
    }

    public function ListeEmprunt(){
        $this->load->model('ManuelModel');
        if ($this->session->has_userdata('id')) {
            $data['liste'] = $this->ManuelModel->afficherManuelEmprunt($this->session->id);
            $this->layout->set_titre('Liste manuels empruntés');
            $this->layout->view('Manuel/listeDesManuelsEmpruntes',$data);
        }
    }


    public function ListeVendus(){
        $this->load->model('ManuelModel');
        if ($this->session->has_userdata('id')) {
            $data['liste'] = $this->ManuelModel->afficherManuelVendus($this->session->id);
            $this->layout->set_titre('Liste manuels Vendus');
            $this->layout->view('Manuel/listeDesManuelsVendus',$data);
        }
    }

    public function ListePretes(){
        $this->load->model('ManuelModel');
        if ($this->session->has_userdata('id')) {
            $data['liste'] = $this->ManuelModel->afficherManuelPretes($this->session->id);
            $this->layout->set_titre('Liste manuels Vendus');
            $this->layout->view('Manuel/emprunts',$data);
        }
    }


    public function ListeAcheter(){
        $this->load->model('ManuelModel');
        if ($this->session->has_userdata('id')) {
            $data['liste'] = $this->ManuelModel->afficherManuelAcheter($this->session->id);
            $this->layout->set_titre('Liste manuels Acheter');
            $this->layout->view('Manuel/listeDesManuelsAchete',$data);
        }
    }

    public function annuler($id_support){
        $this->load->model('ManuelModel');
        if ($this->session->has_userdata('id')) {
            
                $this->ManuelModel->annuler($id_support);
            redirect('/Manuel/Listereserver', 'refresh');
        }else{
            redirect('/Welcome/connexion', 'refresh');
        }
    }

    public function valider($id_support){
        $this->load->model('ManuelModel');
        if ($this->session->has_userdata('id')) {
               if ($this->ManuelModel->getManuel($id_support)->id_type == 1){
            	$this->ManuelModel->valider($id_support);
            	redirect('/Manuel/Listereserver', 'refresh');
       		}
       		else if ($this->ManuelModel->getManuel($id_support)->id_type == 2){
       			$duree = $this->ManuelModel->getManuel($id_support)->duree_pret;
       			if($duree == 1){
       				$date =  date('Y-m-d', strtotime('+7 days'));
       			}
       			if($duree == 2){
       				$date =  date('Y-m-d', strtotime('+14 days'));
       			}
            $this->ManuelModel->validerPret($id_support,$date);
            redirect('/Manuel/ListeEmprunt', 'refresh');
        }
    }
        else{
            redirect('/Welcome/connexion', 'refresh');
        }
    }


	public function listeMesManuels(){
		$this->load->model('ManuelModel');
		$data = array();

		if ($this->session->has_userdata('id')) {
			$data['liste'] = $this->ManuelModel->getMesManuels($this->session->id);
			$this->layout->set_titre('Mes manuels');

			$this->layout->view('Manuel/listeMesManuels',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}


	public function supp($id){
		$this->load->model('ManuelModel');

		if ($this->session->has_userdata('id')) {

			$this->ManuelModel->supp($id);
			redirect('/Manuel/listeMesManuels', 'refresh');

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}


	public function modif($id){
		$this->load->model('ManuelModel');
		$data = array();

		if($_POST){
			$info = $this->ManuelModel->getManuel($id);

			$titre = $this->input->post('titre');
			$theme = $this->input->post('theme');
			$anneeEdit = $this->input->post('anneeEdit');
			$auteur = $this->input->post('auteur');
			$editeur = $this->input->post('editeur');
			$description = $this->input->post('description');
			$prix = $this->input->post('prix');
			$photo = $info->photo;

			if (!empty($_FILES['photo']['name'])) {
				// Set preference
				$config['upload_path'] = 'uploads/manuel';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '200000'; // max_size in kb
				$config['file_name'] = genererChaineAleatoire();

				// Load upload library
				$this->load->library('upload', $config);

				if($this->upload->do_upload('photo')){
					// Get data about the file
					$uploadData = $this->upload->data();
					$data['file'] = $uploadData['file_name'];

					$data['photoChanged'] = 'OK';
					$photo = $data['file'];
				}else{
					$data['photoChanged'] = ' pas OK';
				}

			}

			if($this->input->post('type') == 1){

				$this->ManuelModel->venteManuelUpdate($id,$titre,$prix,$photo,$description,$anneeEdit,$editeur,$auteur,$theme);
				redirect('/Manuel/listeMesManuels', 'refresh');
			}elseif ($this->input->post('type')== 2){
				$duree = $this->input->post('dureePret');
				$this->ManuelModel-> pretManuelUpdate($id,$titre,$prix,$photo,$description,$anneeEdit,$editeur,$auteur,$theme,$duree);
				redirect('/Manuel/listeMesManuels', 'refresh');
			}

		}

		if ($this->session->has_userdata('id')) {
			$data['info'] = $this->ManuelModel->getManuel($id);
			$data['mat'] = $this->ManuelModel->getAllMat();
			$this->layout->set_titre('Modifier une annonce');

			$this->layout->ajouter_js('modifManuel');
			$this->layout->view('Manuel/modif',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function retourner($id_support){
	$this->load->model('ManuelModel');
		if ($this->session->has_userdata('id')) {
			$this->ManuelModel->retourner($id_support);
			redirect('/Manuel/ListePretes', 'refresh');

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}
	}
}

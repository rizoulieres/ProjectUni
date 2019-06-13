<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cours extends CI_Controller {

	public function listeMat(){
		$this->load->model('CoursModel');
		$data = array();

		if ($this->session->has_userdata('id')) {
			$data['mat'] = $this->CoursModel->getAllMat();
			$this->layout->set_titre('Liste des matières');

			$this->layout->view('Cours/listeMat',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function listeProf($id_mat){
		$this->load->model('CoursModel');
		$data = array();

		if ($this->session->has_userdata('id')) {
			$data['mat'] = $this->CoursModel->getMatById($id_mat);
			$data['prof'] = $this->CoursModel->getAllProfByMat($id_mat);
			$this->layout->set_titre('Liste des professeurs');

			$this->layout->view('Cours/listeProf',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function listeMatProp(){
		$this->load->model('CoursModel');
		$data = array();

		if ($this->session->has_userdata('id')) {
			$data['mat'] = $this->CoursModel->getAllMat();
			$this->layout->set_titre('Liste des matières');

			$this->layout->view('Cours/listeMatProp',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function proposer($id_mat){
		$this->load->model('CoursModel');
		$data = array();


		if($_POST){
			$titre = $this->input->post('titre');
			$prix = $this->input->post('prix');
			$desc = $this->input->post('description');

			$lundi=FALSE;
			$mardi=FALSE;
			$mercredi=FALSE;
			$jeudi=FALSE;
			$vendredi=FALSE;
			$samedi=FALSE;
			$dimanche=FALSE;

			if(isset($_POST['dispo'])){
				foreach ($_POST['dispo'] as $value){
					if($value =="lundi"){
						$lundi=TRUE;
					}
					if($value =="mardi"){
						$mardi=TRUE;
					}
					if($value =="mercredi"){
						$mercredi=TRUE;
					}
					if($value =="jeudi"){
						$jeudi=TRUE;
					}
					if($value =="vendredi"){
						$vendredi=TRUE;
					}
					if($value =="samedi"){
						$samedi=TRUE;
					}
					if($value =="dimanche"){
						$dimanche=TRUE;
					}


				}
			}
			$this->CoursModel->annonce($titre,$prix,$this->session->id,$id_mat,$desc,$lundi,$mardi,$mercredi,$jeudi,$vendredi,$samedi,$dimanche);

		}

		if ($this->session->has_userdata('id')) {

			$data['mat'] = $this->CoursModel->getMatById($id_mat);
			$this->layout->set_titre('Liste des matières');

			$this->layout->view('Cours/formProp',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function listeCoursProf(){
		$this->load->model('CoursModel');
		$data = array();

		if ($this->session->has_userdata('id')) {
			$data['liste'] = $this->CoursModel->getAllCoursByProf($this->session->id);
			$this->layout->set_titre('Mes cours');

			$this->layout->view('Cours/listeCoursProf',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function supp($id){
		$this->load->model('CoursModel');
		$data = array();

		if ($this->session->has_userdata('id')) {

			if($this->CoursModel->getIdProf($id) == $this->session->id){
				$this->CoursModel->supp($id);
				redirect('/Cours/listeCoursProf', 'refresh');
			}

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function modifier($id){
		$this->load->model('CoursModel');
		$data = array();

		if($_POST){
			$titre = $this->input->post('titre');
			$prix = $this->input->post('prix');
			$desc = $this->input->post('description');

			$lundi=FALSE;
			$mardi=FALSE;
			$mercredi=FALSE;
			$jeudi=FALSE;
			$vendredi=FALSE;
			$samedi=FALSE;
			$dimanche=FALSE;

			if(isset($_POST['dispo'])){
				foreach ($_POST['dispo'] as $value){
					if($value =="lundi"){
						$lundi=TRUE;
					}
					if($value =="mardi"){
						$mardi=TRUE;
					}
					if($value =="mercredi"){
						$mercredi=TRUE;
					}
					if($value =="jeudi"){
						$jeudi=TRUE;
					}
					if($value =="vendredi"){
						$vendredi=TRUE;
					}
					if($value =="samedi"){
						$samedi=TRUE;
					}
					if($value =="dimanche"){
						$dimanche=TRUE;
					}


				}
			}
			$this->CoursModel->update($id,$titre,$prix,$desc,$lundi,$mardi,$mercredi,$jeudi,$vendredi,$samedi,$dimanche);
			redirect('/Cours/listeCoursProf', 'refresh');
		}

		if ($this->session->has_userdata('id')) {
			if($this->CoursModel->getIdProf($id) == $this->session->id){
				$data['mat'] = $this->CoursModel->getMatAnnonce($id);
				$data['info'] = $this->CoursModel->getInfoAnnonce($id);
				$this->layout->set_titre('Mofifier un cours');

				$this->layout->view('Cours/formModif',$data);
			}else{
				redirect('/Main/home', 'refresh');
			}



		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}
}

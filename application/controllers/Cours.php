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

	public function reserver($id){
		$this->load->model('CoursModel');
		$data = array();


		if($_POST){
			$date = $titre = $this->input->post('date');
			$heure = $titre = $this->input->post('heure');
			$nb = $titre = $this->input->post('nb');
			$id_eleve = $titre = $this->session->id;

			$this->CoursModel->propo($id,$id_eleve,$date,$heure,FALSE,TRUE,$nb);
			//redirect('/Welcome/connexion', 'refresh');

		}

		if ($this->session->has_userdata('id')) {
			$data['info'] = $this->CoursModel->getCoursById($id);
			$data['mat'] = $this->CoursModel->getMatAnnonce($id);
			$this->layout->set_titre('Cours de '.$data['mat']);

			$this->layout->ajouter_js('calendar');
			$this->layout->view('Cours/infosReserv',$data);


		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function proposition(){
		$this->load->model('CoursModel');
		$data = array();


		if ($this->session->has_userdata('id')) {
			$data['liste'] = $this->CoursModel->getAllPropoProf($this->session->id);
			$data['liste2'] = $this->CoursModel->getAllPropoEnProf($this->session->id);
			$this->layout->set_titre('Liste des propositions');

			$this->layout->view('Cours/listePropProf',$data);


		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function propositionEleve(){
		$this->load->model('CoursModel');
		$data = array();


		if ($this->session->has_userdata('id')) {
			$data['liste'] = $this->CoursModel->getAllPropoEleve($this->session->id);
			$data['liste2'] = $this->CoursModel->getAllPropoEnEleve($this->session->id);
			$this->layout->set_titre('Liste des propositions');

			$this->layout->view('Cours/listePropElev',$data);


		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}


	public function planningProf(){
		$this->load->model('CoursModel');
		$data = array();


		if ($this->session->has_userdata('id')) {
			$data['liste'] = $this->CoursModel->getAllCoursValideProf($this->session->id);
			$this->layout->set_titre('Planning Professeur');
			$data['id_prof'] = $this->session->id;
			$this->layout->ajouter_js('planningProf');
			$this->layout->view('Cours/planningProf',$data);


		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function planningElev(){
		$this->load->model('CoursModel');
		$data = array();


		if ($this->session->has_userdata('id')) {
			$data['liste'] = $this->CoursModel->getAllCoursValideEleve($this->session->id);
			$data['id_eleve'] = $this->session->id;
			$this->layout->set_titre('Planning Professeur');
			$this->layout->ajouter_js('planningEleve');
			$this->layout->view('Cours/planningElev',$data);


		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}

	public function annuler($id_cours){
		$this->load->model('CoursModel');


		if ($this->session->has_userdata('id')) {
			$info = $this->CoursModel->getCoursValide($id_cours);
			if($this->session->id == $info->id_prof){
				$this->CoursModel->annuler($id_cours,TRUE,FALSE);
				header ("Location: $_SERVER[HTTP_REFERER]" );
			}
			if($this->session->id == $info->id_eleve){
				$this->CoursModel->annuler($id_cours,FALSE,TRUE);
				header ("Location: $_SERVER[HTTP_REFERER]" );
			}

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}


	public function valider($id_cours){
		$this->load->model('CoursModel');


		if ($this->session->has_userdata('id')) {
			$info = $this->CoursModel->getCoursValide($id_cours);
			if($this->session->id == $info->id_prof){
				$this->CoursModel->valider($id_cours,TRUE,TRUE);
				redirect('/Cours/planningProf', 'refresh');
			}
			if($this->session->id == $info->id_eleve){
				$this->CoursModel->valider($id_cours,TRUE,TRUE);
				redirect('/Cours/planningElev', 'refresh');
			}

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}


	public function modif($id_cours){
		$this->load->model('CoursModel');
		$data = array();
		$info = $this->CoursModel->getCoursValide($id_cours);

		if($_POST){

			$heure = $titre = $this->input->post('heure');
			$nb = $titre = $this->input->post('nb');

			if($this->session->id == $info->id_prof){
				$this->CoursModel->modifier($id_cours,TRUE,FALSE,$heure,$nb);
				redirect('/Cours/proposition', 'refresh');
			}
			if($this->session->id == $info->id_eleve){
				$this->CoursModel->modifier($id_cours,FALSE,TRUE,$heure,$nb);
				redirect('/Cours/propositionEleve', 'refresh');
			}

		}

		if ($this->session->has_userdata('id')) {
			$data['info'] = $info;

			$this->layout->set_titre('Proposer un nouveaux crénaux');

			$this->layout->view('Cours/horaireModif',$data);


		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}
	//Serveur pour requete AJAX
	public function getAllRDVProf($id){
		$this->load->model('CoursModel');
		$this->load->model('UserModel');

		$all= $this->CoursModel->getAllCoursValideProfA($id);
		$tab = array();
		$compteur=0;

		foreach ($all as $value){
			$eleve = $this->UserModel->getUserById($value->id_eleve);
			$tab[$compteur]['id'] = $value->id_cours_valide;
			$tab[$compteur]['title'] = "Cours avec ".$eleve->prenom." ".$eleve->nom;
			$tab[$compteur]['start'] = $value->date.'T'.$value->heure;
			$timestamp = strtotime($value->heure) + $value->nb_heure*3600;

			$time = date('H:i:s', $timestamp);
			$tab[$compteur]['end'] = $value->date.'T'.$time;

			$compteur++;


		}


		echo json_encode($tab);


	}


	//Serveur pour requete AJAX
	public function getAllRDVElev($id){
		$this->load->model('CoursModel');
		$this->load->model('UserModel');
		$all= $this->CoursModel-> getAllCoursValideEleveA($id);
		$tab = array();
		$compteur=0;

		foreach ($all as $value){
			$prof = $this->UserModel->getUserById($value->id_prof);
			$tab[$compteur]['id'] = $value->id_cours_valide;
			$tab[$compteur]['title'] = "Cours avec ".$prof->prenom." ".$prof->nom;
			$tab[$compteur]['start'] = $value->date.'T'.$value->heure;
			$timestamp = strtotime($value->heure) + $value->nb_heure*3600;

			$time = date('H:i:s', $timestamp);
			$tab[$compteur]['end'] = $value->date.'T'.$time;

			$compteur++;


		}


		echo json_encode($tab);


	}


}

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

		if ($this->session->has_userdata('id')) {
			$data['mat'] = $this->CoursModel->getMatById($id_mat);
			$this->layout->set_titre('Liste des matières');

			$this->layout->view('Cours/formProp',$data);

		}else{
			redirect('/Welcome/connexion', 'refresh');
		}

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manuel extends CI_Controller {

	public function vendre(){
		$this->load->model('ManuelModel');
		$data = array();


		if ($this->session->has_userdata('id')) {
			$data['mat'] = $this->ManuelModel->getAllMat();
			$this->layout->set_titre('Vente');
			$this->layout->ajouter_js('vente');
			$this->layout->view('Manuel/vente',$data);
		}else {
			redirect('/Welcome/connexion', 'refresh');
		}
	}
}

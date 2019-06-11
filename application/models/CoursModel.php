<?php

class CoursModel extends CI_Model {

	public function getAllMat(){
		$query = $this->db->select('*')->from('matiere')->get();

		return $query->result();
	}

	public function getMatById($id){
		$query = $this->db->select('libelle')->from('matiere')->where('id_matiere',$id)->get();

		$query = $query->result();
		return $query[0]->libelle;
	}

	public function getAllProfByMat($id_mat){
		$query = $this->db->select('*')->from('annonce_cours')->where('id_matiere',$id_mat)->get();

		return $query->result();
	}
}

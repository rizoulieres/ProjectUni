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

		$this->db->select('*');
		$this->db->from('annonce_cours');
		$this->db->join('user', 'user.id_user = annonce_cours.id_prof');
		$this->db->where('id_matiere',$id_mat);
		$query = $this->db->get();

		return $query->result();
	}

	public function annonce($titre,$prix,$id_prof,$id_matiere,$description,$lundi,$mardi,$mercredi,$jeudi,$vendredi,$samedi,$dimanche){

		$data = array(
			'titre' => $titre,
			'prix' => $prix,
			'id_prof' => $id_prof,
			'id_matiere' => $id_matiere,
			'description' => $description,
			'lundi' => $lundi,
			'mardi' => $mardi,
			'mercredi' => $mercredi,
			'jeudi' => $jeudi,
			'vendredi' => $vendredi,
			'samedi' => $samedi,
			'dimanche' => $dimanche

		);

		$this->db->insert('annonce_cours', $data);
	}

	public function getAllCoursByProf($id_prof){
		$this->db->select('*');
		$this->db->from('annonce_cours');
		$this->db->join('matiere', 'matiere.id_matiere = annonce_cours.id_matiere');
		$this->db->where('id_prof',$id_prof);
		$query = $this->db->get();

		return $query->result();

	}

	public function getIdProf($id){
		$query = $this->db->select('id_prof')->from('annonce_cours')->where('id_cours',$id)->get();

		$query = $query->result();
		return $query[0]->id_prof;
	}

	public function supp($id){
		$this->db->where('id_cours', $id);
		$this->db->delete('annonce_cours');
	}

	public function getInfoAnnonce($id){
		$query = $this->db->select('*')->from('annonce_cours')->where('id_cours',$id)->get();

		$query = $query->result();
		return $query[0];
	}

	public function getMatAnnonce($id){
		$query = $this->db->select('id_matiere')->from('annonce_cours')->where('id_cours',$id)->get();

		$query = $query->result();
		$id_mat = $query[0]->id_matiere;

		return $this->CoursModel->getMatById($id_mat);
	}

	public function update($id,$titre,$prix,$desc,$lundi,$mardi,$mercredi,$jeudi,$vendredi,$samedi,$dimanche){
		$data = array(
			'titre' => $titre,
			'prix' => $prix,
			'description' => $desc,
			'lundi' => $lundi,
			'mardi' => $mardi,
			'mercredi' => $mercredi,
			'jeudi' => $jeudi,
			'vendredi' => $vendredi,
			'samedi' => $samedi,
			'dimanche' => $dimanche

		);

		$this->db->where('id_cours', $id);
		$this->db->update('annonce_cours', $data);
	}


}

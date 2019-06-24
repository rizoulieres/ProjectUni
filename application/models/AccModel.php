<?php

class AccModel extends CI_Model {

	public function getSupportVenduByUser($id_user){
		$this->db->select('*');
		$this->db->from('support');
		$this->db->where('id_vendeur',$id_user);
		$this->db->where('id_etat',2);
		$query=$this->db->get();

		return $num = $query->num_rows();
	}

	public function getSupportAcheteByUser($id_user){
		$this->db->select('*');
		$this->db->from('support');
		$this->db->where('id_acheteur',$id_user);
		$this->db->where('id_etat',2);
		$query=$this->db->get();

		return $num = $query->num_rows();
	}

	public function getCoursPrisByUser($id_user){
		$date =  date('Y-m-d');
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->where('id_eleve',$id_user);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',TRUE);
		$this->db->where('profA',FALSE);
		$this->db->where('eleveA',FALSE);
		$this->db->where('date<=',$date);
		$query=$this->db->get();

		return $num = $query->num_rows();
	}

	public function getCoursDonneeByUser($id_user){
		$date =  date('Y-m-d');
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->where('id_prof',$id_user);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',TRUE);
		$this->db->where('profA',FALSE);
		$this->db->where('eleveA',FALSE);
		$this->db->where('date<=',$date);
		$query=$this->db->get();

		return $num = $query->num_rows();
	}
}

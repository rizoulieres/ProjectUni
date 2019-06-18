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

	public function getCoursById($id){

		$this->db->select('*');
		$this->db->from('annonce_cours');
		$this->db->join('user', 'user.id_user = annonce_cours.id_prof');
		$this->db->where('id_cours',$id);
		$query = $this->db->get();

		$query = $query->result();
		return $query[0];
	}

	public function propo($id_cours,$id_eleve,$date,$heure,$prof,$eleve,$nb){

		$data = array(
			'id_cours' => $id_cours,
			'id_eleve' => $id_eleve,
			'date' => $date,
			'heure' => $heure,
			'eleve' => $eleve,
			'prof' => $prof,
			'nb_heure' => $nb

		);

		$this->db->insert('cours_valide', $data);
	}

	public function getAllPropoProf($id_prof){
		$date =  date('Y-m-d', strtotime('-4 days'));
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->join('user', 'cours_valide.id_eleve = user.id_user');
		$this->db->join('matiere', 'annonce_cours.id_matiere = matiere.id_matiere');
		$this->db->where('id_prof',$id_prof);
		$this->db->where('prof',FALSE);
		$this->db->where('eleve',TRUE);
		$this->db->where('date>',$date);

		$query = $this->db->get();

		return $query->result();

	}

	public function getAllPropoEnProf($id_prof){
		$date =  date('Y-m-d', strtotime('-4 days'));
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->join('user', 'cours_valide.id_eleve = user.id_user');
		$this->db->join('matiere', 'annonce_cours.id_matiere = matiere.id_matiere');
		$this->db->where('id_prof',$id_prof);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',FALSE);
		$this->db->where('date>',$date);

		$query = $this->db->get();

		return $query->result();

	}

	public function getAllCoursValideProf($id_prof){
		$date =  date('Y-m-d', strtotime('-4 days'));
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->join('user', 'cours_valide.id_eleve = user.id_user');
		$this->db->join('matiere', 'annonce_cours.id_matiere = matiere.id_matiere');
		$this->db->where('id_prof',$id_prof);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',TRUE);
		$this->db->where('date>',$date);
		$query = $this->db->get();

		return $query->result();

	}

	public function getAllPropoEleve($id_eleve){
		$date =  date('Y-m-d', strtotime('-4 days'));
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->join('user', 'annonce_cours.id_prof = user.id_user');
		$this->db->join('matiere', 'annonce_cours.id_matiere = matiere.id_matiere');
		$this->db->where('id_eleve',$id_eleve);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',FALSE);
		$this->db->where('date>',$date);
		$query = $this->db->get();

		return $query->result();

	}

	public function getAllPropoEnEleve($id_eleve){
		$date =  date('Y-m-d', strtotime('-4 days'));
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->join('user', 'annonce_cours.id_prof = user.id_user');
		$this->db->join('matiere', 'annonce_cours.id_matiere = matiere.id_matiere');
		$this->db->where('id_eleve',$id_eleve);
		$this->db->where('eleve',TRUE);
		$this->db->where('prof',FALSE);
		$this->db->where('date>',$date);
		$query = $this->db->get();

		return $query->result();

	}

	public function getAllCoursValideEleve($id_eleve){
		$date =  date('Y-m-d', strtotime('-4 days'));
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->join('user', 'annonce_cours.id_prof = user.id_user');
		$this->db->join('matiere', 'annonce_cours.id_matiere = matiere.id_matiere');
		$this->db->where('id_eleve',$id_eleve);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',TRUE);
		$this->db->where('date>',$date);
		$query = $this->db->get();

		return $query->result();

	}

	public function getCoursValide($id){
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->where('id_cours_valide',$id);

		$query = $this->db->get();

		$query = $query->result();
		return $query[0];


	}

	public function annuler($id_cours_valide,$profA,$eleveA){
		$data = array(
			'profA' => $profA,
			'eleveA' => $eleveA
		);

		$this->db->where('id_cours_valide', $id_cours_valide);
		$this->db->update('cours_valide', $data);
	}

	public function valider($id_cours_valide,$prof,$eleve){
		$data = array(
			'prof' => $prof,
			'eleve' => $eleve
		);

		$this->db->where('id_cours_valide', $id_cours_valide);
		$this->db->update('cours_valide', $data);
	}


	public function modifier($id_cours_valide,$prof,$eleve,$heure,$nb){
		$data = array(
			'prof' => $prof,
			'eleve' => $eleve,
			'heure' => $heure,
			'nb_heure' => $nb
		);

		$this->db->where('id_cours_valide', $id_cours_valide);
		$this->db->update('cours_valide', $data);
	}

	public function getAllCoursValideProfA($id_prof){
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->where('id_prof',$id_prof);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',TRUE);
		$this->db->where('profA',FALSE);
		$this->db->where('eleveA',FALSE);
		$query = $this->db->get();

		return $query->result();

	}

	public function getAllCoursValideEleveA($id_eleve){
		$this->db->select('*');
		$this->db->from('cours_valide');
		$this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
		$this->db->where('id_eleve',$id_eleve);
		$this->db->where('prof',TRUE);
		$this->db->where('eleve',TRUE);
		$this->db->where('profA',FALSE);
		$this->db->where('eleveA',FALSE);
		$query = $this->db->get();

		return $query->result();

	}
}

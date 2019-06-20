<?php

class ManuelModel extends CI_Model {

	public function getAllMat(){
		$query = $this->db->select('*')->from('matiere')->get();

		return $query->result();
	}

	public function venteManuel($titre,$prix,$id_vendeur,$image,$description,$annee_edition,$editeur,$auteur,$id_matiere){

		$date = date("Y-m-d");

		$data = array(
			'titre' => $titre,
			'prix' => $prix,
			'id_vendeur' => $id_vendeur,
			'id_type' => 1, //1 :Vente
			'id_etat' => 1, //1 : Disponible
			'date_annonce' => $date,
			'image' => $image,
			'description' => $description,
			'annee_edition' => $annee_edition,
			'editeur' => $editeur,
			'auteur' => $auteur,
			'id_matiere' => $id_matiere
		);

		$this->db->insert('support', $data);
	}

	public function pretManuel($titre,$prix,$id_vendeur,$image,$description,$annee_edition,$editeur,$auteur,$id_matiere,$duree){

		$date = date("Y-m-d");

		$data = array(
			'titre' => $titre,
			'prix' => $prix,
			'id_vendeur' => $id_vendeur,
			'id_type' => 2, //2 : Prêt
			'id_etat' => 1, //Disponible
			'date_annonce' => $date,
			'image' => $image,
			'description' => $description,
			'annee_edition' => $annee_edition,
			'editeur' => $editeur,
			'auteur' => $auteur,
			'id_matiere' => $id_matiere,
			'duree_pret' => $duree
		);

		$this->db->insert('support', $data);
	}


	public function getListeManuelDispo(){
		$query = $this->db->select('*')->from('support')->where('id_etat',1)->get();

		return $query->result();
	}

	public function changeEtatManuel($id_support){
         $this->db->set('id_etat', '3', FALSE);
         $this->db->where('id_support',$id_support);
         $this->db->update('support');
    }
	/*public function getManuelById($id){
	    $query = $this->db->select('*')->from('support', 'matiere')->get();
        $this->db->join('annonce_cours', 'cours_valide.id_cours = annonce_cours.id_cours');
        $this->db->where('id_support',$id);
        support as s,matiere as m WHERE id_support = 3 and s.id_matiere = m.id_matiere

	    return $query->result();
    }*/

}

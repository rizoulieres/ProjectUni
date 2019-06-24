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
		$query = $this->db->select('*')->from('support')->where('id_etat',1)->where('id_vendeur!=',$this->session->id)->get();
		return $query->result();
	}

	public function reserver($id_support,$id_acheteur){
         $this->db->set('id_etat', '3', FALSE);
         $this->db->set('id_acheteur', $id_acheteur, FALSE);
         $this->db->where('id_support',$id_support);
         $this->db->update('support');
    }

    public function afficherManuelReserve($id_user){
        $this->db->select('*');
        $this->db->from('support');
        $this->db->where('id_acheteur',$id_user);
        $query = $this->db->get();
        return $query->result();
    }

    public function afficherManuelVendus($id_vendeur){
        $this->db->select('*');
        $this->db->from('support');
        $this->db->where('id_vendeur',$id_vendeur);
		$this->db->where('id_etat',2);
        $query = $this->db->get();
        return $query->result();
    }


    public function annuler($id_support){
        $this->db->set('id_etat', '1', FALSE);
        $this->db->set('id_acheteur',NULL);
        $this->db->where('id_support',$id_support);
        $this->db->update('support');
    }

    public function annulerPret($id_support){
        $this->db->set('id_etat', '1', FALSE);
        $this->db->set('id_acheteur',NULL);
        $this->db->set('duree_pret',NULL);
        $this->db->set('date_pret','0000-00-00');
        $this->db->set('date_retour','0000-00-00');
        $this->db->where('id_support',$id_support);
        $this->db->update('support');
    }

    public function valider($id_support){
        $this->db->set('id_etat', '2', FALSE);
        $this->db->set('id_acheteur',NULL);
        $this->db->where('id_support',$id_support);

        $this->db->update('support');
    }


	public function getMesManuels($id_user){
		$this->db->select('*');
		$this->db->from('support');
		$this->db->where('id_vendeur',$id_user);
		$this->db->where('id_etat',1);
		$query = $this->db->get();

		return $query->result();
	}

	public function supp($id){
		$this->db->where('id_support', $id);
		$this->db->delete('support');
	}

	public function getManuel($id){
		$query = $this->db->select('*')->from('support')->where('id_support',$id)->get();

		$query = $query->result();
		return $query[0];
	}

	public function venteManuelUpdate($id,$titre,$prix,$image,$description,$annee_edition,$editeur,$auteur,$id_matiere){

		$date = date("Y-m-d");

		$data = array(
			'titre' => $titre,
			'prix' => $prix,
			'id_type' => 1, //1 :Vente
			'date_annonce' => $date,
			'image' => $image,
			'description' => $description,
			'annee_edition' => $annee_edition,
			'editeur' => $editeur,
			'auteur' => $auteur,
			'id_matiere' => $id_matiere
		);
		$this->db->where('id_support', $id);
		$this->db->update('support', $data);
	}

	public function pretManuelUpdate($id,$titre,$prix,$image,$description,$annee_edition,$editeur,$auteur,$id_matiere,$duree){

		$date = date("Y-m-d");

		$data = array(
			'titre' => $titre,
			'prix' => $prix,
			'id_type' => 2, //2 : Prêt
			'date_annonce' => $date,
			'image' => $image,
			'description' => $description,
			'annee_edition' => $annee_edition,
			'editeur' => $editeur,
			'auteur' => $auteur,
			'id_matiere' => $id_matiere,
			'duree_pret' => $duree
		);

		$this->db->where('id_support', $id);
		$this->db->update('support', $data);
	}




}

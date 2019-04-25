<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();
	private $theme = 'default';

	/*
    |===============================================================================
    | Constructeur
    |===============================================================================
    */

	public function __construct()
	{
		$this->CI =& get_instance();

		$this->var['output'] = '';

		//	Le titre est composé du nom de la méthode et du nom du contrôleur
		//	La fonction ucfirst permet d'ajouter une majuscule
		$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());

		//	Nous initialisons la variable $charset avec la même valeur que
		//	la clé de configuration initialisée dans le fichier config.php
		$this->var['charset'] = $this->CI->config->item('charset');

		$this->var['css'] = array();
		$this->var['js'] = array();
	}

	/*
    |===============================================================================
    | Méthodes pour charger les vues
    |	. view
    |	. views
    |===============================================================================
    */

	public function view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);

		$this->CI->load->view('../themes/'.$this->theme, $this->var);
	}

	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}

	/*
|===============================================================================
| Méthodes pour modifier les variables envoyées au layout
|	. set_titre
|	. set_charset
|===============================================================================
*/
	public function set_titre($titre)
	{
		if(is_string($titre) AND !empty($titre))
		{
			$this->var['titre'] = $titre;
			return true;
		}
		return false;
	}

	public function set_charset($charset)
	{
		if(is_string($charset) AND !empty($charset))
		{
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}

	/*
|===============================================================================
| Méthodes pour ajouter des feuilles de CSS et de JavaScript
|	. ajouter_css
|	. ajouter_js
|===============================================================================
*/
	public function ajouter_css($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css'))
		{
			$this->var['css'][] = css_url($nom);
			return true;
		}
		return false;
	}

	public function ajouter_js($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/javascript/' . $nom . '.js'))
		{
			$this->var['js'][] = js_url($nom);
			return true;
		}
		return false;
	}

	public function set_theme($theme)
	{
		if(is_string($theme) AND !empty($theme) AND file_exists('./application/themes/' . $theme . '.php'))
		{
			$this->theme = $theme;
			return true;
		}
		return false;
	}

	public function upload($index,$destination,$extensions=FALSE,$maxsize=FALSE)
	{
		//Test1: fichier correctement uploadé
		if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
		//Test2: taille limite
		if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
		//Test3: extension
		$ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
		if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
		//Déplacement
		return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
	}
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/javascript/' . $nom . '.js';
	}
}

if ( ! function_exists('calendar_url'))
{
	function calendar_url($nom)
	{
		return base_url() . 'assets/fullcalendar/' . $nom;
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/images/' . $nom;
	}
}

if ( ! function_exists('img_profil'))
{
	function img_profil($nom)
	{
		return base_url() . 'uploads/profil/' . $nom;
	}
}

if ( ! function_exists('img_manuel'))
{
	function img_manuel($nom)
	{
		return base_url() . 'uploads/manuel/' . $nom;
	}
}

if ( ! function_exists('img'))
{
	function img($nom, $alt = '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
	}
}

if ( ! function_exists('vendor_url'))
{
	function vendor_url($nom)
	{
		return base_url() . 'assets/vendor/' . $nom;
	}
}


function genererChaineAleatoire($longueur = 10)
{
	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$longueurMax = strlen($caracteres);
	$chaineAleatoire = '';
	for ($i = 0; $i < $longueur; $i++)
	{
		$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
	}
	return $chaineAleatoire;
}

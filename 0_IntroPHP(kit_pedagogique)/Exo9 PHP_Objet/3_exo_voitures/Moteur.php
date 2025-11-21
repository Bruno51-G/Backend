<?php
require_once ('..\..\..\..\laragon\www\3_exo_voitures\Voiture.php');
require_once ('..\..\..\..\laragon\www\3_exo_voitures\VoitureCourse.php');

/**
 * @author BGodbillot
 * @version 1.0
 * @created 20-nov.-2025 15:22:22
 */
class Moteur
{

	private string $marque;
	private float $vitesseMax;

	// default
	function Moteur()
	{
	}



	/**
	 * 
	 * @param _vitesseMax
	 * @param _marque _marque
	 */
	function __construct(float $_vitesseMax, string $_marque)
	{
		$this->marque = $_marque;
		$this->vitesseMax = $_vitesseMax;
	}

	// get set :
	function getmarque()
	{
		return $this->marque;
	}

	

	function getvitesseMax()
	{
		return $this->vitesseMax;
	}

	/**
	 * 
	 * @param newVal newVal
	 */
	function setvitesseMax($newVal)
	{
		$this->vitesseMax = $newVal;
	}

	/**
	 * 
	 * @param _vitesseMax
	 * @param _marque _marque
	 */


	function toString()
	{
		return "Le moteur est de marque : " .$this->marque. " et ça vitesse max est de : " .$this->vitesseMax;
	}
}
?>
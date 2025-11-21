<?php
require_once ('..\..\..\..\laragon\www\3_exo_voitures\VoitureCourse.php');
require_once ('..\..\..\..\laragon\www\3_exo_voitures\Moteur.php');

/**
 * @author BGodbillot
 * @version 1.0
 * @created 20-nov.-2025 15:22:22
 */
class Voiture
{

	// protected $leMoteur;
	protected string $marque;
	protected string $modele;
	protected int $poids = 1000;
	protected $sonMoteur;

	// default
	function Voiture()
	{
	}



	/**
	 * 
	 * @param _marque
	 * @param _modele
	 * @param _poids
	 * @param _marqueMoteur
	 * @param _vitesseMax _vitesseMax
	 */
	function __construct(string $_marque, string $_modele, string $_marqueMoteur, float $_vitesseMax, int $_poids = 1000)
	{
		$this->marque = $_marque;
		$this->modele = $_modele;
		$this->poids = $_poids;
		$this->sonMoteur = new Moteur($_vitesseMax, $_marqueMoteur );
	}

	/**
	 * Moteur.vitesseMax - (Voiture.poids x 30%).
	 */
	function vitessesMax()
	{
		$vitesseMax = ($this->sonMoteur->getvitesseMax()) - ($this->poids * 0.3);
		return $vitesseMax;
	}


	// get set :
	function getmarque()
	{
		return $this->marque;
	}

	function getmodele()
	{
		return $this->modele;
	}

	function getpoids()
	{
		return $this->poids;
	}

	function getleMoteur()
	{
		return $this->sonMoteur;
	}

	/**
	 * 
	 * @param newVal newVal
	 */
	function setleMoteur(Moteur $newVal)
	{
		$this->sonMoteur = $newVal;
	}

	/**
	 * 
	 * @param newVal newVal
	 */
	function setpoids(int $newVal)
	{
		$this->poids = $newVal;
	}

		function toString():string
	{
		$test = $this->marque. " " .$this->modele. ", " .$this->poids. " kg " .$this->vitessesMax();
		return $test;
	}
}
?>
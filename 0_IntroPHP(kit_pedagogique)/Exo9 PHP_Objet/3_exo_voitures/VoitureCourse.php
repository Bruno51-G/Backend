<?php
require_once ('..\..\..\..\laragon\www\3_exo_voitures\Voiture.php');
require_once ('..\..\..\..\laragon\www\3_exo_voitures\Moteur.php');

/**
 * @author BGodbillot
 * @version 1.0
 * @created 20-nov.-2025 15:22:22
 */
class VoitureCourse extends Voiture
{

	function VoitureCourse()
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

		if($_marque == $_marqueMoteur){
			parent::__construct($_marque, $_modele, $_marqueMoteur, $_vitesseMax, $_poids);
		} else {
			throw new Exception("La marque du véhicule et la marque du moteur ne sont pas compatible");
		}
	}

	

	
	function vitessesMax():float
	{
		$vitesseMax = ($this->sonMoteur->getvitesseMax()) - ($this->poids * 0.05);
		return $vitesseMax;
	}

	function toString():string
	{
		$test = parent::toString(). " Vitesse max : " .$this->vitessesMax();
		return $test;
	}

}
?>
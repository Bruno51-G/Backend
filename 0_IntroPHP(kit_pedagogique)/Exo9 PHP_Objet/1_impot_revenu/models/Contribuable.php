<?php
class Contribuable{
    // Attribut 
    private string $nom;
    private float $revenuAnnuel;

    private const TAUX1 = 0.09;
    private const TAUX2 = 0.14;
    private const SEUIL = 15000;

    public function getNom():string{return $this->nom;}
    public function getRevenuAnnuel():float{return $this->revenuAnnuel;}

    public function setRevenuAnnuel(float $newRevenuAnnuel):void{$this->revenuAnnuel=$newRevenuAnnuel;}

    public function __construct(string $_nom, float $newRevenuAnnuel)
    {
        $this->nom=$_nom;
        $this->revenuAnnuel=$newRevenuAnnuel;
    }

    public function calculImpot() : float
    {
        if ($this->revenuAnnuel <= self::SEUIL){
            return $this->revenuAnnuel * self::TAUX1;
        } else {
            $calcul1 = self::SEUIL * self::TAUX1;
            $calcul2 = ($this->revenuAnnuel - self::SEUIL) * self::TAUX2;
            return $calcul1 + $calcul2;
        }
    }
}
<?php
class Contribuable{
    // Attribut.
    private string $nom; // Nom du contribuable.
    private float $revenuAnnuel; // Revenu annuel du contribuable.

    // Constantes pour le calcul de l'impôt
    private const TAUX1 = 0.09; // Taux d'imposition pour la tranche inférieure.
    private const TAUX2 = 0.14; // Taux d'imposition pour la tranche supérieure.
    private const SEUIL = 15000; // Seuil de revenu pour changer de tranche d'imposition.

    // Getter pour le nom
    public function getNom():string{return $this->nom;}
    
    // Getter pour le revenu annuel.
    public function getRevenuAnnuel():float{return $this->revenuAnnuel;}

    // Setter pour le revenu annuel.
    public function setRevenuAnnuel(float $newRevenuAnnuel):void{
        if ($newRevenuAnnuel < 0) {
            throw new InvalidArgumentException("Le revenu annuel ne peut pas être négatif");
        }
        $this->revenuAnnuel=$newRevenuAnnuel;}

    // Constructeur, initialise le nom et le revenu annuel.   
    public function __construct(string $_nom, float $newRevenuAnnuel)
    {
        $this->nom=$_nom;
        $this->revenuAnnuel=$newRevenuAnnuel;
    }

    // Méthode pour calculer l'impôt en fonction de revenu annuel.
    public function calculImpot() : float
    {
        if ($this->revenuAnnuel <= self::SEUIL){
            return round ($this->revenuAnnuel * self::TAUX1, 2);
        } else {
            $calcul1 = self::SEUIL * self::TAUX1;
            $calcul2 = ($this->revenuAnnuel - self::SEUIL) * self::TAUX2;
            return round($calcul1 + $calcul2, 2);
        }
    }
}
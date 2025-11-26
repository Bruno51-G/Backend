<?php
class RestaurantRepository{
    private ?PDO $dbConnect;
    private int $nbCol;
    private array $tabNameCol=[];
    
    public function __construct()
    {
        $this->dbConnect=Dbconnexion::getInstance();
        $this->nbCol=0;
    }

    public function searchAll():array
    {
        $data = [];
        $rq = "Select nom, adresse, prix, commentaire, note, visite from restaurants";

        $stmt = $this->dbConnect->query($rq);  //stmt --> PDO statements

        $data = $stmt->fetchAll();

        return $data;
    }

    public function searchById(int $_id):array
    {
        $rq = "SELECT nom, adresse, prix, commentaire, note, visite FROM restaurants WHERE id=:ID";

        $PDOstmt =  $this->dbConnect->prepare($rq);
        $PDOstmt->bindValue(":ID", $_id, PDO::PARAM_INT);
        $PDOstmt->execute();

        $data=$PDOstmt->fetch();

        return $data;
    }

    public function searchByName(string $_name) : bool|array
    {
        $rq = "SELECT id, nom, adresse, prix, commentaire, note, visite FROM restaurants WHERE soundex(nom)=soundex(:nom)";

        $PDOstmt = $this->dbConnect->prepare($rq);
        $PDOstmt->execute([":nom"=>$_name]);
        $data = $PDOstmt->fetchAll();

        return $data;

        // $PDOstmt = $this->dbConnect->prepare($rq);

        // // Recherche contenant la chaine (dans tous le nom).
        // $like = '%' . $_name . '%';

        // // Si recherche "commence par" --> $like = $_name . '%';
        // // Si recherche "se termine par" --> $like = '%' . $_name;

        // $PDOstmt->bindValue(':NOM', $like, PDO::PARAM_STR);
        // $PDOstmt->execute();

        // $data = $PDOstmt->fetchAll();
        // return $data;
    }

    public function searchByNote(float $_limite): bool|array
    {
        $rq = "CALL afficherListeNote(:note)";
        $stmt = $this->dbConnect->prepare($rq);
        $stmt->bindValue(":note", $_limite);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    

}
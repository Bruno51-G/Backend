<?php

class candidateRepository // classe candidateRepository
{
    private ?PDO $dbconnect; // attribut de connexion à la Base De Données
    private int $nbCol; // attribut nombre de colonnes
    private array $tabColName; // attribut tableau des noms de colonnes

    public function __construct() // constructeur
    {
        $this->dbconnect=Dbconnexion::getInstance(); // connexion à la Base De Données
        $this->nbCol = 0; // initialisation du nombre de colonnes
    }

    public function searchAll():array // méthode pour rechercher tous les candidats
    {
        $query = "SELECT id_user, lastname_user, firstname_user, mail_user, pass_user FROM candidats"; 
        $stmt = $this->dbconnect->prepare($query); // préparation de la requête
        $stmt->execute(); // exécution de la requête
        return $stmt->fetchAll(); // récupération de toutes les données
    }

    public function searchById(int $_id_user):array // méthode pour rechercher un candidat par son ID
    {
        $query= "SELECT lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user, archive_user FROM candidats WHERE id_user=:ID";

        $PDOstmt = $this->dbconnect->prepare($query); // préparation de la requête
        $PDOstmt->bindValue(":ID", $_id_user, PDO::PARAM_INT); // liaison de la valeur de l'ID
        $PDOstmt->execute(); // exécution de la requête

        $data=$PDOstmt->fetch(); // récupération des données

        return $data; // retour des données
    }

    public function searchByName(string $_name) : bool|array // méthode pour rechercher un candidat par son nom
    {
        $query = "SELECT id_user, lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user, archive_user FROM candidats WHERE soundex(lastname_user)=soundex(:lastname_user)"; 

        $PDOstmt = $this->dbconnect->prepare($query); // préparation de la requête
        $PDOstmt->execute([":lastname_user"=>$_name]); // exécution de la requête avec le nom en paramètre
        $data = $PDOstmt->fetchAll(); // récupération des données

        return $data; // retour des données
    }

    public function searchByMail(string $_email) : bool|array
    {
        $query = "SELECT id_user, lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user, archive_user FROM candidats WHERE mail_user = :mail_user";

        $PDOstmt = $this->dbconnect->prepare($query); // préparation de la requête
        $PDOstmt->bindValue(":mail_user", $_email, PDO::PARAM_STR); // liaison de la valeur de l'email
        $PDOstmt->execute(); // exécution de la requête
        $data = $PDOstmt->fetch(PDO::FETCH_ASSOC); // récupération des données

        return $data ?: false; // retour des données ou false si aucune donnée trouvée
    }

    public function searchByDepartment(int $_departement_user) : array
    {
        $query = "SELECT id_user, lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user, archive_user FROM candidats WHERE departement_user = :departement_user";

        $PDOstmt = $this->dbconnect->prepare($query); // préparation de la requête
        $PDOstmt->bindValue(":departement_user", $_departement_user, PDO::PARAM_INT); // liaison de la valeur du département
        $PDOstmt->execute(); // exécution de la requête

        return $PDOstmt->fetchAll(PDO::FETCH_ASSOC); // récupération des données
    }

    public function updateCandidate(int $_id_user, string $_lastname_user, string $_firstname_user, string $_mail_user, string $_pass_user, 
    int $_departement_user, int $_age_user, int $_archive_user) : bool
    {
        $nom = trim($_lastname_user);
        $prenom = trim($_firstname_user);
        $mail = trim($_mail_user);
        $pass = trim($_pass_user);
        $departement = intval($_departement_user);
        $age = intval($_age_user);
        $archive = intval($_archive_user);

        $query = "UPDATE candidats SET lastname_user = ?, firstname_user = ?, mail_user = ?, pass_user = ?, departement_user = ?, age_user = ?, archive_user = ? WHERE id_user = ?";
        $PDOstmt = $this->dbconnect->prepare($query);
        return $PDOstmt->execute([$nom, $prenom, $mail, $pass, $departement, $age, $archive, $_id_user]);
    }
}

?>
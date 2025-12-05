<?php
/**
 * Classe d'accès aux données pour la table `restaurants`.
 *
 * Cette classe encapsule les opérations courantes (CRUD) sur la table
 * et utilise une instance PDO fournie par `Dbconnexion::getInstance()`.
 * Les commentaires ci-dessous expliquent chaque méthode pour un débutant.
 */
class RestaurantRepository{
    /** @var ?PDO connexion à la base (instance PDO ou null) */
    private ?PDO $dbConnect;
    /** @var int compteur / utilisation interne (non utilisé intensivement aujourd'hui) */
    private int $nbCol;
    /** @var array noms de colonnes si besoin (tableau vide par défaut) */
    private array $tabNameCol=[];
    
    /**
     * Constructeur
     * - Récupère l'instance PDO via la classe `Dbconnexion` (singleton)
     * - Initialise éventuellement des propriétés internes
     *
     * Note pour débutant : PDO est l'objet PHP qui permet d'exécuter des
     * requêtes SQL en toute sécurité (avec des prepared statements).
     */
    public function __construct()
    {
        $this->dbConnect=Dbconnexion::getInstance();
        $this->nbCol=0;
    }

    public function searchAll():array
    {
        $data = [];
        $rq = "Select id, nom, adresse, prix, commentaire, note, visite from restaurants";

        $stmt = $this->dbConnect->query($rq);  //stmt --> PDO statements

        $data = $stmt->fetchAll();

        return $data;
    }

    public function searchAllJson(): void
    {
        $data = [];
        $rq = "Select id, nom, adresse, prix, commentaire, note, visite from restaurants";

        $stmt = $this->dbConnect->query($rq);  //stmt --> PDO statements

       // $data = $stmt->fetchAll();
        $chaineJson = "[";
        while($ligne=$stmt->fetch())
        {
            $chaineJson.=json_encode($ligne, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE).",";
        }

        $chaineJson=substr($chaineJson,0 ,strlen($chaineJson)-1);
        $chaineJson.="]";

        file_put_contents("./sorties/liste.json", $chaineJson);
    }

    
    
        /**
         * Récupère une ligne (restaurant) par son identifiant.
         * Retourne un tableau associatif (ou false si non trouvé).
         *
         * @param int $_id Identifiant du restaurant
         * @return array|false
         */
        public function searchById(int $_id):array
        {
            $rq = "SELECT nom, adresse, prix, commentaire, note, visite FROM restaurants WHERE id=:ID";

            // Prépare la requête et lie le paramètre pour éviter les injections SQL.
            $PDOstmt =  $this->dbConnect->prepare($rq);
            $PDOstmt->bindValue(":ID", $_id, PDO::PARAM_INT);
            $PDOstmt->execute();

            // fetch() retourne une seule ligne (ou false si rien).
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

    public function searchByPrix(float $limite_inf, float $limite_sup): bool|array
    {
        $stmt = $this->dbConnect->prepare("CALL afficherFourchettePrix(:limiteInf, :limiteSup)");
        $stmt->execute([":limiteInf" => $limite_inf, ":limiteSup" => $limite_sup]);

        // $stmt->execute([1=>$limite_inf, 2=>$limite_sup]);
        return $stmt->fetchAll();
    }

    public function createRestaurant(string $_nom, string $_adresse, float $_prix, string $_commentaire, float $_note, DateTime $_visite): bool
    {
        $nom = trim($_nom);
        $adresse = trim($_adresse);
        $prix = floatval($_prix);
        $commentaire = trim($_commentaire);
        $note = floatval($_note);
        $maDate = $_visite->format('Y-m-d');
        // $maDate = date_format($_visite, 'Y-m-d');

        $rq = "INSERT INTO restaurants (nom, adresse, prix, commentaire, note, visite) VALUES (:nom, :adresse, :prix, :commentaire, :note, :visite)";
        $PDOstmt = $this->dbConnect->prepare($rq);
        $PDOstmt->bindValue(":nom", $nom);
        $PDOstmt->bindValue(":adresse", $adresse);
        $PDOstmt->bindValue(":prix", $prix);
        $PDOstmt->bindValue(":commentaire", $commentaire);
        $PDOstmt->bindValue(":note", $note);
        $PDOstmt->bindValue(":visite", $maDate);
        return $PDOstmt->execute();
    }
    
    public function deleteRestaurant(int $_id): bool
    {
        $rq = "DELETE FROM restaurants WHERE id = :ID";
        $PDOstmt = $this->dbConnect->prepare($rq);
        $PDOstmt->bindValue(":ID", $_id, PDO::PARAM_INT);
        return $PDOstmt->execute();
    }

    public function updateRestaurant(int $_id, string $_nom, string $_adresse, float $_prix, string $_commentaire, float $_note, DateTime $_visite): bool
    {
        $nom = trim($_nom);
        $adresse = trim($_adresse);
        $prix = floatval($_prix);
        $commentaire = trim($_commentaire);
        $note = intval($_note);
        $ladate = $_visite->format('Y-m-d');
        
        $rq = "UPDATE restaurants SET nom = :nom, adresse = :adresse, prix = :prix, commentaire = :commentaire, note = :note, visite = :visite WHERE id = :ID";
        $PDOstmt = $this->dbConnect->prepare($rq);
        $PDOstmt->bindValue(":ID", $_id, PDO::PARAM_INT);
        $PDOstmt->bindValue(":nom", $_nom);
        $PDOstmt->bindValue(":adresse", $_adresse);
        $PDOstmt->bindValue(":prix", $_prix);
        $PDOstmt->bindValue(":commentaire", $_commentaire);
        $PDOstmt->bindValue(":note", $_note);
        $PDOstmt->bindValue(":visite", $_visite);
        return $PDOstmt->execute();
    }

    public function updateRestaurantBis(int $_id, string $_nom, string $_adresse, float $_prix, string $_commentaire, float $_note, DateTime $_visite): bool
    {
        $nom=trim($_nom);
        $adresse=trim($_adresse);
        $prix=floatval($_prix);
        $commentaire=trim($_commentaire);
        $note=intval($_note);
        $ladate=$_visite->format('Y-m-d');

        $rq = "UPDATE restaurants SET nom = ?, adresse = ?, prix = ?, commentaire = ?, note = ?, visite = ? WHERE id = ?";
        $PDOstmt = $this->dbConnect->prepare($rq);
        return $PDOstmt->execute([$nom, $adresse, $prix, $commentaire, $note, $ladate, $_id]);
    }


}


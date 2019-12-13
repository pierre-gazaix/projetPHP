    <?php

    require_once File::build_path(array('model','Model.php'));

    class ModelUtilisateur extends Model
    {

        protected static $nomClasse = 'ModelUtilisateur';
        protected static $primary = 'login';
        protected static $nomTable = 'rGztzErq-Utilisateurs';


        private $login;
        private $nom;
        private $prenom;
        private $mail;
        private $nonce;

        public function get($nom_attribut)
        {
            if (property_exists($this, $nom_attribut))
                return $this->$nom_attribut;
            return false;
        }

        public function set($nom_attribut, $valeur)
        {
            if (property_exists($this, $nom_attribut))
                $this->$nom_attribut = $valeur;
            return false;
        }

        public function __construct($login = NULL, $mdp = NULL, $nom = NULL, $prenom = NULL, $mail=null)
        {
            if (!is_null($login) && !is_null($mdp) && !is_null($nom) && !is_null($prenom)&& !is_null($mail)) {
                $this->login = $login;
                $this->mdp = $mdp;
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->$mail = $mail;
            }
        }
        public static function select($primary_value){
        return parent::select($primary_value);
        }

        public static function insert($data)
        {
            return parent::insert($data);
        }

        public static function update($data, $primary)
        {
            return parent::update($data, $primary);
        }

        public static function delete($primary)
        {
            return parent::delete($primary);
        }

        public static function checkPassword($login, $motdepasse)
        {
            try {
                $utilisateur = self::select($login);
                $nomClasse = self::$nomClasse;
                $pdo = Model::$pdo;
                if (!$utilisateur) {
                    $test = 'userWrong';
                    return $test;
                }else{
                    $sql = "SELECT *
                        FROM `rGztzErq-Utilisateurs`
                        WHERE login =:sql_log 
                        AND mdp =:sql_mdp;";
                    $requete = $pdo->prepare($sql);
                    $valeur = array(
                        "sql_log" => $login,
                        "sql_mdp" => $motdepasse);
                    $requete->execute($valeur);
                    $requete->setFetchMode(PDO::FETCH_CLASS, $nomClasse);
                    $objet = $requete->fetchAll();
                    if (isset($objet[0])){
                        $test = 'bg';
                        return $test;
                    }
                    else {
                        $test = 'mdpWrong';
                        return $test;
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public static function selectNonce($login,$nonce){
            try {
                $pdo = self::$pdo;
                $nomTable = self::$nomTable;
                $nomClasse = self::$nomClasse;

                $sql = "SELECT * 
                    FROM `{$nomTable}` 
                    WHERE  `login`=:sql_pk
                    AND `nonce`=:sql_n";
                $requete = $pdo->prepare($sql);
                $valeur = array(
                    "sql_pk" => $login,
                    "sql_n" => $nonce);
                $requete->execute($valeur);
                $requete->setFetchMode(PDO::FETCH_CLASS, $nomClasse);
                $objet = $requete->fetchAll();
                if (isset($objet[0]))
                    return $objet[0]->get('nonce');
                else
                    return NULL;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }


<?php

abstract class DbConnect
{

    private static $instance = null;
    protected $pdo;

    protected function __construct()
    {

        // Défini les paramètres de connexion à la base de données
        $host = getenv("DB_HOST") ?: '127.0.0.1';
        $port = getenv("DB_PORT") ?: '3306';
        $db = getenv("DB_NAME") ?: 'jeux_olympiquesv2';
        $user = getenv("DB_USER") ?: 'root';
        $pwd = getenv("DB_PASS") ?: '';
        $charset = 'utf8mb4';

        // S'il y'a des certificat il faudrat au préalable déterminer les chemin d'accès quelque part, soit dans un fichier appart généralement .env ou ici en php 
        // putenv('DB_SSL_CA=/path/to/ca.pem');
        // putenv('DB_SSL_CERT=/path/to/cert.pem');
        // putenv('DB_SSL_KEY=/path/to/key.pem');


        // Récupére les chemins d'accès aux fichiers SSL à partir des variables d'environnement
        $sslCa = getenv("DB_SSL_CA") ?: null;
        $sslCert = getenv("DB_SSL_CERT") ?: null;
        $sslKey = getenv("DB_SSL_KEY") ?: null;

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

        // Définir les options PDO
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        // Ajoute les options SSL si elles sont définies
        if ($sslCa && $sslCert && $sslKey) {
            $options[PDO::MYSQL_ATTR_SSL_CA] = $sslCa;
            $options[PDO::MYSQL_ATTR_SSL_CERT] = $sslCert;
            $options[PDO::MYSQL_ATTR_SSL_KEY] = $sslKey;
        }

        // Essaye de se connecter à la base de données
        try {
            $this->pdo = new PDO($dsn, $user, $pwd, $options);
            // echo "Connexion réussie à la base de donnée";
        } catch (PDOException $e) {
            error_log($e->getMessage());
            die('Erreur de connexion à la base de données. Veuillez réessayer plus tard.');
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance->pdo;
    }
}





// function getPDOConnexion(){
//     $host = "127.0.0.1";
//     $port = "3306";
//     // database
//     $db = "Jeux_olympiques";
//     $user = "root";
//     // password
//     $pwd = "";
//     // encodage
//     $charset = 'utf8mb4';
//     // data source name
//     $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

//     $options = [
//         // si au lancement il y'a un erreur, il affichera l'erreur 
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         // retourne le resultat sous forme de tableau associatif de la base de données 
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//         // permet de d"utilisé des requette native de la base de données , cela permet de renforcé la securité surtout contre les injection sql, et octoire de meilleur performance
//         PDO::ATTR_EMULATE_PREPARES => False,
//     ];

//     // bloc try catch, il tente de crée l'instance avec les informations fournis et en cas d'echec , il affichera le message d'erreur 
//     try {
//         // J'instancie et crée ma connection a la bdd
//         $pdo = new PDO($dsn, $user, $pwd, $options);
//         echo "Connexion réussie à la base de donnée";
//         return $pdo;
//     } catch (PDOException $e) {
//         throw new PDOException($e->getMessage(), (int)$e->getCode());
//     }
// }


// getPDOConnexion();

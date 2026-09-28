<?php 
    require_once __DIR__ . "/..config/database.php";

    class ProfesseurModel {
        private $pdo ;

        public function __construct(){
            $database = new Database;
            $this->pdo = $database->getConnection();
        }

        //recuperer tous les professeurs
        public function getAll(){
            $sql = "SELECT * FROM professeurs";
            $stmt = $this->pdo->query($sql);
            $professeurs = $stmt->fetchAll();
            return $professeurs;
        }

        //recuperer par son id
        public function getByid(int $id){
            $sql = "SELECT * FROM professeurs WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                
            ]);
            $professeurs = $stmt->fetch();
            return $professeurs ?: Null;
        }
    }
?>
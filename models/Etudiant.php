<?php
require_once __DIR__."/../config/database.php";
class EtudiantModel
{
    private  $pdo;

    public function __construct( )
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    // Recuperer tous les etudiants
    public function getAll()
    {
        $sql = "SELECT * FROM etudiants";

        $stmt = $this->pdo->query($sql);

        $etudiants = $stmt->fetchAll();

        return $etudiants;
    }


    // Recuperer un etudiant par son id
    public function getByid(int $id)
    {
        $sql = "SELECT * FROM etudiants WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        $etudiant = $stmt->fetch();

        return $etudiant ?: null;
    }


    // Ajouter un etudiant
    public function create(
        string $nom,
        string $prenom,
        string $email,
        string $telephone,
        string $date_naissance
    ) {
        $sql = "INSERT INTO etudiants
                (nom, prenom, email, telephone, date_naissance)
                VALUES
                (:nom, :prenom, :email, :telephone, :date_naissance)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':telephone' => $telephone,
            ':date_naissance' => $date_naissance
        ]);
    }


    // Modifier un etudiant
    public function update(
        int $id,
        string $nom,
        string $prenom,
        string $email,
        string $telephone,
        string $date_naissance
    ) {
        $sql = "UPDATE etudiants SET
                    nom = :nom,
                    prenom = :prenom,
                    email = :email,
                    telephone = :telephone,
                    date_naissance = :date_naissance
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':telephone' => $telephone,
            ':date_naissance' => $date_naissance
        ]);
    }


    // Supprimer un etudiant
    public function delete(int $id)
    {
        $sql = "DELETE FROM etudiants WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}

?>
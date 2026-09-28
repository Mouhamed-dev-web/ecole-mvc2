<?php
require_once __DIR__ . '/../models/Etudiant.php';

class EtudiantController
{
    private EtudiantModel $etudiant;

    public function __construct()
    {

        $this->etudiant = new EtudiantModel();
    }


    // Afficher la liste des étudiants
    public function index()
    {
        $etudiants = $this->etudiant->getAll();

        require __DIR__ . '/../views/etudiants/list.php';
    }


    // Ajouter un étudiant
    public function create()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $date_naissance = $_POST['date_naissance'];

        $this->etudiant->create(
            $nom,
            $prenom,
            $email,
            $telephone,
            $date_naissance
        );

        header('Location: /ecole-mvc2/index.php?action=etudiants');
        exit;
    }

        require __DIR__ . '/../views/etudiants/create.php';
    }


    // Modifier un étudiant
    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die("ID étudiant manquant.");
        }

        $etudiant = $this->etudiant->getByid((int) $id);

        if (!$etudiant) {
            die("Étudiant introuvable.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->etudiant->update(
                (int) $id,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['telephone'],
                $_POST['date_naissance']
            );

            header('Location: index.php?action=etudiants');
            exit;
        }

        require __DIR__ . '/../views/etudiants/edit.php';
    }


    // Supprimer un étudiant
    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die("ID étudiant manquant.");
        }

        $this->etudiant->delete((int) $id);

        header('Location: index.php');
        exit;
    }
}
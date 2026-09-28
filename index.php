<?PHP 
    require_once __DIR__ . "/controllers/EtudiantController.php";

    $action = $_GET['action'] ?? "etudiants";

    switch ($action) {
        case 'etudiants':
            $etudiantcontroller = new EtudiantController();
            $etudiantcontroller->index();
            break;

        case 'etudiants_create':
            $etudiantcontroller = new EtudiantController();
            $etudiantcontroller->create();
            break;
        
         case 'etudiants_edit':
            $etudiantcontroller = new EtudiantController();
            $etudiantcontroller->edit();
            break;

        case 'etudiants_delete':
            $etudiantcontroller = new EtudiantController();
            $etudiantcontroller->delete();
            break;
        
        
        default:
            # code...
            break;
    }
?>
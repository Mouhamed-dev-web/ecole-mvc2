<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste des étudiants</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


/* ==============================
   BODY
================================= */

body {
    min-height: 100vh;

    font-family: Arial, Helvetica, sans-serif;

    background: linear-gradient(
        135deg,
        #667eea,
        #764ba2
    );

    padding: 50px 30px;
}


/* ==============================
   CONTAINER
================================= */

.container {
    width: 100%;
    max-width: 1400px;

    margin: 0 auto;

    background: #ffffff;

    padding: 35px;

    border-radius: 18px;

    box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.18);
}


/* ==============================
   HEADER
================================= */

.header {
    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

    margin-bottom: 30px;
}


/* ==============================
   TITRE
================================= */

.header h1 {
    font-size: 28px;

    color: #222;

    font-weight: 700;
}


/* ==============================
   BOUTONS
================================= */

.btn {
    display: inline-block;

    text-decoration: none;

    padding: 10px 15px;

    border-radius: 8px;

    font-size: 14px;

    font-weight: 600;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease,
        opacity 0.2s ease;
}


.btn:hover {
    transform: translateY(-2px);

    box-shadow:
        0 5px 12px rgba(0, 0, 0, 0.15);
}


/* ==============================
   BOUTON AJOUTER
================================= */

.btn-add {
    background: #667eea;

    color: white;

    padding: 12px 18px;
}


.btn-add:hover {
    opacity: 0.9;
}


/* ==============================
   TABLEAU
================================= */

table {
    width: 100%;

    border-collapse: collapse;

    overflow: hidden;

    border-radius: 12px;

    background: #ffffff;
}


/* ==============================
   EN-TÊTE DU TABLEAU
================================= */

thead {
    background: #667eea;

    color: white;
}


th {
    padding: 16px 14px;

    text-align: left;

    font-size: 13px;

    font-weight: 700;

    white-space: nowrap;
}


/* ==============================
   CELLULES
================================= */

td {
    padding: 15px 14px;

    font-size: 14px;

    color: #444;

    border-bottom: 1px solid #eeeeee;

    white-space: nowrap;
}


/* ==============================
   LIGNES
================================= */

tbody tr {
    transition: background-color 0.2s ease;
}


tbody tr:hover {
    background-color: #f5f6ff;
}


tbody tr:last-child td {
    border-bottom: none;
}


/* ==============================
   ID
================================= */

tbody td:first-child {
    font-weight: 700;

    color: #667eea;
}


/* ==============================
   ACTIONS
================================= */

.actions {
    display: flex;

    align-items: center;

    gap: 8px;
}


/* ==============================
   BOUTON MODIFIER
================================= */

.btn-edit {
    background: #e8f5e9;

    color: #2e7d32;
}


.btn-edit:hover {
    background: #d7efd9;
}


/* ==============================
   BOUTON SUPPRIMER
================================= */

.btn-delete {
    background: #ffebee;

    color: #d32f2f;
}


.btn-delete:hover {
    background: #ffdadd;
}


/* ==============================
   MESSAGE VIDE
================================= */

.empty {
    padding: 40px;

    text-align: center;

    font-size: 16px;

    color: #777;

    background: #f8f9fc;

    border: 1px dashed #d5d8e0;

    border-radius: 12px;
}


/* ==============================
   RESPONSIVE
================================= */

@media (max-width: 1000px) {

    body {
        padding: 30px 15px;
    }

    .container {
        padding: 25px;

        overflow-x: auto;
    }

    .header {
        flex-direction: column;

        align-items: flex-start;
    }

    table {
        min-width: 1000px;
    }
}


/* ==============================
   PETITS ÉCRANS
================================= */

@media (max-width: 600px) {

    body {
        padding: 15px 10px;
    }

    .container {
        padding: 20px;

        border-radius: 12px;
    }

    .header h1 {
        font-size: 22px;
    }

    .btn-add {
        width: 100%;

        text-align: center;
    }
}
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>Liste des étudiants</h1>

        <a href="../../ecole-mvc2/index.php?action=etudiants_create" class="btn btn-add">
            + Ajouter un étudiant
        </a>

    </div>

    <?php if (empty($etudiants)): ?>

        <div class="empty">
            Aucun étudiant enregistré.
        </div>

    <?php else: ?>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($etudiants as $etudiant): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($etudiant['id']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($etudiant['nom']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($etudiant['prenom']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($etudiant['email']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($etudiant['telephone']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($etudiant['date_naissance']) ?>
                    </td>

                    <td>

                        <div class="actions">

                            <a
                                href="index.php?action=etudiants_edit&id=<?= $etudiant['id'] ?>"
                                class="btn btn-edit"
                            >
                                Modifier
                            </a>

                            <a
                                href="index.php?action=etudiants_delete&id=<?= $etudiant['id'] ?>"
                                class="btn btn-delete"
                                onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');"
                            >
                                Supprimer
                            </a>

                        </div>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>

</div>

</body>
</html>
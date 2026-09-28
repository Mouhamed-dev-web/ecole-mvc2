<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* ==============================
   RESET
================================= */

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
    display: flex;
    justify-content: center;
    align-items: center;

    font-family: Arial, Helvetica, sans-serif;

    background: linear-gradient(
        135deg,
        #667eea,
        #764ba2
    );

    padding: 30px;
}


/* ==============================
   CONTENEUR
================================= */

.contener {
    width: 100%;
    max-width: 750px;

    background: #ffffff;

    padding: 40px;

    border-radius: 18px;

    box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.18);

    border: 1px solid rgba(255, 255, 255, 0.5);
}


/* ==============================
   LIGNES DU FORMULAIRE
================================= */

.prenom_nom,
.email_tel,
.filiere_date {
    display: flex;
    gap: 25px;

    margin-bottom: 25px;
}


/* ==============================
   BLOCS DES CHAMPS
================================= */

.prenom,
.nom,
.email,
.tel,
.filiere,
.date {
    flex: 1;

    display: flex;
    flex-direction: column;
}


/* ==============================
   LABEL
================================= */

label {
    margin-bottom: 8px;

    font-size: 14px;
    font-weight: 600;

    color: #333;
}


/* ==============================
   INPUT
================================= */

input {
    width: 100%;

    padding: 13px 15px;

    font-size: 15px;
    font-family: inherit;

    color: #333;

    background-color: #f8f9fc;

    border: 1px solid #dcdfe6;

    border-radius: 9px;

    outline: none;

    transition:
        border-color 0.3s ease,
        box-shadow 0.3s ease,
        background-color 0.3s ease;
}


/* ==============================
   INPUT AU SURVOL
================================= */

input:hover {
    border-color: #aab2c5;
}


/* ==============================
   INPUT AU FOCUS
================================= */

input:focus {
    background-color: #ffffff;

    border-color: #667eea;

    box-shadow:
        0 0 0 4px rgba(102, 126, 234, 0.15);
}


/* ==============================
   PLACEHOLDER
================================= */

input::placeholder {
    color: #999;
}


/* ==============================
   DATE
================================= */

input[type="date"] {
    color: #555;
    cursor: pointer;
}


/* ==============================
   RESPONSIVE
================================= */

@media (max-width: 650px) {

    .contener {
        padding: 25px;
    }

    .prenom_nom,
    .email_tel,
    .filiere_date {
        flex-direction: column;

        gap: 20px;

        margin-bottom: 20px;
    }

    body {
        padding: 15px;
    }
}
    </style>
</head>
<body>
    <div class="contener">
        <h2>Modifier Etudiant</h2>
        <form action="../../ecole-mvc2/index.php?action=etudiants_edit&id=<?= $etudiant['id'] ?>" method="post">
            <div class="prenom_nom">
                <div class="prenom">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" value =<?= $etudiant['prenom'] ?> >
                </div>
                <div class="nom">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" value = <?= $etudiant['nom'] ?>>
                </div>
            </div>

            <div class="email_tel">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value = <?= $etudiant['email'] ?>>
                </div>
                <div class="tel">
                    <label for="tel">Telephone</label>
                    <input type="text" name="telephone" id="tel" value = <?= $etudiant['telephone'] ?>>
                </div>
            </div>

            <div class="filiere_date">
                <div class="date">
                    <label for="date">Date d'inscription</label>
                    <input type="date" name="date_naissance" id="date" value = <?= $etudiant['date_naissance'] ?>>
                </div>
            </div>
            <button type="submit">Evoyer</button>
        </form>
    </div>
</body>
</html>
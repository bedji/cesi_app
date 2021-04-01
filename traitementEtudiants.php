<?php
include('./components/db.php');

switch ($_GET['action']) {
    case 'delete':
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id = $_GET["id"];

            $sql = "DELETE FROM students WHERE id=$id";
            $req = $db->prepare($sql);
            if ($req->execute()) {
                header('Location: etudiants.php');
            } else {
                $error = $req->errorInfo();
                if ($error[0] == 23000) {
                    echo "Impossible de supprimer l'étudiant car celui ci est déjà utilisé";
                } else {
                    echo "Impossible de supprimer l'étudiant";
                }
            }
        }
        break;
    case 'add':
        if (
            isset($_POST['lastname']) && !empty($_POST['lastname'])
            && isset($_POST['firstname']) && !empty($_POST['firstname'])
            && isset($_POST['mail']) && !empty($_POST['mail'])
        ) {
            try {
                $promos = isset($_POST["promo_id"]) ? $_POST["promo_id"] : [];
                $db->beginTransaction();
                $sql = "INSERT INTO students (lastname, firstname, mail, promo_id) VALUES(?, ?, ?, ?)";
                $req = $db->prepare($sql);
                $req->bindValue(1, strtoupper($_POST['lastname']), PDO::PARAM_STR);
                $req->bindValue(2, ucfirst($_POST['firstname']), PDO::PARAM_STR);
                $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
                $req->bindValue(4, $_POST['promo_id'], PDO::PARAM_INT);
                if (!$req->execute()) {
                    throw new Error("impossible de créer un étudiant");
                }

                $studentID = $db->lastInsertId();

                $sql = "INSERT INTO students_promo (students_id, promo_id) VALUES(?, ?)";
                $req = $db->prepare($sql);
                $req->bindValue(1, $studentID, PDO::PARAM_STR);
                $req->bindValue(2, $_POST['promo_id'], PDO::PARAM_STR);
                if (!$req->execute()) {
                    throw new Error("une erreur s'est produite pendant la création des étudiants");
                }


                $db->commit();
                header('Location: ./etudiants.php');
            } catch (\Throwable $th) {
                $db->rollBack();
                header('Location: ./addEtudiants.php');
            }
        }
        break;
    case 'edit':
        if (
            isset($_POST['lastname']) && !empty($_POST['lastname'])
            && isset($_POST['firstname']) && !empty($_POST['firstname'])
            && isset($_POST['mail']) && !empty($_POST['mail'])
        ) {
            $sql = "UPDATE speakers SET lastname=?, firstname=?, mail=?";
            $req = $db->prepare($sql);
            $req->bindValue(1, strtolower($_POST['lastname']), PDO::PARAM_STR);
            $req->bindValue(2, strtolower($_POST['firstname']), PDO::PARAM_STR);
            $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
            if ($req->execute()) {
                header('Location: etudiants.php');
            } else {
                header('Location: editEtudiants.php');
            }
        }
        break;
    default:
        header('Location: index.php');
        break;
}

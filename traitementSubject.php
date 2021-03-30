<?php
include('./components/db.php');

switch ($_GET['action']) {
    case 'delete':
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id = $_GET["id"];

            $sql = "DELETE FROM subjects WHERE id=$id";
            $req = $db->prepare($sql);
            if ($req->execute()) {
                header('Location: subjects.php');
            } else {
                $error = $req->errorInfo();
                if ($error[0] == 23000) {
                    echo 'Impossible de supprimer la matière car celle-ci est déjà utilisée';
                } else {
                    echo "Impossible de supprimer la matière";
                }
            }
        }

        break;
    case 'add':
        if (
            isset($_POST['name']) && !empty($_POST['name'])
            && isset($_POST['description']) && !empty($_POST['description'])
        ) {
            $sql = "INSERT INTO subjects (name, description) VALUE (?, ?)";
            $req = $db->prepare($sql);
            $req->bindValue(1, ucfirst($_POST['name']), PDO::PARAM_STR);
            $req->bindValue(2, strtolower($_POST['description']), PDO::PARAM_STR);
            if ($req->execute()) {
                header('Location: subjects.php');
            } else {
                header('Location: addSubject.php');
            }
        }
    case 'edit':
        if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['description']) && !empty($_POST['description'])) {
            $sql = "UPDATE subjects SET name=?, description=? WHERE id=" . $_GET['id'];

            $req = $db->prepare($sql);
            $req->bindValue(1, ucfirst($_POST['name']), PDO::PARAM_STR);
            $req->bindValue(2, strtolower($_POST['description']), PDO::PARAM_STR);

            if ($req->execute()) {

                header('Location: subjects.php');
            } else {
                echo 'Error';
            }
        }
    default:
        # code...
        break;
}

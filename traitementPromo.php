<?php
include('./components/db.php');

switch ($_GET['action']) {
    case 'delete':
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id = $_GET["id"];
            echo  $id;
            $sql = "DELETE FROM promos WHERE id=$id";
            $req = $db->prepare($sql);
            if ($req->execute()) {
                header('Location: promos.php');
            } else {
                $error = $req->errorInfo();
                if ($error[0] == 23000) {
                    echo 'Impossible de supprimer la promotion car celle-ci est déjà utilisée';
                } else {
                    echo "Impossible de supprimer la promotion";
                }
            }
        }
        break;
    case 'add':

        if (
            isset($_POST['name']) && !empty($_POST['name'])
            //&& isset($_POST['studentsNumber']) && !empty($_POST['studentsNumber'])
            && isset($_POST['ref']) && !empty($_POST['ref'])
        ) {
            $sql = "INSERT INTO promos (name, studentsNumber, ref) VALUE (?, ?, ?)";
            $req = $db->prepare($sql);
            $req->bindValue(1, strtolower($_POST['name']), PDO::PARAM_STR);
            $req->bindValue(2, 0, PDO::PARAM_INT);
            $req->bindValue(3, strtolower($_POST['ref']), PDO::PARAM_STR);
            if ($req->execute()) {
                header('Location: promos.php');
            } else {
                header('Location: addPromo.php');

            }
        }
        break;
    case 'edit':

        if (
            isset($_POST['name']) && !empty($_POST['name'])
            // && isset($_POST['studentsNumber']) && !empty($_POST['studentsNumber'])
            && isset($_POST['ref']) && !empty($_POST['ref'])
            && isset($_GET['id']) && !empty($_GET['id'])
        ) {
            $sql = "UPDATE promos SET name=?, studentsNumber=?, ref=? WHERE id =" . $_GET['id'];
            $req = $db->prepare($sql);
            $req->bindValue(1, $_POST['name'], PDO::PARAM_STR);
            $req->bindValue(2, 0, PDO::PARAM_INT);
            $req->bindValue(3, strtolower($_POST['ref']), PDO::PARAM_STR);


            if ($req->execute()) {
                header('Location: promos.php');
            } else {
                echo 'Error';
            }
        }
        break;
    default:
        # code...
        break;
}

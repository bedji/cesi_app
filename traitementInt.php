<?php 
include('./components/db.php');

    switch ($_GET['action']) {
        case 'delete':
            if (isset($_GET["id"]) && !empty($_GET["id"])) {
                $id = $_GET["id"];
            
                $sql = "DELETE FROM speakers WHERE id=$id";
                $req = $db->prepare($sql);
                if ($req->execute()) {
                    header('Location: intervenants.php');
                } else {
                    $error = $req->errorInfo();
                    if($error[0] == 23000){
                        echo "Impossible de supprimer l'utilisateur car celui ci est déjà utilisé";
                    } else {
                        echo "Impossible de supprimer l'utilisateur";
                    }
                }
            }
            break;
        case 'add':

            if(
            isset($_POST['lastname']) && !empty($_POST['lastname'])
            && isset($_POST['firstname']) && !empty($_POST['firstname'])
            && isset($_POST['mail']) && !empty($_POST['mail'])
            && isset($_POST['telephone']) && !empty($_POST['telephone'])){
                $sql = "INSERT INTO speakers (lastname, firstname, mail, telephone) VALUE (?, ?, ?, ?)";
                $req = $db->prepare($sql);
                $req->bindValue(1, strtolower($_POST['lastname']), PDO::PARAM_STR);
                $req->bindValue(2, strtolower($_POST['firstname']), PDO::PARAM_STR);
                $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
                $req->bindValue(4, $_POST['telephone'], PDO::PARAM_STR);
                if($req->execute()){
                    header('Location: intervenants.php');
                } else {
                    /* header('Location: addIntervenant.php'); */
                }
            }
            break;
        case 'edit':
            if(
                isset($_POST['lastname']) && !empty($_POST['lastname'])
                && isset($_POST['firstname']) && !empty($_POST['firstname'])
                && isset($_POST['mail']) && !empty($_POST['mail'])
                && isset($_POST['telephone']) && !empty($_POST['telephone'])){
                    $sql = "UPDATE speakers SET lastname=?, firstname=?, mail=?, telephone=?";
                    $req = $db->prepare($sql);
                    $req->bindValue(1, strtolower($_POST['lastname']), PDO::PARAM_STR);
                    $req->bindValue(2, strtolower($_POST['firstname']), PDO::PARAM_STR);
                    $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
                    $req->bindValue(4, $_POST['telephone'], PDO::PARAM_STR);
                    if($req->execute()){
                        header('Location: intervenants.php');
                    } else {
                        header('Location: editIntervenant.php');
                    }
                }
                break;
        default:
            header('Location: index.php');
            break;
    }
?>
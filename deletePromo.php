<?php 
include('./components/db.php');

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM promos WHERE id=$id";
    $req = $db->prepare($sql);
    if ($req->execute()) {
        header('Location: promos.php');
    } else {
        $error = $req->errorInfo();
        if($error[0] == 23000){
            echo 'Impossible de supprimer la promotion car celle-ci est déjà utilisée';
        } else {
            echo "Impossible de supprimer la promotion";
        }
    }
}
?>

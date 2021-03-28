<?php 
include('./components/db.php');

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM subjects WHERE id=$id";
    $req = $db->prepare($sql);
    if ($req->execute()) {
        header('Location: subjects.php');
    } else {
        $error = $req->errorInfo();
        if($error[0] == 23000){
            echo 'Impossible de supprimer la matière car celle-ci est déjà utilisée';
        } else {
            echo "Impossible de supprimer la matière";
        }
    }
}
?>

<?php
include('./components/db.php');

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    try {
        $sql = "DELETE FROM speakers WHERE id=$id";
        $req = $db->prepare($sql);
        if ($req->execute()) {
            header('Location: intervenants.php');
        } else {
            $error = $req->errorInfo();
            if ($error[0] == 23000) {
                throw new Error("Impossible de supprimer l\'utilisateur car celui ci est déjà utilisé");
                echo 'Impossible de supprimer l\'utilisateur car celui ci est déjà utilisé';
            } else {
                throw new Error(" Impossible de supprimer l\'utilisateur ");
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}

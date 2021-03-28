<?php 
include('./components/db.php');

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
?>
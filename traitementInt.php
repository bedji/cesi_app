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
                if (isset($_POST['lastname']) && !empty($_POST['lastname'])
                    && isset($_POST['firstname']) && !empty($_POST['firstname'])
                    && isset($_POST['mail']) && !empty($_POST['mail'])
                    && isset($_POST['telephone']) && !empty($_POST['telephone'])){
                    try {
                        $subjects = isset($_POST["subjects"]) ? $_POST["subjects"] : [];
                        $db->beginTransaction();
                        $sql = "INSERT INTO speakers (lastname, firstname, mail, telephone) VALUES(?, ?, ?, ?)";
                        $req = $db->prepare($sql);
                        $req->bindValue(1, strtoupper($_POST['lastname']), PDO::PARAM_STR);
                        $req->bindValue(2, ucfirst($_POST['firstname']), PDO::PARAM_STR);
                        $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
                        $req->bindValue(4, $_POST['telephone'], PDO::PARAM_STR);
                
                        if (!$req->execute()) {
                            throw new Error("impossible de créer un intervenant");
                        }
        
                        $speakerID = $db->lastInsertId();
                        foreach ($subjects as $key => $subID) {
                            $sql = "INSERT INTO speakers_subjects (speaker_id, subject_id) VALUES(?, ?)";
                            $req = $db->prepare($sql);
                            $req->bindValue(1, $speakerID, PDO::PARAM_STR);
                            $req->bindValue(2, $subID, PDO::PARAM_STR);
                            if (!$req->execute()) {
                                throw new Error("une erreur s'est produite pendant la création des matières");
                            }
                        }
        
                        $db->commit();
                        header('Location: ./intervenants.php');
                    } catch (\Throwable $th) {
                        $db->rollBack();
                        header('Location: ./addIntervenants.php');
                    }
                }
                break;
        case 'edit':
            if(
                isset($_POST['lastname']) && !empty($_POST['lastname'])
                && isset($_POST['firstname']) && !empty($_POST['firstname'])
                && isset($_POST['mail']) && !empty($_POST['mail'])
                && isset($_POST['telephone']) && !empty($_POST['telephone'])
                && isset($_POST['subjects']) && !empty($_POST['subjects'])){
                    $sql = "UPDATE speakers SET lastname=?, firstname=?, mail=?, telephone=? subjects=?";
                    $req = $db->prepare($sql);
                    $req->bindValue(1, strtoupper($_POST['lastname']), PDO::PARAM_STR);
                    $req->bindValue(2, ucfirst($_POST['firstname']), PDO::PARAM_STR);
                    $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
                    $req->bindValue(4, $_POST['telephone'], PDO::PARAM_STR);
                    $req->bindValue(5, $_POST['subjects'], PDO::PARAM_STR);
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
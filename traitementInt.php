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
            $id = $_GET['id'];
            $delsql = "DELETE FROM speakers_subjects WHERE speaker_id=" . $id;
            $delreq = $db->prepare($delsql);
            if ($delreq->execute()){
                if (isset($_POST['lastname']) && !empty($_POST['lastname'])
                && isset($_POST['firstname']) && !empty($_POST['firstname'])
                && isset($_POST['mail']) && !empty($_POST['mail'])
                && isset($_POST['telephone']) && !empty($_POST['telephone'])){
                try {
                    $subjects = isset($_POST["subjects"]) ? $_POST["subjects"] : [];
                    $db->beginTransaction();
                    $sql = "UPDATE speakers SET lastname=?, firstname=?, mail=?, telephone=? WHERE id =" . intval($id);
                    $req = $db->prepare($sql);
                    $req->bindValue(1, strtoupper($_POST['lastname']), PDO::PARAM_STR);
                    $req->bindValue(2, ucfirst($_POST['firstname']), PDO::PARAM_STR);
                    $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
                    $req->bindValue(4, $_POST['telephone'], PDO::PARAM_STR);
            
                    if (!$req->execute()) {
                        throw new Error("impossible de créer un intervenant");
                    }

                    foreach ($subjects as $key => $subID) {
                        $sql = "INSERT INTO speakers_subjects (speaker_id, subject_id) VALUES(?, ?)";
                        $req = $db->prepare($sql);
                        $req->bindValue(1, $id, PDO::PARAM_STR);
                        $req->bindValue(2, $subID, PDO::PARAM_STR);
                        if (!$req->execute()) {
                            throw new Error("une erreur s'est produite pendant la création des matières");
                        }
                    }

                    $db->commit();
                    header('Location: ./intervenants.php');
                } catch (\Throwable $th) {
                    var_dump($id);
                    var_dump($subID);
                    die();
                    $db->rollBack();
                    header('Location: ./editIntervenant.php?id=' . $id);
                }
            }
        }
            // if( isset($_POST['lastname']) && !empty($_POST['lastname'])
            //     && isset($_POST['firstname']) && !empty($_POST['firstname'])
            //     && isset($_POST['mail']) && !empty($_POST['mail'])
            //     && isset($_POST['telephone']) && !empty($_POST['telephone'])){
            //         $id = $_GET['id'];
            //         try {
            //             $subjects = isset($_POST["subjects"]) ? $_POST["subjects"] : [];
            //             $db->beginTransaction();
            //             $sql = "UPDATE speakers SET lastname=?, firstname=?, mail=?, telephone=? WHERE speakers.id=" . $id;
            //             $req = $db->prepare($sql);
            //             $req->bindValue(1, strtoupper($_POST['lastname']), PDO::PARAM_STR);
            //             $req->bindValue(2, ucfirst($_POST['firstname']), PDO::PARAM_STR);
            //             $req->bindValue(3, $_POST['mail'], PDO::PARAM_STR);
            //             $req->bindValue(4, $_POST['telephone'], PDO::PARAM_STR);
                
            //             if (!$req->execute()) {
            //                 throw new Error("Impossible de modifier l'intervenant");
            //             }
        
            //             $speakerID = $db->lastInsertId();
            //             foreach ($subjects as $key => $subID) {
            //                 $delsql = "DELETE * FROM speakers_subjects WHERE speaker_id=" . $id;
            //                 $delreq = $db->prepare($presql);
            //                 if ($delreq->execute()) {
            //                     $sql = "INSERT INTO speakers_subjects (speaker_id, subject_id) VALUES(?, ?)";
            //                     $req = $db->prepare($sql);
            //                     $req->bindValue(1, $speakerID, PDO::PARAM_STR);
            //                     $req->bindValue(2, $subID, PDO::PARAM_STR);
            //                     if (!$req->execute()) {
            //                         throw new Error("une erreur s'est produite pendant la modiication de l'intervenant");
            //                     }
            //                 }
            //             }
            //             $db->commit();
            //             header('Location: ./intervenants.php');
            //         } catch (\Throwable $th) {
            //             var_dump($subID);
            //             var_dump($speakerID);
            //             die();
            //             $db->rollBack();
            //             header('Location: ./editIntervenant.php?id=' . $id);
            //         }
            //     }
                break;
        default:
            header('Location: index.php');
            break;
    }
?>
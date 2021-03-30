<?php
include('./components/db.php');

switch ($_GET['action']) {
    case 'delete':
        if (
            isset($_GET["id"]) && !empty($_GET["id"])

        ) {
            $id = $_GET["id"];
            echo "delete the date id= " . $id;

            $sql = "DELETE FROM dates WHERE id=$id";
            $req = $db->prepare($sql);
            if ($req->execute()) {
                header('Location: dates.php');
            } else {
                $error = $req->errorInfo();
                if ($error[0] == 23000) {
                    echo "Impossible de supprimer l'utilisateur car celui ci est déjà utilisé";
                } else {
                    echo "Impossible de supprimer l'utilisateur";
                }
            }
            header('Location:dates.php');
        }

        break;
    case 'add':
        if (
            isset($_POST["dateinput"]) && !empty($_POST["dateinput"]) &&
            isset($_POST["promoid"]) && !empty($_POST["promoid"]) &&
            isset($_POST["subjectselect"]) && !empty($_POST["subjectselect"])
        ) {
            // var_dump($_POST);
            // die();
            try {
                $db->beginTransaction();
                $sql = "INSERT INTO `dates` ( `date`, `validated`, `promo_id`, `subject_id`, `speaker_id`) VALUES ( ?, ?, ?, ?, ?)";
                $req = $db->prepare($sql);
                $req->bindValue(1, strtolower($_POST['dateinput']), PDO::PARAM_STR);
                $req->bindValue(2, isset($_POST['valider']) && $_POST['valider'] === "on" ? 1 : 0, PDO::PARAM_INT);
                echo (isset($_POST['valider']) && $_POST['valider'] === "on" ? 1 : 0);

                $req->bindValue(3, $_POST['promoid'], PDO::PARAM_INT);
                $req->bindValue(4, $_POST['subjectselect'], PDO::PARAM_INT);
                $req->bindValue(5, !$_POST['speakerselect'] === 'null' ? $_POST['speakerselect'] : null, PDO::PARAM_INT);
                echo (!$_POST['speakerselect'] === 'null' ? $_POST['speakerselect'] : 'null');
                //die();
                // var_dump($_POST);
                // die();
                if (!$req->execute()) {
                    throw new Error("impossible de créer une date");
                }
                $db->commit();
                header('Location: dates.php?notif=vous avez ajouté votre date&type=success');
            } catch (\Throwable $th) {
                $db->rollBack();
                header('Location: dates.php?notif=' . $th->getMessage() . '&type=danger');
            }
        }
        break;
    case 'edit':
        if (
            isset($_POST["dateinput"]) && !empty($_POST["dateinput"]) &&
            isset($_POST["promoid"]) && !empty($_POST["promoid"]) &&
            isset($_POST["subjectselect"]) && !empty($_POST["subjectselect"])
        ) {
            // var_dump($_POST);
            // die();
            try {
                $db->beginTransaction();
                $sql = "INSERT INTO `dates` ( `date`, `validated`, `promo_id`, `subject_id`, `speaker_id`) VALUES ( ?, ?, ?, ?, ?)";
                $req = $db->prepare($sql);
                $req->bindValue(1, strtolower($_POST['dateinput']), PDO::PARAM_STR);
                $req->bindValue(2, strtolower($_POST['valider']) === "on" && isset($_POST['valider']) ? 1 : 0, PDO::PARAM_INT);
                $req->bindValue(3, $_POST['promoid'], PDO::PARAM_INT);
                $req->bindValue(4, $_POST['subjectselect'], PDO::PARAM_INT);
                $req->bindValue(5, !$_POST['speakerselect'] === 'null' ? $_POST['speakerselect'] : 'null', PDO::PARAM_INT);
                if (!$req->execute()) {
                    throw new Error("impossible de créer une date");
                }
                $db->commit();
                header('Location: dates.php?notif=vous avez ajouté votre date&type=success');
            } catch (\Throwable $th) {
                $db->rollBack();
                header('Location: dates.php?notif=' . $th->getMessage() . '&type=danger');
            }
        }
        break;
}

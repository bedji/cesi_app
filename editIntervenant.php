<?php
include("./components/header.php");
include("./components/db.php");

$id = $_GET['id'];
$sql = "SELECT * FROM speakers WHERE id = $id";
$req = $db->prepare($sql);
$req->execute();

$speaker = $req->fetch();
if (!$speaker) {
    header('Location: dates.php');
}

$sql = "SELECT * FROM subjects";
$req = $db->prepare($sql);
$req->execute();
$subjects = $req->fetchAll();
$sql2 = "SELECT subject_id, subjects.name AS sub_name FROM speakers_subjects JOIN subjects ON subjects.id=speakers_subjects.subject_id WHERE speaker_id=" . $_GET['id'];
$req = $db->prepare($sql2);
$req->execute();
$data = $req->fetchAll();
$matching_subjects = [];
foreach ($data as $key => $sub) {
    array_push($matching_subjects, $sub['subject_id']);
}

?>

<!-- Header -->
<!--
    <link rel="stylesheet" href="./assets/css/bootstrap-multiselect.min.css" type="text/css" />
<script data-main="dist/js/" src="./assets/js/require.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="./assets/js/bootstrap-multiselect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">CESI Reims</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./dates.php">Intervenants</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">

        <!---------------------------------------------------------------------------------------------------------------------------

                                             METTRE LE CONTENU DE VOTRE PAGE CI-DESSOUS

        --------------------------------------------------------------------------------------------------------------------------->


        <div class="card col-12">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Modifier intervenant </h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="./traitementInt.php?action=edit&id=<?= $id ?>" method="POST">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nom</label>
                                    <input type="text" name="lastname" id="input-username" class="form-control" value="<?= $speaker['lastname'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Pr??nom</label>
                                    <input type="text" name="firstname" id="input-email" class="form-control" value="<?= $speaker['firstname'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Mail</label>
                                    <input type="mail" name="mail" id="input-first-name" class="form-control" value="<?= $speaker['mail'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">T??l??phone</label>
                                    <input type="tel" name="telephone" id="input-last-name" class="form-control" value="<?= $speaker['telephone'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-subjects">Mati??res</label>

                                    <div>
                                        <div class="selectBox" onclick="showCheckboxes()">

                                       

                                            <select class="form-control">
                                                <option selected disabled>Selectionnez une mati??re</option>
                                            </select>
                                            <div class="overSelect"></div>

                                        </div>
                                        <div id="checkboxes">
                                            <?php
                                            foreach ($subjects as $key => $subject) { ?>
                                                <label for="<?= $subject['id'] ?>">
                                                    <input name="subjects[]" <?= in_array($subject['id'], $matching_subjects) ? 'checked' : '' ?> type="checkbox" id="<?= $subject['id'] ?>" value="<?= $subject['id'] ?>" />
                                                    &nbsp;<?= $subject['name'] ?>
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div>

                                           

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="./intervenants.php" class="btn btn-warning">Retour</a>
                            <button class="btn btn-success">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>

        <!---------------------------------------------------------------------------------------------------------------------------

                                                METTRE LE CONTENU DE VOTRE PAGE CI-DESSUS

      --------------------------------------------------------------------------------------------------------------------------->
    </div>

    <?php include("./components/footer.php") ?>
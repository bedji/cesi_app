<?php
include("./components/header.php");
include('./components/db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM dates WHERE id=$id";
$req = $db->prepare($sql);
$req->execute();

$date = $req->fetch();
?>




<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./dates.php">Dates</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modification</li>
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
                        <h3 class="mb-0">Modifier la date <?= $date['date'] ?></h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="./traitementDates.php?action=edit" method="POST">
                    <h6 class="heading-small text-muted mb-4">information de Date</h6>
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="dateInput" class="form-control-label">Date</label>
                                    <input class="form-control" name="dateinput" type="date" value="<?= $date['date'] ?>" id="dateInput">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="exampleFormControlSelect1">Choix de la promo</label>
                                    <select class="form-control" name="promoid" id="promoselect">
                                        <option disabled>Sélectionner une promo</option>
                                        <?php
                                        $sql = "SELECT * FROM promos";
                                        $req = $db->prepare($sql);
                                        $req->execute();
                                        $promos = $req->fetchAll();
                                        foreach ($promos as $key => $promo) { ?>
                                            <option <?= $date['promo_id'] === $promo['id'] ? "selected" : "" ?> value="<?= $promo['id'] ?>"> <?= $promo['name'] ?></option>
                                        <?php } ?>



                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="exampleFormControlSelect1">Matiére</label>
                                    <select class="form-control" name='subjectselect' id="subjectselect">
                                        <option disabled>Sélectionner une Matiére</option>
                                        <?php
                                        $sql = "SELECT * FROM subjects";
                                        $req = $db->prepare($sql);
                                        $req->execute();
                                        $subjects = $req->fetchAll();
                                        foreach ($subjects as $key => $subject) { ?>
                                            <option <?= $subject['id'] === $date['subject_id'] ? "selected" : "" ?> value="<?= $subject['id'] ?>"> <?= $subject['name'] ?></option>
                                        <?php } ?>



                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="exampleFormControlSelect1">Intervenant</label>
                                    <select class="form-control" name='speakerselect' id="speakerselect">
                                        <option>Sélectionner un intervenant</option>
                                        <?php

                                        $sql = "SELECT * FROM speakers_subjects
                                        JOIN speakers ON speakers.id = speakers_subjects.speaker_id
                                        WHERE speakers_subjects.subject_id =" . $date['subject_id'];
                                        $req = $db->prepare($sql);
                                        $req->execute();
                                        $speakers = $req->fetchAll();
                                        // echo (count($speakers));
                                        // die();
                                        foreach ($speakers as $key => $speaker) { ?>
                                            <option <?= $date["speaker_id"] === $speaker["id"] ? "selected" : '' ?> value="<?= $speaker['id'] ?>"> <?= $speaker['firstname'] . ' ' . $speaker['lastname'] ?></option>
                                        <?php }
                                        ?>


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="valider" type="checkbox" class="custom-control-input" id="speakervalid">
                                        <label class="custom-control-label" for="speakervalid">Date Validé</label>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="./dates.php" class="btn btn-warning">Retour</a>
                            <input type="submit" class="btn btn-success" value="Valider">
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!---------------------------------------------------------------------------------------------------------------------------

                                             METTRE LE CONTENU DE VOTRE PAGE CI-DESSOUS

        --------------------------------------------------------------------------------------------------------------------------->


    </div>
    <script defer src="./datesfetch.js"></script>
    <?php include("./components/footer.php") ?>
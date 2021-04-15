<?php include("./components/header.php");
include("./components/db.php");
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
                            <li class="breadcrumb-item active" aria-current="page">Ajout</li>
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
                        <h3 class="mb-0">Ajouter une date </h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="./traitementDates.php?action=add" method="POST">
                    <h6 class="heading-small text-muted mb-4">information de Date</h6>
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="dateInput" class="form-control-label">Date</label>
                                    <input class="form-control" name="dateinput" type="date" value="" id="dateInput">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="exampleFormControlSelect1">Choix de la promo</label>
                                    <select class="form-control" name="promoid" id="promoselect" required>
                                        <option disabled selected>Sélectionner une promo</option>
                                        <?php
                                        $sql = "SELECT * FROM promos";
                                        $req = $db->prepare($sql);
                                        $req->execute();
                                        $promos = $req->fetchAll();
                                        foreach ($promos as $key => $promo) { ?>
                                            <option value="<?= $promo['id'] ?>"> <?= $promo['name'] ?></option>
                                        <?php } ?>



                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="exampleFormControlSelect1">Matiére</label>

                                    <select class="form-control" name='subjectselect' id="subjectselect" required>

                                    

                                      

                                        <option value="null" disabled selected>Sélectionner une Matiére</option>

                                        <?php
                                        $sql = "SELECT * FROM subjects";
                                        $req = $db->prepare($sql);
                                        $req->execute();
                                        $subjects = $req->fetchAll();
                                        foreach ($subjects as $key => $subject) { ?>
                                            <option value="<?= $subject['id'] ?>"> <?= $subject['name'] ?></option>
                                        <?php } ?>



                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="exampleFormControlSelect1">Intervenant</label>
                                    <select class="form-control" name='speakerselect' id="speakerselect">
                                        <option value="null" disabled selected>Sélectionner un intervenant</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="valider" type="checkbox" disabled class="custom-control-input" id="speakervalid">
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
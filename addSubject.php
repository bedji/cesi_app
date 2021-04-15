<?php
include("./components/header.php");
include("./components/db.php");
?>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">CESI Reims</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./intervenants.php">Matières</a></li>
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
                        <h3 class="mb-0">Ajouter une matière</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="./traitementSubject.php?action=add" method="POST">
                    <h6 class="heading-small text-muted mb-4">Matière informations</h6>
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Nom</label>
                                    <input type="text" name="name" id="input-name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description">Description</label>
                                    <input type="text" name="description" id="input-description" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description">Intervenant</label>
                                    <select name="speaker" id="input-speaker" class="form-control">
                                    <option selected value=""></option>
                                        <?php 
                                            $sql = "SELECT * FROM speakers";
                                            $req = $db->prepare($sql);
                                            $req->execute();
                                            $speakers = $req->fetchAll();
                                            foreach ($speakers as $key => $speaker) {
                                            echo '<option>' . $speaker["lastname"] . ' ' . $speaker["firstname"] . '</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="./subjects.php" class="btn btn-warning">Retour</a>
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

    <?php include("./components/footer.php") ?>
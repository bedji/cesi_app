<?php
include("./components/header.php");
include("./components/db.php");

$sql = "SELECT dates.*, subjects.name AS subjectName, promos.name AS promoName ,speakers.firstname AS speakerFirstname , speakers.lastname AS speakerLastname  FROM dates 
JOIN promos ON promos.id = promo_id

JOIN subjects ON subjects.id = subject_id
LEFT JOIN speakers ON speakers.id = speaker_id
 
";
$req = $db->prepare($sql);
$req->execute();

$dates = $req->fetchAll();


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
                            <li class="breadcrumb-item"><a href="./index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dates</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="./addDates.php" class="btn btn-sm btn-neutral">Ajouter une date</a>
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
    <?php if (
        isset($_GET["notif"]) && !empty($_GET["notif"])
        && isset($_GET["type"]) && !empty($_GET["type"])
    ) { ?>

        <div class="alert alert-<?= $_GET["type"] ?> alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><?= $_GET["notif"] ?></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php } ?>
    <div class="row">



        <!---------------------------------------------------------------------------------------------------------------------------

                                             METTRE LE CONTENU DE VOTRE PAGE CI-DESSOUS

        --------------------------------------------------------------------------------------------------------------------------->


        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Liste des Dates</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-bordered align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>Dates</th>
                                <!-- <th>ID</th> -->
                                <th>Promos</th>
                                <th>Intervenant</th>
                                <th>Matiéres </th>
                                <th>Validation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php foreach ($dates as $key => $date) { ?>
                                <tr class="text-center">
                                    <th scope="row">
                                        <?= $date['date']; ?>
                                    </th>
                                    <!-- <td class="budget">
                                        <?= $date['id']; ?>
                                    </td> -->
                                    <td>
                                        <?= $date['promoName']; ?>
                                    </td>
                                    <td>
                                        <?= $date['speakerFirstname'] . " " . $date['speakerLastname']; ?>
                                    </td>
                                    <td>
                                        <?= $date['subjectName']; ?>
                                    </td>
                                    <td>
                                        <?= $date['validated'] ?  "<span class='alert-icon Success'><i class='ni ni-check-bold '> </i> </span>" :  "<span class='alert-icon Danger'><i class='ni ni-fat-remove'> </i></span >" ?>


                                    </td>

                                    <td>
                                        <div class="text-center">
                                            <?php $deletelink = "href='./traitementDates.php?action=delete&id=" . $date['id'] . "'" ?>
                                            <a class="btn btn-danger col-2" <?= !$date['validated'] ? $deletelink : "data-toggle='modal' data-target='#modal-notification'"   ?>>X</a>
                                            <!-- modal debut -->
                                            <!-- <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#modal-notification">Notification</button> -->
                                            <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                    <div class="modal-content bg-gradient-danger">

                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modal-title-notification">votre attention</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="py-3 text-center">
                                                                <i class="ni ni-bell-55 ni-3x"></i>

                                                                <p>Un intervenant a validé cette date ,</p>
                                                                <p> êtes vous sûr de vouloir supprimer cette date ? </p>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <a class="btn btn-white" href="./traitementDates.php?action=delete&id=<?= $date['id']; ?>">supprimer</a>
                                                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fin modal -->
                                            <a class="btn btn-warning col-5" href="./editIntervenant.php?id=<?= $speaker['id']; ?>">Modifier</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!---------------------------------------------------------------------------------------------------------------------------

                                             METTRE LE CONTENU DE VOTRE PAGE CI-DESSOUS

        --------------------------------------------------------------------------------------------------------------------------->

    </div>

    <?php include("./components/footer.php") ?>
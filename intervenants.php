<?php
include("./components/header.php");
include("./components/db.php");

$sql = "SELECT * FROM speakers";
$req = $db->prepare($sql);
$req->execute();

$speakers = $req->fetchAll();

function getSsubjects($db, $speakerId)
{
  $sql = "SELECT * FROM `speakers_subjects` 
  JOIN subjects ON subjects.id = speakers_subjects.subject_id 
  WHERE speaker_id = $speakerId";
  $req = $db->prepare($sql);
  $req->execute();

  return  $req->fetchAll();
}
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
              <li class="breadcrumb-item active" aria-current="page">Intervenants</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="./addIntervenant.php" class="btn btn-sm btn-neutral">Ajouter intervenant</a>
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


    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Liste des intervenants</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table table-bordered align-items-center table-flush">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Intervenant</th>
                <th>Mail</th>
                <th>Téléphone</th>
                <th>Matières </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php foreach ($speakers as $key => $speaker) { ?>
                <tr class="text-center">
                  <th scope="row">
                    <?= $speaker['lastname'] . " " . $speaker['firstname']; ?>
                  </th>
                  <td>
                    <?= $speaker['mail']; ?>
                  </td>
                  <td>
                    <?= $speaker['telephone']; ?>
                  </td>
                  <td>
                    <?php

                    foreach (getSsubjects($db, $speaker['id']) as $key => $matiere) {
                    ?>
                      <a href="./editSubject.php?id=<?= $matiere['id']   ?>" class=".badge-md badge-pill badge-default"><?= $matiere['name']   ?></a>

                    <?php }
                    ?>
                  </td>
                  <td>
                    <div class="text-center">
                      <a class="btn btn-danger col-2" href="./traitementInt.php?action=delete&id=<?= $speaker['id']; ?>">X</a>
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
<?php
include("./components/header.php");
include("./components/db.php");

$sql = "SELECT * FROM students";
$req = $db->prepare($sql);
$req->execute();

$students = $req->fetchAll();

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
              <li class="breadcrumb-item"><a href="./index.php"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Etudiants</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">

          <a href="./addEtudiants.php" class="btn btn-sm btn-neutral">Ajouter étudiants</a>

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
          <h3 class="mb-0">Liste des étudiants</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table table-bordered align-items-center table-flush">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Avatar</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Promotions </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php foreach ($students as $key => $student) { ?>
                <tr class="text-center">

                  <th><a href="./ficheEtudiant.php?id=<?= $student['id'] ?>" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $student['firstname'] . " " . $student['lastname'] ?> ">
                      <img alt="Image placeholder" src="https://randomuser.me/api/portraits/men/<?= $student['id'] ?>.jpg">
                    </a></th>
                  <th scope="row">
                    <?= $student['lastname']; ?>

                  </th>
                  <th scope="row">
                    <?= $student['firstname']; ?>
                  </th>
                  <td class="budget">
                    <?= $student['mail']; ?>
                  </td>
                  <td>
                    <?php

                    $sql2 = "SELECT * FROM promos WHERE id=" . $student['promo_id'];
                    $req2 = $db->prepare($sql2);
                    $req2->execute();
                    $promos = $req2->fetch();
                    ?>
                    <a href='./calendarPromo.php?id=<?= $promos['id'] ?>'> <?= $promos['name'] ?> </a>

                  </td>
                  <td>
                    <div class=" text-center">

                   

                      <a class="btn btn-danger col-2" href="./traitementEtudiants.php?action=delete&id=<?= $student['id']; ?>">X</a>
                      <a class="btn btn-warning col-5" href="./editetudiants.php?id=<?= $student['id']; ?>">Modifier</a>
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
<?php
include("./components/header.php");
include("./components/db.php");

$sql = "SELECT * FROM promos";
$req = $db->prepare($sql);
$req->execute();

$promos = $req->fetchAll();
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
              <li class="breadcrumb-item active" aria-current="page">Promotions</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="./addPromo.php" class="btn btn-sm btn-neutral">Ajouter promotion</a>
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
          <h3 class="mb-0">Liste des promos</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table table-bordered align-items-center table-flush">
            <thead class="thead-light">
              <tr class="text-center">
                <th>ID</th>
                <th>Nom</th>
                <th>Nombre d'étudiants</th>
                <th>Etudiants</th>

                <th>Référence</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php foreach ($promos as $key => $promo) { ?>
                <tr class="text-center">
                  <td>
                    <?= $promo['id']; ?>
                  </td>
                  <th>
                    <?= $promo['name']; ?>
                  </th>
                  <td>
                    <?= $promo['studentsNumber']; ?>
                  </td>
                  <td>
                    <div class="avatar-group">
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                        <img alt="Image placeholder" src="./assets/img/theme/team-1.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                        <img alt="Image placeholder" src="./assets/img/theme/team-2.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                        <img alt="Image placeholder" src="./assets/img/theme/team-3.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                        <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                        <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                        <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                        <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                        <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                        <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                      </a>
                    </div>
                  </td>
                  <td>
                    <?= $promo['ref']; ?>
                  </td>
                  <td>
                    <div class="text-center">
                      <a class="btn btn-danger col-2" href="./traitementPromo.php?action=delete&id=<?= $promo['id']; ?>">X</a>
                      <a class="btn btn-warning col-5" href="./editPromo.php?id=<?= $promo['id']; ?>">Modifier</a>
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
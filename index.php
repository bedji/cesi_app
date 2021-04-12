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
          <h6 class="h2 text-white d-inline-block mb-0">CESI Reims</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-home"></i></li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="./addPromo.php" class="btn btn-sm btn-neutral">Ajouter une promotion</a>
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

    <div class="col-xl-12">

      <div class="row mb-4">

        <?php foreach ($promos as $key => $promo) { ?>
          <div class="col-lg-4">
            <div class="card bg-gradient-default">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">
                      <?= $promo['ref']; ?>
                    </h5>
                    <p class="h2 font-weight-bold mb-0 text-white">
                      <?= $promo['name']; ?>
                    </p>
                    <p class="h2 font-weight-bold mb-0 text-white">
                      <?= $promo['studentsNumber']; ?> étudiants
                    </p>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                </div>
                <div class="mt-4">
                  <a type="button" href="./promoStudents.php?id=<?= $promo['id']; ?>" class="btn btn-primary text-white">Détails</a>
                  <a type="button" href="./editPromo.php?id=<?= $promo['id']; ?>" class="btn btn-warning text-white">Modifier</a>
                  <a type="button" href="./traitementPromo.php?action=delete&id=<?= $promo['id']; ?>" class="btn btn-danger text-white">Supprimer</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


      </div>

    </div>


    <!---------------------------------------------------------------------------------------------------------------------------

                                                METTRE LE CONTENU DE VOTRE PAGE CI-DESSUS

      --------------------------------------------------------------------------------------------------------------------------->

  </div>

  <?php include("./components/footer.php") ?>
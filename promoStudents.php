<?php
include("./components/header.php");
include("./components/db.php");

$sql = "SELECT * FROM students WHERE promo_id=" . $_GET['id'];
$req = $db->prepare($sql);
$req->execute();

$students = $req->fetchAll();

$sqlPromo = "SELECT * FROM promos WHERE id=" . $_GET['id'];
$reqPromo = $db->prepare($sqlPromo);
$reqPromo->execute();

$promos = $reqPromo->fetch();
?>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0" data-toggle="tooltip" data-original-title="Promotion"><?= $promos['name']?></h6><br>
          <h6 class="h5 text-white d-inline-block mb-0" data-toggle="tooltip" data-original-title="Référence"><?= $promos['ref']?></h6>
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
                <th>E-mail</th>
                <th>Dilemme</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php foreach ($students as $key => $student) { ?>
                <tr class="text-center">
                    <td>
                        <a href="./ficheEtudiant.php?id=<?= $student['id']; ?>"  class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $student['lastname'] . " " . $student['firstname'] ?>">
                        <img alt="Image placeholder" src="https://randomuser.me/api/portraits/men/<?= $student ['id']?>.jpg">
                      </a> 
                    </td>
                  <td>
                    <?= $student['lastname']; ?>
                  </td>
                  <td>
                    <?= $student['firstname']; ?>
                  </td>
                  <td>
                    <?= $student['mail']; ?>
                  </td>
                  <td> <span onclick="fraise()">Fraise</span> ou <span onclick="framboise()">framboise</span> ?</td>
                  <td>
                    <div class="text-center">
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
<script>
    function fraise() {
        alert("t'es nul");
    }

    function framboise() {
        alert('Tu es ouvert d\'esprit !');
    }
</script>
  <?php include("./components/footer.php") ?>
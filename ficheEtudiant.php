<?php
include("./components/header.php");
include("./components/db.php");

$sql = "SELECT * FROM students WHERE id=" . $_GET['id'];
$req = $db->prepare($sql);
$req->execute();

$student = $req->fetch();

function getSsubjects($db, $studentId)
{
  $sql = "SELECT * FROM `speakers_subjects` 
  JOIN subjects ON subjects.id = speakers_subjects.subject_id 
  WHERE speaker_id = $studentId";
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
          <h6 class="h2 text-white d-inline-block mb-0">CESI Reims</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./index.php"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Etudiants</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="./etudiants.php" class="btn btn-sm btn-neutral">Retour</a>

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

    <tbody class="list">


      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Renseignement fiche étudiant </h3>

            <!-- Light table -->

            <img alt="Image placeholder" src="https://randomuser.me/api/portraits/men/<?= $_GET['id'] ?>.jpg">

            <div class="pl-lg-12">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nom</label>
                    <input type="text" name="fisrtname" id="input-username" class="form-control" value="<?= $student['firstname']  ?>" disabled>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Prénom</label>
                    <input type="text" name="lastname" id="input-username" class="form-control" value="<?= $student['lastname'] ?>" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Mail </label>
                    <input type="email" name="mail" id="input-first-name" class="form-control" value="<?= $student['mail'] ?>" disabled>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Promotion </label>
                    <input type="email" name="mail" id="input-first-name" class="form-control" value="<?= $student['promo_id'] ?>" disabled>
                  </div>
                </div>
              </div>
              </tr>
            </div>
            <div class="card-header border-0">
              <h3 class="mb-0">Notes</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table table-bordered align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="text-center">
                    <th>Semestres</th>
                    <th>HTML</th>
                    <th>CSS</th>
                    <th>MySQL</th>
                    <th>PHP</th>
                    <th>Marketing </th>
                    <th>Anglais</th>
                    <th>Soutenance</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr class="text-center">
                    <th scope="row">
                      Semestre (Septembre-Décembre) <?= $student['id']; ?>
                    </th>
                    <th scope="row">
                      15/20
                    </th>
                    <th scope="row">
                      17/20
                    </th>
                    <th scope="row">
                      12/20
                    </th>
                    <th scope="row">
                      10/20
                    </th>
                    <th scope="row">
                      8/20
                    </th>
                    <th scope="row">
                      Absent
                    </th>
                    <th scope="row">
                      12/20
                    </th>

                  </tr>
                  <tr class="text-center">
                    <th scope="row">
                      Semestre (Janvier-Juin)
                    </th>
                    <th scope="row">
                      15/20
                    </th>
                    <th scope="row">
                      17/20
                    </th>
                    <th scope="row">
                      12/20
                    </th>
                    <th scope="row">
                      10/20
                    </th>
                    <th scope="row">
                      8/20
                    </th>
                    <th scope="row">
                      Absent
                    </th>
                    <th scope="row">
                      12/20
                    </th>

                    <td>
                      <div class="text-center">
                        <a class="btn btn-warning col-10" href="./editetudiants.php?id=<?= $student['id']; ?>">Imprimer</a>
                      </div>
                    </td>


                </tbody>
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
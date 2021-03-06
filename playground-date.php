<?php
include("./components/db.php");
$sql = "SELECT * FROM promos";
$req = $db->prepare($sql);
$req->execute();
$promos = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <style>
    body {
      min-height: 100vh;
    }
  </style>
  <title>Document</title>
</head>
<body class=" bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 p-5">
        <select class="form-select" id="selectPromos">
          <option disabled selected value="null">Sélectionnez votre promo</option>
          <?php foreach ($promos as $promo) { ?>
            <option value="<?= $promo["id"] ?>" class="text-uppercase"><?= $promo["name"] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-lg-9 p-5 text-white" id="dates_container">
        <p>Aucune promo n'est selectionnée</p>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="./playground.js"></script>
</html>
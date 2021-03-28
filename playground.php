<?php
include("./components/db.php");

header('Content-Type: application/json');
http_response_code(200);
try {
  if (!isset($_POST["promo_id"]) || empty($_POST["promo_id"])) {
    throw new Error("You have to provides valid promo id");
  }

  $sql = "SELECT * FROM `promos`
  WHERE id = " .  $_POST["promo_id"];
  $req = $db->prepare($sql);

  if (!$req->execute()) {
    throw new Error("Unable to get promo");
  }
  $promo = $req->fetch();

  $sql = "SELECT dates.*, speakers.lastname AS speaker_lastname, speakers.firstname AS speaker_firstname, subjects.name AS subject_name, subjects.id AS subject_id, promos.name AS promo_name FROM `dates`
  JOIN promos ON promos.id = dates.promo_id
  JOIN subjects ON subjects.id = dates.subject_id
  LEFT JOIN speakers ON speakers.id = dates.speaker_id
  WHERE dates.promo_id = " .  $_POST["promo_id"];
  $req = $db->prepare($sql);

  if (!$req->execute()) {
    throw new Error("Unable to get dates from promo");
  }

  $dates = [];
  foreach ($req->fetchAll() as $key => $date) {
    $temp = [];
    $temp["id"] = $date["id"];
    $teommp["proName"] = $date["promo_name"];
    $temp["speakerFullname"] = $date["speaker_id"] ? $date["speaker_lastname"] . " " . $date["speaker_firstname"] : "";
    $temp["subjectName"] = $date["subject_name"];
    $temp["date"] = $date["date"];
    $temp["validated"] = $date["speaker_id"] && $date["validated"] ? true : false;
    array_push($dates, $temp);
  }

  $data = [];
  $data["promo"] = [
    "name" => $promo["name"], "ref" => $promo["ref"]
  ];
  $data["dates"] = $dates;
  echo json_encode($data);
} catch (\Throwable $th) {
  http_response_code(400);
  echo json_encode(["error" => $th->getMessage()]);
}

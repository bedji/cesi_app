<?php
include('./components/db.php');
header('Content-type: application/json');
if (isset($_GET['id']) &&  !empty($_GET['id'])) {
    try {
        $sql = "SELECT speakers_subjects.speaker_id  ,speakers.firstname AS speakerfirstname, speakers.lastname AS speakerlastname  
        FROM `speakers_subjects`
        JOIN speakers ON speaker_id= speakers.id
       
        WHERE speakers_subjects.subject_id=" . $_GET['id'];
        $req = $db->prepare($sql);
        if ($req->execute()) {
            $speakers = [];
            $resultat = $req->fetchAll();
            foreach ($resultat as $key => $ligne) {
                $temp = [];
                $temp['id'] = $ligne['speaker_id'];
                $temp['speaker_name'] = $ligne['speakerfirstname'];
                $temp['lastname'] = $ligne['speakerlastname'];
                array_push($speakers, $temp);
            }

            $json = json_encode($speakers);
            echo $json;
        }
    } catch (\Throwable $th) {
        echo json_encode(["error" => $th->getMessage()]);
    }
}

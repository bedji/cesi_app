const selectsubject = document.getElementById("subjectselect");
const selectpeaker = document.getElementById("speakerselect");
const validechek = document.getElementById("speakervalid");
if (selectsubject) {
  selectsubject.addEventListener("change", async (e) => {
    // console.log(e.target.value);

    const inter = await getspeakers(e.target.value);
    //il faut remplir le select
    //console.log(inter.length);
    remplirspeaker(inter);
    //drawHeader(data);
    // drawTable(data.dates);
  });
}
if (selectpeaker) {
  selectpeaker.addEventListener("change", async (e) => {
    initcheck();
  });
}
function initcheck() {
  validechek.checked = false;
  console.log(selectpeaker.value);
  if (selectpeaker.value === "null") {
    validechek.disabled = true;
    return;
  }
  validechek.disabled = false;
}
async function getspeakers(subjecid) {
  let res = await fetch("/cesi/cesi_app/codejson.php?id=" + subjecid, {
    method: "get",
  });
  const data = await res.json();
  //console.log(data);
  return data;
}
function remplirspeaker(donnee) {
  //console.log(donnee.length);

  selectpeaker.innerHTML =
    donnee.length == 0
      ? " <option disabled value='null' selected>Aucun intervenant trouver</option>"
      : " <option value='null' >Sélectionner un intervenant</option>";
  donnee.forEach((element) => {
    //console.log(element);
    var option = document.createElement("option");
    option.text = element["lastname"] + " " + element["speaker_name"];
    option.value = element["id"];
    option.innerHTML +=
      "<?= $subject['id'] === $date['subject_id'] ? 'selected' : '' ?>";
    selectpeaker.add(option);
  });
  initcheck();
}
selectsubject.addEventListener("onload", initcheck());

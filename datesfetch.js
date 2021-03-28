const selectsubject = document.getElementById("subjectselect");
const selectpeaker = document.getElementById("speakerselect");
if (selectsubject) {
  selectsubject.addEventListener("change", async (e) => {
    console.log(e.target.value);

    const inter = await getspeakers(e.target.value);
    //il faut remplir le select
    //console.log(inter.length);
    remplirsubject(inter);
    //drawHeader(data);
    // drawTable(data.dates);
  });
}
async function getspeakers(subjecid) {
  let res = await fetch("/cesi/cesi_app/codejson.php?id=" + subjecid, {
    method: "get",
  });
  const data = await res.json();
  console.log(data);
  return data;
}
function remplirsubject(donnee) {
  console.log(donnee.length);
  selectpeaker.innerHTML =
    donnee.length == 0
      ? " <option disabled selected>Aucun intervenant trouver</option>"
      : " <option disabled selected>Sélectionner un intervenant</option>";
  donnee.forEach((element) => {
    console.log(element);
    var option = document.createElement("option");
    option.text = element["lastname"] + " " + element["speaker_name"];
    option.value = element["id"];
    selectpeaker.add(option);
  });
}

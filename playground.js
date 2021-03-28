const selectPromos = document.querySelector("#selectPromos");
const datesContainer = document.querySelector("#dates_container");

if (selectPromos) {
  selectPromos.addEventListener("change", async function (e) {
    const data = await getPromoData(e.target.value);
    drawHeader(data);
    drawTable(data.dates);
  });
}

function drawHeader(data) {
  datesContainer.innerHTML = !data.dates.length
    ? `aucune date n'est associée à cette promo`
    : `<strong class="text-uppercase">${data.promo.name} | ${data.promo.ref}</strong>`;
}

function drawTable(dates) {
  if (!dates.length) {
    return;
  }
  datesContainer.innerHTML += '<ol class="list-group list-group-numbered">';
  dates.map((date) => {
    datesContainer.innerHTML += `<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">${date.subjectName}</div>
      ${date.speakerFullname}
    </div>
    <span class="badge bg-${
      date.validated ? "success" : "danger"
    } rounded-pill">${date.date}</span>
  </li>`;
  });
  datesContainer.innerHTML += "</ol>";
}

async function getPromoData(promo_id) {
  const formData = new FormData();
  formData.append("promo_id", promo_id ? promo_id : "");

  let res = await fetch("/CESI/cesi_app/playground.php", {
    method: "post",
    body: formData,
  });

  const dates = await res.json();
  return dates;
}

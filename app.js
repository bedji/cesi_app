async function getPromo() {
  let res = await fetch("/cesi/cesi_app/codejson.php", {
    method: "get",
  });
  const json = await res.json();
  console.log(json);
}
getPromo();

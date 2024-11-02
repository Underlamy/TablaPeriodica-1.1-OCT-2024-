function loadInfo() {
  let date = document.getElementById("select-year").value + "-" + document.getElementById("select-month").value + "-" + document.getElementById("select-day").value
  console.log(date);

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    document.getElementsByClassName("info")[0].innerHTML =
      this.responseText;
  }
  xhttp.open("GET", "info.php?date=" + date);
  xhttp.send();
}
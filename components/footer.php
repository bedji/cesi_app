</div>
<!-- Footer -->
<footer class="footer pt-0">
    <div class="row m-0 align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2021 <a href="https://www.cesi.fr" class="font-weight-bold ml-1" target="_blank">webdev 2020</a>
            </div>
        </div>

    </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/vendor/js-cookie/js.cookie.js"></script>
<script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="assets/vendor/moment/min/moment.min.js"></script>
<script src="assets/vendor/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.js?v=1.2.0"></script>
<script src="./assets/js/components/fullcalendar.js"></script>
<script>
    function validateForm() {
        document.getElementById('formulaire').submit();
    }
</script>
<script>
    var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
</body>

</html>
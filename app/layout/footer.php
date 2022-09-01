</main>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="<?= BASEURL; ?>/public/vendor/bootstrap-5.0.0/dist/js/jquery-3.2.1.min.js"></script>
<script src="<?= BASEURL; ?>/public/vendor/bootstrap-5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?= BASEURL; ?>/public/js/script.js"></script>

<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('hidup');
            $('#content').toggleClass('hidup');

        });
    });
</script>

</body>

</html>
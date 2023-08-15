</div>
<!-- Footer -->
<footer class="footer pt-0 mt-4">
    <div class="row align-items-center justify-content-lg-between m-0">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="copyright text-center text-muted">
                <span id="currentYear"></span>&copy; <a href="https://www.a1tech.uz" class="font-weight-bold ml-1" target="_blank"><span class="text-danger">HAMK </span><span class="text-primary">Hotel </span><span style="color: black;">Adminstration Panel</span></a>
            </div>
        </div>

    </div>
</footer>
<!-- Argon Scripts -->
<!-- Core -->
<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="assets/js/argon.js?v=1.2.0"></script>
<script>
    const date = new Date();
    document.getElementById('currentYear').innerText = date.getFullYear() + '  ';
</script>
<script>
    //Tanlangan sahifani parentiga active class qo'shish algoritmi
    $(document).ready(function() {
        let url = window.location.href.split('/');
        let page = url[url.length - 1];
        $(".nav-link.active").removeClass('active');
        $(`a[href = "${page}"]`).addClass('active');
    });
</script>
</body>

</html>
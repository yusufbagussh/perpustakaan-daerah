<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body id="page-top">
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Perpustakaan Daerah Kota Surakarta</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="<?= base_url('buku/listbukuanggota'); ?>">LIHAT KOLEKSI</a>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-dark" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase text-white">TENTANG</h2>
                <h3 class="section-subheading text-muted text-white">Dinas Kearsipan dan Perpustakaan Kota Surakarta</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-clock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3 text-white">Jam Operasional</h4>
                    <p class="text-muted text-white">08.00 - 15.30 WIB</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-map-marker-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3 text-white">Lokasi</h4>
                    <p class="text-muted text-white">Jl. Hasanudin No.112, Punggawan, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57132</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3 text-white">Telepon</h4>
                    <p class="text-muted text-white">(0271) 739907</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Identitas Tim</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="img/team/1.jpeg" alt="..." />
                        <h4 class="py-1">Yusuf Bagus Sungging H.</h4>
                        <h6 class="m-0 text-muted">V3420077</h6>
                        <h6 class="m-0 text-muted">Back End Developer</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="..." />
                        <h4 class="py-1">Ridho Fata' Ulwan</h4>
                        <h6 class="m-0 text-muted">V3420061</h6>
                        <h6 class="m-0 text-muted">Project Manager</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="img/team/3.png" alt="..." />
                        <h4 class="py-1">Sinta Athaya Ramadhani</h4>
                        <h6 class="m-0 text-muted">V3420072</h6>
                        <h6 class="m-0 text-muted">Front End Developer</h6>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="img/team/4.jpeg" alt="..." />
                        <h4 class="py-1">Saka Pangestu Putra</h4>
                        <h6 class="m-0 text-muted">V3420080</h6>
                        <h6 class="m-0 text-muted">UI/UX Designer</h6>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="img/team/5.png" alt="..." />
                        <h4 class="py-1">Umar Syaifulloh</h4>
                        <h6 class="m-0 text-muted">V3420074</h6>
                        <h6 class="m-0 text-muted">Testing and Documentation</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; E-Perpusda 2021</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://www.google.com/maps/dir//arsip+perpustakaan+surakarta/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2e7a1682cf183ed1:0x356482dabc840a94?sa=X&ved=2ahUKEwialrzn-PT0AhWnjdgFHT2hBlIQ9Rd6BAgaEAQ"><i class="fas fa-map-pin"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://disarpus.surakarta.go.id/"><i class="fas fa-globe"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/disarpus_surakarta/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
</body>
<?= $this->endSection('content'); ?>
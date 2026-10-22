<!-- ================================
     PAGE D'ACCUEIL - ALFA SCHOOL
================================= -->

<style>
    .school-home {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8f9fa 0%, #eef4ff 100%);
    }

    /* Hero */
    .hero-section {
        padding: 80px 0 50px;
    }

    .hero-title {
        font-size: 2.8rem;
        font-weight: 800;
        line-height: 1.2;
    }

    .hero-title span {
        color: #0d6efd;
    }

    .hero-text {
        font-size: 1.1rem;
        color: #6c757d;
        line-height: 1.7;
    }

    /* Carousel */
    .carousel-container {
        position: relative;
    }

    .school-carousel {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .school-carousel img {
        height: 420px;
        object-fit: cover;
    }

    .carousel-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,0.75),
            rgba(0,0,0,0.05)
        );
    }

    .carousel-caption {
        z-index: 2;
        bottom: 30px;
    }

    .carousel-caption h3 {
        font-weight: 700;
    }

    /* Cards */
    .feature-card {
        border: none;
        border-radius: 18px;
        background: white;
        box-shadow: 0 8px 25px rgba(0,0,0,0.07);
        transition: all 0.3s ease;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    .feature-icon {
        width: 65px;
        height: 65px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13,110,253,0.1);
        color: #0d6efd;
        font-size: 28px;
        margin-bottom: 20px;
    }

    /* Stats */
    .stats-section {
        background: #0d6efd;
        color: white;
        border-radius: 25px;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
    }

    /* Bouton flottant */
    #scrollBtn {
        transition: all 0.3s ease;
    }

    #scrollBtn:hover {
        transform: scale(1.1);
    }

    /* Responsive */
    @media (max-width: 768px) {

        .hero-section {
            padding: 40px 0 30px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .school-carousel img {
            height: 280px;
        }

        .hero-content {
            text-align: center;
            margin-bottom: 35px;
        }
    }
</style>


<div class="school-home">

    <!-- ==========================
         HERO SECTION
    =========================== -->

    <section class="hero-section">

        <div class="container">

            <div class="row align-items-center g-5">

                <!-- Texte -->
                <div class="col-lg-5">

                    <div class="hero-content">

                        <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">
                            <i class="bi bi-mortarboard-fill me-2"></i>
                            ALFA SCHOOOL
                        </span>

                        <h1 class="hero-title mb-4">
                            Bienvenue sur
                            <span>Alfa School</span>
                        </h1>

                        <p class="hero-text mb-4">
                            Une solution moderne et intuitive pour gérer
                            efficacement votre établissement scolaire,
                            vos élèves, vos enseignants et vos activités.
                        </p>

                        <div class="d-flex gap-3 flex-wrap">

                            <a href="#fonctionnalites"
                               class="btn btn-primary btn-lg px-4">
                                <i class="bi bi-grid-fill me-2"></i>
                                Découvrir
                            </a>

                            <a href="#apropos"
                               class="btn btn-outline-primary btn-lg px-4">
                                <i class="bi bi-info-circle me-2"></i>
                                En savoir plus
                            </a>

                        </div>

                    </div>

                </div>


                <!-- Carousel -->
                <div class="col-lg-7">

                    <div class="carousel-container">

                        <div id="schoolCarousel"
                             class="carousel slide carousel-fade school-carousel"
                             data-bs-ride="carousel"
                             data-bs-interval="4000">

                            <!-- Indicateurs -->
                            <div class="carousel-indicators">

                                <button type="button"
                                        data-bs-target="#schoolCarousel"
                                        data-bs-slide-to="0"
                                        class="active"
                                        aria-current="true">
                                </button>

                                <button type="button"
                                        data-bs-target="#schoolCarousel"
                                        data-bs-slide-to="1">
                                </button>

                                <button type="button"
                                        data-bs-target="#schoolCarousel"
                                        data-bs-slide-to="2">
                                </button>

                            </div>


                            <!-- Slides -->
                            <div class="carousel-inner">

                                <!-- Slide 1 -->
                                <div class="carousel-item active">

                                    <img src="<?php echo base_url('assets/images/photos2.jpg'); ?>"
                                         class="d-block w-100"
                                         alt="Alfa School">

                                    <div class="carousel-overlay"></div>

                                    <div class="carousel-caption text-start">

                                        <span class="badge bg-primary mb-2">
                                            Alfa School
                                        </span>

                                        <h3>
                                            L'éducation au cœur de notre mission
                                        </h3>

                                        <p>
                                            Une gestion scolaire simple,
                                            rapide et efficace.
                                        </p>

                                    </div>

                                </div>


                                <!-- Slide 2 -->
                                <div class="carousel-item">

                                    <img src="<?php echo base_url('assets/images/photo01.jpg'); ?>"
                                         class="d-block w-100"
                                         alt="Gestion des élèves">

                                    <div class="carousel-overlay"></div>

                                    <div class="carousel-caption text-start">

                                        <span class="badge bg-success mb-2">
                                            Gestion des élèves
                                        </span>

                                        <h3>
                                            Suivez facilement vos élèves
                                        </h3>

                                        <p>
                                            Informations, inscriptions,
                                            classes et suivi scolaire.
                                        </p>

                                    </div>

                                </div>


                                <!-- Slide 3 -->
                                <div class="carousel-item">

                                    <img src="<?php echo base_url('assets/images/photo3.jpg'); ?>"
                                         class="d-block w-100"
                                         alt="Organisation scolaire">

                                    <div class="carousel-overlay"></div>

                                    <div class="carousel-caption text-start">

                                        <span class="badge bg-warning text-dark mb-2">
                                            Organisation
                                        </span>

                                        <h3>
                                            Une école mieux organisée
                                        </h3>

                                        <p>
                                            Centralisez vos informations
                                            et gagnez du temps.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <!-- Contrôle précédent -->
                            <button class="carousel-control-prev"
                                    type="button"
                                    data-bs-target="#schoolCarousel"
                                    data-bs-slide="prev">

                                <span class="carousel-control-prev-icon"></span>

                                <span class="visually-hidden">
                                    Précédent
                                </span>

                            </button>


                            <!-- Contrôle suivant -->
                            <button class="carousel-control-next"
                                    type="button"
                                    data-bs-target="#schoolCarousel"
                                    data-bs-slide="next">

                                <span class="carousel-control-next-icon"></span>

                                <span class="visually-hidden">
                                    Suivant
                                </span>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    


   

    <!-- ==========================
         A PROPOS
    =========================== -->

    <section id="apropos" class="py-5">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                      <div class="feature-card p-5 text-center">

                              

                      </div>
                    

                </div>


                <div class="col-lg-6">

                    <div class="feature-card p-5 text-center">

                        

                    </div>

                </div>

            </div>

        </div>

        

    </section>

    <section id="apropos" class="py-5">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                      <div class="feature-card p-5 text-center">

                              

                      </div>
                    

                </div>


                <div class="col-lg-6">

                    <div class="feature-card p-5 text-center">

                        

                    </div>

                </div>

            </div>

        </div>

        

    </section>

    <!-- ==========================
         FOOTER
    =========================== -->

    <footer class="py-4 bg-dark text-white">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h5 class="fw-bold mb-1">
                        <i class="bi bi-mortarboard-fill me-2"></i>
                        Alfa School
                    </h5>

                    <small class="text-white-50">
                        
                    </small>

                </div>

                <div class="col-md-6 text-md-end mt-3 mt-md-0">

                    <small class="text-white-50">
                        &copy; <?php echo date('Y'); ?> Alfa School.
                        Tous droits réservés.
                    </small>

                </div>

            </div>

        </div>

    </footer>

</div>


<!-- ==========================
     BOUTON SCROLL
=========================== -->

<button id="scrollBtn"
        class="btn btn-primary rounded-circle shadow position-fixed
               d-flex align-items-center justify-content-center"
        style="
            bottom:25px;
            right:25px;
            width:55px;
            height:55px;
            z-index:1000;
        "
        title="Aller en bas">

    <i id="scrollIcon"
       class="bi bi-chevron-double-down fs-4">
    </i>

</button>


<!-- ==========================
     SCRIPT SCROLL
=========================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const scrollBtn = document.getElementById('scrollBtn');
    const scrollIcon = document.getElementById('scrollIcon');

    function updateScrollButton() {

        const scrollTop = window.scrollY;

        const maxScroll =
            document.documentElement.scrollHeight -
            window.innerHeight;

        if (maxScroll <= 0) {

            scrollBtn.style.display = 'none';

            return;
        }

        scrollBtn.style.display = 'flex';

        if (scrollTop >= maxScroll - 50) {

            scrollIcon.className =
                'bi bi-chevron-double-up fs-4';

            scrollBtn.title = 'Retour en haut';

        } else {

            scrollIcon.className =
                'bi bi-chevron-double-down fs-4';

            scrollBtn.title = 'Aller en bas';

        }

    }


    window.addEventListener('scroll', updateScrollButton);

    updateScrollButton();


    scrollBtn.addEventListener('click', function () {

        const scrollTop = window.scrollY;

        const maxScroll =
            document.documentElement.scrollHeight -
            window.innerHeight;

        if (scrollTop >= maxScroll - 50) {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        } else {

            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: 'smooth'
            });

        }

    });

});

</script>
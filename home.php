<?php 
include "connect.php";
$query="SELECT * FROM pdfs ORDER BY id DESC LIMIT 5";
$result=mysqli_query($con,$query);
$pdfs=mysqli_fetch_all($result,MYSQLI_ASSOC);

$query="SELECT * FROM article ORDER BY id DESC LIMIT 4";
$result=mysqli_query($con,$query);
$articles=mysqli_fetch_all($result,MYSQLI_ASSOC);

$query="SELECT * FROM Article_categorey";
$result=mysqli_query($con,$query);
$Article_categoreys=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borgholm - Marketing Agency Theme</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css?v=2.1">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body >

<nav class="navbar navbar-expand-lg fixed-top ">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Navbar</a>

    <!-- Mobile Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Main Menu -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>

      <!-- Offcanvas Button (must stay INSIDE .container-fluid) -->

  </div>
</nav>
<!-- Offcanvas Right -->
<div class="offcan">
    <button class="offcanva" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4"/></svg>
    </button>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" >
                   <div>
                    <div class="hero-content" >
                        <div class="tagline">DIGITAL</div>
                        <h1>Grow Your <span class="special-style">Business.</span></h1>
                        <p>Lorem ipsum dolor sit amet, id tacimates gloriatur voluptatibus cum discere vivendum dissentiet.</p>
                        <div class="tagline">Contact adresse</div>
                        <h5 class="p1">a fake one for just try</h5>
                        <div class="tagline">GENERAL INQUIRIES</div>
                        <h5 class="p1">borgholm@qodeinteractive.com</h5>
                    </div>
                    <div>
                    <div class="social-media">
                    <a href="https://facebook.com" class="social-icons1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="currentColor" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256c0 120 82.7 220.8 194.2 248.5V334.2h-52.8V256h52.8v-33.7c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287v175.9C413.8 494.8 512 386.9 512 256"/></svg></a>
                    <a href="https://twitter.com" target="_blank" class="social-icons1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 448 512"><path fill="currentColor" d="M224.3 141a115 115 0 1 0-.6 230a115 115 0 1 0 .6-230m-.6 40.4a74.6 74.6 0 1 1 .6 149.2a74.6 74.6 0 1 1-.6-149.2m93.4-45.1a26.8 26.8 0 1 1 53.6 0a26.8 26.8 0 1 1-53.6 0m129.7 27.2c-1.7-35.9-9.9-67.7-36.2-93.9c-26.2-26.2-58-34.4-93.9-36.2c-37-2.1-147.9-2.1-184.9 0c-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9c1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0c35.9-1.7 67.7-9.9 93.9-36.2c26.2-26.2 34.4-58 36.2-93.9c2.1-37 2.1-147.8 0-184.8M399 388c-7.8 19.6-22.9 34.7-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1"/></svg></a>
                    <a href="https://instagram.com" target="_blank" class="social-icons1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="currentColor" d="M459.4 151.7c.3 4.5.3 9.1.3 13.6c0 138.7-105.6 298.6-298.6 298.6c-59.5 0-114.7-17.2-161.1-47.1c8.4 1 16.6 1.3 25.3 1.3c49.1 0 94.2-16.6 130.3-44.8c-46.1-1-84.8-31.2-98.1-72.8c6.5 1 13 1.6 19.8 1.6c9.4 0 18.8-1.3 27.6-3.6c-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3c-28.3-18.8-46.8-51-46.8-87.4c0-19.5 5.2-37.4 14.3-53C87.4 130.8 165 172.4 252.1 176.9c-1.6-7.8-2.6-15.9-2.6-24C249.5 95.1 296.3 48 354.4 48c30.2 0 57.5 12.7 76.7 33.1c23.7-4.5 46.5-13.3 66.6-25.3c-7.8 24.4-24.4 44.8-46.1 57.8c21.1-2.3 41.6-8.1 60.4-16.2c-14.3 20.8-32.2 39.3-52.6 54.3"/></svg></a>

                    </div>
                    </div>
                </div>
  </div>
</div>


    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div   style="display: flex; justify-content: center; align-items: center;">
                <div>
                    <div class="hero-content" >
                        <div class="tagline">DIGITAL</div>
                        <h1>Grow Your <span class="special-style">Business.</span></h1>
                        <p>Lorem ipsum dolor sit amet, id tacimates gloriatur voluptatibus cum discere vivendum dissentiet.</p>
                    </div>
                </div>
                <div>
                    <div class="hero-image">
                    <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="photos/img1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="photos/img2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="photos/img3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-5">
        <div class="container">
            <div class="row ">
                <div class="rows">
                    <?php foreach ($articles as $article):?>
                        <div>
                            <div class="blog-item">
                                <div class="blog-category"><?php echo $article['articlecat']?></div>
                                <h3 class="blog-title"><?php echo $article['title']?></h3>
                                <p class="blog-excerpt"><?php echo $article['text1']?></p>
                                <a href="articledetails.php?id=<?php echo $article['id']?>" class="blog-find">Find Out More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 18q-2.25 0-3.912-1.425T10.075 13H2v-2h8.075q.35-2.15 2.013-3.575T16 6q2.5 0 4.25 1.75T22 12t-1.75 4.25T16 18"/></svg> </a>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class=" about" style="width: 100%;">
        <div class="container"style="padding-top: 65px;">
            <div class="row">
                <div style="display: flex; justify-content: center; align-items: center;">
                <div class="col-lg-6">
                    <div class="section-title1">
                        <div class="section-tagline">FIND OUT MORE</div>
                        <h1>What we can do for your business</h1>
                        <div class="section-subtitle">Learn more about the range of our services.</div>
                        <p class="mt-4"><span class="special-style">Et ullum iisque</span> conclusionemque eam, mel ad erat cum accumsan noluisse, nostrum accumsan movet salutandi. Fugit expetenda interesset no, probo eloquentiam mei eu.</p>
                        <a href="contact.php"><button class="button1">CONTACT US <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M9 7.925Q8 8.6 7.362 9.663T6.6 12L6 19h12l-.6-7q-.1-1.3-.737-2.363T15 7.9V10q0 1.25-.875 2.125T12 13t-2.125-.875T9 10zM12 11q.425 0 .713-.288T13 10V6q0-.425-.288-.712T12 5t-.712.288T11 6v4q0 .425.288.713T12 11m0-8q1.15 0 1.988.738t.987 1.862q1.85.8 3.063 2.438T19.4 11.8l.775 9.2H3.825l.775-9.2q.175-2.125 1.375-3.75t3.05-2.425q.15-1.125.988-1.875T12 3"/></svg></button></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="gallery-slider">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="500">
                            <img src="photos/img1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="500">
                            <img src="photos/img2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="photos/img3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Skills Section -->
    <section class="py-3">
        <div class="container" style="margin-top:50px">
            <div class="row">
                <div style="display: flex;justify-content: center;align-items: center;">
                <div class="div">
                    <div class="section-title">
                        <div class="section-tagline">FIND OUT MORE</div>
                        <h1>The heart of our <span class="special-style">human centered</span> design skills</h1>
                        <div class="section-subtitle">Find out all you need to know about our creativity processes.</div>
                        <p class="mt-4"><span class="special-style">Et ullum iisque conclusionemque eam,</span> mel ad erat cum accumsan ei noluisse, nostrum accumsan salutandi eam cu.</p>
                    </div>
                </div>
                <div>
                    <?php foreach ($Article_categoreys as $Article_categorey):?>
                    <div class="mt-4">
                        <p><a href="#" class="skills">_<?php echo $Article_categorey['articlecat']?></a></p>
                    </div>
                    <?php endforeach?>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-4 background1">
        <div class="container-fluid">
            <div class="row g-4">
                <div style="display: flex; justify-content: center;align-items: center;">
            <?php foreach ($pdfs as $pdf) : ?>
                <div style="padding: 20px;">
                    <div class="portfolio-item">
                        <img src="<?= htmlspecialchars($pdf['image']) ?>" alt="Project">
                        <div class="portfolio-info">
                            <div class="portfolio-category"><?= htmlspecialchars($pdf['cate_name']) ?></div>
                            <h5 class="portfolio-title"><?= htmlspecialchars($pdf['name']) ?></h5>
                            <a href="email.php?id=<?php echo $pdf['id']; ?>" class="button2">Commend</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>


    <section class="cta-section">
        <div class="container" style="display: flex;text-align: center; justify-content: center;">
            <h1><span class="special-style" style="padding-right: 150px;">Talk to our Team.</span></h1>
            <button class="btn-contact">CONTACT US <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M9 7.925Q8 8.6 7.362 9.663T6.6 12L6 19h12l-.6-7q-.1-1.3-.737-2.363T15 7.9V10q0 1.25-.875 2.125T12 13t-2.125-.875T9 10zM12 11q.425 0 .713-.288T13 10V6q0-.425-.288-.712T12 5t-.712.288T11 6v4q0 .425.288.713T12 11m0-8q1.15 0 1.988.738t.987 1.862q1.85.8 3.063 2.438T19.4 11.8l.775 9.2H3.825l.775-9.2q.175-2.125 1.375-3.75t3.05-2.425q.15-1.125.988-1.875T12 3"/></svg></button>
        </div>
    </section>




    <!-- Footer -->
    <footer id="contact">
        <div class="style">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">Want to work with us?</h5>
                    <p class="footer-label">USE THIS EMAIL</p>
                    <p><a href="mailto:office@borgholm.com" class="text-dark">office@borgholm.com</a></p>
                </div>
                <div class="col-lg-4 mb-4">
        <div class="container">
            <h3 class="footer-title">Stay in the loop at all times.</h3>
            <form class="newsletter-form" action="mailer.php" method="POST">
                <input type="email" name="email" placeholder="Add mail and Subscribe" required>
                <button type="submit" name="send"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>

                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">Find us on social media.</h5>
                    <p class="footer-label mb-3">SOCIAL MEDIA</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#" id="backToTop" class="position-fixed bottom-0 end-0 m-4 btn btn-dark" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });

        // Navbar Background on Scroll
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                navbar.style.background = 'rgba(255, 234, 247)';
            } else {
                navbar.style.background = 'rgba(255, 234, 247)';
            }
        });

    </script>
</body>
</html>
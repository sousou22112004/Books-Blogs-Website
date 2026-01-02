<?php
include 'connect.php';
$id=$_GET['id'];
$query="SELECT * from article where id='$id' ";
$result=mysqli_query($con,$query) or die("erreur de connect");
$row=mysqli_fetch_assoc($result);

$query="SELECT * FROM Article_categorey";
$result=mysqli_query($con,$query);
$Article_categoreys=mysqli_fetch_all($result,MYSQLI_ASSOC);

if (isset($_POST['insert'])) {
    $articleid=$_GET['id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $query="INSERT into comments VALUES(null,'$name','$comment','$articleid')";
    mysqli_query($con,$query) or die ("erreurde connect ");
    header("location:articledetails.php?id=$articleid");
}


$query="SELECT * from comments where idarticle='$id'";
$result=mysqli_query($con,$query) or die ('erreur de connect');
$commentss=mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css?=3">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
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
    </div>

  </div>
</nav>
<!-- END NAVBAR -->

<!-- OFFCANVAS BUTTON -->
<div class="offcan">
    <button class="offcanva" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4"/>
        </svg>
    </button>
</div>

<!-- OFFCANVAS MENU -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">

    <div class="hero-content">
        <div class="tagline">DIGITAL</div>
        <h1>Grow Your <span class="special-style">Business.</span></h1>
        <p>Lorem ipsum dolor sit amet, id tacimates gloriatur voluptatibus cum discere vivendum dissentiet.</p>

        <div class="tagline">Contact adresse</div>
        <h5 class="p1">a fake one for just try</h5>

        <div class="tagline">GENERAL INQUIRIES</div>
        <h5 class="p1">borgholm@qodeinteractive.com</h5>
    </div>

    <div class="social-media mt-4">
        <a href="https://facebook.com" class="social-icons1">FB</a>
        <a href="https://twitter.com" class="social-icons1 ms-3">TW</a>
        <a href="https://instagram.com" class="social-icons1 ms-3">IG</a>
    </div>

  </div>
</div>
<!-- END OFFCANVAS -->
<div class="d-flex flex-column flex-md-row justify-content-around m-2" >
    <div class="card-body1">
    <div class="mt-5 pt-5 " style="max-width: 850px; width: 100%; ">
        <div class="card w-100 mb-3 mx-auto">
            <div class="card-body card-body2">
                <p class="tagline"><?php echo $row['articlecat']?></p>
                <p class="h2 h1"><?php echo $row['title']?></p>
                <img src="<?php echo $row['image']?>" class="img-fluid rounded" alt="<?php echo $row['image']?>">
                <p class="h4 pt-4"><?php echo $row['text1']?></p>
                <p><?php echo $row['text2']?></p>

                <div style="padding-top:50px">
                <?php foreach ($commentss as $comments):?>
                <div class="">
                    <div style="padding-left:20px" class="comment d-flex justify-content-between">
                    <div>
                        <h4> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8t1.175-2.825T12 4t2.825 1.175T16 8t-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg><?php echo $comments['name']?></h4>
                        <p><?php echo $comments['comment']?></p>
                    </div>
                    <div>
                        <button class="button"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z"/></svg> Delete</button>
                        <button class="button">  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T3 13t.713-3.512t1.924-2.85t2.85-1.925T12 4h.15l-.85-.85q-.275-.275-.275-.687t.275-.713q.3-.3.713-.312t.712.287L15.3 4.3q.275.275.275.7t-.275.7l-2.575 2.575q-.3.3-.712.288T11.3 8.25q-.275-.3-.275-.712t.275-.688l.85-.85H12Q9.075 6 7.038 8.038T5 13t2.038 4.963T12 20q2.65 0 4.625-1.725t2.325-4.35q.05-.4.35-.663T20 13t.7.25t.25.625q-.35 3.475-2.9 5.8T12 22"/></svg>  Update</button>
                    </div>
                    </div>
                </div>
                <?php  endforeach;?>
                </div>
            </div>
        </div>
    </div>
    </div>
            <div class="section1">
            <div class="mt-5 pt-7 " style=" width: 19rem;">
                <div class=" text-center">
                    <h2 class="h2style">ADD YOUR OPINIAN FOR US</h2>    
                    <div class="container px-4 text-center">
                    <div class="row g-3 align-items-center">
                        <form action="" method="post">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.95 19.55q.5.3 1.05.288t1.05-.313l4.55-2.775q-1.25-.875-2.675-1.312T12 15t-2.937.438t-2.713 1.287zM12 13q1.45 0 2.475-1.025T15.5 9.5t-1.025-2.475T12 6T9.525 7.025T8.5 9.5t1.025 2.475T12 13m-1.05 8.875l-7-4.3q-.45-.275-.7-.725T3 15.875v-7.75q0-.525.25-.975t.7-.725l7-4.3q.5-.3 1.05-.3t1.05.3l7 4.3q.45.275.7.725t.25.975v7.75q0 .525-.25.975t-.7.725l-7 4.3q-.5.3-1.05.3t-1.05-.3"/></svg> Name</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="name" >
                        </div>
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 17h7v-2H7zm0-4h10v-2H7zm0-4h10V7H7zM3 21V3h18v18z"/></svg>comment</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="comment">
                        </div>
                        <div class="col-auto">
                            <button name="insert" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" ><path fill="currentColor" d="M5.5 18V6h2v12zm13 0l-9-6l9-6zm-2-3.75v-4.5L13.1 12z"/></svg></button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            </div>

</div>

    <div class="mt-5 p-4 rounded-5">
        <div class="card mb-3 p-4 d-flex flex-column flex-md-row justify-content-around " >
                    <?php foreach ($Article_categoreys as $Article_categorey):?>
                    <div class="mt-4">
                        <p><a href="categores.php?articlecat=<?php echo $Article_categorey['articlecat']?>" class="skills"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M4.425 19.775q-2-1.125-3.212-3.2T0 12t1.238-4.587T4.6 4.124q.5-.275.95.05t.45.9q0 .25-.15.525t-.4.4q-1.6.95-2.525 2.538T2 12t.925 3.463T5.45 18q.25.125.4.4t.15.55q0 .575-.475.875t-1.1-.05M15 21q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T6 12t.713-3.512t1.925-2.85t2.85-1.925T15 3t3.513.713t2.85 1.924t1.925 2.85T24 12t-.712 3.513t-1.925 2.85t-2.85 1.925T15 21m0-2q2.925 0 4.963-2.037T22 12t-2.037-4.962T15 5t-4.962 2.038T8 12t2.038 4.963T15 19m0-3q.425 0 .713-.288T16 15v-2h2q.425 0 .713-.288T19 12t-.288-.712T18 11h-2V9q0-.425-.288-.712T15 8t-.712.288T14 9v2h-2q-.425 0-.712.288T11 12t.288.713T12 13h2v2q0 .425.288.713T15 16"/></svg>  <?php echo $Article_categorey['articlecat']?></a></p>
                    </div>
                    <?php endforeach?>
                </div>
        </div>
    </div>
    <section class="cta-section">
        <div class="container" style="display: flex;text-align: center; justify-content: center;">
            <h1><span class="special-style" style="padding-right: 150px;">Talk to our Team.</span></h1>
            <button class="btn-contact">CONTACT US <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M9 7.925Q8 8.6 7.362 9.663T6.6 12L6 19h12l-.6-7q-.1-1.3-.737-2.363T15 7.9V10q0 1.25-.875 2.125T12 13t-2.125-.875T9 10zM12 11q.425 0 .713-.288T13 10V6q0-.425-.288-.712T12 5t-.712.288T11 6v4q0 .425.288.713T12 11m0-8q1.15 0 1.988.738t.987 1.862q1.85.8 3.063 2.438T19.4 11.8l.775 9.2H3.825l.775-9.2q.175-2.125 1.375-3.75t3.05-2.425q.15-1.125.988-1.875T12 3"/></svg></button>
        </div>
    </section>
    <footer id="contact" class="contact">
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
    
</body>
</html>

<?php 
session_start();
require_once('required/database.php');
require_once('required/auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./assets/img/h1.png" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- =====BOX ICONS===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!--===== SCROLL REVEAL =====-->
  <script src="https://unpkg.com/scrollreveal"></script>
  <title>Tushar Sahu</title>
</head>

<body>
  <!--===== HEADER =====-->
  <header class="l-header">
    <nav class="nav bd-grid">
      <div>
        <!-- &#60;&#62; -->
        <a href="#home" class="nav-logo"><img src="./assets/img/h.png" height="70px" alt="H" /></a>
      </div>

      <div class="nav-menu" id="nav-menu">
        <ul class="nav-list">
          <li class="nav-item">
            <a href="#home" class="nav-link home active">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link about">About</a>
          </li>
          <li class="nav-item">
            <a href="#skills" class="nav-link skills">Experience</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link contact">Contact</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="contact">Login</a>
          </li>
          <li class="nav-item">
          <a href = "#" onclick="myFunction()"> <img src="./assets/img/sumoon.png" alt="" height="20px" width="20px" style="background-color: transparent;"> </a>
          </li>
        </ul>
      </div>

      <div class="nav-toggle" id="nav-toggle">
        <i class="bx bx-menu"></i>
      </div>
    </nav>
  </header>

  <main class="l-main">
    <!--===== HOME =====-->
    <section class="home bd-grid section" id="home">
      <div class="home-data">
        <h2 class="home-title">
          Hi 👋,<br />I'am <span class="home-title-color">Ancelma</span><br />
        </h2>

        <a href="https://drive.google.com/file/d/1H08bwDDtPX0422uX1svMEH1xnSEEX1Zt/view?usp=sharing" target="_blank"
          class="button">Resume</a>

      </div>

      <div class="home-social">
        <a href="https://www.linkedin.com/in/ancelma ngamel/" target="_blank" class="home-social-icon"><i
            class="bx bxl-linkedin"></i></a>
        <a href="https://github.com/ancelmangamel21" target="_blank" class="home-social-icon"><i
            class="bx bxl-github"></i></a>
      </div>

      <div class="home-img">
        <img src="assets/img/profile.gif" alt="" />
      </div>
    </section>

    <!--===== ABOUT =====-->
    <section class="about section" id="about">
      <h2 class="section-title">About</h2>

      <div class="about-container bd-grid">
        <div class="about-images.jpg">
          <img src="assets/img/profile_1.jpeg\" alt="" />
        </div>

        <div style="text-align: center">
          <h2 class="about-subtitle">I'am ancelma ngamel</h2>
          <p class="about-text">
           
          </p>
          <br />
          
          <p>
            Drop a mail ancelmangamel21@gmail.com
            <i style="color: #4070f4; font-size: 1.2rem; cursor: pointer" class="bx bx-copy" id="copy"></i>
          </p>
        </div>
      </div>
    </section>


    <!---========Education ======--->
    <section class="education section" id="education">
      <h2 class="section-title">Education</h2>
      <div class="education-container bd-grid">
    
        
        </div>
      <div class="education-container bd-grid">
    
    <div class="education-data">
      <div class="education-names">
        <!-- <i class="bx bxl-html5 skills-icon"></i> -->
        <span class="education-name"> siwa lima</span>
        <p class="education-platform ">sekolah menengah kejuruan</p>
        <p class="education-duration ">August 2018 - May 2021</p>

      </div>
    </div>
    </div>

    <!--===== SKILLS =====-->
    <section class="skills section" id="skills">
      <h2 class="section-title">Experience</h2>

      <div class="skills-container bd-grid">
        <?php
          $queryExp = "SELECT * FROM experience ORDER BY id ASC";
          $resultExp = mysqli_query($connectDb, $queryExp);

          while ($data = mysqli_fetch_array($resultExp)) :
          ?>
        <div>
          <div class="skills-data">
            <div class="skills-names">
              <i class="bx bxl-redux skills-icon"></i>
              <span class="skills-name"><?= $data['title']; ?></span>-<span class="skills-name"><?= $data['tahun']; ?></span>
            </div>
          </div> 
        <div>
        <?php endwhile; ?>
      </div>
    </section>

  <!--===== FOOTER + CONTACT=====-->

  <!-- CONTACT -->
  <section class="contact section" id="contact">
  <h2 class="section-title">Contact</h2>
  <div class="bd-grid contact-container">
    <form method="post" action="bukutamu-save.php" class="contact-form">
      <label for="name" class="contact-label">Name:</label>
      <input type="text" id="name" name="nama" class="contact-input" required>

      <label for="email" class="contact-label">Email:</label>
      <input type="email" id="email" name="email" class="contact-input" required>

      <label for="message" class="contact-label">Message:</label>
      <textarea id="message" name="message" class="contact-input" required></textarea>

      <button type="submit" class="button contact-button">Send Message</button>
    </form>
  </div>
</section>


  
  <footer class="footer section" id="contact">
    <h2 class="section-title">Get ancelmangamel21</h2>
    <p class="footer-title">ancelma</p>
    <div class="footer-social">
      <a href="mailto:ancelmangamel21@gmail.com" target="_blank" class="footer-icon"><i class="bx bx-mail-send">
          <br />
          E-mail</i></a>
      <a href="tel:+878132645" target="_blank" class="footer-icon"><i class="bx bx-phone">
          <br />
          Phone</i></a>
    </div>
    <p>&#169; 2023 copyright all right reserved</p>
  </footer>
  

  <!--===== MAIN JS =====-->
  <script src="assets/js/main.js"></script>
</body>

</html>
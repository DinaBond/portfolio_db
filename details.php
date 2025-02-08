<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');


$query = 'SELECT projects.id AS project, title, tools, date, url, goal, brief, description FROM projects, media WHERE media.projects_id = projects.id AND projects.id = :projectid';

$stmt = $connect->prepare($query);

$projectid = $_GET['id'];

$stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

//$results = mysqli_query($connect,$query);

//$row = mysqli_fetch_assoc($results);



?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title>Portfolio Website</title>
    <link
      href="https://fonts.googleapis.com/css?family=Lato"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link href="css/grid.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  </head>

  <body>
    <h1 class="hidden">Portfolio Website</h1>
    <!--Main Nav-->
    <header class="grid-con main-header" id="main-header">
      <div class="logo col-start-1 col-end-2 m-col-start-1 m-col-end-3">
        <a href="./index.html">
          <img src="images/logo.svg" alt="Portfolio Logo" />
        </a>
      </div>
      <div class="col-start-4 col-end-5 burger-menu">
        <span class="menu-bar"></span>
        <span class="menu-bar"></span>
      </div>
      <nav class="main-nav col-span-full m-col-start-4 m-col-end-13">
        <h2 class="hidden">Main Navigation</h2>
        <div class="burger-con">
          <ul>
            <div id="home">
              <li><a href="./index.html">HOME</a></li>
            </div>
            <div id="about">
              <li><a href="./about.html">ABOUT</a></li>
            </div>
            <div id="project">
              <li><a href="./projects.html">PROJECTS</a></li>
            </div>
            <div id="contact">
              <li><a href="./contact.html">CONTACT</a></li>
            </div>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <section id="hero" class="grid-con">
        <h2 class="hidden">Web Page</h2>

        <div class="col-span-full main-text-opening">
          <p>SHARME</p>
        </div>

        <div class="col-span-full button-back">
          <img src="images/arrow-left.svg" alt="arrow-left" />
          <a href="./projects.html">
            <p class="more-about col-span-full">Back to Portfolio</p>
          </a>
        </div>
      </section>

      <section class="grid-con in-between">
        <div class="col-span-full text-about-4">
          <p>
            A series of Youtube video covers for promotion of cosmetic brand
            Sharme
          </p>
        </div>
      </section>

      <section class="grid-con describtion-section">
        <div class="col-span-full project-goal-title">
          <h1>Project Goal:</h1>
          <div class="col-span-full project-goal-text">
            <p>
            <?php echo $row['goal']; ?>
            </p>
          </div>
        </div>

        <div class="col-span-full project-goal-title">
          <h1>Brief:</h1>
          <div class="col-span-full project-goal-text">
            <p>
            <?php echo $row['brief']; ?>
            </p>
          </div>
        </div>
        <div class="col-span-full button-view">
          <a href="#">
            <p class="more-about col-span-full">View Project</p>
          </a>
        </div>
      </section>

      <section class="grid-con project-images">
        <div class="col-span-full text-img"><?php echo $row['date']; ?><?php echo $row['tools']; ?></div>
        <div class="col-span-full contact-container">
          <div class="contact-line"></div>
          <p class="col-span-full contact-text-small">What it Looks Like</p>
          <div class="contact-line"></div>
        </div>
        <div class="col-span-full project-img-1">
          <img src="images/<?php echo $row['url']; ?>.png" alt="project image" />
        </div>
        <div class="col-span-full contact-container">
          <div class="contact-line"></div>
          <p class="col-span-full contact-text-small">Details</p>
          <div class="contact-line"></div>
        </div>

        <div class="col-span-full project-img-2">
          <img src="images/project-img-2.png" alt="project image" />
        </div>

        <div class="col-span-full project-text">
          <p>
          <?php echo $row['description']; ?>
          </p>
        </div>

        <div class="col-span-full contact-container">
          <div class="contact-line"></div>
          <p class="col-span-full contact-text-small">Sketches</p>
          <div class="contact-line"></div>
        </div>

        <div class="col-span-full project-img-3">
          <img src="images/project-img-3.png" alt="project image" />
        </div>

        <div class="col-span-full contact-container">
          <div class="contact-line"></div>
          <p class="col-span-full contact-text-small">Final Version</p>
          <div class="contact-line"></div>
        </div>

        <div class="col-span-full project-img-3">
          <img src="images/project-img-4.png" alt="project image" />
        </div>
      </section>

      <section class="grid-con contact-me-section">
        <div class="col-span-full contact-container">
          <div class="contact-line"></div>
          <p class="col-span-full contact-text-small">Contact Me</p>
          <div class="contact-line"></div>
        </div>
        <div class="col-span-full contact-text-basic">
          <p>Enjoy the style of this project?</p>
          <p>Let me create something similar for you!</p>
        </div>

        <h2 class="hidden">Contact</h2>

        <div class="contact-form col-span-full l-col-start-1 l-col-end-8">
          <div
            class="contact-form col col-span-full l-col-start-1 l-col-end-8 out-name"
          >
            <h1>Name*</h1>
          </div>
          <form action="email.php" method="POST" enctype="text/plain">
            <input name="NAME" type="text" placeholder="NAME" />
            <div
              class="contact-form col col-span-full l-col-start-1 l-col-end-8 out-name"
            >
              <h1>Email*</h1>
            </div>
            <input
              name="contactInfo"
              type="text"
              required
              placeholder="EMAIL"
            />
            <div
              class="contact-form col col-span-full l-col-start-1 l-col-end-8 out-name"
            >
              <h1>Phone</h1>
            </div>
            <input
              name="contactInfo"
              type="text"
              required
              placeholder="PHONE"
            />
            <div
              class="contact-form col col-span-full l-col-start-1 l-col-end-8 out-name"
            >
              <h1>Message*</h1>
            </div>
            <textarea
              name="msg"
              placeholder="Describe your wishes for the project here."
            ></textarea>
            <div class="contact-buttons col-span-full">
              <input name="submit" type="submit" value="Send a Message" />
            </div>
          </form>
        </div>
      </section>
    </main>

    <footer>
      <section class="grid-con footer-section">
        <img
          src="images/logo-footer.svg"
          alt="logo"
          class="col-span-full footer-logo"
        />
        <p class="col-span-full footer-text-basic">
          I focus on creating essential design elements that are crucial for
          launching your project successfully.
        </p>
        <h1 class="col-span-full footer-text">Contact Me</h1>
        <div class="footer-line"></div>
        <h2 class="col-span-full footer-text">dinabondprojects@gmail.com</h2>
        <h2 class="col-span-full footer-text">Based in London, Canada</h2>
        <div class="footer-back">
          <img src="images/back-to-top.svg" alt="arrow" />
          <a href="#main-header">
            <p class="footer-back-text">Back to top</p>
          </a>
        </div>
      </section>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

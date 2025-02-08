<!DOCTYPE html>
<html lang="en">
  <?php
  require_once('includes/connect.php');

  //create a query to run in SQL
  $stmt = $connect->prepare("SELECT projects.id AS project, title, tools, date, url FROM projects, media WHERE media.projects_id = projects.id");
  
  $stmt->execute();
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
    <header class="grid-con main-header">
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
          <p id="main-text-opening">TURN YOUR IDEAS</p>
          <p>INTO DESIGN</p>
        </div>
        <div class="col-start-1 col-end-5 m-col-span-full small-text-opening">
          <p>I will create a modern and simple design</p>
          <p>for your small-sized business and other projects.</p>
        </div>
      </section>

      <section class="grid-con pre-contact">
        <div class="button-about">
          <a href="./contact.html"
            ><p class="more-about col-span-full">Contact Me</p></a
          >

          <img src="images/move-forward.svg" alt="arrow-right" />
        </div>

        <div class="name col-span-full">
          <p>Dina Bond, Junior Web Designer</p>
        </div>
      </section>

      <section class="grid-con about-me-section">
        <h2 class="hidden">About Me</h2>
        <div class="col-span-full about-me-main">
          <h1>
            I specialize in small design pieces, without which you wouldn't
            launch your project
          </h1>
        </div>
        <div class="col-span-full about-me-small">
          <p>
            Struggling with design as you take the next step to start your
            business, run a course, or prepare a presentation?
          </p>
          <p>
            I help those who want to begin a new project without spending a lot
            on decoration or learning it themselves.
          </p>
          <p>
            My simple, practical solutions for your blog, startup, and other
            daily tasks make it easier to move forward on yours professional
            way.
          </p>
        </div>
        <div class="button-about">
          <a href="./projects.html">
            <p class="more-about col-span-full">Learn in Detail</p>
          </a>

          <img src="images/move-forward.svg" alt="arrow-right" />
        </div>
      </section>

      <section class="grid-con projects-section" id="projects-section">
        <h2 class="hidden">Projects</h2>
        <div class="col-span-full video-container">
          <div class="col-span-full video-line"></div>
          <div class="col-span-full pre-title">Easy solutions for you</div>
        </div>

        <div class="col-span-full title">Completed Projects</div>

        <div class="col-span-full projects">
        <?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '
          <a href="details.php?id='.$row['project'].'" class="work">
            <div class="project-card">
              <div class="project-card-top-info">
                <p class="top-info-tools">'.$row['tools'].'</p>
                <p class="top-info-year">'.$row['date'].'</p>
              </div>
              <img src="images/'.$row['url'].'.png" alt="project 1" />
              <p class="project-name">'.$row['title'].'</p>
            </div>
          </a>
          ';
}

$stmt = null;

?>
          </div>
      </section>

      <section class="grid-con video-section">
        <h2 class="hidden">Watch video</h2>
        <div class="col-span-full video-container">
          <div class="col-span-full video-line"></div>
          <div class="col-span-full pre-title">
            Press the button to start video playback
          </div>
        </div>

        <div class="col-span-full title">Watch my projects</div>

        <div class="col-span-full">
          <video
            class="player"
            controls
            preload="metadata"
            poster="images/placeholder.jpg"
          >
            <source src="assets/demo-reel.mp4" type="video/mp4" />
            <source src="video/video.webm" type="video/webm" />
            <p>
              Ooops, something went wrong. You may be using an outdated browser
              or have javascript disabled.
            </p>
          </video>
        </div>
      </section>

      <section class="grid-con contact-me-section">
        <div class="col-span-full contact-container">
          <div class="contact-line"></div>
          <p class="col-span-full contact-text-small">Contact Me</p>
          <div class="contact-line"></div>
        </div>
        <p class="col-span-full contact-text-basic">
          Let’s get started with the discussion about your design project!
        </p>
        <h2 class="hidden">Contact</h2>

        <div class="contact-form col-span-full l-col-start-5 l-col-end-9">
          <div
            class="contact-form col col-span-full l-col-start-5 l-col-end-9 out-name"
          >
            <h1>Name*</h1>
          </div>
          <form action="sendmail.php" method="POST">
            <input name="name" type="text" placeholder="NAME" />
            <div
              class="contact-form col col-span-full l-col-start-5 l-col-end-9 out-name"
            >
              <h1>Email*</h1>
            </div>
            <input
              name="email"
              type="text"
              required
              placeholder="EMAIL"
            />
            <div
              class="contact-form col col-span-full l-col-start-5 l-col-end-9 out-name"
            >
              <h1>Phone</h1>
            </div>
            <input
              name="number"
              type="text"
              required
              placeholder="PHONE"
            />
            <div
              class="contact-form col col-span-full l-col-start-5 l-col-end-9 out-name"
            >
              <h1>Message*</h1>
            </div>
            <textarea
              name="message"
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

        <div class="footer-back .col-span-full">
          <img src="images/back-to-top.svg" alt="arrow" id="footer-img" />
          <a href="#main-text-opening">
            <p class="footer-back-text">Back to top</p>
          </a>
        </div>
      </section>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

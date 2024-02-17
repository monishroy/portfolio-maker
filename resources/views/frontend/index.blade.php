<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description" />
    <meta name="author" content="Your name" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" />
    <!-- website name -->
    <meta property="og:site" content="" />
    <!-- website link -->
    <meta property="og:title" content="" />
    <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" />
    <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" />
    <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image" />
    <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Portfolio Maker</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/fontawesome-all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/swiper.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png') }}" />
  </head>
  <body data-bs-spy="scroll" data-bs-target="#navbarExample">
    <!-- Navigation -->
    <nav
      id="navbarExample"
      class="navbar navbar-expand-lg fixed-top navbar-light"
      aria-label="Main navigation">
      <div class="container">
        <!-- Image Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('frontend/images/logo.png') }}" style="height: 35px" alt="portfolio logo"/>
        </a>

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text" href="index.html">Zinc</a> -->

        <button
          class="navbar-toggler p-0 border-0"
          type="button"
          id="navbarSideCollapse"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="navbar-collapse offcanvas-collapse"
          id="navbarsExampleDefault">
          <ul class="navbar-nav ms-auto navbar-nav-scroll">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#wellcome"
                >Welcome
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#showcase">Showcase</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#projects">How it Work ?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing">Pricing</a>
            </li>
          </ul>
          <span class="nav-item ms-4">
            <a class="btn-solid-sm" href="{{ route('register') }}">Get Started</a>
          </span>
        </div>
        <!-- end of navbar-collapse -->
      </div>
      <!-- end of container -->
    </nav>
    <!-- end of navbar -->
    <!-- end of navigation -->

    <!-- Header -->
    <header id="wellcome" class="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="text-container">
              <h1 class="h1-large">
                Build your portfolio with a few taps of a button
              </h1>
              <p class="p-large">
                Turn your link in bio into a place to show the world who you are
                and what you're made of.
              </p>
              <a class="btn-solid-lg" href="{{ route('register') }}">Get Started</a>
              <a class="quote" style="text-decoration: none" href="#showcase"
                ><i class="fas fa-paper-plane"></i>Explore Our Templates</a
              >
            </div>
            <!-- end of text-container -->
          </div>
          <!-- end of col -->
          <div class="col-lg-6">
            <div class="image-container">
              <img
                class="img-fluid w-100"
                src="{{ asset('frontend/images/header-illustration.svg') }}"
                alt="alternative" />
            </div>
          </div>
        </div>
        <!-- end of row -->
      </div>
      <!-- end of container -->
    </header>
    <!-- end of header -->

    <!-- Services -->
    <div class="cards-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- Card -->
            <div class="card">
              <div class="card-icon blue">
                <span class="far fa-file-alt"></span>
              </div>
              <div class="card-body">
                <h5 class="card-title">Tell your story</h5>
                <p>
                  Easily introduce yourself and your work in a captivating
                  portfolio. Your unique style and identity deserve to shine.
                </p>
              </div>
            </div>
            <!-- end of card -->

            <!-- Card -->
            <div class="card">
              <div class="card-icon yellow">
                <span class="fas fa-solar-panel"></span>
              </div>
              <div class="card-body">
                <h5 class="card-title">Expand your reach</h5>
                <p>
                  Boost your online presence and connect with a broader audience
                  by sharing multiple social links. Your network is just a click
                  away.
                </p>
              </div>
            </div>
            <!-- end of card -->

            <!-- Card -->
            <div class="card">
              <div class="card-icon red">
                <span class="fas fa-gift"></span>
              </div>
              <div class="card-body">
                <h5 class="card-title">Simplify client interaction</h5>
                <p>
                  Streamline client interactions with various contact options.
                  Your clients can choose how to reach you conveniently.
                </p>
              </div>
            </div>
            <!-- end of card -->
          </div>
          <!-- end of col -->
        </div>
        <!-- end of row -->
      </div>
      <!-- end of container -->
    </div>
    <!-- end of cards-1 -->

    <!-- Details Modal -->
    <div
      id="staticBackdrop"
      class="modal fade"
      tabindex="-1"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="row">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
            <div class="col-lg-8">
              <div class="image-container">
                <img
                  class="img-fluid"
                  src="{{ asset('frontend/images/details-modal.jpg') }}"
                  alt="alternative" />
              </div>
              <!-- end of image-container -->
            </div>
            <!-- end of col -->
            <div class="col-lg-4">
              <h3>Goals Setting</h3>
              <hr />
              <p>
                In gravida at nunc sodales pretium. Vivamus semper, odio vitae
                mattis auctor, elit elit semper magna ac tum nico vela spider
              </p>
              <h4>User Feedback</h4>
              <p>
                Sapien vitae eros. Praesent ut erat a tellus posuere nisi more
                thico cursus pharetra finibus posuere nisi. Vivamus feugiat
              </p>
              <ul class="list-unstyled li-space-lg">
                <li class="d-flex">
                  <i class="fas fa-chevron-right"></i>
                  <div class="flex-grow-1">
                    Tincidunt sem vel brita bet mala
                  </div>
                </li>
                <li class="d-flex">
                  <i class="fas fa-chevron-right"></i>
                  <div class="flex-grow-1">
                    Sapien condimentum sacoz sil necr
                  </div>
                </li>
                <li class="d-flex">
                  <i class="fas fa-chevron-right"></i>
                  <div class="flex-grow-1">
                    Fusce interdum nec ravon fro urna
                  </div>
                </li>
                <li class="d-flex">
                  <i class="fas fa-chevron-right"></i>
                  <div class="flex-grow-1">
                    Integer pulvinar biolot bat tortor
                  </div>
                </li>
                <li class="d-flex">
                  <i class="fas fa-chevron-right"></i>
                  <div class="flex-grow-1">
                    Id ultricies fringilla fangor raq trinit
                  </div>
                </li>
              </ul>
              <a id="modalCtaBtn" class="btn-solid-reg" href="#">Details</a>
              <button
                type="button"
                class="btn-outline-reg"
                data-bs-dismiss="modal">
                Close
              </button>
            </div>
            <!-- end of col -->
          </div>
          <!-- end of row -->
        </div>
        <!-- end of modal-content -->
      </div>
      <!-- end of modal-dialog -->
    </div>
    <!-- end of modal -->
    <!-- Projects -->
    <div id="showcase" class="filter bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="mb-1">Explore inspiring portfolio templates</h2>
            <p class="mb-4">
              We’ve developed on trend, ready-made templates. Find the one that
              fits your needs and aesthetic.
            </p>
          </div>
          <!-- end of col -->
        </div>
        <!-- end of row -->
        <div class="row">
          <div class="col-lg-12">
            <!-- Filter -->
            <div class="button-group filters-button-group">
              <button class="button is-checked" data-filter="*">ALL</button>
              <button class="button" data-filter=".design">DESIGN</button>
              <button class="button" data-filter=".development">
                DEVELOPMENT
              </button>
              <button class="button" data-filter=".marketing">MARKETING</button>
            </div>
            <!-- end of button group -->
            <div class="grid">
              <div
                data-bs-toggle="modal"
                data-bs-target="#staticBackdrop"
                class="element-item development">
                <a href="javascript:void(0)">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-1.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Online banking</strong> - pellentesque tincidunt leo
                    eu laoreedt integer quis vanos compren
                  </p>
                </a>
              </div>
              <div class="element-item development">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-2.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Loans company</strong> - odio semper, interdum orci
                    molestie, mattis lectus pellentesq aliqu
                  </p>
                </a>
              </div>
              <div class="element-item development">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-3.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Refinance firm</strong> - arcu a neque congue
                    finibus doneci malesuada et purus melan bris
                  </p>
                </a>
              </div>
              <div class="element-item design development">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-4.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Financial products</strong> - id aliquam ut
                    malesuada eros utr varius blandit aliquam tinci bist
                  </p>
                </a>
              </div>
              <div class="element-item design development">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-5.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Credit cards</strong> - magna a feugiat cras a
                    semper tellus in rhoncus vehicula tellus rugo
                  </p>
                </a>
              </div>
              <div class="element-item design marketing">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-6.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Software robots</strong> - vel sodales dolor donec a
                    est sapien integer pharetr bilom conva
                  </p>
                </a>
              </div>
              <div class="element-item design marketing">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-7.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Company control</strong> - ut quam aliquam elemo de
                    vestibulum fringilla porttitor vanic tres
                  </p>
                </a>
              </div>
              <div class="element-item design marketing">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-8.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Audit reports</strong> - sed tempor, metus vel
                    pharetra finibus, est ante hendrerit augue
                  </p>
                </a>
              </div>
              <div class="element-item design marketing">
                <a href="article.html">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/images/project-9.jpg') }}"
                    alt="alternative" />
                  <p>
                    <strong>Big business</strong> - aliquam semper molestie
                    nisi, at porttitor lacus suscipit in mole richter
                  </p>
                </a>
              </div>
            </div>
            <!-- end of grid -->
            <!-- end of filter -->
          </div>
          <!-- end of col -->
        </div>
        <!-- end of row -->
      </div>
      <!-- end of container -->
    </div>

    <!-- Footer -->
    <div class="footer bg-gray">
      <img
        class="decoration-city"
        src="{{ asset('frontend/images/decoration-city.svg') }}"
        alt="alternative" />
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h4>Millions of users trust us with their link for portfolio</h4>
            <div class="social-container">
              <span class="fa-stack">
                <a href="#your-link">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x"></i>
                </a>
              </span>
              <span class="fa-stack">
                <a href="#your-link">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x"></i>
                </a>
              </span>
              <span class="fa-stack">
                <a href="#your-link">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-pinterest-p fa-stack-1x"></i>
                </a>
              </span>
              <span class="fa-stack">
                <a href="#your-link">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x"></i>
                </a>
              </span>
              <span class="fa-stack">
                <a href="#your-link">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-youtube fa-stack-1x"></i>
                </a>
              </span>
            </div>
            <!-- end of social-container -->
          </div>
          <!-- end of col -->
        </div>
        <!-- end of row -->
      </div>
      <!-- end of container -->
    </div>
    <!-- end of footer -->
    <!-- end of footer -->

    <!-- Copyright -->
    <div class="copyright bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled li-space-lg p-small">
              <li><a href="terms.html">Terms & Conditions</a></li>
              <li><a href="privacy.html">Privacy Policy</a></li>
            </ul>
          </div>
          <!-- end of col -->
          <div class="col-lg-3">
            <p class="p-small statement">
              Copyright © <a href="#">Portfolio Maker</a>
            </p>
          </div>
          <!-- end of col -->
          <div class="col-lg-3">
            <p class="p-small statement">
              development By:
              <a href="https://monishroy.com/" target="_blank">Monish Roy</a>
            </p>
          </div>
          <!-- end of col -->
        </div>
        <!-- enf of row -->
      </div>
      <!-- end of container -->
    </div>
    <!-- end of copyright -->
    <!-- end of copyright -->

    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
      <img src="{{ asset('frontend/images/up-arrow.png') }}" alt="alternative" />
    </button>
    <!-- end of back to top button -->

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap framework -->
    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
    <!-- Swiper for image and text sliders -->
    <script src="{{ asset('frontend/js/purecounter.min.js') }}"></script>
    <!-- Purecounter counter for statistics numbers -->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!-- Isotope for filter -->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
    <!-- Custom scripts -->
  </body>
</html>

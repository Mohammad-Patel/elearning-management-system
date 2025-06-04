<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About Us - eLEARNING</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{url('home')}}" class="nav-item nav-link">Home</a>
                <a href="{{url('about')}}" class="nav-item nav-link active">About</a>
                <a href="{{url('contact')}}" class="nav-item nav-link">Contact</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Review</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="#" class="dropdown-item">Courses</a>
                        <a href="{{url('add_review')}}" class="dropdown-item">Add Reviews</a>
                    </div>
                </div>
            </div>
            <a href="{{url('login')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- About Content -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded w-100" src="{{ asset('img/campus.jpg') }}"alt="About eLearning">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 style="color:#06BBCC;">Our Story</h1>
                    <h3 class="mb-4">Empowering Learners, Transforming Lives</h3>
                    <p class="mb-4">At eLEARNING, we believe education should be accessible, affordable, and effective. With top-tier online courses and a world-class faculty, we’re committed to equipping our students with the skills they need for real-world success.</p>
                    <p class="mb-4">Over <strong>10,000+</strong> students have trusted us — with many landing jobs at top companies after certification. Join us to shape your career the smart way!</p>
                    <p class="mb-4">Take charge of your future with eLEARNING’s cutting-edge courses. Whether you’re looking to enhance your current skills or start a new career path, we’ve got you covered.</p> 
                    <p class="mb-4">Over <strong>10,000+</strong> students have already built strong foundations in their chosen fields. Join us and take the first step toward your success!</p> 
                    <p class="mb-4">Education is the key to a brighter future, and eLEARNING is here to guide you through that journey. We offer flexible, high-quality courses that prepare you for the workforce.</p> 

                    <a class="btn btn-primary py-3 px-5 mt-2" href="#">View Courses</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Offered -->
    <div class="container-xxl py-5">
        <div class="container text-center">
            <!-- <h6 class="section-title text-center text-primary px-3">Courses We Offer</h6> -->
            <h1 class="mb-5">Industry-Ready Programs</h1>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light p-4 text-start h-100 rounded">
                        <h5 class="mb-3">Full Stack Web Development</h5>
                        <p>HTML, CSS, JS, React, Node & MongoDB</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="course-item bg-light p-4 text-start h-100 rounded">
                        <h5 class="mb-3">Data Science & AI</h5>
                        <p>Python, Machine Learning, TensorFlow</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light p-4 text-start h-100 rounded">
                        <h5 class="mb-3">Digital Marketing</h5>
                        <p>SEO, Google Ads, Analytics, Content</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="course-item bg-light p-4 text-start h-100 rounded">
                        <h5 class="mb-3">Cyber Security</h5>
                        <p>Ethical Hacking, Network Security, Tools</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="container-fluid bg-primary text-white py-5">
        <div class="container text-center">
            <div class="row g-5">
            <!-- First Column with Vertical Line -->
                <div class="col-md-4" style="border-right: 4px solid white;">
                    <h1 class="display-4">10,000+</h1>
                    <p class="mb-0">Students Trained</p>
                    </div>

            <!-- Second Column -->
                <div class="col-md-4" style="border-right: 4px solid white;">
                    <h1 class="display-4">7,500+</h1>
                    <p class="mb-0">Students Placed</p>
                </div>

            <!-- Third Column -->
                <div class="col-md-4">
                    <h1 class="display-4">40+</h1>
                    <p class="mb-0">Expert Faculty</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Faculty Section -->
    <div class="container-xxl py-5">
        <div class="container text-center">
            <!-- <h6 class="section-title text-center text-primary px-3">Our Mentors</h6> -->
            <h1 class="mb-5">Meet Our Expert Faculty</h1>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-item bg-light text-center p-4">
                        <img class="img-fluid rounded-circle mb-3" src="img/faculty1.jpg" alt="">
                        <h5 class="mb-1">Dr. Priya Mehta</h5>
                        <small>Data Science | PhD, IIT Bombay</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-item bg-light text-center p-4">
                        <img class="img-fluid rounded-circle mb-3" src="img/faculty2.jpg" alt="">
                        <h5 class="mb-1">Mr. Arjun Verma</h5>
                        <small>Web Dev | Ex-Google Engineer</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-item bg-light text-center p-4">
                        <img class="img-fluid rounded-circle mb-3" src="img/faculty3.jpg" alt="">
                        <h5 class="mb-1">Ms. Neha Singh</h5>
                        <small>Digital Marketing Strategist</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-item bg-light text-center p-4">
                        <img class="img-fluid rounded-circle mb-3" src="img/faculty4.jpg" alt="">
                        <h5 class="mb-1">Mr. Ramesh Rao</h5>
                        <small>Cybersecurity Consultant</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>S.G.High Way, Ahemdabad, India</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('img/course-1.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('img/course-2.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('img/course-3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

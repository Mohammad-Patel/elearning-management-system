<!-- resources/views/courses/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<div>
    <button><a href="#">ADDNEW POPULAR COURSE</a></button>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($popcourse as $course)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{'/image/'.$course->image}}" alt="">
                        <!-- <img  width="50" height="50" style="border-radius: 50%; object-fit: cover;"> -->
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="{{ url('login') }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h5 class="mb-4">{{ $course->title }}</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-user-tie text-primary me-2"></i>{{ $course->instructor }}
                        </small>
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-clock text-primary me-2"></i>{{ $course->duration }}
                        </small>
                        <small class="flex-fill text-center py-2">
                            <i class="fa fa-user text-primary me-2"></i>{{ $course->students }} Students
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
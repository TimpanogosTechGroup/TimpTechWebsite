<?php
session_start();

if (isset($_POST['id'])) {
    $servername = "localhost";
    $username = "timpano1_admin";
    $password = "t1mp@n0g0s";
    $dbname = "timpano1_members";

    $id = $_POST["id"];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM teams WHERE ID = " . $id;
//                echo $id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $teamname = $row["teamname"];
        $info = $row;
    } else {
        echo "Unknown User";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../../img/apple-icon.png">
    <link rel="icon" href="../../img/favicon.png">
    <title>
        Timpanogos Tech
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/main.css">

    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../../css/material-kit.css?v=2.0.1">
    <link rel="stylesheet" href="../../css/material-kit-pro.min.css?v=2.0.1">

</head>
<body class="profile-page">
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg " color-on-scroll="100"
     id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="../../index.html">Timpanogos Tech </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../teams">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../members">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../join.html">Join</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.html">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom"
                           href="https://www.facebook.com/Timpanogos-Tech-560674584311834/" target="_blank"
                           data-original-title="Like us on Facebook"><i class="fa fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-round btn-primary" data-toggle="modal" data-target="#loginModal">
                            Login
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="page-header header-filter" data-parallax="true"
     style=" background-image: url('<?php echo "../../img/teams/" . $info['teamname'] . "_profile.png"; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title" style="font-weight: 700;"><?php echo $info['teamname']; ?></h1>
                <h4><?php echo $info['description']; ?></h4>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <!--<div class="col-md-auto ml-auto mr-auto">-->
            <h1>Team Members: </h1>
            <div class="row">
                <div class="col-md-2">
                    <img src="../../img/members/jacob_profile.JPG" class="img-raised rounded-circle img-fluid"
                         style="width: 10rem; height: 10rem;" alt="Jacob">
                </div>
                <div class="col-md-2">
                    <img src="../../img/members/ellie_profile.JPG" class="img-raised rounded-circle img-fluid"
                         style="width: 10rem; height: 10rem;" alt="Ellie">
                </div>
                <div class="col-md-2">
                    <img src="../../img/members/JustBrenkman_profile.JPG" class="img-raised rounded-circle img-fluid"
                         style="width: 10rem; height: 10rem;" alt="Ben">
                </div>
            </div>
            <br>
            <div class="row">
                <span class="badge badge-pill badge-dark">HTML</span>
                <span class="badge badge-pill badge-dark">CSS</span>
                <span class="badge badge-pill badge-dark">PHP</span>
                <span class="badge badge-pill badge-dark">JAVASCRIPT</span>
                <span class="badge badge-pill badge-dark">Web Design</span>
                <span class="badge badge-pill badge-dark">Website</span>
                <span class="badge badge-pill badge-dark">Database</span>
                <span class="badge badge-pill badge-dark">Internet</span>
            </div>
            <br>
            <div class="row">
                <h1>Description</h1>
                <br>
                <h5>
                    We are working on getting Timpanogos Tech up and running! Everything you see on this website was
                    written and developed by Mini-Mountains. We are working on the front-end HTML and CSS that you
                    see as well as PHP and Javascript that you don't.
                </h5>
            </div>
            <!--</div>-->
            <div class="features text-center">
                <div class="row">
                    <div class="col-md-4 m-md-auto">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">extension</i>
                            </div>
                            <h4 class="info-title">Join a team</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4 m-md-auto">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">device_hub</i>
                            </div>
                            <h4 class="info-title">Start a team</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4 m-md-auto">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">explore</i>
                            </div>
                            <h4 class="info-title">Learn more about what we do</h4>
                            <p>We are a student organization devoted to helping college students build useful skills for
                                work. We have serveral teams working on projects ranging from maachine learning to
                                building toys.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-contacts">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">Start Now</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts.
                        Write a few lines about each one and contact us about any further collaboration. We will
                        responde get back to you in a couple of hours.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Your Name</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Your Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                            <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto text-center">
                                <button class="btn btn-primary btn-raised">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-danger">
    <div class="container">
        <div class="alert-icon">
            <i class="material-icons">error_outline</i>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
        </button>
        <b>Error Alert:</b>This website is still under construction...Sorry for the inconvenience
    </div>
</div>
<footer class="footer ">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="https://www.timpanogos-tech.com">
                        Timpanogos Tech
                    </a>
                </li>
                <li>
                    <a href="../../index.html">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="#">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Mini Mountains</a> for a better web.
        </div>
        <button type="button" class="btn btn-primary btn-round" onclick="_('feedBackForm').reset();" data-toggle="modal"
                data-target="#exampleModal">FEEDBACK
        </button>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Submit Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="feedbackForm" onsubmit="submitFeedback()">
                    <div class="form-group text-left">
                        <label for="name" class="bmd-label-floating">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <div for="email" class="bmd-label-floating">Email</div>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <div for="textFeedback" class="bmd-label-floating">Feedback</div>
                        <textarea id="textFeedback" class="form-control" type="textFeedback" rows="4"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="button" onclick="submitFeedback(); return false;" id="submitFeedbackbtn"
                        class="btn btn-primary">SEND
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-primary text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                    class="material-icons">clear</i></button>
                        <h4 class="card-title">Log in</h4>
                        <div class="social-line">
                            <a href="#pablo" class="btn btn-just-icon btn-link">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-link">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-link">
                                <i class="fa fa-google-plus"></i>
                                <div class="ripple-container"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form" method="post">
                        <div class="card-body align-content-center">
                            <div class="form-group">
                                <div class="input-group">
                                    <!--                                    <span class="input-group-addon">-->
                                    <!--                                        <i class="material-icons">email</i>-->
                                    <!--                                    </span>-->
                                    <input type="text" name="username" class="form-control" placeholder="User Name...">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <!--                                    <span class="input-group-addon">-->
                                    <!--                                        <i class="material-icons">lock_outline</i>-->
                                    <!--                                    </span>-->
                                    <input type="password" placeholder="Password..." class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../../js/core/jquery.min.js"></script>
<script src="../../js/core/popper.min.js"></script>
<script src="../../js/bootstrap-material-design.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="../../js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="../../js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../../js/plugins/nouislider.min.js"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../../js/material-kit.js?v=2.0.1"></script>
<script src="../../js/timptech.js"></script>
</body>

</html>
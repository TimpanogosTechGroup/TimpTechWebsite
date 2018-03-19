<?php
session_start();

if (isset($_POST['id'])) {
    $servername = "localhost";
    $username = "timpano1_admin";
    $password = "t1mp@n0g0s";
    $dbname = "timpano1_members";

    $id = $_POST["id"];
    $_SESSION['ID'] = $id;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE ID = ".$id;
    $info = "SELECT * FROM member_info WHERE ID = ".$id;
//                echo $id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row["username"];
    } else {
        echo "Unknown User";
    }

    $result = mysqli_query($conn, $info);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $bio = $row["bio"];
    } else {
        echo "Unknown User";
    }

    mysqli_close($conn);
}
?>

<!--<img src=--><?php //echo "../../img/members/".$_SESSION['username']."_profile.JPG"; ?><!-- alt="Member Photo" class="img-raised rounded-circle img-fluid">-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../../img/apple-icon.png">
    <link rel="icon" href="../../img/favicon.png">
    <title>
        Landing &#45; Material Kit by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../css/material-kit.css?v=2.0.1">
    <link rel="stylesheet" href="../../css/material-kit-pro.min.css?v=2.0.1">
</head>

<body class="profile-page ">
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="../../index.html">Timpanogos Tech </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../team.html">Teams</a>
                    </li>
                    <li class="nav-item active">
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
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../../img/examples/city.jpg');"></div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src=<?php echo "../../img/members/".$_SESSION['username']."_profile.JPG"; ?> alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            <h3 class="title"><?php echo $_POST['name']; ?></h3>
                            <h6><?php echo $_POST['role']; ?></h6>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p><?php echo $GLOBALS['bio']; ?></p>
            </div>
<!--            <div class="row">-->
<!--                <div class="col-md-6 ml-auto mr-auto">-->
<!--                    <div class="profile-tabs">-->
<!--                        <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">-->
<!--                                    <i class="material-icons">camera</i> Studio-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">-->
<!--                                    <i class="material-icons">palette</i> Work-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">-->
<!--                                    <i class="material-icons">favorite</i> Favorite-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
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
<!--<script src="../js/material-kit.min.js?v=2.0.2"></script>-->
<script src="../../js/timptech.js"></script>
</body>

</html>
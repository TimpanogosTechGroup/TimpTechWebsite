<?php
session_start();
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Timpanogos Tech - Join</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="../../site.webmanifest">
    <link rel="apple-touch-icon" href="../../icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../../css/material-kit-pro.min.css?v=2.0.1">

</head>
<body>

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
                        <a class="nav-link">Members</a>
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
                        <button class="btn btn-round" data-toggle="modal" data-target="#loginModal">
                            Login<i class="material-icons">assignment</i>

                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="page-header header-filter" data-parallax="true"
     style="background-image: url('../../img/timp test.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title" style="font-weight: 700;">Join Us.</h1>
                <!--<h4></h4>-->
                <br>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container-fluid">
        <div class="section text-center">
            <div class="row">
                <div id="test" class="col-md-12 text-center">
                    <h1>Teams</h1>
                    <br>
                </div>
            </div>
            <div class="col">
                <?php
                $servername = "localhost";
                $username = "timpano1_admin";
                $password = "t1mp@n0g0s";
                $dbname = "timpano1_members";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM member_info";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {

                        // Get username and such from users table
                        $sqlUsername = "SELECT * FROM teams WHERE ID = ".$row['ID'];
                        $userResult = mysqli_query($conn, $sqlUsername);
                        $sqlrow = mysqli_fetch_assoc($userResult);
                        $nameTeam = $sqlrow['teamname'];

                        echo "<div class='col-lg-2'>";
                        echo "<div class=\"card card-profile\" style=\"max-width: 360px\">";
                        echo "<div class=\"card-header card-header-image\">";
//                        echo "<a href=\"#pablo\">";
                        echo "<a href=\"#pablo\"><img class=\"img\" src='../../img/teams/".$nameTeam."_profile.JPG' </a>";
//                        echo "</a>";
                        echo "</div>";
                        echo "<div class=\"card-body\">";
                        echo"<h4 class=\"card-title\">".$row["teamname"]."</h4>";
                        echo"<h6 class=\"card-category text-gray\">".$row["description"]."</h6>";
                        echo"</div>";
                        echo"<div class=\"card-footer justify-content-center\">";
                        echo "<button class=\"btn btn-primary btn-round\" onclick=showProfile('sendID".$row['ID']."')>View Team</button>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                        $formID = "sendID".$row['ID'];
                        echo"<form method='POST' id='".$formID."'  action='../profile/'>";
                        echo"<input type='hidden' name='id' value=".$row['ID'].">";
                        echo"<input type='hidden' name='name' value='".$row['teamname']."'>";
//                        echo"<input type='hidden' name='role' value='".$row['role']."'>";
                        echo"</form>";
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                ?>
            </div>

        </div>
    </div>
</div>

<!-- ******************************************************************************************
***********************************************************************************************

Website code goes above this section

***********************************************************************************************
******************************************************************************************* -->


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
                        <input type="text" class="form-control" id="name" name="name">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
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
                                <div class="ripple-container"></div></a>
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
<!--<script src="../js/material-kit.min.js?v=2.0.2"></script>-->
<script src="../../js/timptech.js"></script>

<script>
    function showProfile(form) {
        document.getElementById(form).submit();
    }
</script>

</body>

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

</html>
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
                <div class="col-md-12 text-center">
                    <h1>Members</h1>
                    <br>
                </div>
            </div>
            <div class="row">
                <?php
                if (isset($_GET['id'])) {
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

                $sql = "SELECT * FROM member_info WHERE ID = ".$id;
//                echo $id;
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo $row["firstname"];
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                }
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
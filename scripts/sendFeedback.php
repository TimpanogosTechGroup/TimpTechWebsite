<?php
/**
 * Created by PhpStorm.
 * User: Ben Brenkman
 * Date: 3/3/2018
 * Time: 10:16 AM
 */

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['feedback'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    //$to = "feedback@timpanogos-tech.com";
    $to = "feedback@timpanogos-tech.com";
    $from = $email;
    $message = '<b>Name: </b>'.$name.'<br><b>Email: </b>'.$email.'<br><p>'.$feedback.'</p>';
    $headers = "From: $from\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";

    if (mail($to, $from, $message, $headers)) {
        echo "success";
    } else {
        echo "failed :(";
    }
} else {
    echo "Failed";
}

?>
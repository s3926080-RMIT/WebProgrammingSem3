<?php
    session_start();
    $_SESSION['cartArray'] = array();
    $_SESSION['orderArray'] = array();
    $_SESSION['distributionHub'] = array();
    $_SESSION['distributionHub'] = file("distribution.txt");
?>
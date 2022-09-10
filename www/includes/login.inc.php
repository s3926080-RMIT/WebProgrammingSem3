<?php
if (isset($_POST["submit"])) {

    $userInput = $_POST['username'];
    $password_input = $_POST['password'];

    require_once 'functions.inc.php';
    $file = file('user_accounts.txt');

    if (loginUser($userInput, $password_input) !== true) {
        header("location: ../login.php?error=wronginput");
        exit();
    }
    else {
        header("location: ../userprofile.php");
    }

}
else{
    header("location: ../login.php");
    exit();
}



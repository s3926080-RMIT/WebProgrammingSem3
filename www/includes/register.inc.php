<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
   

    require_once 'functions.inc.php';
    $file = file('user_accounts.txt');


    if (invalidUsername($username) !== false) {
        header("location: ../register.php?error=invalidUsername");
        exit();
    }
    if (passwordMatch($password, $cpassword) !== false) {
        header("location: ../register.php?error=passwordnotmatch");
        exit();
    }
    if (usernameExists($username) !== false) {
        header("location: ../register.php?error=usernameexists");
        exit();
    }
    if (checkUsernameUppercase($username) !== false) {
        header("location: ../register.php?error=nouppercase");
        exit();
    }
    if (checkUsernameLowercase($username) !== false) {
        header("location: ../register.php?error=nolowercase");
        exit();
    }
    if (checkPasswordUppercase($password) !== false) {
        header("location: ../register.php?error=pnouppercase");
        exit();
    }
    if (checkPasswordLowercase($password) !== false) {
        header("location: ../register.php?error=pnolowercase");
        exit();
    }
    if (checkSpecialCharacter($password) !== false) {
        header("location: ../register.php?error=pnospecialchar");
        exit();
    }
    if (checkPasswordLength($password) !== false) {
        header("location: ../register.php?error=invalidpasswordlength");
        exit();
    }
    if (checkAddressLength($address) !== false) {
        header("location: ../register.php?error=invalidaddresslength");
        exit();
    }  
    createUser($file, $name, $username, $address, $password);
        header("location: ../register.php?error=none");
      
}
else{
    header("location: ../register.php");
}
?>

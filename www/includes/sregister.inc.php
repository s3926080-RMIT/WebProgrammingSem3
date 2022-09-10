<?php
if (isset($_POST["submit"])) {
    $shippername = $_POST["shippername"];
    $spassword = $_POST["spassword"];
    $cpassword = $_POST["cpassword"];
    $hub = $_POST["distribution_hub"];

    require_once 'functions.inc.php';
    $sfile = file('ship_accounts.txt');

    if (shipperPasswordMatch($spassword, $cpassword) !== false) {
        header("location: ../shipper_register.php?error=shipperpasswordnotmatch");
        exit();
    }
    if (shippernameExists($shippername) !== false) {  
        header("location: ../shipper_register.php?error=shippernameexists");
        exit();
    }
    if (checkShippernameUppercase($shippername) !== false) {  
        header("location: ../shipper_register.php?error=shippernamenouppercase");
        exit();
    }
    if (checkShippernameLowercase($shippername) !== false) {  
        header("location: ../vendor_register.php?error=shippernamenolowercase");
        exit();
    }
    if (checkShipperPasswordLowercase($spassword) !== false) {  
        header("location: ../shipper_register.php?error=shipperpassnolowercase");
        exit();
    }
    if (checkShipperPasswordUppercase($spassword) !== false) {  
        header("location: ../shipper_register.php?error=shipperpassnouppercase");
        exit();
    }
    if (checkShipperPasswordSpecialCharacter($spassword) !== false) {  
        header("location: ../shipper_register.php?error=shipperpassnospecialchar");
        exit();
    }
    if (checkShipperPasswordNumber($spassword) !== false) {  
        header("location: ../shipper_register.php?error=shipperpassnonum");
        exit();
    }
    if (checkShipperPasswordLength($spassword) !== false) {  
        header("location: ../shipper_register.php?error=invalidshipperpasslength");
        exit();
    }
    createShipper($sfile, $shippername, $spassword, $hub);
        header("location: ../shipper_register.php?error=none");
      
}
else{
    header("location: ../shipper_register.php");
}
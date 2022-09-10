<?php
if (isset($_POST["submit"])) {
    $vendorname = $_POST["vendorname"];
    $businessname = $_POST["businessname"];
    $businessaddress = $_POST["businessaddress"];
    $vpassword = $_POST["vpassword"];
    $cpassword = $_POST["cpassword"];

    require_once 'functions.inc.php';
    $vfile = file('vendor_accounts.txt');


    if (invalidUsername($vendorname) !== false) {
        header("location: ../vendor_register.php?error=invalidUsername");
        exit();
    }
    if (vpasswordMatch($vpassword, $cpassword) !== false) {
        header("location: ../vendor_register.php?error=passwordnotmatch");
        exit();
    }
    if (vusernameExists($vendorname) !== false) {  
        header("location: ../vendor_register.php?error=usernameexists");
        exit();
    }
    if (checkVendornameUppercase($vendorname) !== false) {  
        header("location: ../vendor_register.php?error=vnamenouppercase");
        exit();
    }
    if (checkVendornameLowercase($vendorname) !== false) {  
        header("location: ../vendor_register.php?error=vnamenolowercase");
        exit();
    }
    if (checkVendorPasswordLowercase($vpassword) !== false) {  
        header("location: ../vendor_register.php?error=vpassnolowercase");
        exit();
    }
    if (checkVendorPasswordUppercase($vpassword) !== false) {  
        header("location: ../vendor_register.php?error=vpassnouppercase");
        exit();
    }
    if (checkVendorPasswordSpecialCharacter($vpassword) !== false) {  
        header("location: ../vendor_register.php?error=vpassnospecialchar");
        exit();
    }
    if (checkBusinessAddress($businessaddress) !== false) {  
        header("location: ../vendor_register.php?error=invalidbaddress");
        exit();
    }
    if (checkVendorPasswordNumber($vpassword) !== false) {  
        header("location: ../vendor_register.php?error=vpassnonum");
        exit();
    }
    if (checkVendorPasswordLength($vpassword) !== false) {  
        header("location: ../vendor_register.php?error=invalidvpasslength");
        exit();
    }
    createVendor($vfile, $vendorname, $businessname, $businessaddress, $vpassword);
        header("location: ../vendor_register.php?error=none");
      
}
else{
    header("location: ../vendor_register.php");
}
?>

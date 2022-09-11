<?php
function invalidUsername($username) {
    $result;
    if (!preg_match('/^[a-zA-Z0-9]{8,15}$/', $username)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkAddressLength($address) {
    $result;
    if (strlen($password) < 5) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function checkUsernameUppercase($username) {
    $result;
    if (!preg_match("/[A-Z]/", $username)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkUsernameLowercase($username) {
    $result;
    if (!preg_match("/[a-z]/", $username)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}


function checkPasswordLength($password) {
    $result;
    if (strlen($password) < 8 || strlen($password) > 20) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function checkPasswordUppercase($password) {
    $result;
    if (!preg_match("/[A-Z]/", $password)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkPasswordLowercase($password) {
    $result;
    if (!preg_match("/[a-z]/", $password)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkSpecialCharacter($password) {
    $result;
    if (!preg_match("/\W/", $password)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkPasswordNumber($password) {
    $result;
    if (!preg_match("/\d/", $password)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function passwordMatch($password, $cpassword) {
    $result;
    if ($password !== $cpassword) {
        $result = true;
        
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($username) {
    $result;
    if (isset($_POST['submit'])) {
        $userInput = $_POST['username'];
        $accountList = file('user_accounts.txt');
        $result = false;
        foreach ($accountList as $user) {
        $userDetails = explode('|', $user);
            if ($userDetails[0] == $userInput ) {
                $result = true;
                break;
        }
        else {
            $result = false;
        }      
    }
    return $result;
}
}

function createUser($file, $name, $username, $address, $password) {
    $user_input = $_POST['username'];
    $password_input = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $userlist = file ('user_accounts.txt');
    $userlist2 = file ('accounts.db');
    $file = fopen("user_accounts.txt", "a");
    $mainfile = fopen("accounts.db", "a");
    $text = $user_input . "|" . $password . "|" . $name . "|" . $address . "|" . "\n";
    fwrite($file, $text . "\n");
    fclose($file);
    fwrite($mainfile, $text . "\n");
    fclose($mainfile);
}


function loginUser($username, $password) {
    $result;
    if (isset($_POST['submit'])) {
        $userInput = $_POST['username']; 
        $password_input = $_POST['password'];
        $accountList = file('user_accounts.txt');
        $result = false;
        foreach ($accountList as $user) {
        $userDetails = explode('|', $user);
            if ($userDetails[0] == $userInput && $userDetails[1] == $password) {
                $result = true;
                session_start();
                $_SESSION["username"] = $userDetails[0];
                $_SESSION["password"] = $userDetails[1];
                $_SESSION["name"] = $userDetails[2];
                $_SESSION["address"] = $userDetails[3];         
                break;
            }
            else {
                $result = false;
            }      
        }
        return $result;
    }

}


//vendors//
function invalidVendorname($vendorname) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]{8,15}*$/", $vendorname)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkVendornameUppercase($vendorname) {
    $result;
    if (!preg_match("/[A-Z]/", $vendorname)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkVendornameLowercase($vendorname) {
    $result;
    if (!preg_match("/[a-z]/", $vendorname)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkVendorPasswordUppercase($vpassword) {
    $result;
    if (!preg_match("/[A-Z]/", $vpassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkVendorPasswordLowercase($vpassword) {
    $result;
    if (!preg_match("/[a-z]/", $vpassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkVendorPasswordSpecialCharacter($vpassword) {
    $result;
    if (!preg_match("/\W/", $vpassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkVendorPasswordLength($vpassword) {
    $result;
    if (strlen($vpassword) < 8 || strlen($vpassword) > 20) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function checkVendorPasswordNumber($vpassword) {
    $result;
    if (!preg_match("/\d/", $vpassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkBusinessAddress($businessaddress) {
    $result;
    if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $businessaddress)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function createVendor( $vfile, $vendorname, $businessname, $businessaddress, $vpassword) {
    $vendor_input = $_POST['vendorname'];
    $vpassword_input = $_POST['vpassword'];
    $businessname = $_POST['businessname'];
    $businessaddress = $_POST['businessaddress'];
    $vendorlist = file ('vendor_accounts.txt');
    $userlist2 = file ('accounts.db');
    $vfile = fopen("vendor_accounts.txt", "a");
    $mainfile = fopen("accounts.db", "a");
    $text = $vendor_input . "|" . $vpassword_input . "|" . $businessname . "|" . $businessaddress ."\n";
    fwrite($vfile, $text . "\n");
    fclose($vfile);
    fwrite($mainfile, $text . "\n");
    fclose($mainfile);
}

function loginVendor($vendorname, $vpassword) {
    $result;
    if (isset($_POST['submit'])) {
        $vendorInput = $_POST['username'];
        $vpassword_input = $_POST['password'];
        $vendorList = file('vendor_accounts.txt');
        $result = false;
        foreach ($vendorList as $user) {
        $vendorDetails = explode('|', $user);
            if ($vendorDetails[0] == $vendorInput && $vendorDetails[1] == $vpassword_input ) {
                $result = true;
                session_start();
                $_SESSION["vendorname"] = $vendorDetails[0];
                $_SESSION["password"] = $vendorDetails[1];
                $_SESSION["businessname"] = $vendorDetails[2];
                $_SESSION["businessaddress"] = $vendorDetails[3];
                break;
            }
            else {
                $result = false;
            }      
        }
        return $result;
    }

}

function vpasswordMatch($vpassword, $cpassword) {
    $result;
    if ($vpassword !== $cpassword) {
        $result = true;
        
    }
    else {
        $result = false;
    }
    return $result;
}


function vusernameExists($vendorname) {
    $result;
    if (isset($_POST['submit'])) {
        $vendorInput = $_POST['vendorname'];
        $vendorList = file('vendor_accounts.txt');
        $result = false;
        foreach ($vendorList as $user) {
        $vendorDetails = explode('|', $user);
            if ($vendorDetails[0] == $vendorInput ) {
                $result = true;
                break;
        }
        else {
            $result = false;
        }      
    }
    return $result;
}
}



//shipper//

function invalidShippername($shippername) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]{8,15}*$/", $shippername)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkShippernameUppercase($shippername) {
    $result;
    if (!preg_match("/[A-Z]/", $shippername)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkShippernameLowercase($shippername) {
    $result;
    if (!preg_match("/[a-z]/", $shippername)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkShipperPasswordUppercase($spassword) {
    $result;
    if (!preg_match("/[A-Z]/", $spassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkShipperPasswordLowercase($spassword) {
    $result;
    if (!preg_match("/[a-z]/", $spassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}

function checkShipperPasswordSpecialCharacter($spassword) {
    $result;
    if (!preg_match("/\W/", $spassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;
}

function checkShipperPasswordLength($spassword) {
    $result;
    if (strlen($spassword) < 8 || strlen($spassword) > 20) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function checkShipperPasswordNumber($spassword) {
    $result;
    if (!preg_match("/\d/", $spassword)) {
        $result = true; 
    }
    else {
        $result = false;
    }
    return $result;

}



function createShipper( $sfile, $shippername, $spassword, $hub) {
    $shipper_input = $_POST['shippername'];
    $spassword_input = $_POST['spassword'];
    $hub = $_POST['distribution_hub'];
    $shipperlist = file ('ship_accounts.txt');
    $userlist2 = file ('accounts.db');
    $sfile = fopen("ship_accounts.txt", "a");
    $mainfile = fopen("accounts.db", "a");
    $text = $shipper_input . "|" . $spassword_input . "|" . $hub . "|" ."\n";
    fwrite($sfile, $text . "\n");
    fclose($sfile);
    fwrite($mainfile, $text . "\n");
    fclose($mainfile);
}

function loginShipper($shippername, $spassword) {
    $result;
    if (isset($_POST['submit'])) {
        $shipperInput = $_POST['username'];
        $spassword_input = $_POST['password'];
        $shipperList = file('ship_accounts.txt');
        $result = false;
        foreach ($shipperList as $user) {
        $shipperDetails = explode('|', $user);
            if ($shipperDetails[0] == $shipperInput && $shipperDetails[1] == $spassword_input ) {
                $result = true;
                session_start();
                $_SESSION["shippername"] = $shipperDetails[0];
                $_SESSION["password"] = $shipperDetails[1];
                $_SESSION["distribution_hub"] = $shipperDetails[2];
                break;
            }
            else {
                $result = false;
            }      
        }
        return $result;
    }

}

function shipperPasswordMatch($spassword, $cpassword) {
    $result;
    if ($spassword !== $cpassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function shippernameExists($shippername) {
    $result;
    if (isset($_POST['submit'])) {
        $shipperInput = $_POST['shippername'];
        $shipperList = file('ship_accounts.txt');
        $result = false;
        foreach ($shipperList as $user) {
        $shipperDetails = explode('|', $user);
            if ($shipperDetails[0] == $shipperInput) {
                $result = true;
                break;
        }
        else {
            $result = false;
        }      
    }
    return $result;
}
}


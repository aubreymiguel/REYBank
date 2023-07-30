<?php

session_start();

class Users extends Database {

    protected $accNum;
    protected $accPin;
    protected $Fname;
    protected $Mname;
    protected $Lname;
    private $bDay;
    private $gender;
    private $civil_status;
    private $citizenship;
    protected $mobileNum;
    protected $uEmail;
    protected $uPass;
    protected $uName;
    private $houseNo;
    private $street;
    private $brgy;
    private $city;
    private $zip;
    protected $val_id_1;
    protected $val_id_2;
    protected $brName;
    protected $uStatus;
    protected $uType;
    protected $uReject;
    protected $uActivity;


    protected function setAccount($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $val_id_2, $brName)
    {
        
        $this->Fname = $Fname;
        $this->Mname = $Mname;
        $this->Lname = $Lname;
        $this->bDay = $bDay;
        $this->gender = $gender;
        $this->civil_status = $civil_status;
        $this->citizenship = $citizenship;
        $this->mobileNum = $mobileNum;
        $this->uEmail = $uEmail;
        $this->uPass = $uPass;
        $this->uName = $uName;
        $this->houseNo = $houseNo;
        $this->street = $street;
        $this->brgy = $brgy;
        $this->city = $city;
        $this->zip = $zip;
        $this->val_id_1 = $val_id_1;
        $this->val_id_2 = $val_id_2;
        $this->brName = $brName;

        if (isset($_POST['uName'])) {

            $Fname = $_POST['uFname'];
            $Mname = $_POST['uMname'];
            $Lname = $_POST['uLast'];
            $bDay = $_POST['uBday'];
            $gender = $_POST['uGndr'];
            $civil_status = $_POST['uCvl_Stat'];
            $citizenship = $_POST['uCtzn'];
            $uName = $_POST['uName'];
            $mobileNum = $_POST['uMob'];
            $uEmail = $_POST['uEma'];
            $uPass = $_POST['uPass'];
            $c_uPass = $_POST['c_uPass'];
    
            $houseNo = $_POST['uHouseNo'];
            $street = $_POST['uStreet'];
            $brgy = $_POST['uBrgy'];
            $city = $_POST['uCity'];
            $zip = $_POST['uZip'];
            
            $brName = $_POST['uBranch'];
    
            $uStatus1 = "Not yet verified" ;
    
            $val_id_1 = $_FILES['uVal_id_1']['name'];
            $val_id_1_tmp = $_FILES['uVal_id_1']['tmp_name'];
            $val_id_1_size = $_FILES['uVal_id_1']['size'];
            $val_id_1_error = $_FILES['uVal_id_1']['error'];
            $val_id_1_type = $_FILES['uVal_id_1']['type'];
    
            // $val_id_2 = $_FILES['uVal_id_2']['name'];
            // $val_id_2_tmp = $_FILES['uVal_id_2']['tmp_name'];
    
            // $data = [$val_id_1, $val_id_2];
    
            $valid1Ext = explode('.', $val_id_1);
            $validActualExt = strtolower(end($valid1Ext));
            // $valid2 = implode($val_id_2);

            // $data = [$valid1, $valid2];
            // $dataActualExt = strtolower(end($data));

            $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'gif');

            if (in_array($validActualExt, $allowed)) {
                if ($val_id_1_error === 0) {
                    if ($val_id_1_size < 1000000) {

                        $val_id_1_New = uniqid('', true) . "." . $validActualExt;
                        $fileDestination = 'assets/valid_id/' . $val_id_1_New;

                        move_uploaded_file($val_id_1_tmp, $fileDestination);

                    } else {
                        header("Location: register.php?error_size= Valid ID: Your file is too big!");
                    }

                } else {

                    header("Location: register.php?error_upload= There was an error uploading your valid ID!");
                }

            } else {

                header("Location: register.php?error_type= Valid ID: You cannot upload files of this type!");
            }

            // $fileDestination1 = 'assets/valid_id/' . $val_id_1;
       
            // move_uploaded_file($val_id_1_tmp, $fileDestination1);

            $conn = $this->connect();
            
            $checkCred_uName = "SELECT * FROM users_tb WHERE uName = '$uName'";
            $checkCred_uEma = "SELECT * FROM users_tb WHERE  uEma = '$uEmail'";
    
            $resCred_uName = $conn->query($checkCred_uName);
            $resCred_uEma = $conn->query($checkCred_uEma);
    
            if ($resCred_uName->num_rows > 0 && $resCred_uEma->num_rows > 0) {
    
                header("Location: register.php?uCred_error= Username and Email are already taken!");

            } else if ($resCred_uName->num_rows > 0 ) {

               header("Location: register.php?uName_error= Username that you have entered is already exist!");
               exit();
       
            } else if ($resCred_uEma->num_rows > 0) {

               header("Location: register.php?uEma_error= Email that you have entered is already exist!");
               exit();
            }   
            
            
            if ($uPass != $c_uPass) {
    
                header("Location: register.php?error_pass= Password and Confirm Password do not match!");

                 if ($uPass < 8) {

                    header("Location: register.php?error_uPassLength= Password must be at least 8 characters long!");
                
                }

            }
            
            // if ($mobileNum != 11) {

            //     header("Location: register.php?error_mob= Mobile number must have 11 digits only!");
            // }
                
            else {
    
                $sql = mysqli_query($conn, "INSERT INTO users_tb (uFname, uMname, uLast, uBday, uGndr, uCvl_Stat, uCtzn, uMob, uEma, uPass, uName, uHouseNo, uStreet, uBrgy, uCity, uZip, uVal_id_1, uBranch, uStatus, uType, uReject, uActivity) 
                        VALUES ('$Fname', '$Mname', '$Lname', '$bDay', '$gender', '$civil_status', '$citizenship', '$mobileNum', '$uEmail', '$uPass', '$uName', '$houseNo', '$street', '$brgy', '$city', '$zip', '$val_id_1_New', '$brName', '$uStatus1', '1', '0', ' ')");
               

    
                if($sql == TRUE) {
    
                    header("Location: register.php?message=Wait for the approval of your account.");
                }
                
                else if($sql == FALSE){
    
                    header("Location: register.php?error=Sorry, there was an error sending your message. Please try again later.");
                }
    
        
            }
    
    
    
        }
    
    }


    protected function checkLogin($uName, $uPass)
    {
        session_start();

        $this->uName = $uName;
        $this->uPass = $uPass;

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            if(isset($_POST['uName'])) {
                $uName = $_POST['uName'];
                $uPass = $_POST['uPass'];
    
            } else {
                $uName = $_SESSION['uName'];
                $uPass = $_SESSION['uPass'];
    
            }

            
    
            $sql = "SELECT * FROM users_tb WHERE uName = '$uName' AND uPass = '$uPass'";
            $conn = $this->connect();
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
    
            if ($result->num_rows == 0) {
                header("Location: login.php?error_login= Invalid Username or Password!");
                
            } else if ($row['uReject'] == '1') {
                
                header("Location: login.php?error_application= Your application was rejected because you did not meet the important requirements!");
            
            
            } else {
       
    
                if (isset($_POST['uName'])) {

    
                    $_SESSION['uType'] = $row['uType'];
                    $_SESSION['uID'] = $row['uID'];
                    $_SESSION['uBranch'] = $row['uBranch'];
                    
    
                    $uID = $_SESSION['uID'];
                    $logIN = date("Y-m-d H:i:s");
                    
                    if ($row['uStatus'] == 'Not yet verified') {

                        header("Location: login.php?not_ver= You can't log in at this time. Wait for the approval of your account.");

                        
                    } else if ($row['uActivity'] == 0) {

                        header("Location: login.php?deact_id= Your account is currently deactivated!");
                    }

                    else {
    
                    $aub = $conn->query("INSERT INTO log_tb (uID, logIN, logOUT) VALUE ('$uID', '$logIN', '')");
    
                   
                    echo '<script type="text/javascript"> window.location="enter.php"; </script>';
    
                    if ($aub === FALSE) {
                    echo "Error: " . $aub . "<br>" . $conn->error;
    
                    }
    
                    }
                }

            
                $_SESSION['uName'] = $row['uName'];
                $_SESSION['uID'] = $row['uID'];
                $_SESSION['uPass'] = $row['uPass'];
                $_SESSION['uType'] = $row['uType'];
                $_SESSION['uFname']= $row['uFname'];
                $_SESSION['uMname']= $row['uMname'];
                $_SESSION['uLast']= $row['uLast'];
                $_SESSION['uBranch'] = $row['uBranch'];
        
        
            }
        }

    }

    protected function logout()
    {
    

        $uID = $_SESSION['uID'];
        $logOUT = date("Y-m-d H:i:s");

        $conn = $this->connect();

        $brey = $conn->query("UPDATE log_tb SET logOUT = '$logOUT' WHERE uID = '$uID'");

        if ($brey === FALSE) {
            echo "Error: " . "<br>" . $conn->error;
        }

        session_destroy();
        header("Location: index.php");

        
    }


    protected function uhome()
    {

        if ($_SESSION['uType'] == '3') {

            return ('ahome.php');
        }

        if ($_SESSION['uType'] == '2') {

            return ('report.php');
        }

        if ($_SESSION['uType'] == '1') {

            return ('chome.php');

        }

    }



    protected function countPenAcc()
    {

        $sql = "SELECT COUNT(uID) as totalPenCli FROM users_tb WHERE uType = '1' AND uStatus = 'Not yet verified' AND uReject = '0'";
        $conn = $this->connect();

        $result = $conn->query($sql);

        if ($row = $result->fetch_assoc()) {

            echo $row['totalPenCli'];
        }


    }

    protected function countTeller()
    {

        $sql = "SELECT COUNT(uID) as totalTeller FROM users_tb WHERE uType = '2'";
        $conn = $this->connect();

        $result = $conn->query($sql);

        if ($row = $result->fetch_assoc()) {

            echo $row['totalTeller'];
        }


    }

    protected function countClients()
    {

        $sql = "SELECT COUNT(uID) as totalCli FROM users_tb WHERE uType = '1' AND uStatus = 'Verified' AND uReject = '2'";
        $conn = $this->connect();

        $result = $conn->query($sql);

        if ($row = $result->fetch_assoc()) {

            echo $row['totalCli'];
        }


    }
    
    protected function adeta()
    {
        $uID = $_SESSION['uID'];
       

        $sql = "SELECT * FROM users_tb WHERE uID = '$uID'";
        $conn = $this->connect();
        $result = $conn->query($sql);
        
        $row = $result->fetch_assoc();

        $_SESSION['uName'] = $row['uName'];
        $_SESSION['uFname'] = $row['uFname'];
        $_SESSION['uEma'] = $row['uEma'];
        $_SESSION['uMob'] = $row['uMob'];
        $_SESSION['uHouseNo'] = $row['uHouseNo'];
        $_SESSION['uStreet'] = $row['uStreet'];
        $_SESSION['uBrgy'] = $row['uBrgy'];
        $_SESSION['uCity'] = $row['uCity'];
        $_SESSION['uZip'] = $row['uZip'];
        $_SESSION['uBranch'] = $row['uBranch'];
        
       return ('adeta.php'); 
        

    }

    protected function add_teller($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $brName)
    {
        $this->Fname = $Fname;
        $this->Mname = $Mname;
        $this->Lname = $Lname;
        $this->bDay = $bDay;
        $this->gender = $gender;
        $this->civil_status = $civil_status;
        $this->citizenship = $citizenship;
        $this->mobileNum = $mobileNum;
        $this->uEmail = $uEmail;
        $this->uPass = $uPass;
        $this->uName = $uName;
        $this->houseNo = $houseNo;
        $this->street = $street;
        $this->brgy = $brgy;
        $this->city = $city;
        $this->zip = $zip;
        $this->val_id_1 = $val_id_1;
        $this->val_id_2 = $val_id_2;
        $this->brName = $brName;

        if (isset($_POST['uName'])) {

            $Fname = $_POST['uFname'];
            $Mname = $_POST['uMname'];
            $Lname = $_POST['uLast'];
            $bDay = $_POST['uBday'];
            $gender = $_POST['uGndr'];
            $civil_status = $_POST['uCvl_Stat'];
            $citizenship = $_POST['uCtzn'];
            $uName = $_POST['uName'];
            $mobileNum = $_POST['uMob'];
            $uEmail = $_POST['uEma'];
            $uPass = $_POST['uPass'];
            $c_uPass = $_POST['c_uPass'];
    
            $houseNo = $_POST['uHouseNo'];
            $street = $_POST['uStreet'];
            $brgy = $_POST['uBrgy'];
            $city = $_POST['uCity'];
            $zip = $_POST['uZip'];
            $uBranch = $_POST['uBranch'];
            $uType = $_POST['uType'];
    
            $uStatus1 = "Verified" ;

            
    
            $checkCred_uName = "SELECT * FROM users_tb WHERE uName = '$uName'";
            $checkCred_uEma = "SELECT * FROM users_tb WHERE  uEma = '$uEmail'";
            
            $conn = $this->connect();

            $resCred_uName = $conn->query($checkCred_uName);
            $resCred_uEma = $conn->query($checkCred_uEma);
    
            if ($resCred_uName->num_rows > 0 && $resCred_uEma->num_rows > 0) {
    
                header("Location: add.php?uCred_error= Username and Email are already taken!");
    
                
            } else if ($resCred_uName->num_rows > 0 ) {
    
                header("Location: add.php?uName_error= Username that you have entered is already exist!");
    
            
            } else if ($resCred_uEma->num_rows > 0) {
    
                header("Location: add.php?uEma_error= Email that you have entered is already exist!");
    
            }
            
            
            if ($uPass != $c_uPass) {
    
                header("Location: add.php?error_pass= Password and Confirm password not matched!");
            }
                
            else { 
    
                $sql = "INSERT INTO users_tb (uFname, uMname, uLast, uBday, uGndr, uCvl_Stat, uCtzn, uMob, uEma, uPass, uName, uHouseNo, uStreet, uBrgy, uCity, uZip, uVal_id_1, uBranch, uStatus, uType, uReject, uActivity) 
                        VALUES ('$Fname', '$Mname', '$Lname', '$bDay', '$gender', '$civil_status', '$citizenship', '$mobileNum', '$uEmail', '$uPass', '$uName', '$houseNo', '$street', '$brgy', '$city', '$zip', ' ', '$uBranch', '$uStatus1', '$uType', '2', '1')";
               
                $result = $conn->query($sql);
    
            
    
                if($result == TRUE) {
    
                    header("Location: add.php?message=You have been successfully added new User!");
                }
                
                else if($result == FALSE){
    
                    header("Location: add.php?error=Sorry, there was an error sending your message. Please try again later.");
                }
     
            }
    
        }
    
    }


    protected function cdeta()
    {

       
    }



}

<?php

session_start();
include_once 'classes/Database.class.php';

class UserDetails extends Database {

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
    

    


    public function createAccount()
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

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


            if ($uPass != $c_uPass) {

                header("Location: register.php?error_pass= Confirm password not matched!");
            }

            $hash_Pass = password_hash($c_uPass, PASSWORD_DEFAULT);

            $houseNo = $_POST['uHouseNo'];
            $street = $_POST['uStreet'];
            $brgy = $_POST['uBrgy'];
            $city = $_POST['uCity'];
            $zip = $_POST['uZip'];
            
            $brName = $_POST['uBranch'];

            $uStatus1 = "Not yet verified" ;

            $location1 = "valid_id/". $val_id_1;
            $location2 = "valid_id/". $val_id_2;

            $val_id_1 = $_FILES['uVal_id_1']['name'];
            $val_id_1_tmp = $_FILES['uVal_id_1']['tmp_name'];

            $val_id_2 = $_FILES['uVal_id_2']['name'];
            $val_id_2_tmp = $_FILES['uVal_id_2']['tmp_name'];

            $data = [$val_id_1, $val_id_2];

            $valids = implode(' , ', $data);
            
            $checkCred_uName = "SELECT * FROM users_tb WHERE uName = '$uName'";
            $checkCred_uEma = "SELECT * FROM users_tb WHERE  uEma = '$uEmail'";

            $conn = $this->connect();

            $resCred_uName = mysqli_query($conn, $checkCred_uName);
            $resCred_uEma = mysqli_query($conn, $checkCred_uEma);
   
          

            if (mysqli_num_rows($resCred_uName) > 0 && mysqli_num_rows($resCred_uEma) > 0) {

                header("Location: register.php?uCred_error= Username and Email are already taken!");

    
                
                if (mysqli_num_rows($resCred_uName) > 0 ) {

                    header("Location: register.php?uName_error= Username that you have entered is already exist!");

            
                } else if (mysqli_num_rows($resCred_uEma) > 0) {

                    header("Location: register.php?uEma_error= Email that you have entered is already exist!");

                }

            } else if ($uPass != $c_uPass) {

                header("Location: register.php?error_pass= Confirm password not matched!");
            
            } else {
    
                $conn = $this->connect();

                $sql = mysqli_query($conn, "INSERT INTO users_tb (uFname, uMname, uLast, uBday, uGndr, uCvl_Stat, uCtzn, uMob, uEma, uPass, uName, uHouseNo, uStreet, uBrgy, uCity, uZip, uVal_id_front_back, uBranch, uStatus, uType, uReject, uActivity) 
                        VALUES ('$Fname', '$Mname', '$Lname', '$bDay', '$gender', '$civil_status', '$citizenship', '$mobileNum', '$uEmail', '$hash_Pass', '$uName', '$houseNo', '$street', '$brgy', '$city', '$zip', '$valids', '$brName', '$uStatus1', '1', ' ', ' ')");

                
                $res = mysqli_query($sql);

                if ($res) {

                    move_uploaded_file($val_id_1_tmp, $location1);
                    move_uploaded_file($val_id_2_tmp, $location2);

                }

                if($sql == TRUE) {

                    header("Location: register.php?message=Wait for the approval of your account. We will send you a mail with your account number and PIN.");
                }
                
                else if($sql == FALSE){

                    header("Location: register.php?error=Sorry, there was an error sending your message. Please try again later.");
                }

        
            }
             
        }
    }


    public function login()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // if (isset($_POST['uName'])) {
                $uName = $_POST['uName'];
                $uPass = $_POST['uPass'];
            // }
            // else {
            //     $uName = $_SESSION['sesuName'];
            //     $uPass = $_SESSION['sesuPass'];
            // }

            $sql = "SELECT * FROM users_tb WHERE uName='$uName' AND uPass='$uPass'";
            $conn = $this->connect();

            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                header("Location: register.php?error_login= Invalid Username or Password!");
            }
            else {

                if (isset($_POST['uName'])) {

                    $row = $result->fetch_assoc();

                    $uID = $row['uID'];
                    $logIN = date("Y-m-d H:i:s");
    
                    $aub = $conn->query("INSERT INTO log_tb (uID, logIN) VALUE ('$uID', '$logIN')");
    
                        header("Location: enter_home.php");
                if ($aub === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
    
                }
            
            }

            }
        
        }

        
          
           
     
    }
}



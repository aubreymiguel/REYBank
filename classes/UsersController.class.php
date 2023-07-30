<?php 


class UsersController extends Users {

    public function createAccount($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $val_id_2, $brName)
    {
        $this->setAccount($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $val_id_2, $brName);

    }

    public function createTellerAcc($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $brName)
    {
        $this->add_teller($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $brName);
 
    }

    public function login($uName, $uPass)
    {

        $this->checkLogin($uName, $uPass);

    }


    public function nowLogout()
    {

        $this->logout();
    }

    public function activation() {

        $conn = $this->connect();

        $sql = "SELECT * FROM users_tb WHERE uType = '2'";
        $result = mysqli_query($conn,$sql);

        if (isset($_GET['activate_id'])) {

            $act_id = $_GET['activate_id'];

            $query = "SELECT * FROM users_tb WHERE uID = '$act_id' AND uType = '2'";
            $result = mysqli_query($conn,$query);

                if (mysqli_num_rows($result) > 0) {

                    $data = mysqli_fetch_assoc($result);

                    $activateID = $data['uID'];

                    $aub = "UPDATE users_tb SET uActivity = '1' WHERE uID = '$activateID'";

                    if ($conn->query($aub) === FALSE) {
                        echo "Error: " . $aub . "<br>" . $conn->error;
                    }

                    if ($conn->query($aub) === TRUE) {
                        echo '<script type="text/javascript"> window.location="ad_users.php"; </script>';
                    }
                }

        }

        if (isset($_GET['deactivate_id'])) {

            $deact_id = $_GET['deactivate_id'];

            $query = "SELECT * FROM users_tb WHERE uID = '$deact_id' AND uType = '2'";
            $result = mysqli_query($conn,$query);

            
            if (mysqli_num_rows($result) > 0) {

                $data = mysqli_fetch_assoc($result);

                $deactivateID = $data['uID'];

                $mars = "UPDATE users_tb SET uActivity = '0' WHERE uID = '$deactivateID'";


                if ($conn->query($mars) === FALSE) {
                    echo "Error: " . $mars . "<br>" . $conn->error;
                }

                if ($conn->query($mars) === TRUE) {
                    echo '<script type="text/javascript"> window.location="ad_users.php"; </script>';
                }

            }
        }
    }

    
    public function pendingCli()
    {

        $conn = $this->connect();

        $sql = "SELECT * FROM users_tb WHERE uType = '1' AND uStatus = 'Not yet verified' AND uReject = '0'";
        $result = mysqli_query($conn,$sql);

        
        if (isset($_GET['reject_id'])) {

            $rjc_id = $_GET['reject_id'];

            $query = "SELECT * FROM users_tb WHERE uID = '$rjc_id' AND uType = '1' AND uStatus = 'Not yet verified' AND uReject = '0'";
            $result = mysqli_query($conn,$query);

                if (mysqli_num_rows($result) > 0) {

                    $data = mysqli_fetch_assoc($result);

                    $rejectID = $data['uID'];

                    $aub = "UPDATE users_tb SET uReject = '1' WHERE uID = '$rejectID'";

                    if ($conn->query($aub) === FALSE) {
                        echo "Error: " . $aub . "<br>" . $conn->error;
                    }

                    if ($conn->query($aub) === TRUE) {
                        echo '<script type="text/javascript"> window.location="ahome.php"; </script>';
                    }


                }

            }


            if (isset($_GET['verify_id'])) {

                $vrfy_id = $_GET['verify_id'];

                $query = "SELECT * FROM users_tb WHERE uID = '$vrfy_id' AND uType = '1' AND uStatus = 'Not yet verified' AND uReject = '0'";
                $result = mysqli_query($conn,$query);

                
                if (mysqli_num_rows($result) > 0) {

                    $data = mysqli_fetch_assoc($result);

                    $verifyID = $data['uID'];

                    $mars = "UPDATE users_tb SET uReject = '2', uStatus = 'Verified', uActivity = '1' WHERE uID = '$verifyID'";


                    if ($conn->query($mars) === FALSE) {
                        echo "Error: " . $mars . "<br>" . $conn->error;
                    }

                    if ($conn->query($mars) === TRUE) {
                        echo '<script type="text/javascript"> window.location="ahome.php"; </script>';
                    }

                    $permitted_chars = '0123456789';

                    $autoAcc = '00'.substr(str_shuffle($permitted_chars), 0, 10);

                    $brey = "INSERT INTO account_tb (uID, accNum, accPin, uBalance) VALUES ('$verifyID', '$autoAcc', '123456', '1000')";

                    if ($conn->query($brey) === FALSE) {
                        echo "Error: " . $brey . "<br>" . $conn->error;
                    }

                    if ($conn->query($brey) === TRUE) {
                        echo '<script type="text/javascript"> window.location="ahome.php"; </script>';
                    }

                }
            }

        return $result;

    }

}
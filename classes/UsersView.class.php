<?php 


class UsersView extends Users {

 
    public function u_home()
    {
        $this->uhome();

    }


    public function admins()
    {
        $conn = $this->connect();

        $sql = "SELECT * FROM users_tb WHERE uType = '3'";
        $result = mysqli_query($conn,$sql);


        return $result;

    }

    public function tellers()
    {
        $conn = $this->connect();

        $sql = "SELECT * FROM users_tb WHERE uType = '2'";
        $result = mysqli_query($conn,$sql);


        return $result;

    }

    public function clients()
    {
        $conn = $this->connect();

        $sql = "SELECT * FROM users_tb WHERE uType = '1' AND uStatus = 'Verified' AND uReject = '2'";
        $result = mysqli_query($conn,$sql);


        return $result;

    }

    public function count_PenAcc()
    {

        $this->countPenAcc();


    }

    public function count_Teller()
    {

        $this->countTeller();


    }

    public function count_Clients()
    {

        $this->countClients();


    }

    public function a_deta()
    {
        $this->adeta();
        
    }


    public function c_deta()
    {

        $uID = $_SESSION['uID'];
        $conn = $this->connect();
       

        $sql = "SELECT * FROM users_tb, account_tb WHERE users_tb.uID = '$uID' AND account_tb.uID = '$uID'";
        
        $result = $conn->query($sql);


        if(isset($_POST['accPin'])) {

            $changePIN = $_POST['accPin'];

                $query = "SELECT * FROM account_tb WHERE uID = '$uID'";
                $result = mysqli_query($conn,$query);

                if (mysqli_num_rows($result) > 0) {

                    $data = mysqli_fetch_assoc($result);

                    $clientID = $data['uID'];

                    $mars = "UPDATE account_tb SET accPin = '$changePIN' WHERE uID = '$clientID'";


                    if ($conn->query($mars) === FALSE) {
                        echo "Error: " . $mars . "<br>" . $conn->error;
                    }

                    if ($conn->query($mars) === TRUE) {
                        echo '<script type="text/javascript"> window.location="cdeta.php"; </script>';
                    }
                    
                }
            
        }


       return $result; 

    }

    public function cli2()
    {

        if ($_SESSION['uType'] == '1') {

            $uID = $_SESSION['uID'];

            $sql = "SELECT users_tb.uFname, users_tb.uLast, account_tb.accNum, account_tb.uBalance FROM users_tb, account_tb WHERE users_tb.uID = '$uID' AND account_tb.uID = '$uID'";
            $conn = $this->connect();
            $result = $conn->query($sql);
  

            return $result;

        }
    }

}
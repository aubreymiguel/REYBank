<?php

session_start();

class Transaction extends Database {

    protected $tType;
    protected $to_accNum;
    protected $tAmount;
    protected $tStatus;
    protected $tProcessed_by;
    protected $checkImg;
    protected $checkNum;
    protected $transactNum;
    protected $uBranch;



    protected function trans_number()
    {
        
        $trans_number = substr(str_shuffle("0123456789"), 0, 12);
        echo $trans_number;

    }

    protected function check_number()
    {

        $check_number = '00'.substr(str_shuffle("0123456789"), 0, 8);
        echo $check_number;

    }

    protected function transact($tType, $tAmount, $tProcessed_by, $checkImg, $checkNum, $transactNum, $uBranch)
    {


        $this->uID = $uID;
        $this->tType = $tType;
        $this->tAmount = $tAmount;
        $this->tProcessed_by = $tProcessed_by;
        $this->checkImg = $checkImg;
        $this->checkNum = $checkNum;
        $this->transactNum = $transactNum;
        $this->uBranch = $uBranch;

        $conn = $this->connect();

        if (isset($_POST['uID'])) {

            $_SESSION['uType'] = $_POST['uType'];
            $uID = $_POST['uID'];
            $accPin = $_POST['accPin'];
            $tType = $_POST['tType'];
            $tAmount = $_POST['tAmount'];
            $tStatus = $_POST['tStatus'];
            $transactNum = $_POST['transactNum'];

            $checkImg = $_POST['checkImg'];
            $checkNum = $_POST['checkNum'];

            $accountNum = $_SESSION['u_accNum'];
            $PIN = $_SESSION['accPin'];

            $uID = $_SESSION['uID'];

            $sess = "SELECT * FROM users_tb";
            $extra = $conn->query($sess);
            $extra2 = $extra->fetch_assoc();

            $uBranch = $extra2['uBranch'];


            $sql = "SELECT * FROM account_tb WHERE accPin = '$accPin' AND uID = '$uID'";
            $result = $conn->query($sql);
            

            $row = $result->fetch_assoc();

            $u_accNum = $row['accNum'];

            if ($accPin == '123456') {

                header("Location: ?error_withdraw= You can't make transaction. Change your PIN immediately.");
            
            } else if ($accPin != $row['accPin']) {


                header("Location: ?error_PIN= Invalid PIN!");
                
            }

            else {

                $sql = $conn->query("INSERT INTO transaction_tb (uID, tType, u_accNum, tAmount, r_accNum, tStatus, tProcessed_by, check_num, transactNum, uBranch)
                    VALUES ('$uID ', '$tType', '$u_accNum', '$tAmount', '$recNum', '$tStatus', ' ', ' ', '$transactNum', '$uBranch')");
                

                if ($sql === TRUE) {

                    header("Location: receipt.php");
                }

                else if ($sql === FALSE) {

                    header("Location: ?wrong_message= Sorry, there was an error on your transaction. Please try again later.");
                }

                
            }

            

        }

    }

    protected function deposit_check()
    {

        $conn = $this->connect();

        if (isset($_POST['uID'])) {

            $_SESSION['uType'] = $_POST['uType'];

            $check_num = $_POST['check_num'];
            $r_accNum = $_POST['r_accNum'];
            $tType = $_POST['tType'];
            $tAmount = $_POST['tAmount'];
            $tStatus = $_POST['tStatus'];
            $transactNum = $_POST['transactNum'];

            $sess = "SELECT * FROM users_tb";
            $extra = $conn->query($sess);
            $extra2 = $extra->fetch_assoc();

            $uBranch = $extra2['uBranch'];

            $sql = "SELECT * FROM account_tb WHERE accNum = '$r_accNum'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if ($result->num_rows == 0) {
                
                header("Location: ?error_receiver_ACCNUM= Receiver's Account Number do not match our records!");
                
            }

            else {

                $uID = $_POST['uID'];

                $mars = "SELECT * FROM account_tb WHERE uID = '$uID'";
                $result = $conn->query($mars);
                $row = $result->fetch_assoc();

                $u_accNum = $row['accNum'];


                $aub = $conn->query("INSERT INTO transaction_tb (uID, tType, u_accNum, tAmount, r_accNum, tStatus, tProcessed_by, check_num, transactNum, uBranch)
                    VALUES ('$uID ', '$tType', '$u_accNum', '$tAmount', '$r_accNum', '$tStatus', ' ', '$check_num', '$transactNum', '$uBranch')");


                if ($aub === TRUE) {
                    
                    header("Location: receipt.php");

                }

                else if ($aub === FALSE) {

                    header("Location: ?wrong_message= Sorry, there was an error on your transaction. Please try again later.");
                }

            }
      
            
        }


    }

    protected function transfer()
    {

        $conn = $this->connect();

        if (isset($_POST['uID'])) {

            $_SESSION['uType'] = $_POST['uType'];
            $r_accNum = $_POST['r_accNum'];
            $tType = $_POST['tType'];
            $tAmount = $_POST['tAmount'];
            $tStatus = $_POST['tStatus'];
            $transactNum = $_POST['transactNum'];

            $sess = "SELECT * FROM users_tb";
            $extra = $conn->query($sess);
            $extra2 = $extra->fetch_assoc();

            $uBranch = $extra2['uBranch'];

            $sql = "SELECT * FROM account_tb WHERE accNum = '$r_accNum'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if ($result->num_rows == 0) {
                header("Location: ?error_receiver_ACCNUM= Receiver's Account Number do not match our records!");
                
            }

            else {

                $rec_Bal = $row['uBalance'];
                $new_Bal = $rec_Bal + $tAmount;
                
                $sql = $conn->query("UPDATE account_tb SET uBalance = '$new_Bal' WHERE accNum = '$r_accNum'");

               
                $uID = $_POST['uID'];
                $transactNum = $_POST['transactNum'];

                $mars = "SELECT * FROM account_tb WHERE uID = '$uID'";
                $result = $conn->query($mars);
                $row = $result->fetch_assoc();

                $bal = $row['uBalance'];

                if ($tAmount > $row['uBalance']) {

                    header("Location: ?not_enough= Insufficient Balance!");
                }

                else if ($bal == 1000) {

                    if ($tAmount < $bal) {

                        header("Location: ?not_enough= Insufficient Balance!");
                    }

                }
               

                else {

                    $send_Bal = $row['uBalance'];
                    $u_accNum = $row['accNum'];
                    $send_new_Bal = $send_Bal - $tAmount;


                    $brey = $conn->query("UPDATE account_tb SET uBalance = '$send_new_Bal' WHERE uID = '$uID'");

                    $aub = $conn->query("INSERT INTO transaction_tb (uID, tType, u_accNum, tAmount, r_accNum, tStatus, tProcessed_by, check_num, transactNum, uBranch)
                        VALUES ('$uID ', '$tType', '$u_accNum', '$tAmount', '$r_accNum', '$tStatus', ' ', ' ', '$transactNum', '$uBranch')");


                    if ($aub === TRUE) {
                        
                        header("Location: chome.php?success_trans= Transferred Fund Successfully!");

                    }

                }
                

                
            }
        }



    }


    protected function trans_receipt()
    {

        if ($_SESSION['uType'] == '1') {

            $uID = $_SESSION['uID'];
            $conn = $this->connect();
            

            $result = mysqli_query($conn, "SELECT * FROM transaction_tb WHERE uID = '$uID' ORDER BY tCtr DESC");

            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();

                $_SESSION['tCtr'] = $row['tCtr'];
                $_SESSION['uID'] = $row['uID'];
                $_SESSION['u_accNum'] = $row['u_accNum'];
                $_SESSION['tAmount'] = $row['tAmount'];
                $_SESSION['r_accNum'] = $row['r_accNum'];
                $_SESSION['check_num'] = $row['check_num'];
                $_SESSION['transactNum'] = $row['transactNum']; 
                $_SESSION['tType'] = $row['tType']; 
                $_SESSION['checkImg'] = $row['checkImg'];
                $_SESSION['checkNum'] = $row['checkNum'];
                $_SESSION['tDate'] = $row['tDate'];
                $_SESSION['uBranch'] = $row['uBranch'];
                
            }
        }

        


    }

    

    // protected function trans_pending()
    // {
    //     if ($_SESSION['uType'] == '1') {

    //         $uID = $_SESSION['uID'];
    //         $conn = $this->connect();

    //         $sql =  "SELECT * FROM transaction_tb WHERE uID ='$uID' AND tStatus = 'Pending'";
    //         $pending = mysqli_query($conn,$sql);

    //         return $pending;

    //     }

    // }

    protected function cHistory()
    {

        $conn = $this->connect();
        $uID    = $_SESSION['uID'];
        
        $sql = "SELECT * FROM transaction_tb WHERE uID ='$uID' AND tStatus != 'Pending' ORDER BY tDate DESC";
        
        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row > 0){
            while($row = $result->fetch_assoc()){
        
                $data[] = $row;
            }
            return $data;
        }

        
    }

    protected function aReport()
    {

        $conn = $this->connect();
        
        $sql = "SELECT * FROM transaction_tb ORDER BY tDate DESC";
        
        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row > 0){
            while($row = $result->fetch_assoc()){
        
                $data[] = $row;
            }
            return $data;
        }

        
    }

    protected function tReport()
    {

        $conn = $this->connect();

        $uID = $_SESSION['uID'];
        
        $sql = "SELECT * FROM users_tb, transaction_tb WHERE transaction_tb.tProcessed_by = '$uID' AND users_tb.uID = transaction_tb.uID ORDER BY tDate DESC";
        
        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row > 0){
            while($row = $result->fetch_assoc()){
        
                $data[] = $row;
            }
            return $data;
        }

        
    }

    protected function depo1()
    {
        //Deposit (Cash)
        $conn = $this->connect();
        
        $sql = "SELECT SUM(tAmount) as total FROM transaction_tb WHERE tStatus = 'Confirmed' AND tType = 'Deposit (Cash)'";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
        { 
        return $row['total'];
        }   
    }

    protected function depo2()
    {
        //Deposit (Check)
        $conn = $this->connect();
        
        $sql = "SELECT SUM(tAmount) as total FROM transaction_tb WHERE tStatus = 'Confirmed' AND tType = 'Deposit (Check)'";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
        { 
        return $row['total'];
        }   
    }

    protected function with1()
    {
        //Withdraw
        $conn = $this->connect();
        
        $sql = "SELECT SUM(tAmount) as total FROM transaction_tb WHERE tStatus = 'Confirmed' AND tType = 'Withdraw'";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
        { 
        return $row['total'];
        }   
    }

    protected function tFund()
    {
        //Transfer Fund
        $conn = $this->connect();
        
        $sql = "SELECT SUM(tAmount) as total FROM transaction_tb WHERE tStatus = 'Confirmed' AND tType = 'Transfer Fund'";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
        { 
        return $row['total'];
        }   
    }


}
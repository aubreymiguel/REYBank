<?php


class TransController extends Transaction {

    public function b_transact($tType, $tAmount, $tProcessed_by, $checkImg, $checkNum, $transactNum, $uBranch){
        
        $this->transact($tType, $tAmount, $tProcessed_by, $checkImg, $checkNum, $transactNum, $uBranch);

        $uID = $_POST['uID'];
        $accPin = $_POST['accPin'];
        $tType = $_POST['tType'];
        $tAmount = $_POST['tAmount'];
        $tStatus = $_POST['tStatus'];
        $transactNum = $_POST['transactNum'];

        $checkImg = $_POST['checkImg'];
        $checkNum = $_POST['checkNum'];

        $uBranch = $_POST['uBranch'];
            
   }

   public function t_confirmation()
   {
        if ($_SESSION['uType'] == '2') {

            $conn = $this->connect();

            $uID = $_SESSION['uID'];

            
                $sql = "SELECT * FROM transaction_tb, account_tb WHERE transaction_tb.tStatus = 'Pending' AND transaction_tb.tType != 'Deposit (Check)' AND transaction_tb.uID = account_tb.uID";
                $result = $conn->query($sql);

                
                    if (isset($_GET['reject_tran'])) {

                        $rjc_tran = $_GET['reject_tran'];

                        $query = "SELECT * FROM transaction_tb WHERE uID = '$rjc_tran' AND tStatus = 'Pending' AND transaction_tb.tType != 'Deposit (Check)'";
                        $result = $conn->query($query);
                        
                        if ($result->num_rows > 0) {

                            $data = $result->fetch_assoc();

                            $rejectTRAN = $data['uID'];
                            $transactNum = $data['transactNum'];

                        
                            $aub = "UPDATE transaction_tb SET tStatus = 'Cancelled', tProcessed_by = '$uID' WHERE uID = '$rejectTRAN' AND transactNum = '$transactNum'";

                            if ($conn->query($aub) === FALSE) {
                                echo "Error: " . $aub . "<br>" . $conn->error;
                            }

                            if ($conn->query($aub) === TRUE) {
                                echo '<script type="text/javascript"> window.location="tpending.php"; </script>';
                            }


                        }

                    }


                    if (isset($_GET['verify_tran'])) {

                        $vrfy_tran = $_GET['verify_tran'];

                        $query = "SELECT * FROM transaction_tb WHERE uID = '$vrfy_tran' AND tStatus = 'Pending' AND transaction_tb.tType != 'Deposit (Check)'";
                        $result = $conn->query($query);
                        
                        if ($result->num_rows > 0) {

                            $data = $result->fetch_assoc();

                            $verifyTRAN = $data['uID'];
                            $tAmount = $data['tAmount'];
                            $transactNum = $data['transactNum'];
                            $tType = $data['tType'];


                            $mars = "UPDATE transaction_tb SET tStatus = 'Confirmed', tProcessed_by = '$uID' WHERE uID = '$verifyTRAN' AND transactNum = '$transactNum'";

                            $brey = "SELECT * FROM account_tb WHERE uID = '$verifyTRAN'";
                            $result = $conn->query($brey);
                            $row = $result->fetch_assoc();

                            if ($tType == 'Withdraw') {

                                $newBal = $row['uBalance'] - $tAmount;

                            }

                            else if ($tType == 'Deposit (Cash)') {

                                $newBal = $row['uBalance'] + $tAmount;
                            }


                            $aub = "UPDATE account_tb SET uBalance = '$newBal' WHERE uID = '$verifyTRAN'";


                            if ($conn->query($mars) === FALSE) {
                                echo "Error: " . $mars . "<br>" . $conn->error;
                            }

                            if ($conn->query($mars) === TRUE) {
                                echo '<script type="text/javascript"> window.location="tpending.php"; </script>';
                            }

                            if ($conn->query($aub) === FALSE) {
                                echo "Error: " . $aub . "<br>" . $conn->error;
                            }

                            if ($conn->query($aub) === TRUE) {
                                echo '<script type="text/javascript"> window.location="tpending.php"; </script>';
                            }


                        }
                    }

                    return $result;

                



        }


   }

   public function depCheck_confirm()
   {

        if ($_SESSION['uType'] == '2') {

            $conn = $this->connect();

            $uID = $_SESSION['uID'];

            
                $sql = "SELECT * FROM transaction_tb, account_tb WHERE transaction_tb.tStatus = 'Pending' AND transaction_tb.tType = 'Deposit (Check)' AND transaction_tb.uID = account_tb.uID";
                $result = $conn->query($sql);

                
                    if (isset($_GET['reject_tran'])) {

                        $rjc_tran = $_GET['reject_tran'];

                        $query = "SELECT * FROM transaction_tb WHERE uID = '$rjc_tran' AND tStatus = 'Pending' AND tType = 'Deposit (Check)'";
                        $result = $conn->query($query);
                        
                        if ($result->num_rows > 0) {

                            $data = $result->fetch_assoc();

                            $rejectTRAN = $data['uID'];
                            $transactNum = $data['transactNum'];

                        
                            $aub = "UPDATE transaction_tb SET tStatus = 'Cancelled', tProcessed_by = '$uID' WHERE uID = '$rejectTRAN' AND transactNum = '$transactNum'";

                            if ($conn->query($aub) === FALSE) {
                                echo "Error: " . $aub . "<br>" . $conn->error;
                            }

                            if ($conn->query($aub) === TRUE) {
                                echo '<script type="text/javascript"> window.location="tpending.php"; </script>';
                            }


                        }

                    }


                    if (isset($_GET['verify_tran'])) {

                        $vrfy_tran = $_GET['verify_tran'];

                        $query = "SELECT * FROM transaction_tb WHERE uID = '$vrfy_tran' AND tStatus = 'Pending' AND tType = 'Deposit (Check)'";
                        $result = $conn->query($query);
                        
                        if ($result->num_rows > 0) {

                            $data = $result->fetch_assoc();

                            $verifyTRAN = $data['uID'];
                            $tAmount = $data['tAmount'];
                            $transactNum = $data['transactNum'];
                            $tType = $data['tType'];
                            $r_accNum = $data['r_accNum'];


                            $mars = "UPDATE transaction_tb SET tStatus = 'Confirmed', tProcessed_by = '$uID' WHERE uID = '$verifyTRAN' AND transactNum = '$transactNum'";

                            $brey = "SELECT * FROM account_tb WHERE accNum = '$r_accNum'";
                            $result = $conn->query($brey);
                            $row = $result->fetch_assoc();


                            $newBal = $row['uBalance'] + $tAmount;


                            $aub = "UPDATE account_tb SET uBalance = '$newBal' WHERE accNum = '$r_accNum'";


                            if ($conn->query($mars) === FALSE) {
                                echo "Error: " . $mars . "<br>" . $conn->error;
                            }

                            if ($conn->query($mars) === TRUE) {
                                echo '<script type="text/javascript"> window.location="tpending.php"; </script>';
                            }

                            if ($conn->query($aub) === FALSE) {
                                echo "Error: " . $aub . "<br>" . $conn->error;
                            }

                            if ($conn->query($aub) === TRUE) {
                                echo '<script type="text/javascript"> window.location="tpending.php"; </script>';
                            }


                        }
                    }

                    return $result;

        }


   }

   public function transF()
   {

        $this->transfer();

   }

   public function depositCH()
   {

        $this->deposit_check();

   }



}





?>
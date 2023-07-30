<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
        
    $receipt = new TransView();
    $receipt->transReceipt();
    $tType = $_SESSION['tType'];
    
 

    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');

?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Receipt</div>
                <div class="card-body">

                    <?php if ($tType == "Withdraw") { ?>

                    <h6 style="text-align: center">Your Withdraw is still on pending.</h6>
                    <p style="text-align: center">** Take a screenshot or picture this receipt. **</p>

                        <table style="font-size: 13px; color: black">
                            <tr>
                                <th scope="col">Transaction Code: &nbsp; &nbsp; &nbsp; </th> 
                                <td><?php echo $_SESSION['transactNum'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Account No: </th>
                                <td><?php echo $_SESSION['u_accNum'] ?></td>
                            </tr>

                            <tr>
                                <th scope="col">Amount: </th>
                                <td><?php echo $_SESSION['tAmount'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Transaction Date: </th>
                                <td><?php echo $_SESSION['tDate'] ?></td>
                            </tr>

                            </tr>
                        </table>

                    <?php } else if ($tType == "Deposit (Cash)") { ?>

                    <h6 style="text-align: center">Your Deposit (Cash) is still on pending.</h6>
                    <p style="text-align: center">** Take a screenshot or picture this receipt. **</p>

                        <table style="font-size: 13px; color: black">
                            <tr>
                                <th scope="col">Transaction Code: &nbsp; &nbsp; &nbsp; </th> 
                                <td><?php echo $_SESSION['transactNum'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Account No: </th>
                                <td><?php echo $_SESSION['u_accNum'] ?></td>
                            </tr>

                            <tr>
                                <th scope="col">Amount: </th>
                                <td><?php echo $_SESSION['tAmount'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Transaction Date: </th>
                                <td><?php echo $_SESSION['tDate'] ?></td>
                            </tr>

                            </tr>
                        </table>


                    <?php } else if ($tType == "Deposit (Check)") { ?>

                    <h6 style="text-align: center">Your Deposit (Check) is still on pending.</h6>
                    <p style="text-align: center">** Take a screenshot or picture this receipt. **</p>

                        <table style="font-size: 13px; color: black">
                            <tr>
                                <th scope="col">Transaction Code: &nbsp; &nbsp; &nbsp; </th> 
                                <td><?php echo $_SESSION['transactNum'] ?></td>
                            </tr>

                            <tr>
                                <th scope="col">Check No: &nbsp; &nbsp; &nbsp; </th> 
                                <td><?php echo $_SESSION['check_num'] ?></td>
                            </tr>

                            <tr>
                                <th scope="col">Sender's Account No: </th>
                                <td><?php echo $_SESSION['u_accNum'] ?></td>
                            </tr>

                            <tr>
                                <th scope="col">Receiver's Account No: </th>
                                <td><?php echo $_SESSION['r_accNum'] ?></td>
                            </tr>

                            <tr>
                                <th scope="col">Amount: </th>
                                <td><?php echo $_SESSION['tAmount'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Transaction Date: </th>
                                <td><?php echo $_SESSION['tDate'] ?></td>
                            </tr>

                            </tr>
                        </table>

                    <?php } ?>

                            <input type="hidden" value="<?php echo $_SESSION['uType']; ?>">

                    <a href="chome.php">
                        <button type="button" name="exit" class="btn btn-primary" style="float: right">
                            Exit
                        </button>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    include ('layout/footer.php');

?>
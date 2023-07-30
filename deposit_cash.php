<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
     
    $trans = new TransController();
    $trans->b_transact($tType, $tAmount, $tProcessed_by, $checkImg, $checkNum, $transactNum, $uBranch);

    $t_code = new TransView();


    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');

?>


<input type="hidden" value="<?php echo $_SESSION['uType'];  ?>">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 mx-auto">
            <div align="center" style="margin-bottom: 4%;">
                <a href="deposit_cash.php"><button type="button" class="btn btn-outline-primary p-2 px-4">Cash</button></a>
                <a href="deposit_check.php"><button type="button" class="btn btn-outline-primary p-2 px-4">Check</button></a>
            </div>
    
            <div class="card">
                <div class="card-header" style="font-size: 14px">Deposit (Cash)</div>
                <div class="card-body">

                <?php

                    if (isset($_GET['error_withdraw'])) {
                            
                        $error_withdraw = $_GET['error_withdraw'];

                        echo '<div class="alert alert-danger">';
                        echo $error_withdraw;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }

                    if (isset($_GET['error_PIN'])) {
                            
                        $error_PIN = $_GET['error_PIN'];

                        echo '<div class="alert alert-danger">';
                        echo $error_PIN;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }


                    if (isset($_GET['wrong_message'])) {
                            
                        $wrong_message = $_GET['wrong_message'];

                        echo '<div class="alert alert-danger">';
                        echo $wrong_message;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }

                    if (isset($_GET['pending_trans'])) {
                            
                        $pending_trans = $_GET['pending_trans'];

                        echo '<div class="alert alert-danger">';
                        echo $pending_trans;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 4%">&times;</a>';
                        echo '</div>';
                    }

                    

                ?>
                
                    <form action=" " method="POST" enctype="multipart/form-data" autocomplete="off">

                        <table class="table table-striped" style="font-size: 12px;">
                            
                            <tr>
                                <th scope="col">Enter PIN</th>
                                <td>
                                    <input type="password" min="1" class="form-control rounded-left" name="accPin" id="accPin" required>
                                </td>   
                            </tr>
                            <tr>
                                <th scope="col">Amount:</th>
                                <td>
                                    <input type="number" min="1" class="form-control rounded-left" name="tAmount" id="tAmount" required>
                                </td>
                            </tr>


                            <input type="hidden" class="form-control" name="tType" id="tType" value="Deposit (Cash)">
                            <input type="hidden" name="transactNum" class="form-control" value="<?php $t_code->transNum(); ?>">
                            <input type="hidden" name="uID" class="form-control" value= " <?php  echo $_SESSION['uID']; ?>" >
                            <input type="hidden" name="tStatus" class="form-control" value="Pending">
                            <input type="hidden" name="uBranch" class="form-control" value=" <?php echo $_SESSION['uBranch']; ?>">
                            <input type="hidden" name="uType" class="form-control" value=" <?php echo $_SESSION['uType']; ?>">


                            <!-- FOR NEXT -->

                            <input type="hidden" name="checkImg" class="form-control" value = " ">
                            <input type="hidden" name="checkNum" class="form-control" value = " " >
                            <input type="hidden" name="uBranch" class="form-control" value = " ">
                            
                            <tr>
                                <td>
                                    <button type="submit" name="submit_w" class="btn btn-primary" style="font-size: 12px">Enter</button>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script>
        
    function choose() {

        var select = document.getElementById("tType");
        

        if (select.value == "Deposit (Check)") {
            
            document.getElementById("rAccNum").style.visibility = "visible";
        }

        else {

            document.getElementById("rAccNum").style.visibility = "hidden";
        }
    }
        
</script> -->

<?php

    include ('layout/footer.php');

?>
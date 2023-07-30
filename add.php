
<?php

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';

        $telReg = new UsersController();
        
        $telReg->createTellerAcc($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $brName);

        
    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }

?>

<?php

    include ('layout/header.php');

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-header">Add User</div>

                <div class="card-body">
                <div id="overflowTest">

                <?php

                    if(isset($_GET['message'])) {
                        
                        if($_GET['message'] == TRUE) {

                            $message = $_GET['message'];
                            echo '<div class="alert alert-success">';
                            echo $message;
                            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                            echo '</div>';
                        }
                        
                        else if($_GET['error'] == FALSE) {

                            $error = $_GET['error'];
                            echo '<div class="alert alert-danger">';
                            echo $error;
                            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                            echo '</div>';

                        }
                    }

                    if (isset($_GET['uName_error'])) {
                                                
                        $uName_error = $_GET['uName_error'];
                        echo '<div class="alert alert-danger">';
                        echo $uName_error;
                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }

                    if (isset($_GET['uEma_error'])) {
                                                
                        $uEma_error = $_GET['uEma_error'];
                        echo '<div class="alert alert-danger">';
                        echo $uEma_error;
                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';

                    } 


                    if (isset($_GET['uCred_error'])) {

                        $uCred_error = $_GET['uCred_error'];

                        echo '<div class="alert alert-danger">';
                        echo $uCred_error;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';

                    }

                    if (isset($_GET['error_pass'])) {

                        $error_pass = $_GET['error_pass'];

                        echo '<div class="alert alert-danger">';
                        echo $error_pass;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';

                    }

                ?>
                
                        <form action="add_teller.php" method= "POST" class="login-form" enctype="multipart/form-data" autocomplete="off">

                            <div class="row" style="margin-bottom: 3%; font-size: 12px">
                                <div class="col">
                                    <label>Last Name</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uLast" required autofocus>
                                </div>
                                <div class="col">
                                    <label>First Name</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uFname" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Middle Name</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uMname" required autofocus>
                                </div>
 
                                <div class="col">
                                    <label>Birthday</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uBday" placeholder="YYYY-MM-DD" required autofocus>
          
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 3%; font-size: 12px">
                                <div class="col">
                                    <label>Gender</label>
                                        <select class="form-control" style="font-size: 12px" name="uGndr" id="uGndr" required autofocus>
                                            <option disabled selected value>-Select-</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                            
                                        </select>
                                </div>
                                <div class="col">
                                    <label>Civil Status</label>
                                        <select class="form-control" style="font-size: 12px" name="uCvl_Stat" id="uCvl_Stat" required autofocus>
                                            <option disabled selected value>-Select-</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Widowed">Widowed</option>
                                            
                                        </select>    
                                </div>
                                <div class="col">
                                    <label>Citizenship</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uCtzn" placeholder="Citizenship" required autofocus>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 3%; font-size: 12px">

                                <div class="col">
                                    <div class="form_error" >

                                    <label>Username</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uName" required autofocus>
    
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Mobile Number</label>
                                        <input type="number" class="form-control rounded-left" style="font-size: 12px" name="uMob" required autofocus>
                                </div>
                                <div class="col">
                                    <div class="form_error">

                                        <label>Email Address</label>
                                            <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uEma" required autofocus>

                                           

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 3%; font-size: 12px">
                                <div class="col">
                                    <label>Password</label>
                                        <input type="password" class="form-control rounded-left" style="font-size: 12px" name="uPass" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Confirm Password</label>
                                        <input type="password" class="form-control rounded-left" style="font-size: 12px" name="c_uPass" required autofocus>
                                </div>
                                
                            </div>

                            <div class="row" style="margin-bottom: 3%; font-size: 12px">
                                <div class="col">
                                    <label>House Number</label>
                                        <input type="number" class="form-control rounded-left" style="font-size: 12px" name="uHouseNo" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Street</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uStreet" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Barangay</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uBrgy" required autofocus>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 3%; font-size: 12px">
                                <div class="col">
                                    <label>City</label>
                                        <input type="text" class="form-control rounded-left" style="font-size: 12px" name="uCity" required autofocus>
                                </div>

                                <div class="col">
                                    <label>Zip Code</label>
                                        <input type="number" class="form-control rounded-left" style="font-size: 12px" name="uZip" required autofocus>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 3%; font-size: 12px">
                                <div class="col">
                                    <label>Branch</label>
                                    <select class="form-control" style="font-size: 12px" name="uBranch" id="uBranch" required autofocus>
                                            <option disabled selected value>-Select-</option>
                                            <option value="REYBank-Obando">REYBank-Obando</option>
                                            <option value="REYBank-Obando">REYBank-Polo</option>
                                            <option value="REYBank-Obando">REYBank-Palasan</option>
                                            <option value="REYBank-Obando">REYBank-Bilog</option>
                                            <option value="REYBank-Obando">REYBank-Balangkas</option>
                                            
                                        </select>    
                                </div>
                                <div class="col">
                                    <label>User Type</label>
                                        <p>Admin <input type="radio" id="uType" name="uType" value="3"> &nbsp; &nbsp; &nbsp; &nbsp;
                                        Teller <input type="radio" id="uType" name="uType" value="2"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="sub_tel" class="btn btn-primary rounded submit p-2 px-4">Register</button>
                            </div>
  
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#from-datepicker").datepicker({ 
                format: 'yyyy-mm-dd'
            });
           
        }); 
    </script>
       
    <?php 

        include ('layout/footer.php');

    ?>

<?php

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';

    // include 'classes/Database.class.php';
    // include 'classes/UserDetails.class.php';


    if(isset($_POST['sub_reg'])) {

        $userReg = new UsersController();
        
        $userReg->createAccount($Fname, $Mname, $Lname, $bDay, $gender, $civil_status, $citizenship, $mobileNum, $uEmail, $uPass, $uName, $houseNo, $street, $brgy, $city, $zip, $val_id_1, $val_id_2, $brName);

    }

?>

<?php

    include ('includes/log_reg_header.php');

?>
        <div class="row justify-content-center">
                <div class="col-lg-6 col-lg-12">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>

                        <h3 class="text-center mb-4">REYBank | Open Account</h3>

            <?php

                if (isset($_GET['error_size'])) {
                                                            
                    $error_size = $_GET['error_size'];
                    echo '<div class="alert alert-danger">';
                    echo $error_size;
                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '</div>';
                }

                if (isset($_GET['error_upload'])) {
                                                            
                    $error_upload = $_GET['error_upload'];
                    echo '<div class="alert alert-danger">';
                    echo $error_upload;
                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '</div>';
                }

                if (isset($_GET['error_type'])) {
                                                            
                    $error_type = $_GET['error_type'];
                    echo '<div class="alert alert-danger">';
                    echo $error_type;
                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '</div>';
                }

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

                if (isset($_GET['error_uPassLength'])) {

                    $error_uPassLength = $_GET['error_uPassLength'];
                
                    echo '<div class="alert alert-danger">';
                    echo $error_uPassLength;
             
                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '</div>';

                }

                if (isset($_GET['error_mob'])) {

                    $error_mob = $_GET['error_mob'];
                
                    echo '<div class="alert alert-danger">';
                    echo $error_mob;
             
                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '</div>';

                }

                
                
               
            ?>
                
                        <form action="register.php" method= "POST" class="login-form" enctype="multipart/form-data" autocomplete="off">

                            <div class="row" style="margin-bottom: 3%">
                                <div class="col">
                                    <label>Last Name</label>
                                        <input type="text" class="form-control rounded-left" name="uLast" placeholder="Last Name" required autofocus>
                                </div>
                                <div class="col">
                                    <label>First Name</label>
                                        <input type="text" class="form-control rounded-left" name="uFname" placeholder="First Name" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Middle Name</label>
                                        <input type="text" class="form-control rounded-left" name="uMname" placeholder="Middle Name" required autofocus>
                                </div>
 
                                <div class="col">
                                    <label>Birthday</label>
                                        <input id="from-datepicker" class="form-control" name="uBday" placeholder="YYYY-MM-DD" required readonly>

                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 3%">
                                <div class="col">
                                    <label>Gender</label>
                                        <select class="form-control" name="uGndr" id="uGndr" required autofocus>
                                            <option disabled selected value>-Select-</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                            
                                        </select>
                                </div>
                                <div class="col">
                                    <label>Civil Status</label>
                                        <select class="form-control" name="uCvl_Stat" id="uCvl_Stat" required autofocus>
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
                                        <input type="text" class="form-control rounded-left" name="uCtzn" placeholder="Citizenship" required autofocus>
                                </div>

                            </div>

                            <div class="row" style="margin-bottom: 3%">

                                <div class="col">
                                    <div class="form_error" >

                                    <label>Username</label>
                                        <input type="text" class="form-control rounded-left" name="uName" placeholder="Username" required autofocus>
                                        
                                        

                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Mobile Number</label>
                                        <input type="number" class="form-control rounded-left" name="uMob" placeholder="Mobile Number" min="1" required autofocus>
                                </div>
                                <div class="col">
                                    <div class="form_error">

                                        <label>Email Address</label>
                                            <input type="text" class="form-control rounded-left" name="uEma" placeholder="Email Address" required autofocus>

                                           

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 3%">
                                <div class="col">
                                    <label>Password</label>
                                        <input type="password" class="form-control rounded-left" name="uPass" placeholder="Password" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Confirm Password</label>
                                        <input type="password" class="form-control rounded-left" name="c_uPass" placeholder="Password" required autofocus>
                                </div>
                                
                            </div>

                            <div class="row" style="margin-bottom: 3%">
                                <div class="col">
                                    <label>House Number</label>
                                        <input type="number" class="form-control rounded-left" name="uHouseNo" placeholder="House Number" min="1" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Street</label>
                                        <input type="text" class="form-control rounded-left" name="uStreet" placeholder="Street" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Barangay</label>
                                        <input type="text" class="form-control rounded-left" name="uBrgy" placeholder="Barangay" required autofocus>
                                </div>
                                <div class="col">
                                    <label>City</label>
                                        <input type="text" class="form-control rounded-left" name="uCity" placeholder="City" required autofocus>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 3%">
                                <div class="col">
                                    <label>Zip Code</label>
                                        <input type="number" class="form-control rounded-left" name="uZip" placeholder="Zip Code" min="1" required autofocus>
                                </div>
                                <div class="col">
                                    <label>Valid ID</label>
                                        <input type="file" name="uVal_id_1" class="form-control" required>
<!--                                
                                    <label>Valid ID 2</label>
                                        <input type="file" name="uVal_id_2" class="form-control" required> -->
                                </div>
                                <div class="col">
                                    <label>Branch</label>
                                    <select class="form-control" name="uBranch" id="uBranch" required autofocus>
                                            <option disabled selected value>-Select-</option>
                                            <option value="REYBank-Obando">REYBank-Obando</option>
                                            <option value="REYBank-Polo">REYBank-Polo</option>
                                            <option value="REYBank-Palasan">REYBank-Palasan</option>
                                            <option value="REYBank-Bilog">REYBank-Bilog</option>
                                            <option value="REYBank-Balangkas">REYBank-Balangkas</option>
                                            
                                        </select>    
                                </div>
                            </div>

                            
                            <div class="form-group">
                            <button type="submit" name="sub_reg" class="btn btn-primary rounded submit p-3 px-5">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

    <script>
        $(document).ready(function() {
            $("#from-datepicker").datepicker({ 
                format: 'yyyy-mm-dd'
            });
           
        }); 
    </script>
       
    <?php 

        include ('includes/log_reg_footer.php');

    ?>
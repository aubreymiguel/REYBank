
<?php

error_reporting(E_ERROR | E_PARSE);


    include 'includes/autoLoader.inc.php';
    
        $userLog = new UsersController();

        $userLog->login($uName, $uPass);

?>


<?php

    include ('includes/log_reg_header.php');

?>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>

                        <h3 class="text-center mb-4">REYBank | Login</h3>

                        <?php

                            if (isset($_GET['error_login'])) {

                                $error_login = $_GET['error_login'];

                                echo '<div class="alert alert-danger">';
                                echo $error_login;

                                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                echo '</div>';

                            }


                            if (isset($_GET['not_ver'])) {

                                $not_ver = $_GET['not_ver'];

                                echo '<div class="alert alert-danger">';
                                echo $not_ver;

                                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                echo '</div>';

                            }

                            if (isset($_GET['deact_id'])) {

                                $deact_id = $_GET['deact_id'];

                                echo '<div class="alert alert-danger">';
                                echo $deact_id;

                                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                echo '</div>';

                            }

                            if (isset($_GET['error_application'])) {

                                $error_application = $_GET['error_application'];

                                echo '<div class="alert alert-danger">';
                                echo $error_application;

                                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                echo '</div>';

                            }



                            

                        ?>
                
                        <form action="login.php" method="POST" class="login-form" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group row" style="margin-bottom: 3%">
                                <label>Username</label>

                                <div class="col">
                                    <input type="text" class="form-control rounded-left" name="uName" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label>Password</label> &nbsp;

                                <div class="col">
                                    <input type="password" id="myInput" class="form-control rounded-left" name="uPass" required>
                                    <input type="checkbox" onclick="myFunction()"> <label>Show Password</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="sub_login" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
    
    <?php 

    include ('includes/log_reg_footer.php');

    ?>

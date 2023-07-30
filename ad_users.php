<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
    
    $adusers = new UsersView();

    $result1 = $adusers->admins();
    $result2 = $adusers->tellers();
    $result3 = $adusers->clients();


    $ad_act = new UsersController();
    $ad_act->activation();


    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>

<?php

    include ('layout/header.php');
    
?>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#admin" class="nav-link active" data-toggle="tab">Admin</a>
    </li>
    <li class="nav-item">
        <a href="#teller" class="nav-link" data-toggle="tab">Teller</a>
    </li>
    <li class="nav-item">
        <a href="#clients" class="nav-link" data-toggle="tab">Clients</a>
    </li>
</ul>


<div class="tab-content">
    <div class="tab-pane fade show active" id="admin">
        <div class="card-body">
            <div style="
                height:150px;
                overflow-y: scroll;
                overflow-x: scroll;
                width: 980px;
                height: 350px;
                border: #ccc;">

                <table class="table table-striped" style="font-size: 10.5px;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Civil Status</th>
                        <th scope="col">Citizenship</th>
                        <th scope="col">Mobile #</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Zip Code</th>
                        <th scope="col">Branch</th>
                       
                    </tr>

                   

                    <?php

                    if ($result1) {

                        while ($data = mysqli_fetch_assoc($result1))
                    
                        {
                    
                    ?>
                    <tr>
                        <td><?php echo $data['uLast'] . ", " . $data['uFname'] . " " . $data['uMname'] ?></td>
                        <td><?php echo $data['uBday'] ?></td>
                        <td><?php echo $data['uGndr'] ?></td>
                        <td><?php echo $data['uCvl_Stat'] ?></td>
                        <td><?php echo $data['uCtzn'] ?></td>
                        <td><?php echo $data['uMob'] ?></td>
                        <td><?php echo $data['uEma'] ?></td>
                        <td><?php echo $data['uHouseNo'] . " " . $data['uStreet'] . ", " . $data['uBrgy'] . ", " . $data['uCity'] ?></td>
                        <td><?php echo $data['uZip'] ?></td>
                        <td><?php echo $data['uBranch'] ?></td>
                        
                    </tr>

                    <?php
                    
                        }
                    }
                    
                    ?>

                    
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show" id="teller">
        <div class="card-body">
            <div style="
                height:150px;
                overflow-y: scroll;
                overflow-x: scroll;
                width: 980px;
                height: 350px;
                border: #ccc;">

                <table class="table table-striped" style="font-size: 10.5px;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Civil Status</th>
                        <th scope="col">Citizenship</th>
                        <th scope="col">Mobile #</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Zip Code</th>
                        <th scope="col">Branch</th>
                        <th scope="col"></th>
                        <th scope="col"></th>   
                    </tr>

                   

                    <?php

                    if ($result2) {

                        while ($data = mysqli_fetch_assoc($result2))
                    
                        {
                    
                    ?>

                    <tr>
                        <td><?php echo $data['uLast'] . ", " . $data['uFname'] . " " . $data['uMname'] ?></td>
                        <td><?php echo $data['uBday'] ?></td>
                        <td><?php echo $data['uGndr'] ?></td>
                        <td><?php echo $data['uCvl_Stat'] ?></td>
                        <td><?php echo $data['uCtzn'] ?></td>
                        <td><?php echo $data['uMob'] ?></td>
                        <td><?php echo $data['uEma'] ?></td>
                        <td><?php echo $data['uHouseNo'] . " " . $data['uStreet'] . ", " . $data['uBrgy'] . ", " . $data['uCity'] ?></td>
                        <td><?php echo $data['uZip'] ?></td>
                        <td><?php echo $data['uBranch'] ?></td>
                        <?php 
                        
                            if($data['uActivity'] == '0') {
                        ?>

                        <td><a href="?activate_id=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-success" style="font-size: 10.5px">Activate</button></a></td>
                        <td><a href="?deactivate_id=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-danger" style="font-size: 10.5px" disabled>Deactivate</button></a></td>
                        
                        <?php
                            } else if ($data['uActivity'] == '1') {
                        ?>

                        <td><a href="?activate_id=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-success" style="font-size: 10.5px" disabled>Activate</button></a></td>
                        <td><a href="?deactivate_id=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-danger" style="font-size: 10.5px">Deactivate</button></a></td>

                        <?php

                            }
                        ?>
                        
                        
                    </tr>

                    <?php
                    
                        }
                    }
                    
                    ?>

                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show" id="clients">
        <div class="card-body">
            <div style="
                height:150px;
                overflow-y: scroll;
                overflow-x: scroll;
                width: 980px;
                height: 350px;
                border: #ccc;">

                <table class="table table-striped" style="font-size: 10.5px;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Civil Status</th>
                        <th scope="col">Citizenship</th>
                        <th scope="col">Mobile #</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Zip Code</th>
                        <th scope="col">Branch</th>  
                    </tr>

                   

                    <?php

                    if ($result3) {

                        while ($data = mysqli_fetch_assoc($result3))
                    
                        {
                    
                    ?>

                    <tr>
                        <td><?php echo $data['uLast'] . ", " . $data['uFname'] . " " . $data['uMname'] ?></td>
                        <td><?php echo $data['uBday'] ?></td>
                        <td><?php echo $data['uGndr'] ?></td>
                        <td><?php echo $data['uCvl_Stat'] ?></td>
                        <td><?php echo $data['uCtzn'] ?></td>
                        <td><?php echo $data['uMob'] ?></td>
                        <td><?php echo $data['uEma'] ?></td>
                        <td><?php echo $data['uHouseNo'] . " " . $data['uStreet'] . ", " . $data['uBrgy'] . ", " . $data['uCity'] ?></td>
                        <td><?php echo $data['uZip'] ?></td>
                        <td><?php echo $data['uBranch'] ?></td>  
                        
                    </tr>

                    <?php
                    
                        }
                    }
                    
                    ?>

                </table>
            </div>
        </div>
    </div>



</div>




<?php

    include ('layout/footer.php');

?>
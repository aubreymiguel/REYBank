<?php

class TransView extends Transaction {


    public function transNum()
    {

        $this->trans_number();

    }

    public function checkNum()
    {

        $this->check_number();
    }

    public function transReceipt()
    {
        $this->trans_receipt();

    }

    public function transPending()
    {
        // $this->trans_pending()

        if ($_SESSION['uType'] == '1') {

            $uID = $_SESSION['uID'];
            $conn = $this->connect();

            $sql =  "SELECT * FROM transaction_tb WHERE uID ='$uID' AND tStatus = 'Pending'";
            $pending = mysqli_query($conn,$sql);

            return $pending;

        }
    }

    public function c_History()
    {
        $datas = $this->cHistory();
        foreach($datas as $data){
         
        echo '<tr>';
        echo '<td>' . $data['transactNum'] . '</td>';

        if ($data['r_accNum'] == '') {
            
            echo '<td> N/A </td>';
        }
        
        else {

            echo '<td>' . $data['r_accNum'] . '</td>';
        }

    
        echo '<td>' . $data['tDate'] . '</td>';
        echo '<td>' . $data['tAmount'] . '</td>';
        echo '<td>' . $data['tType'] . '</td>'; 

        if ($data['check_num'] == ' ' || $data['check_num'] == '') {
            
            echo '<td> N/A </td>';
        }
        
        else {

            echo '<td>' . $data['check_num'] . '</td>';
        }
        
        if ($data['tStatus'] == 'Confirmed') {

            echo '<td style="color: green; font-weight: bold">' . $data['tStatus'] . '</td>';

        } else if ($data['tStatus'] == 'Cancelled') {

            echo '<td style="color: red; font-weight: bold">' . $data['tStatus'] . '</td>';

        }

        echo '</tr>';
       
        }

    }

    public function a_Report()
    {
        $datas = $this->aReport();
        foreach($datas as $data){
         
        echo '<tr>';
        echo '<td>' . $data['u_accNum'] . '</td>';

        if ($data['r_accNum'] == '') {
            
            echo '<td> N/A </td>';
        }
        
        else {

            echo '<td>' . $data['r_accNum'] . '</td>';
        }

        echo '<td>' . $data['tDate'] . '</td>';

        if ($data['tProcessed_by'] == '0') {
            
            echo '<td> N/A </td>';
        }
        
        else {

            echo '<td>' . $data['tProcessed_by'] . '</td>';
        }

        echo '<td>' . $data['tType'] . '</td>';

        if ($data['check_num'] == ' ' || $data['check_num'] == '') {
            
            echo '<td> N/A </td>';
        }
        
        else {

            echo '<td>' . $data['check_num'] . '</td>';
        }

        echo '<td>' . $data['tAmount'] . '</td>';
    
        if ($data['tStatus'] == 'Confirmed') {

            echo '<td style="color: green; font-weight: bold">' . $data['tStatus'] . '</td>';

        } else if ($data['tStatus'] == 'Cancelled') {

            echo '<td style="color: red; font-weight: bold">' . $data['tStatus'] . '</td>';

        }

        echo '</tr>';
       
        }

    }

    public function t_Report()
    {
        $datas = $this->tReport();
        foreach($datas as $data){
         
        echo '<tr>';
        echo '<td>' . $data['uLast'] . ", " . $data['uFname'] . '</td>';
        echo '<td>' . $data['u_accNum'] . '</td>';

        if ($data['r_accNum'] == '') {
            
            echo '<td> N/A </td>';
        }
        
        else {

            echo '<td>' . $data['r_accNum'] . '</td>';
        }

        echo '<td>' . $data['tDate'] . '</td>'; 
        echo '<td>' . $data['tType'] . '</td>';

        if ($data['check_num'] == ' ' || $data['check_num'] == '') {
            
            echo '<td> N/A </td>';
        }
        
        else {

            echo '<td>' . $data['check_num'] . '</td>';
        }

        echo '<td>' . $data['tAmount'] . '</td>';

        if ($data['tStatus'] == 'Confirmed') {

            echo '<td style="color: green; font-weight: bold">' . $data['tStatus'] . '</td>';

        } else if ($data['tStatus'] == 'Cancelled') {

            echo '<td style="color: red; font-weight: bold">' . $data['tStatus'] . '</td>';

        }

        echo '</tr>';
       
        }

    }

    public function transTotal()
    {

        $total = $this->depo1() + $this->depo2() + $this->with1() + $this->tFund();

        echo $total;

    }
   



}




?>
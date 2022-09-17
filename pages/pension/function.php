<?php
if(isset($_POST['btn_process'])){
 
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {
            $squery = mysqli_query($con, "SELECT * FROM senior_citizen WHERE id = '$value'");
            $row = mysqli_fetch_array($squery);
            
            $firstName = $row['firstName'];
            $middleName = $row['middleName'];
            $lastName = $row['lastName'];
            $monthlyPension = $row['monthlyPension'];

            $seniorName = $lastName.' ,'.$firstName.' '.$middleName;

            //$delete_query = mysqli_query($con,"DELETE from senior_citizen where id = '$value' ") or die('Error: ' . mysqli_error($con));
            $insert_query = mysqli_query($con,"INSERT INTO pension (name, monthlyPension, date) VALUES ('$seniorName', '$monthlyPension', NOW())") or die('Error: ' . mysqli_error($con));        
            if($insert_query == true)
            {
                $_SESSION['process'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }  
    } 
}


?>
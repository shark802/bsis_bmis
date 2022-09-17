<?php
if(isset($_POST['btn_process'])){
    /*
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {   
            $id = $value;
            
            echo "<script>alert('1')</script>";
            $squery = mysqli_query($con, "SELECT CONCAT(lastName, firstName, middleName) AS seniorName, monthlyPension FROM senior_citizen WHERE id = '$id'");
            $row = mysqli_fetch_array($squery);
            echo "<script>alert('2')</script>";
            $seniorName = $row['seniorName'];
            $monthlyPension = $row['monthlyPension'];
            echo "<script>alert('3')</script>";
            $insert_query = mysqli_query($con,"INSERT INTO pension (name, monthlyPension, date) VALUES  ('$seniorName', '$monthlyPension', NOW()") or die('Error: ' . mysqli_error($con));
            echo "<script>alert('4')</script>";
                    
            if($insert_query == true)
            { 
            echo "<script>alert('5')</script>";

                $_SESSION['process'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    } */

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

            if($lastName){
                $insert_query = mysqli_query($con,"INSERT INTO pension (name, monthlyPension, date) VALUES ('$seniorName', '$monthlyPension', NOW())") or die('Error: ' . mysqli_error($con));        
                if($insert_query == true)
                {
                    $_SESSION['process'] = 1;
                    header("location: ".$_SERVER['REQUEST_URI']);
                }
            }

            //$delete_query = mysqli_query($con,"DELETE from senior_citizen where id = '$value' ") or die('Error: ' . mysqli_error($con));
            
        }
    }
}


?>
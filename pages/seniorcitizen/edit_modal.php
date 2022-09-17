<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">

<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Senior Citizen Information</h4>
        </div>
        <div class="modal-body">';

        $edit_query = mysqli_query($con,"SELECT *, senior_citizen.id AS scId, senior_citizen.firstName AS scFirstName, senior_citizen.lastName AS scLastName from senior_citizen left join purok on purok.id = senior_citizen.purokId where senior_citizen.id = '".$row['id']."' ");
        $erow = mysqli_fetch_array($edit_query);
        $id = $erow['scId'];
        $seniorCitizenID = $erow['seniorCitizenID'];
        $firstName = $erow['scFirstName'];
        $middleName = $erow['middleName'];
        $lastName = $erow['scLastName'];
        $gender = $erow['gender'];
        $birthplace = $erow['birthplace'];
        $birthdate =$erow['birthdate'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($birthdate), date_create($today));
        $age = $diff->format('%y');
    
        $address = $erow['address'];
        $purokId = $erow['purokId'];
        $purokName = $erow['purokName'];
        $contactNumber = $erow['contactNumber'];
        $pension = $erow['pension'];
        $monthlyPension = $erow['monthlyPension'];
        $status = $erow['status'];
        $contactPerson = $erow['contactPerson'];
        $contactPersonNumber= $erow['contactPersonNumber'];
        $contactAddress = $erow['contactAddress'];
    



        echo '
        <div class="row">
        <div class="container-fluid">
            <div class="col-md-6 col-sm-12">
            <input name="id" class="form-control input-sm" type="hidden" placeholder="senior citizen id" value="'.$id.'"/>
            <div class="form-group">
                    <label class="control-label" >Senior Citizen ID:</label><br>
                    <div class="col-sm-12">
                        <input name="seniorCitizenID" class="form-control input-sm" type="text" placeholder="senior citizen id" value="'.$seniorCitizenID.'"/>
                    </div>                                   
                </div>

                <div class="form-group">
                    <label class="control-label" >Name:</label><br>
                    <div class="col-sm-4">
                        <input name="lastName" class="form-control input-sm" type="text" placeholder="Lastname" value="'.$lastName.'"/>
                    </div>
                    <div class="col-sm-4">
                        <input name="firstName" class="form-control input-sm col-sm-4" type="text" placeholder="Firstname" value="'.$firstName.'"/>
                    </div>
                    <div class="col-sm-4">
                        <input name="middleName" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename" value="'.$middleName.'"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Birthdate:</label>
                    <input name="birthdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" value="'.$birthdate.'"/>
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label">Age:</label>
                    <input name="txt_age" class="form-control input-sm input-size" type="number" placeholder="Age" value="'.$age.'"/>
                </div> -->



                <div class="form-group">
                    <label class="control-label">Birth Place:</label>
                    <input name="birthplace" class="form-control input-sm input-size" type="text"  placeholder="Birth Place" value="'.$birthplace.'"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Address:</label>
                    <input name="address" class="form-control input-sm input-size" type="text" placeholder="Address" value="'.$address.'"/>
                </div>

                <div class="form-group">
                <label>Purok</label>
                <select name="purokId" class="form-control input-sm">
                <option selected=" '.$purokId.'">-- '.$purokName.' -- </option> ' ?>; 
                <?php 
                    $purokSql = mysqli_query($con,"SELECT * from purok");
                    while($row = mysqli_fetch_array($purokSql)){
                        $id = $row['id'];
                        $purokName = $row['purokName'];
                        echo "
                            <option value='\".$id.\"'>.$purokName.</option>
                        ";

                    }
                ?>
                 <?php echo '
                </select>
            </div>

                <div class="form-group">
                    <label class="control-label">Contact Number:</label>
                    <input name="contactNumber" class="form-control input-sm input-size" type="text" placeholder="Contact Number" value="'.$contactNumber.'"/>
                </div>             

            </div>

            <div class="col-md-6 col-sm-12">
                
            <div class="form-group">
                    <label class="control-label">Status:</label>
                    <select name="status" class="form-control input-sm input-size">
                    <option selected=" '.$status.'"> '.$status.' </option>  
                        <option value = "active">Active</option>
                        <option value = "inactive">Inactive</option>
                    
                    </select>
                </div>

                <div class="form-group">     
                    <label class="control-label">Gender:</label>
                    <select name="gender" class="form-control input-sm">
                    <option selected=" '.$gender.'">'.$gender.'</option>
           
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-group">     
                    <label class="control-label">with Pension:</label>
                    <select name="pension" class="form-control input-sm">
                    <option selected=" '.$pension.'"> '.$pension.' </option>
     
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Monthly Pension:</label>
                    <input name="monthlyPension" class="form-control input-sm input-size" type="text" placeholder="Monthly Pension" value="'.$monthlyPension.'"/>
                </div>            

                <div class="form-group">
                    <label class="control-label">Contact Person:</label>
                    <input name="contactPerson" class="form-control input-sm input-size" type="text" placeholder="Contact Person" value="'.$contactPerson.'"/>
                </div>            

                <div class="form-group">
                    <label class="control-label">Contact Person Number:</label>
                    <input name="contactPersonNumber" class="form-control input-sm input-size" type="text" placeholder="Contact Person Number" value="'.$contactPersonNumber.'"/>
                </div>            

                <div class="form-group">
                    <label class="control-label">Contact Address:</label>
                    <input name="contactAddress" class="form-control input-sm input-size" type="text" placeholder="Contact Address" value="'.$contactAddress.'"/>
                </div>            

            </div>

        </div>
    </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
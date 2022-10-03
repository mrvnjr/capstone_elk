<?php
include('dbcon.php');
        
    $un = $_POST['un'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $class_id = $_POST['class_id'];

    $query = mysqli_query($conn,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
    $count = mysqli_num_rows($query);
    
    if ($count > 0){
        echo 'true';
        
    }else{
    mysqli_query($conn,"insert into student (username,firstname,lastname,location,class_id,status)
    values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
    ") or die(mysqli_error()); 
    echo 'true';
} ?>
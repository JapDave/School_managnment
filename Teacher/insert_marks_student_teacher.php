<?php
session_start();
include "../Admin/connection.php";

if(isset($_POST['file_upload'])){

$file=$_FILES['csvfile']['tmp_name'];
if($_FILES["csvfile"]["size"] > 0){


$handle=fopen($file,"r");
$i=0;

while(($cont=fgetcsv($handle,1000,",")) != false){
     
    $table=rtrim($_FILES['csvfile']['name'],".csv");
    if($i==0){
    $rollno=$cont[0];
    $student_name=$cont[1];
    $mathematics=$cont[2];
    $english=$cont[3];
   
    $social_science=$cont[4];
    $science=$cont[5];
    $hindi=$cont[6];
   
    $total=$cont[7];
    $percentage=$cont[8];
    $classids=$cont[9];
    $examids=$cont[10];
   $year=$cont[11];
    $mark= "CREATE TABLE $table (result_id INT(11) AUTO_INCREMENT PRIMARY KEY,$rollno INT(11),$student_name VARCHAR(255),$mathematics VARCHAR(255),$english VARCHAR(255),
             $social_science VARCHAR(255),$science VARCHAR(255),$hindi VARCHAR(255),$total VARCHAR(255),$percentage VARCHAR(255),$classids VARCHAR(255),$examids VARCHAR(255),$year VARCHAR(255))";
             echo $mark,"<br>";
            
            $r= mysqli_query($conn,$mark);
            if($r){
                echo "create successfully";
                $_SESSION['status']="Result Is Uploaded";
                $_SESSION['status_code']="success";
               header("location:add_result_teacher.php");
               
            }
            else{
                echo "Not Successfully";
                $_SESSION['status']="Result Is Not Uploaded";
                $_SESSION['status_code']="error";
               header("location:add_result_teacher.php");
             
               
            }
          
    }else{
       $query="INSERT INTO $table($rollno,$student_name,$mathematics,$english,$social_science,$science,$hindi,$total,$percentage,$classids,$examids,$year)
            VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]','$cont[7]','$cont[8]','$cont[9]','$cont[10]','$cont[11]')";
          echo $query,"<br>";
          $insert_r=mysqli_query($conn,$query);
          if($insert_r){
            echo "insert successfully";
            $_SESSION['status']="Result Is  Insert";
            $_SESSION['status_code']="success";
           header("location:add_result_teacher.php");
             
          }
          else{
            echo "insert not successfully";
            $_SESSION['status']="Result Is Not Insert";
            $_SESSION['status_code']="error";
           header("location:add_result_teacher.php");
         
          }
           
        }
    $i++;
}
}

}
?>
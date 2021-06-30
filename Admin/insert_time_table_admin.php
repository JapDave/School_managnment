<?php
session_start();
include "../Admin/connection.php";

if(isset($_POST['file_upload'])){

$file=$_FILES['tt_csvfile']['tmp_name'];
if($_FILES["tt_csvfile"]["size"] > 0){


$handle=fopen($file,"r");
$i=0;

while(($cont=fgetcsv($handle,1000,",")) != false){
     
    $table=rtrim($_FILES['tt_csvfile']['name'],".csv");
    if($i==0){
       
        $time=$cont[0];
        $mon=$cont[1];
        $tue=$cont[2];
        $wed=$cont[3];
        $thr=$cont[4];
        $fri=$cont[5];
        $sat=$cont[6];
        $class=$cont[7];
    $mark= "CREATE TABLE $table (time_table_id INT(11) AUTO_INCREMENT PRIMARY KEY,$time VARCHAR(255),$mon VARCHAR(255),$tue VARCHAR(255),$wed VARCHAR(255),$thr VARCHAR(255),
             $fri VARCHAR(255),$sat VARCHAR(255),$class VARCHAR(255))";
             echo $mark,"<br>";
            
            $r= mysqli_query($conn,$mark);
            if($r){
                //echo "create successfully";
                $_SESSION['status']="Time Table Is Uploaded";
                $_SESSION['status_code']="success";
               header("location:display_time_table_admin.php");
               
            }
            else{
                //echo "Not Successfully";
                $_SESSION['status']="Time Table Is Not Uploaded";
                $_SESSION['status_code']="error";
               header("location:display_time_table_admin.php");
             
               
            }
          
    }else{
       $query="INSERT INTO $table($time,$mon,$tue,$wed,$thr,$fri,$sat,$class)
            VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]','$cont[7]')";
          echo $query,"<br>";
          $insert_r=mysqli_query($conn,$query);
          if($insert_r){
            //echo "insert successfully";
            $_SESSION['status']="Time Table Data Is Inserted";
            $_SESSION['status_code']="success";
           header("location:display_time_table_admin.php");
             
          }
          else{
            //echo "insert not successfully";
            $_SESSION['status']="Time Table Data Is Not Inserted";
            $_SESSION['status_code']="error";
           header("location:display_time_table_admin.php");
         
          }
           
        }
    $i++;
}
}

}

if(isset($_POST['stimetable'])){
    
  $id=$_POST['stimetable'];
  $query="select * from class where class_id='$id'";
  $result1=mysqli_query($conn,$query);
  $rows=mysqli_fetch_array($result1); 
  $classname=$rows['class'];
   

        $data ='<div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h4>Display Student</h4>
            
           </div>
           <h6 style="padding-left:25px;color:black;">Class: '.$classname.'</h6>
           <div class="card-body">
             <div class="table-responsive">
               <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                 <thead>
                   <tr>
                   <th>Time</th>
                   <th>Monday</th>
                   <th>Tuesday</th>
                   <th>Wednesday</th>
                   <th>Thrusday</th>
                   <th>Friday</th>
                   <th>Saturday</th>
                   </tr>
                 </thead>
                 <tbody>';
                 
                       
                     
                        $displayquery="select * from timetable8 where class='$classname'";
                       $result = mysqli_query($conn,$displayquery);
                       if(mysqli_num_rows($result) <= 0){
                         
                         $data .=  '<tr>           
                   <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center">'. "record not found".'</td>
                   
                                  </tr>';
                       }else{
                       
                          while ($row=mysqli_fetch_array($result)) {
                 $data .=  '<tr>    
                 <td>'.$row['Time'].'</td>       
                   <td>'. $row['Monday'].'</td>
                   <td>'. $row['Tuesday'].'</td>
                   <td>'. $row['Wednesday'].'</td>
                   <td>'. $row['Thrusday'].'</td>
                   <td>'. $row['Friday'].'</td>
                   <td>'. $row['Saturday'].'</td>
                
                                  </tr>';
                          }
                         }
       $data .='</tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
      </div>';
      echo $data;
      
      
}

/*******************************************teacher attendance show to admin********************************************************/

if(isset($_POST['attdate'])){
    
  $dates_id=$_POST['attdate'];
  
   

        $data ='<div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h4>Display Student</h4>
            
           </div>
           <h6 style="padding-left:25px;color:black;">Date: '.$dates_id.'</h6>
           <div class="card-body">
             <div class="table-responsive">
               <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                 <thead>
                   <tr>
                   <th>Sr No</th>
                   <th>Profile Photo</th>
                   <th>Teacher Name</th>
                   <th>Attendance Status</th>
                   </tr>
                 </thead>
                 <tbody>';
                 
                       
                     
                        $displayquery="select t1.*,t2.* from teacher_attendance as t1 
                                       left join teacher as t2 on t1.teacher_id=t2.teacher_id  where t1.t_a_date='$dates_id'";
                       $result = mysqli_query($conn,$displayquery);
                       $cont=1;
                       if(mysqli_num_rows($result) <= 0){
                         
                         $data .=  '<tr>           
                   <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center">'. "record not found".'</td>
                   
                                  </tr>';
                       }else{
                       
                          while ($row=mysqli_fetch_array($result)) {
                 $data .=  '<tr>    
                 <td>'.$cont.'</td>      
                 <td><img src="'.$row['profile_photo_t'].'" style="width:70px;height:70px;border-radius: 50px;margin-top: 10px;"></td> 
                   <td>'. $row['t_f_name']." ".$row['t_l_name'].'</td>';
                   if($row['attendance_status'] == "present"){
                    $data .='<td><div class="badge badge-success" style="text-transform:capitalize;">'. $row['attendance_status'].'</div></td>';
                   }elseif($row['attendance_status'] == "absent"){
                    $data .='<td><div class="badge badge-danger" style="text-transform:capitalize;">'. $row['attendance_status'].'</div></td>';
                   }
                   
                 
                               $data .='</tr>';
                       $cont++;   }
                         }
       $data .='</tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
      </div>';
      echo $data;
      
      
}


/********************************student attendance show to admin*************************************/
if(isset($_POST['attdates'] , $_POST['attstudent'])){
    
  $dates_id=$_POST['attdates'];
  $classids=$_POST['attstudent'];
  $query="select * from class where class_id='$classids'";
  $result1=mysqli_query($conn,$query);
  $rows=mysqli_fetch_array($result1); 
  $classname=$rows['class'];
   
   

        $data ='<div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h4>Display Student</h4>
            
           </div>
           <h6 style="padding-left:25px;color:black;">Class: '.$classname.'</h6>
           <h6 style="padding-left:25px;color:black;">Date: '.$dates_id.'</h6>
           
           <div class="card-body">
             <div class="table-responsive">
               <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                 <thead>
                   <tr>
                   <th>Roll No</th>
                   <th>Profile Photo</th>
                   <th>Student Name</th>
                   <th>Attendance Status</th>
                   </tr>
                 </thead>
                 <tbody>';
                 
                       
                     
                         $displayquery="select t1.*,t2.*,t3.* from student_attendance as t1 
                                       left join student as t2 on t1.student_id=t2.student_id 
                                       left join class as t3 on t2.class_id=t3.class_id  where t1.s_a_date='$dates_id' and t2.class_id='$classids'";
                       $result = mysqli_query($conn,$displayquery);
                     
                       if(mysqli_num_rows($result) <= 0){
                         
                         $data .=  '<tr>           
                   <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center">'. "record not found".'</td>
                   
                                  </tr>';
                       }else{
                       
                          while ($row=mysqli_fetch_array($result)) {
                 $data .=  '<tr>    
                 <td>'.$row['roll_no'].'</td> 
                 <td><img src="'.$row['profile_photo_s'].'" style="width:70px;height:70px;border-radius: 50px;margin-top: 10px;"></td>      
                   <td>'. $row['first_name']." ".$row['last_name'].'</td>';
                   if($row['attendance_status'] == "present"){
                    $data .='<td><div class="badge badge-success" style="text-transform:capitalize;">'. $row['attendance_status'].'</div></td>';
                   }elseif($row['attendance_status'] == "absent"){
                    $data .='<td><div class="badge badge-danger" style="text-transform:capitalize;">'. $row['attendance_status'].'</div></td>';
                   }
                   
                 
                               $data .='</tr>';
                         }
                         }
       $data .='</tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
      </div>';
      echo $data;
      
      
}
?>
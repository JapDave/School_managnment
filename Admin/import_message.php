<?php
include "connection.php";

if(isset($_POST['shower'])){
    $uservalue=$_POST['shower'];

    if($uservalue == "student"){
         $data=' <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h4>Display Message</h4>
             </div>
           
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                   <thead>
                     <tr>
                     <th>Sr No</th>
                     <th>Student Name</th>
                     <th>Class</th>
                     <th>Message</th>
                     <th>Date</th>
                     <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>';
                
                         
                         $displayquery="SELECT t1.*,t2.*,t3.* from message as t1 LEFT join student as t2 on t1.student_id=t2.student_id 
                                        LEFT JOIN class as t3 on t2.class_id=t3.class_id where t1.student_id=t2.student_id";
                         $result = mysqli_query($conn,$displayquery);
                         if(mysqli_num_rows($result) <= 0){

                             $data.='<tr>
                               <td colspan="2" style="color:red;font-size:20px">No Message</td>
                             </tr>';

                         }else{
                          $number=1;
                            while ($row=mysqli_fetch_array($result)) {
                            
                     
                     $data .='<tr>
                     <td>'. $number.'</td>
                     <td>'. $row['first_name']." ".$row['last_name'].'</td>
                     <td>'. $row['class'].'</td>
                     <td>'. $row['message'].'</td>
                     <td>'. $row['message_date'].'</td>
                    
                     
                     <td> 
                        <a  href="delete_data.php?message_id='.$row['message_id'].'"><i class="fas fa-trash"></i></a>
                    </td>  
                     </tr>';
                   
                      $number++; } } 
                
             
                    
                  $data .= '</tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>';
       echo $data;
    }elseif($uservalue == "parent"){
        $data=' <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h4>Display Message</h4>
             </div>
           
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                   <thead>
                     <tr>
                     <th>Sr No</th>
                     <th>Parent Name</th>
                    
                     <th>Message</th>
                     <th>Date</th>
                     <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>';
                
                         
                         $displayquery="SELECT t1.*,t2.* from message as t1 LEFT join parent as t2 on t1.parent_id=t2.parent_id where t1.parent_id=t2.parent_id";
                         $result = mysqli_query($conn,$displayquery);
                         if(mysqli_num_rows($result) <= 0){

                             $data.='<tr>
                               <td colspan="2" style="color:red;font-size:20px">No Message</td>
                             </tr>';

                         }else{
                          $number=1;
                            while ($row=mysqli_fetch_array($result)) {
                            
                     
                     $data .='<tr>
                     <td>'. $number.'</td>
                     <td>'. $row['p_first_name']." ".$row['p_last_name'].'</td>
                   
                     <td>'. $row['message'].'</td>
                     <td>'. $row['message_date'].'</td>
                    
                     
                     <td> 
                        <a  href="delete_data.php?message_p_id='.$row['message_id'].'"><i class="fas fa-trash"></i></a>
                    </td>  
                     </tr>';
                   
                      $number++; } } 
                
             
                    
                  $data .= '</tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>';
       echo $data;

    }elseif($uservalue == "teacher"){
        $data=' <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h4>Display Message</h4>
             </div>
           
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                   <thead>
                     <tr>
                     <th>Sr No</th>
                     <th>Teacher Name</th>
                    
                     <th>Message</th>
                     <th>Date</th>
                     <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>';
                
                         
                         $displayquery="SELECT t1.*,t2.* from message as t1 LEFT join teacher as t2 on t1.teacher_id=t2.teacher_id where t1.teacher_id=t2.teacher_id";
                         $result = mysqli_query($conn,$displayquery);
                         if(mysqli_num_rows($result) <= 0){

                             $data.='<tr>
                               <td colspan="2" style="color:red;font-size:20px">No Message</td>
                             </tr>';

                         }else{
                          $number=1;
                            while ($row=mysqli_fetch_array($result)) {
                            
                     
                     $data .='<tr>
                     <td>'. $number.'</td>
                     <td>'. $row['t_f_name']." ".$row['t_l_name'].'</td>
                   
                     <td>'. $row['message'].'</td>
                     <td>'. $row['message_date'].'</td>
                    
                     
                     <td> 
                        <a  href="delete_data.php?message_t_id='.$row['message_id'].'"><i class="fas fa-trash"></i></a>
                    </td>  
                     </tr>';
                   
                      $number++; } } 
                
             
                    
                  $data .= '</tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>';
       echo $data;
        
    }else{

    }
}


?>
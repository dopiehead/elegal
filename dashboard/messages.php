
<?php session_start();

?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
    <link rel="stylesheet" href="../assets/css/dashboard/messages.css">

</head>

<body class='bg-light'> 

     <div class='px-3'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

         <?php include ("navigator.php"); ?>
                    
             <div class='dashboard'>
                 
                 <h4 class='mt-5'>Messages</h4>

                 <?php

                     $you ="essentialng@gmail.com";

                     require '../engine/config.php';

                     $limit = 2;  

                     $getQuery = "select * from messages where receiver_email = '$you' and is_receiver_deleted = 0 group by sender_email"; 

                     $result = mysqli_query($conn, $getQuery);  

                     $total_rows = $result->num_rows;    

                     $total_pages = ceil ($total_rows / $limit);   

                     if (!isset ($_GET['page']) ) {  
                         $page_number = 1; 

                     } else {  
                         $page_number = $_GET['page'];  
                     }   

                     $initial_page = ($page_number-1) * $limit;

                     $time = time();

                     $inbox="select *  from (
                     select * from messages where receiver_email = '$you' and is_receiver_deleted = 0 order by has_read asc limit 18446744073709551615) as sub group by sender_email limit $initial_page,$limit";

                     $in = mysqli_query($conn, $inbox); 

                     $datafound = $in->num_rows; ?>

                  <div>

                     <table class='table table-bordered table-responsive table-hover table-striped text-center  w-100'>

                         <thead class='text-secondary'>

                             <tr>
                                  <th>Action</th>
                                  <th><b>From</b></th>
                                  <th>Subject</th>
                                  <th>Date recieved</th>

                             </tr>

                        </thead>

                         <tbody>
                          
                         <?php

                             while ($row = mysqli_fetch_array($in)) {

                                 echo "<tr id='{$row['id']}' class='border_bottom'>";

                                 echo "<td id='delete' style='width:; text-align: center;'>

                                 <a style='color:red;' class='remove' name='' id='{$row['sender_email']}'><i class='fa fa-trash'></i></a>

                                 </td>";

                                 $user_name=$row['sender_email'];

                                 $subject = $row['subject'];

                                 $getUsercount = mysqli_query($conn,"select * from messages where sender_email = '$user_name' and receiver_email = '$you' and is_receiver_deleted = 0 and has_read = 0");

                                 if ($getUsercount->num_rows>0) {

                                      $countgetuser = "<span class='numbering'>(".$getUsercount->num_rows.")</span> ";

                                 }

                                 else{
                                         $countgetuser="";
                                 }

                                 ?>

                                 <td id='from' style='text-align: center;'><a href='chat.php?user_name=<?php echo urlencode($user_name);?>'><?php echo filterEmailDomain($row['sender_email']);?></a><br></td>

                                 <?php

                                 if ($row['has_read']==0) {
                                
                                 ?>   

                                 <td id='message' style='text-align: center;font-weight:bold;font-size:14px;'><a style='text-align: center;font-weight:bold;font-size:13px;'  href='chat.php?user_name=<?php echo urlencode($user_name);?>' id='reply' onclick='' id='' class='reply'><?php echo$countgetuser."".$row['subject'];?></a></td>
                            
                                 <?php

                                      echo "<td id='date' style=' text-align: center;'>".$row['date']."<br></td>";
                                 }

                                 else {
                                 
                                 ?>

                                     <td id='message' style='text-align: center;text-transform: capitalize;font-weight:normal;'><a href='chat.php?user_name=<?php echo urlencode($user_name);?>' style='font-size:13px;' onclick='' id='reply' class='reply'><?php echo$countgetuser."".$row['subject'];?></a></td>

                                 <?php

                                     echo "<td id='date' style=' text-align: center;'>".$row['date']."<br></td>";
                               
                                    }

                                 }

                             ?>

                             </tr>

                         </tbody>


                     </table>


                  </div>

                
                  <?php 

                         if ($page_number>1) {

                             echo '<a href = "messages.php?page=' . ($page_number-1) . '"> Prev </a>';  

                         }

                             for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

                                 if ($page_number==$total_pages) {

                                     echo '<a class="active"  href = "messages.php?page=' . $page_number . '">' . $page_number . ' </a>'; 
                                 }

                                 else{

                                     echo '<a href = "messages.php?page=' . $page_number . '">' . $page_number . ' </a>'; 
                                 }
                         }  

                         if ($page_number<$total_pages) {

                              $next = '<a  href = "messages.php?page=' . ($page_number+1) . '"> Next</a>';  

                              print_r($next);

                         }

                     ?>

             </div>
       

     </div>

     <?php 
     
     function filterEmailDomain($email) {
       
        $domain = substr($email, strpos($email, '@'));
        if ($domain === "@gmail.com" || $domain === "@yahoo.com") {
            $email = substr($email, 0, strpos($email, '@')); 
        }
        return $email;
    }
     
     ?>
    
</body>
</html>
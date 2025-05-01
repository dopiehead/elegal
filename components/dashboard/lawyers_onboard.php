<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$firm_id = isset($_SESSION['firm_id']) && !empty($_SESSION['firm_id']) ? $_SESSION['firm_id'] : null;

require ('../../engine/config.php'); 
?>
<h3 class='fw-bold mb-3 mt-2'>Lawyers on board</h3>


<table class=' table table-responsive table-striped table-hover w-100 text-sm px-2'>

     <thead>
         <tr class='bg-success text-white rounded w-100'>     
             <th scope='cols'>Lawyer</th>
             <th scope='cols'>Qualification</th>
             <th scope='cols'>Cases</th>
             <th scope='cols'>Cases won</th>
             <th scope='cols'>Cases lost</th>
             <th scope='cols'>Success rate</th>
             <th class='text-center' scope='cols'>Action</th>
         </tr>
      </thead>

<tbody>
         <?php
             $getlawyerslist = $conn->prepare("SELECT * FROM lawyer_profile WHERE lawyer_firm_id = ? ");
             $getlawyerslist->bind_param("i",$firm_id);
             if($getlawyerslist->execute()){
                $result = $getlawyerslist->get_result();
                while($row = $result->fetch_assoc()){
                    $lawyer_id = $row['id'];
                    $cases = $row['cases'];
                    $cases_won = $row['cases_won'];
                    $cases_lost = $row['cases_lost'];          
                ?>
         <tr>
             <td class='text-capitalize'><?= htmlspecialchars($row['lawyer_name'] ?? " ")?></td>
             <td class='text-uppercase'><?= htmlspecialchars($row['lawyer_qualification'] ?? " ")?></td>
             <td class='text-up'><?= htmlspecialchars($row['cases'] ?? " ")?></td> 
             <td><?= htmlspecialchars($row['cases_won'] ?? " ")?></td> 
             <td><?= htmlspecialchars($row['cases_lost'] ?? " ")?></td>                                 
             <td>
              <?php 
                 if ($cases > 0) {
                    $success_rate = ($cases_won / $cases) * 100;
                    $success = round($success_rate) . "%";
                } else {
                    $success = "N/A";
                }
              ?>
              <?= htmlspecialchars($success) ?>
             </td>
             <td>                 
                 <div class='d-flex justify-content-evenly gap-1 text-sm'>  
                     <a class=' text-success  ongoing_cases btn-show-lawyers' id='<?php echo htmlspecialchars($lawyer_id); ?>'><span class='fa fa-eye'></span></a>
                     <a class=' text-danger btn-remove-lawyers' href='delete-lawyers.php?id=<?php echo htmlspecialchars($lawyer_id);?>'> <span class='fa fa-trash'></span></a>
                 </div>
             </td>                                        
          </tr>
        <?php
                }
             }  
         ?>
</tbody>

</table>

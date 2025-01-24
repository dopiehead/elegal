
<?php require ('../../engine/config.php'); ?>
<h3 class='fw-bold mb-3 mt-2'>Concluded cases</h3>

<table class=' table table-responsive table-striped table-hover w-100 text-sm px-2'>

<thead>

    <tr class='bg-success text-white rounded w-100'>

        <th scope='cols'>Client</th>
        <th scope='cols'>Lawyer</th>
        <th scope='cols'>Case</th>
        <th scope='cols'>Case status</th>
        <th scope='cols'>Paid</th>
        <th scope='cols'>Unpaid</th>

    </tr>

</thead>

<tbody>

<?php 

$get= mysqli_query($conn,"SELECT * FROM court_cases WHERE case_status = 1"); 

     if($get){

        while($row = mysqli_fetch_array($get)) {
          
?>

     <tr class='text-capitalize'>

          <td><?php echo htmlspecialchars($row['client']);?></td>
          <td><?php echo htmlspecialchars($row['lawyer']);?></td>
          <td><?php echo htmlspecialchars($row['court_case']);?></td>                                 
          <td> <?php  echo ($row['case_status'] == '0') ? "on going" : "case concluded"; ?></td>                                 
          <td><?php echo htmlspecialchars($row['paid']);?></td>                                 
          <td><span class='text-danger'><?php if($row['unpaid']==0){ echo "settled";} else{ echo htmlspecialchars($row['unpaid']);};?></span></td>
          <td><a class='text-primary conclude_cases text-decoration-unline' id='<?php echo htmlspecialchars($row['id']); ?>'>view details</a></td>


     </tr>

<?php
    
       }
    }

?>

</tbody>

</table>






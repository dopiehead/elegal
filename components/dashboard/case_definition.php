<?php require ('../../engine/config.php'); ?>

<h3 class='fw-bold mb-3 mt-2'>Case Definition</h3>


<table class=' table table-responsive table-striped table-hover w-100  text-sm px-2'>

     <thead class='bg-success text-success rounded w-100'>

         <tr>

     
             <th scope='cols'>Case</th>
             <th scope='cols'>Plaintiff</th>
             <th scope='cols'>Defendant</th>
             <th scope='cols'>Lawyer</th>
             <th scope='cols'>Status</th>
             <th scope='cols'>paid</th>
             <th scope='cols'>Action</th>
       

         </tr>

      </thead>

<tbody>

         <tr>

             <td>4320</td>
             <td>Alan walker</td>
             <td>Ekemena Anchor</td>                                 
             <td>Nneka Harry</td>  
             <td>Ongoing</td> 
             <td>50%</td> 
             <td>
                  
                 <div class='d-flex justify-content-evenly gap-1 text-sm'>  
                     <a class=' text-success  ongoing_cases ' id='<?php echo htmlspecialchars($row['id']); ?>'><span class='fa fa-eye'></span></a>
                     <a class=' text-primary' href='edit-case.php?id=<?php echo htmlspecialchars($row['id']);?>'><span class='fa fa-edit'></span></a>
                     <a class=' text-danger' href='delete-case.php?id=<?php echo htmlspecialchars($row['id']);?>'> <span class='fa fa-trash'></span></a>
                 </div>

             </td>   
                                  
          </tr>



</tbody>

</table>

<h3 class='fw-bold mb-3 mt-2'>Lawyers on board</h3>


<table class=' table table-responsive table-striped table-hover w-100 text-sm px-2'>

     <thead>

         <tr class='bg-success text-white rounded w-100'>

     
             <th scope='cols'>Lawyer</th>
             <th scope='cols'>Qualification</th>
             <th scope='cols'>Case</th>
             <th scope='cols'>Success rate</th>
             <th class='text-center' scope='cols'>Action</th>
       

         </tr>

      </thead>

<tbody>

         <tr>

             <td>Alan Walker</td>
             <td>LL.M</td>
             <td>24</td>                                 
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
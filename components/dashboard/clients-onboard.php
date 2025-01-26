
<?php require ('../../engine/config.php'); ?>

<h3 class='fw-bold mb-3 mt-2'>Clients on board</h3>


<table class=' table table-responsive table-striped table-hover w-100 text-sm px-2'>

<thead>

    <tr class='bg-success text-white rounded w-100'>

        <th scope='cols'>Client</th>
        <th scope='cols'>Lawyer</th>
        <th scope='cols'>Case</th>
        <th scope='cols'>Case status</th>
        <th scope='cols'>Paid</th>
        <th scope='cols'>Unpaid</th>
        <th class='text-center'>Action</th>

    </tr>

</thead>

<tbody>

    <tr>

        <td>Alan Walker</td>
        <td>Nneka Harry</td>
        <td>4320</td>                                 
        <td>Ongoing</td>                                 
        <td>50%</td>                                 
        <td><span class='text-danger'>50%</span></td>
        <td>               
             <div class='d-flex justify-content-evenly gap-3 text-sm'>  
                 <a class=' text-success conclude_cases ' id='<?php echo htmlspecialchars($row['id']); ?>'><span class='fa fa-eye'></span></a>
                 <a class=' text-primary' href='edit-case.php?id=<?php echo htmlspecialchars($row['id']);?>'><span class='fa fa-edit'></span></a>
                 <a class=' text-danger' href='delete-case.php?id=<?php echo htmlspecialchars($row['id']);?>'> <span class='fa fa-trash'></span></a>
             </div>

        </td>


    </tr>



</tbody>




</table>
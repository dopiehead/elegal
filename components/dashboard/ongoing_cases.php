<?php require('../../engine/config.php');
$firm_id = isset($_SESSION['firm_id']) && !empty($_SESSION['firm_id']) ? $_SESSION['firm_id'] : null;
?>

<h3 class='fw-bold mb-3 mt-2'>Ongoing cases</h3>

<table class='table table-responsive table-striped table-hover w-100 text-sm px-2 table_ongoing'>
    <thead>
        <tr class='bg-success text-white rounded w-100'>
        
            <th scope='col'>Lawyer</th>
            <th scope='col'>Case Title</th>
            <th scope='col'>Case Status</th>
            <th scope='col'>Paid</th>
            <th scope='col'>Unpaid</th>
            <th scope='col'>Date Created</th>
            <th class='text-center'>Action</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
        $query = "
            SELECT 
                clients_on_board.id AS client_id,             
                clients_on_board.phone_number AS phone_number,
                clients_on_board.work_place AS work_place,
                clients_on_board.occupation AS occupation,
                clients_on_board.case_title AS case_title,
                clients_on_board.case_status AS case_status,
                clients_on_board.paid AS paid,
                clients_on_board.unpaid AS unpaid,
                clients_on_board.date_created AS date_created,
                lawyer_profile.lawyer_name AS lawyer_name
            FROM clients_on_board
            JOIN lawyer_profile ON clients_on_board.lawyer = lawyer_profile.lawyer_name
            WHERE clients_on_board.case_status = 'ongoing' ORDER BY clients_on_board.date_created DESC
        ";

        $result = $conn->query($query);
        if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
        <tr>        

            <td class='text-capitalize'><span><?= htmlspecialchars($row['lawyer_name'] ?? " not available"); ?></span></td>
            <td class='text-capitalize'><?= htmlspecialchars($row['case_title'] ?? " not available"); ?></span></td>
            <td class='text-capitalize'><a class='row_ongoing text-decoration-none text-dark' contenteditable onblur="save_data()"><?= htmlspecialchars($row['case_status'] ? " ongoing" : "concluded"); ?></a></td>
            <td class='text-'><?= htmlspecialchars($row['paid'] ?? " 0")."%"; ?></td>
            <td><span class='text-danger'><?= htmlspecialchars($row['unpaid'] ?? " not available")."%"; ?></span></td>
            <td><?= htmlspecialchars($row['date_created']) ?></td>
            <td>
                <div class='d-flex justify-content-evenly gap-3 text-sm'>
         
                     <a class='text-primary edit_ongoing'><span class='fa fa-edit'></span></a>

                </div>
            </td>
        </tr>
        <?php
            endwhile;
        else:
        ?>
        <tr> 
            <td colspan="17" class="text-center text-muted">No case found.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
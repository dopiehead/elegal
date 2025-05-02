<?php 
require('../../engine/config.php');
session_start();
$firm_id = isset($_SESSION['firm_id']) && !empty($_SESSION['firm_id']) ? $_SESSION['firm_id'] : null;
?>

<div class='mb-3 w-100 d-flex justify-content-between align-items-center'>
     <h3 class='fw-bold'>Clients on board</h3>
     <a class='fw-bold text-dark btn btn-warning add_new_client'><i class='fa fa-plus fa-1x'></i> Add new client</a>
</div>

<table class='table table-responsive table-striped table-hover w-100 text-sm px-2 table_client'>
    <thead>
        <tr class='bg-success text-white rounded w-100'>
            <th scope='col'>Client Image</th>
            <th scope='col'>Client Name</th>
            <th scope='col'>Address</th>
            <th scope='col'>Email</th>
            <th scope='col'>Next of Kin</th>
            <th scope='col'>Relationship with Next of kin</th>
            <th scope='col'>Spouse</th>
            <th scope='col'>Phone Number</th>
            <th scope='col'>Workplace</th>
            <th scope='col'>Occupation</th>
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
                clients_on_board.client_image AS client_image,
                clients_on_board.client_name AS client_name,
                clients_on_board.client_address AS client_address,
                clients_on_board.email AS client_email,
                clients_on_board.next_of_kin AS next_of_kin,
                clients_on_board.relationship AS relationship,
                clients_on_board.spouse AS spouse,
                clients_on_board.phone_number AS phone_number,
                clients_on_board.work_place AS work_place,
                clients_on_board.occupation AS occupation,
                clients_on_board.case_title AS case_title,
                clients_on_board.case_status AS case_status,
                clients_on_board.paid AS paid,
                clients_on_board.unpaid AS unpaid,
                clients_on_board.date_created AS date_created,
                lawyer_profile.lawyer_name
            FROM clients_on_board
            JOIN lawyer_profile ON clients_on_board.lawyer = lawyer_profile.lawyer_name
            ORDER BY clients_on_board.date_created DESC
        ";

        $result = $conn->query($query);

        if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td>
                <?php if (!empty($row['client_image'])): ?>
                    <img src="<?= htmlspecialchars($row['client_image']) ?>" alt="Client Image" width="40" height="40" class="rounded-circle">
                <?php else: ?>
                    <span class="text-muted">No Image</span>
                <?php endif; ?>
            </td>
            <td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'client_name')">
        <?= htmlspecialchars($row['client_name'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'client_address')">
        <?= htmlspecialchars($row['client_address'] ?? "not available") ?>
    </span>
</td>

<td>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'client_email')">
        <?= htmlspecialchars($row['client_email'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'next_of_kin')">
        <?= htmlspecialchars($row['next_of_kin'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'relationship')">
        <?= htmlspecialchars($row['relationship'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'spouse')">
        <?= htmlspecialchars($row['spouse'] ?? "not available") ?>
    </span>
</td>

<td>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'phone_number')">
        <?= htmlspecialchars($row['phone_number'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'work_place')">
        <?= htmlspecialchars($row['work_place'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'occupation')">
        <?= htmlspecialchars($row['occupation'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'lawyer_name')">
        <?= htmlspecialchars($row['lawyer_name'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'case_title')">
        <?= htmlspecialchars($row['case_title'] ?? "not available") ?>
    </span>
</td>

<td class='text-capitalize'>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'case_status')">
        <?= htmlspecialchars($row['case_status'] ?? "not available") ?>
    </span>
</td>

<td>
    <span contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'paid')">
        <?= htmlspecialchars($row['paid'] ?? "not available") . "%" ?>
    </span>
</td>

<td>
    <span class='text-danger' contenteditable onblur="save_data(this, '<?= $row['client_id'] ?>', 'unpaid')">
        <?= htmlspecialchars($row['unpaid'] ?? "not available") . "%" ?>
    </span>
</td>

            <td><?= htmlspecialchars($row['date_created']) ?></td>
            <td>
                <div class='d-flex justify-content-evenly gap-3 text-sm'>
         
                    <a class='text-primary' onclick='edit_client()'><span class='fa fa-edit'></span></a>
                    <a class='text-success' href='mailto:<?= htmlspecialchars($row['client_email']) ?>'>
                         <span class='fa fa-envelope'></span>
                    </a>
                    <a class='text-danger' href='delete-client.php?id=<?= htmlspecialchars($row['client_id']) ?>'><span class='fa fa-trash'></span></a>
                </div>
            </td>
        </tr>
        <?php
            endwhile;
        else:
        ?>
        <tr>
            <td colspan="17" class="text-center text-muted">No clients found.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<div id='popup-add-client' class='popup-add-client'>
    <a style='position:absolute;right:0;margin-top:-13px;' class='text-danger border-0 bg-light rounded-circle py-1 px-3 add_new_client'>&times;</a>

<br>

<h4 class='fw-bold mb-2'> Add new clients</h4>
  
    <div class='add-new-client-content mt-2 py-2 px-3 rounded-2 border border-2 border-warning'>
 
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-2">
                <label>Client Image</label>
                <input type="file" name="client_image" class="form-control">
            </div>

            <div class="mb-2">
                <label>Client Name</label>
                <input type="text" name="client_name" class="form-control">
            </div>

            <div class="mb-2">
                <label>Client Address</label>
                <input type="text" name="client_address" class="form-control">
            </div>

            <div class="mb-2">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-2">
                <label>Next of Kin</label>
                <input type="text" name="next_of_kin" class="form-control">
            </div>

            <div class="mb-2">
                <label>Relationship</label>
                <input type="text" name="relationship" class="form-control">
            </div>

            <div class="mb-2">
                <label>Spouse (if any)</label>
                <input type="text" name="spouse" class="form-control">
            </div>

            <div class="mb-2">
                <label>Phone Number</label>
                <input type="text" name="phone_number" class="form-control">
            </div>

            <div class="mb-2">
                <label>Workplace</label>
                <input type="text" name="work_place" class="form-control">
            </div>

            <div class="mb-2">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control">
            </div>

            <div class="mb-2">
                <label>Lawyer</label>

             <select name="lawyer" class='form-control text-capitalize'>

                 <option value="">Select lawyer</option>

                 <?php
                    $getlawyerslist = $conn->prepare("SELECT * FROM lawyer_profile WHERE lawyer_firm_id = ? ");
                    $getlawyerslist->bind_param("i",$firm_id);
                    if($getlawyerslist->execute()){
                          $result = $getlawyerslist->get_result();
                          while($lawyer = $result->fetch_assoc()){ ?>
                          <option value="<?= htmlspecialchars($lawyer['lawyer_name'])?>"><?= htmlspecialchars($lawyer['lawyer_name'])?></option>
                 <?php
                         }
                      }                             
                 ?>

             </select>
            </div>

            <div class="mb-2">
                <label>Case Title</label>
                <input type="text" name="case_title" class="form-control">
            </div>

            <div class="mb-2">
                <label>Case Status</label>
                <input type="text" name="case_status" class="form-control">
            </div>

            <div class="mb-2">
                <label>Paid (%)</label>
                <input type="number" name="paid" class="form-control" min="0" max="100">
            </div>

            <div class="mb-2">
                <label>Unpaid (%)</label>
                <input type="number" name="unpaid" class="form-control" min="0" max="100">
            </div>

            <div class="mb-2">
                <label>Date Created</label>
                <input type="date" name="date_created" class="form-control">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save Client</button>
            </div>
        </form>

    </div>
</div>



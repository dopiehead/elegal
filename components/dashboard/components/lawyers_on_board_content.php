<?php
if (!empty($_POST['id'])) {
    require("../../../engine/config.php");

    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM lawyer_profile WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($lawyer = $result->fetch_assoc()) {
?>
<div class="container position-relative right-0 mt-4 px-4 py-5">
    <a class='close-btn text-danger'>&times;</a>
    <div class="row">
        <div class="w-100">
            <div class="card shadow-lg border-light p-3">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Lawyer Details</h5>

                    <div class="d-flex flex-md-row flex-column justify-content-between align-items-start">
                        <div class="d-flex flex-column gap-3 text-capitalize w-75">
                            <span class="text-sm text-muted"><strong>Lawyer ID:</strong> <?= htmlspecialchars($lawyer['id']); ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer Name:</strong> <span class='text-primary'><?= htmlspecialchars($lawyer['lawyer_name']); ?></span></span>
                            <span class="text-sm text-muted"><strong>Lawyer Email:</strong> <?= htmlspecialchars($lawyer['lawyer_email']); ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer Location:</strong> <?= htmlspecialchars($lawyer['lawyer_location']); ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer Experience:</strong> <?= htmlspecialchars($lawyer['lawyer_experience']) . " years"; ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer DOB:</strong> <?= htmlspecialchars($lawyer['lawyer_dob']); ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer Qualification:</strong> <?= htmlspecialchars($lawyer['lawyer_qualification']); ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer Education:</strong> <?= htmlspecialchars($lawyer['lawyer_education']); ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer Bio:</strong> <?= htmlspecialchars($lawyer['lawyer_bio']); ?></span>
                            <span class="text-sm text-muted"><strong>Lawyer Phone No:</strong> <?= htmlspecialchars($lawyer['lawyer_phone_no']); ?></span>
                            <span class="text-sm text-muted"><strong>Practice Areas:</strong> <?= htmlspecialchars($lawyer['practice_areas']); ?></span>
                            <span class="text-sm text-muted"><strong>Published Articles:</strong> <?= htmlspecialchars($lawyer['published_articles']); ?></span>
                            <span class="text-sm text-muted"><strong>Supreme Court Number:</strong> <?= htmlspecialchars($lawyer['supreme_court_number']); ?></span>
                            <span class="text-sm text-muted"><strong>Joined:</strong> <?= htmlspecialchars($lawyer['created_at']); ?></span>
                        </div>

                        <div class='w-25'>
                             <?php if($lawyer['lawyer_role']!='secretary'): ?>
                            <a id="<?= htmlspecialchars($lawyer['id']) ?>" class='btn btn-warning text-dark shadow-lg border-0 rounded-2 btn-assign-secretary'>Assign as Secretary</a>
                             <?php else: ?>
                            <a id="<?= htmlspecialchars($lawyer['id']) ?>" class='btn btn-danger text-dark shadow-lg border-0 rounded-2 btn-remove-secretary text-white'>Remove as Secretary</a>
                             <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
    $stmt->close();
    $conn->close();
}
?>

<?php
require("config.php");

$id = isset($_POST['id']) && !empty($_POST['id']) ? $conn->real_escape_string($_POST['id']) : null;

if ($id):

    $getid = $conn->prepare("SELECT 
        record_id,
        offender_name,
        age,
        nationality,
        profession,
        address,
        phone_number,
        religion,
        tribe,
        lga,
        height,
        next_of_kin,
        place_of_work,
        employer_name,
        employer_number,
        employer_address,
        mug_shot,
        thumb_print 
        FROM police_records WHERE record_id = ? ");

    $getid->bind_param("i", $id);

    if ($getid->execute()):
        $result = $getid->get_result();
        if ($result->num_rows > 0):
            $row = $result->fetch_assoc();
?>
 
<div class="card shadow mt-3 animate-fade-in">
    <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
        <span>Personal Information</span>
        <a id="close-details" class="close-details text-white"><i class="fa fa-close fa-2x"></i></a>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-4"><strong>Name:</strong> <?= htmlspecialchars($row['offender_name']) ?></div>
            <div class="col-md-4"><strong>Age:</strong> <?= htmlspecialchars($row['age']) ?></div>
            <div class="col-md-4"><strong>Nationality:</strong> <?= htmlspecialchars($row['nationality']) ?></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-4"><strong>Profession:</strong> <?= htmlspecialchars($row['profession']) ?></div>
            <div class="col-md-4"><strong>Phone:</strong> <?= htmlspecialchars($row['phone_number']) ?></div>
            <div class="col-md-4"><strong>Religion:</strong> <?= htmlspecialchars($row['religion']) ?></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-4"><strong>Tribe:</strong> <?= htmlspecialchars($row['tribe']) ?></div>
            <div class="col-md-4"><strong>LGA:</strong> <?= htmlspecialchars($row['lga']) ?></div>
            <div class="col-md-4"><strong>Height:</strong> <?= htmlspecialchars($row['height']) ?> cm</div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Address:</strong> <?= htmlspecialchars($row['address']) ?></div>
            <div class="col-md-6"><strong>Next of Kin:</strong> <?= htmlspecialchars($row['next_of_kin']) ?></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-4"><strong>Workplace:</strong> <?= htmlspecialchars($row['place_of_work']) ?></div>
            <div class="col-md-4"><strong>Employer:</strong> <?= htmlspecialchars($row['employer_name']) ?></div>
            <div class="col-md-4"><strong>Employer Phone:</strong> <?= htmlspecialchars($row['employer_number']) ?></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12"><strong>Employer Address:</strong> <?= htmlspecialchars($row['employer_address']) ?></div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 text-center">
                <strong>Mug Shot:</strong><br>
                <img src="<?= htmlspecialchars($row['mug_shot']) ?>" class="img-thumbnail" style="max-height: 200px;" alt="Mug Shot">
            </div>
            <div class="col-md-6 text-center">
                <strong>Thumb Print:</strong><br>
                <img src="<?= htmlspecialchars($row['thumb_print']) ?>" class="img-thumbnail" style="max-height: 200px;" alt="Thumb Print">
            </div>
        </div>
    </div>
</div>

<?php
        else:
            echo "<div class='alert alert-warning'>No record found for the given ID.</div>";
        endif;
    endif;
endif;
?>

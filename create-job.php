
<?php

session_start();
if(!isset($_SESSION['firm_id']) && !empty($_SESSION['firm_id'])){
     header("Location:jobs.php");
     exit();
}

else{

     $firm_id = $_SESSION['firm_id'];
     require("engine/config.php");
     $stmt = mysqli_query($conn,"SELECT * FROM lawyer_firm WHERE firm_id = '$firm_id'");
     $row = mysqli_fetch_assoc($stmt);
     include ("components/firm-content.php");
 
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("components/links.php"); ?>
    <title>Create job</title>
</head>
<body class='bg-light'>

    <?php include("components/nav.php"); ?>

    <br><br>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="fw-bold text-center mb-4">Create a job description</h2>
                        <p class="text-center text-muted mb-4">Tell us your expectations</p>

                        <form method="POST" action="submit_job.php">
                            <div class="mb-3">
                                <label class="form-label" for="job_title">Job title <span class='text-danger'>*</span></label>
                                <input type="text" id="job_title" name="job_title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="responsibilities">Responsibilities <span class='text-danger'>*</span></label>
                                <input type="text" id="responsibilities" name="responsibilities" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="experience_level">Experience level of Candidate <span class='text-danger'>*</span></label>
                                <input type="text" id="experience_level" name="experience_level" class="form-control" placeholder="1 year" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="work_mode">Work mode <span class='text-danger'>*</span></label>
                                <input type="text" id="work_mode" name="work_mode" class="form-control" placeholder="Remote" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="work_benefits">Work benefits <span class='text-danger'>*</span></label>
                                <input type="text" id="work_benefits" name="work_benefits" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="remuneration">Renumeration <span class='text-danger'>*</span></label>
                                <input type="text" id="remuneration" name="remuneration" class="form-control" placeholder='NGN 400,000' required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="job_requirements">Job requirements <span class='text-danger'>*</span></label>
                                <textarea id="job_requirements" name="job_requirements" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-dark w-100 py-2">Create</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <?php include("components/footer.php"); ?>

</body>

</html>
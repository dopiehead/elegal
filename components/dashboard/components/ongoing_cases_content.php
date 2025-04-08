
<?php

     $id = $_POST['id'];

     if(!empty($id)){

          require ("../../../engine/config.php");

          $stmt = mysqli_query($conn,"SELECT * FROM court_cases WHERE id ='".$id."'");
          
          while($case = mysqli_fetch_array($stmt)){
?>
<div class="container position-relative right-0 mt-4 px-4  py-5">
<a class='close-btn text-danger'>&times;</a>
    <div class="row">
        <div class="w-100">
            <div class="card shadow-lg border-light p-3">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Case Details</h5>
                    <div class="d-flex flex-column gap-3 text-capitalize">
                        <span class="text-sm text-muted"><strong>Details:</strong> <?php echo $case['details']; ?></span>
                        <span class="text-sm text-muted"><strong>Category of Case:</strong> <?php echo $case['category_of_case']; ?></span>
                        <span class="text-sm text-muted"><strong>Court Location:</strong> <?php echo $case['court_location']; ?></span>
                        <span class="text-sm text-muted"><strong>Court Judge:</strong> <?php echo $case['court_judge']; ?></span>
                        <span class="text-sm text-muted"><strong>Last Appearance:</strong> <?php echo $case['last_appearance']; ?></span>
                        <span class="text-sm text-muted"><strong>Next Appearance:</strong> <?php echo $case['next_appearance']; ?></span>
                        <span class="text-sm text-muted"><strong>Court Remark:</strong> <?php echo $case['court_remark']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</div>
         
<?php




          }
}

?>





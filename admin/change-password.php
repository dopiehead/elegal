
<?php session_start(); 

    require ("../engine/config.php");

    include ("admin-content.php");
?>

<div class="mt-1 mb-4">
      
      <h3 class=' fw-bold'>Change password</h3>

</div>

<div class="mt-3 border border-mute rounded px-2 py-5 d-flex flex-row flex-column gap-4 text-sm">
      <span class='text-secondary'> <?php echo htmlspecialchars($admin_email);  ?></span>
     <input type="text" class='form-control' placeholder="Enter Old password">
     <input type="text" class='form-control' placeholder="Enter new password">
     <input type="text" class='form-control' placeholder='Confirm new password'>

     <div class="text-center">
          <button class='btn btn-success text-white'>Submit</button>
     </div>
   
</div>
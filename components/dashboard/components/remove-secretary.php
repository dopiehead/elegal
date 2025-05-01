<?php
if (!empty($_POST['id'])) {
    require("../../../engine/config.php");

    $id = $_POST['id'];
    $stmt = $conn->prepare("UPDATE lawyer_profile SET lawyer_role = '' WHERE id = ?");
    $stmt->bind_param("i", $id);
   if($stmt->execute()):
     echo "1";
   else:
     echo $conn->error();
   endif;

}

?>
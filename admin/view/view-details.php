<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
      <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

     <title>Details page</title>

     <style>

            body{
                font-family:poppins;
            }

            input[type=text]{
                margin:8px 0;
            }

     </style>

</head>
<body class='bg-light'>

<?php

 if(isset($_GET['type']) && isset($_GET['id'])){

      require ("../../engine/config.php");
      
      $id = $_GET['id'];

      $type = $_GET['type'];
      
      if($type == 'courts'){
       
          $stmt = mysqli_query($conn, "SELECT * FROM courts where id = '".$id."'");

          $court = mysqli_fetch_array($stmt);

          if($court){

                     include ("../../components/court-content.php");
               ?>

               <div class='container '>

                    <div class='text-center m-3'>
                          <h6 class='fw-bold border-bottom border-2 pb-2'>Edit Court details</h6>                         
                    </div>

                    <div class='border border-mute px-3 py-2 mt-2'>                      
                          <form action="">
                               <input type="text" class='bg-white text-secondary border  border-mute form-control hover:border-0' readonly  value='<?php echo htmlspecialchars($court_id) ?>'>
                               <label class='fw-bold mt-2' for="">Court details</label>
                               <textarea name='content' type="text"  id="editor"  rows="4" class='bg-white border-0 form-control mt-2  hover:border-0'><?php echo htmlspecialchars($court_about);?></textarea>

                               <label class='fw-bold mt-2' for="">Court type</label>
                               <input type="text" class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($court_type);?>">
                               <label class='fw-bold mt-2' for="">Created at</label>
                               <input type="text" readonly class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($created_at);?>">
                               <div>
                                     <button class='btn btn-success text-white px-3 py-2 mt-5 text-sm '>Update</button>
                                   <a href='courts.php' class='btn btn-secondary px-3 py-2 mt-5 text-sm '>Cancel</a>

                               </div>
                          </form>

                    </div>

               </div>
             
       <?php   }

      }


      if($type == 'libraries'){
       
          $stmt = mysqli_query($conn, "SELECT * FROM law_books where id = '".$id."'");
          $book = mysqli_fetch_array($stmt);
          if($book){
                include ("../../components/library-content.php");
       ?>
                <div class='container '>
                     <div class='text-center m-3'>
                          <h6 class='fw-bold border-bottom border-2 pb-2'>Edit library details</h6>                         
                      </div>

                       <div class='border border-mute px-3 py-2 mt-2'>     

                           <form action="">

                               <input type="text" class='bg-white text-secondary border  border-mute form-control hover:border-0' readonly  value='<?php echo htmlspecialchars($book_id) ?>'>
                               <label class='fw-bold mt-3' for="">library book details</label>
                               <textarea name='content' type="text"  id="editor"  rows="4" class='bg-white border-0 form-control mt-2  hover:border-0'><?php echo htmlspecialchars($book_details);?></textarea>

                               <label class='fw-bold mt-3' for="">Library book name</label>
                               <input type="text" class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($book_name);?>">

                               <label class='fw-bold mt-3' for="">Library book price</label>
                               <input type="text" class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($book_price);?>">

                               <label class='fw-bold mt-2' for="">Created at</label>
                               <input type="text" readonly class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($created_at);?>">
                               <div>
                                    <button class='btn btn-success text-white px-3 py-2 mt-5 text-sm '>Update</button>
                                    <a href='courts.php' class='btn btn-secondary px-3 py-2 mt-5 text-sm '>Cancel</a>

                               </div>
      </form>

</div>

</div>
      <?php    
      
      
      }


      if($type == 'law_jobs'){
       
          $stmt = mysqli_query($conn, "SELECT * FROM law_jobs where id = '".$id."'");
          $job = mysqli_fetch_array($stmt);
          if($job){
                include ("../../components/live-jobs-content.php");
          }
       ?>
       
       <div class='container '>
                     <div class='text-center m-3'>
                          <h6 class='fw-bold border-bottom border-2 pb-2'>Edit library details</h6>                         
                      </div>

                       <div class='border border-mute px-3 py-2 mt-2'>     

                           <form action="">

                               <input type="text" class='bg-white text-secondary border  border-mute form-control hover:border-0' readonly  value='<?php echo htmlspecialchars($book_id) ?>'>
                               <label class='fw-bold mt-3' for="">library book details</label>
                               <textarea name='content' type="text"  id="editor"  rows="4" class='bg-white border-0 form-control mt-2  hover:border-0'><?php echo htmlspecialchars($book_details);?></textarea>

                               <label class='fw-bold mt-3' for="">Library book name</label>
                               <input type="text" class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($book_name);?>">

                               <label class='fw-bold mt-3' for="">Library book price</label>
                               <input type="text" class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($book_price);?>">

                               <label class='fw-bold mt-2' for="">Created at</label>
                               <input type="text" readonly class='bg-white border border-mute form-control mt-2 hover:border-0' value="<?php echo htmlspecialchars($created_at);?>">
                               <div>
                                    <button class='btn btn-success text-white px-3 py-2 mt-5 text-sm '>Update</button>
                                    <a href='courts.php' class='btn btn-secondary px-3 py-2 mt-5 text-sm '>Cancel</a>

                               </div>
      </form>

</div>

</div>



       <?php 

      }



      if($type == 'user_profile'){
       
          $stmt = mysqli_query($conn, "SELECT * FROM user_profile where id = '".$id."'");
          $user = mysqli_fetch_array($stmt);
          if($user){
                include ("../../components/user-profile.php");
          }
       }

      
      if($type == 'news'){
       
          $stmt = mysqli_query($conn, "SELECT * FROM news where id = '".$id."'");
          $news = mysqli_fetch_array($stmt);
          if($news){
                include ("../../components/news-content.php");
          }
       }
     
     
     }

}
?>

<script>

      ClassicEditor
      .create(document.querySelector('#editor'), {
        toolbar: ['bold', 'italic', 'link', 'undo', 'redo']
    })
    .catch(error => {
        console.error(error);
    });

</script>

</body>
</html>
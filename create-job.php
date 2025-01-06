<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("components/links.php"); ?>
    <title>Create job</title>
</head>
<body class='bg-light'>

     <?php include ("components/nav.php"); ?>
     
     <br><br>

     <div class="px-3 mt-5 d-flex flex-row flex-column">
        
         <h2 class="fw-bold">Create a job description</h2>
         <span class='text-sm'>Tell us your expectations</span>
        
     </div>
     <br>

     <div class='container mt-3'>

          <div class='jumbotron'>

              <form>
                  
                  <label class='text-sm' for="job_title">Job title <span class='text-danger'>*</span></label>

                  <input type="text" class='form-control'><br>

                  <label class='text-sm' for="job_title">Responsibilities <span class='text-danger'>*</span></label>

                  <input type="text" class='form-control'><br>

                  <label class='text-sm' for="job_title">Experience level of Candidate <span class='text-danger'>*</span></label>

                  <input type="text" class='form-control' placeholder="1 year"><br>

                  <label class='text-sm' for="job_title">Work mode <span class='text-danger'>*</span></label>

                  <input type="text" class='form-control' placeholder="Remote"><br>

                  <label class='text-sm' for="job_title">Work benefits <span class='text-danger'>*</span></label>

                  <input  type="text" class='form-control'><br>

                  <label class='text-sm' for="job_title">Renumeration <span class='text-danger'>*</span></label>

                  <input type="text" class='form-control' placeholder ='NGN 400,000'><br>

                  <label for="job_title">Job requirements <span class='text-danger'>*</span></label>

                  <textrea class='form-control h-25'>


                  </textrea>
                  <br>
                  <button class='btn btn-dark form-control'>Create</button>

              </form>


          </div>

     </div>

     <br><br>
     <?php include ("components/footer.php"); ?>
    
</body>
</html>
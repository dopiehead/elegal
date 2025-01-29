<?php 

if(isset($_POST["submit-search"]))   {  
    if(!empty($_POST["search"]))   {  
        $query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
        header("location:search-process.php?search=" .$query); 
    }  } 


?>


<div class='navbar d-flex justify-content-between align-items-center border py-3 shadow bg-light px-2 position-fixed w-100 top-0'>      
    <div>
     <div class=' h-100 full-height py-2'>
           <p><a class='d-block' href='index.php'>LOGO</a> </p> 
     </div>
     </div>
     <div> 
          <form action="" method="POST">
              <div>
                  <input type="text" name='search' placeholder='&#xF002; Search' style='font-family:arial,fontawesome;' class='rounded rounded-pill bg-white border-0 bg-search input-search'>
                  <button name='submit-search' class='btn-secondary text-white text-sm rounded rounded-pill border-0 search-button text-sm'>Search</button>
              </div>
          </form>
     </div>

     <ul class='link-container d-flex justify-content-center g-5 list-unstyled'>

         <li class='home-link'><a href='index.php'>Home</a></li>   
         <li class='law-link linking'><a  id='linking' href='lawyers.php'>Lawyers</a></li>   
         <li class='firm-link'><a href='firm.php'>Firms</a></li>  
         <li class='user-link'><a href='users.php'>Users</a></li> 
         <li class='practice-link'><a href='practice-areas.php'>Practice Areas</a></li>  
         <li class='court-link'><a href='court.php'>Court</a></li> 
         <li class='jobs-link'><a href='jobs.php'>Jobs</a></li>  
         <li class='library-link'><a href='library.php'>Library</a></li>                  

     </ul>

     <ul class="d-flex justify-content-center login-container g-4 list-unstyled">

      <?php if(isset($_SESSION['id']) || isset($_SESSION['firm_id']) || isset($_SESSION['lawyer_id'])){ 
         
         if(isset($_SESSION['firm_id'])){       
        ?>          
        <li class="mx-2">

             <a href="dashboard/firm-dashboard.php" class="text-dark text-decoration-none bg-secondary text-white p-2 rounded-pill hover:bg-secondary rounded transition duration-300">
                   Profile
             </a>
         </li>

         <?php } else { ?>

         <li class="mx-2">

             <a href="dashboard/mydashboard.php" class="text-dark text-decoration-none  bg-secondary text-white p-2 hover:bg-secondary rounded rounded-pill transition duration-300">
               Profile
             </a>

         </li>
        
         <?php } ?>

      <?php } else { ?>

         <li class="mx-2">
             <a href="login.php" class="text-dark text-decoration-none p-2 hover:bg-secondary rounded transition duration-300">
                   Login
             </a>
         </li>

         <li class="mx-2">
             <a href="create-account.php" class="bg-secondary text-white rounded-pill px-4 py-2 text-decoration-none hover:bg-dark transition duration-300">
               Register
             </a>
         </li>

        <?php } ?>

     </ul>


     <div class='navigator '>

         <p><span onclick="openform()" class='fa fa-bars d-md-none'>


         </span></p>

     </div>

</div>



<div id="myform" class="overlay">

      <a onclick="closeform()" class='close-btn fs-3 text-white'>&times;</a>

     <div class='overlay-content d-flex flex-row flex-column px-2'>         
         
         <div class='d-flex justify-content-center g-3'>

             <a class='text-decoration-none' href="">Login</a>
             <a class='border-left border-2 border-white px-2 text-decoration-none text-capitalize' href="">register</a>

         </div>
         
     
         <div class='d-flex justify-content-center'>
            
             <hr class='border border-2 border-white w-25'>
 
          </div>  
         <a class='text-decoration-none lawyer-link' href='lawyers.php'>Lawyers</a>  
         <a class='text-decoration-none firm-link' href='firm.php'>Firms</a>
         <a class='text-decoration-none user-link' href='users.php'>Users</a>
         <a class='text-decoration-none practice-link' href='practice-areas.php'>Practice Areas</a>
         <a class='text-decoration-none court-link' href='court.php'>Court</a>
         <a class='text-decoration-none jobs-link' href='jobs.php'>Jobs</a>
         <a class='text-decoration-none library-link' href='library.php'>Library</a>



     

     </div>

</div>
<br>
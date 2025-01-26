<?php 

if(isset($_POST["submit-search"]))   {  
    if(!empty($_POST["search"]))   {  
        $query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
        header("location:search-process.php?search=" .$query); 
    }  } 


?>


<div class='navbar d-flex justify-content-between py-3 shadow bg-light px-2'>      
    
     <div class='logo-container'>
           <a href='index.php'>LOGO</a>  
     </div>

     <div> 
          <form action="">
              <div class='d-flex'>
                  <input type="text" name='search' placeholder='&#xF002; Search' style='font-family:arial,fontawesome;' class='rounded rounded-pill bg-white border-0 bg-search'>
                  <button name='submit-search' class='btn-secondary text-white text-sm rounded rounded-pill border-0'>Search</button>
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


     <div class='navigator'>

         <span class='fa fa-bars d-md-none'>


         </span>

     </div>



</div>
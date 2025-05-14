<?php session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['lawyer_id']) && !isset($_SESSION['firm_id'])) {
     header("Location: ../login.php");
     exit();
}

require("../engine/config.php");

if (isset($_SESSION["id"])) {

     include ("content/user-content.php");
}


if (isset($_SESSION["lawyer_id"])) {

     include ("content/lawyer-content.php");
}


if (isset($_SESSION["firm_id"])) {
  
     include ("content/firm-content.php");

}


if (isset($_SESSION["police_id"])) {
  
    include ("content/police-content.php");

}


?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
    <link rel="stylesheet" href="../assets/css/dashboard/mydashboard.css">

</head>

<body class='bg-light'> 

     <div class='px-1'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

                  <?php include ("navigator.php"); ?>   

             <div class='dashboard mt-3 pe-4'>

                 <div class='d-flex justify-content-start gap-2'>
                     <h4 class='text-capitalize'><b><?=htmlspecialchars($user_name); ?>'s</b> dashboard</h4>
                      <span><?= date("y-m-d"); ?></span>
                 </div>

                  <div class=' activities d-flex justify-content-between align-items-center mt-4 mb-3 flex-md-row flex-column gap-1'>

                      <div class='bg-white shadow-lg d-flex flex-column flex-row justify-content-center align-items-center gap-1 '><span class='text-sm text-secondary'>Notes</span><span class='fw-bold fs-5'>0</span></div>
                     <?php if(isset($_SESSION['id'])) {?>

                          <div class='bg-white shadow-lg d-flex flex-column flex-row justify-content-center align-items-center gap-1 '><span class='text-sm text-secondary'>Cases Filed</span><span class='fw-bold fs-5'>0</span></div>
                          <div class='bg-white shadow-lg d-flex flex-column flex-row justify-content-center align-items-center gap-1 '><span class='text-sm text-secondary'>Lawyers contacted</span><span class='fw-bold fs-5'>0</span></div>
                     <?php }?>

                     <?php if(isset($_SESSION['lawyer_id'])) {?>
                          <div class='bg-white shadow-lg d-flex flex-column flex-row justify-content-center align-items-center gap-1 '><span class='text-sm text-secondary'>Reminder</span><span class='fw-bold fs-5'><?php echo date("d-m-Y") ?></span></div>
                          <div class='bg-white shadow-lg d-flex flex-column flex-row justify-content-center align-items-center gap-1 '><span class='text-sm text-secondary'>Court cases</span><span class='fw-bold fs-5'>0</span></div>
                     <?php }?>

                  </div>

                    <br>

                  <div class='d-flex justify-content-between mt-5 flex-md-row flex-column gap-2'>

                     <div class='bg-white shadow-lg p-3 d-flex flex-md-row flex-column'>

                        <span>Daily</span>

                        <?php

                          require("../engine/config.php");

                          if ($conn === false) {
 
                              echo json_encode(["error" => "Database connection failed"]);
                              
                             exit; 
                         }

                         $sql = "SELECT date, daily_sales, monthly_sales FROM lawyer_sales ORDER BY date ASC";

                         $result = mysqli_query($conn, $sql);

                         $data = [];

                         if ($result && $result->num_rows > 0) {

                             $data = mysqli_fetch_all($result, MYSQLI_ASSOC);       
                         }


                         $json_data =  json_encode($data);

                         mysqli_close($conn);

                         ?>

                          <canvas id="salesChart"   height="200"></canvas>
                    
                     </div>

                     <div class='bg-white shadow-lg p-4'>Work analysis

                     <canvas id="doughnutChart" height="200"></canvas>

                         <?php

                             $data = [
                                 'labels' => ['Ongoing', 'Concluded', 'Client_on_board'],
                                  'values' => [40, 30, 30], 
                             ];
                         ?>
                       
                         
                     </div>


                 </div>


                   <br><br>
                   <?php if(isset($_SESSION['lawyer_id'])) {?>

              <div class='mt-5 shadow-lg bg-white client-part py-3 px-2 '>

                <div class='d-flex justify-content-end'>          
                     <select name="" id="" class='border-0 text-secondary focus:border-none'>
                          <option value="">Ongoing cases</option>
                          <option value="">Concluded cases</option>
                      </select>
                  </div>

                  <br>




                  <div>

                          <table class='table w-100 table-responsive'>
                      
                             <thead class='bg-primary text-white'>

                                  <tr>

                                     <th>Client's image</th>
                                     <th>Client's name</th>
                                     <th>Case number</th>
                                     <th>Case status</th>
                                     <th>Payment status </th>
                                 </tr>

                             </thead>

                             <tbody>

                                 <tr>
                              
                                      <td><img src="../assets/images/woman.png" alt=""></td>
                                      <td>Segun jonathan</td>
                                      <td>1011183</td>
                                      <td><span class='text-danger'>Ongoing</span></td>
                                      <td><span class='text-success'>paid</span></td>

                                 </tr>

                              </tbody>

                         </table>

                  </div>

                

              </div>    

             </div>
             
             <?php }?>


     </div>




     <script>
        // PHP data embedded as JSON
        const data = <?php echo $json_data; ?>;

        // Extract data for Chart.js
        const labels = data.map(item => item.date);
        const dailySales = data.map(item => item.daily_sales);
        const monthlySales = data.map(item => item.monthly_sales);

        // Initialize Chart.js
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Daily Sales',
                        data: dailySales,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Monthly Sales',
                        data: monthlySales,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: { mode: 'index' }
                },
                scales: {
                    x: { title: { display: true, text: 'Date' } },
                    y: { title: { display: true, text: 'Sales' } }
                }
            }
        });
    </script>



    <script>
        
        const chartData = {
            labels: <?php echo json_encode($data['labels']); ?>,
            datasets: [{
                label: 'Analytics',
                data: <?php echo json_encode($data['values']); ?>,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)', // Blue
                    'rgba(255, 99, 132, 0.7)', // Pink
                    'rgba(255, 206, 86, 0.7)'  // Yellow
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)', // Blue
                    'rgba(255, 99, 132, 1)', // Pink
                    'rgba(255, 206, 86, 1)'  // Yellow
                ],
                borderWidth: 1
            }]
        };

        // Initialize Chart.js
        const ct_analytics = document.getElementById('doughnutChart').getContext('2d');
        new Chart(ct_analytics, {
            type: 'doughnut',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>


</body>
</html>
<div class="chart-container">
     <h3 class='fw-bold mb-3 mt-2'>Money out</h3>

     <div class='d-flex justify-content-around flex-column flex-md-row gap-md-3'>

         <div class='shadow p-4 rounded rounded-3'>           
             <h6 class='fw-bold'>Total money</h6>
             <div class='d-flex justify-content-evenly gap-3'>
                  <p>NGN 2,000,000</p>
                  <span><span style='font-size:12px;' class='bg-success text-white rounded rounded-pill'>+50 <i class='fa fa-arrow-up'></i></span></span>
              </div>
         </div>


         <div class='shadow p-4 rounded rounded-3'>          
             <h6 class='fw-bold'>This month's income</h6>
              <div class='d-flex justify-content-evenly gap-3'>
                 <p>NGN 500,000</p>
                 <span><span style='font-size:12px;' class='bg-success text-white  rounded rounded-pill'>+50 <i class='fa fa-arrow-up'></i></span></span>
              </div>

         </div>


         <div class='bg-warning shadow p-4 rounded rounded-2'>
             <h6 class='fw-bold text-white'>Expenses this month</h6>
             <div class='d-flex justify-content-evenly gap-3'>
                 <p class='text-white'>300,000</p>
                 <span><span  style='font-size:12px;' class='bg-success text-white rounded rounded-pill'>+50 <i class='fa fa-arrow-up'></i></span></span>
              

             </div>


         </div>


     </div>

</div>


<div class='mt-5'>

<canvas id="incomeChart"></canvas>

</div>


<?php

require("../../engine/config.php");

// Query the database
$sql = "SELECT month, income FROM fetch_income ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

$months = [];
$incomes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         $months[] = $row['month'];
         $incomes[] = $row['income'];
    }
}

// Close the database connection
$conn->close();
?>


<script>
    // PHP variables passed as JSON
     const labels_money_out = <?php echo json_encode($months); ?>;
     const data_money_out = <?php echo json_encode($incomes); ?>;

    // Chart.js code
     const ctx_money_out = document.getElementById('incomeChart').getContext('2d');
     const outgoing_Chart = new Chart(ctx_money_out, {
         type: 'line',
         data: {
            labels:  labels_money_out,
            datasets: [{
                label: 'outgoing (NGN)',
                data: data_money_out,
                borderColor: '#ff8400',
                backgroundColor: 'rgba(55, 81, 0, 0.2)',
                tension: 0.3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#007bff',
                pointHoverRadius: 5,
                pointHoverBackgroundColor: '#007bff',
                pointHoverBorderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return `Income: NGN ${tooltipItem.raw.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return `NGN ${value}`;
                        }
                    }
                }
            }
        }
    });
</script>

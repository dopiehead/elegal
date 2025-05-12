<div class="popup-filter position-fixed  bg-white shadow-lg p-4 border rounded" style="z-index: 999; display: none;">
    <!-- Close Button -->
    <div class="d-flex justify-content-end">
        <button class="btn-close" aria-label="Close" onclick="filter()"></button>
    </div>

    <!-- Header -->
    <h5 class="fw-bold border-bottom pb-2 mb-3">Filter Records</h5>

    <!-- Filter Form -->
    <form>
        <div class="mb-3">
            <label for="activityFilter" class="form-label fw-bold">Select by Activity</label>
            <select name="activityFilter" id="activityFilter" class="form-select text-capitalize">
                <option value="">All</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="locationFilter" class="form-label fw-bold">By Location</label>
            <select name="locationFilter" id="locationFilter" class="form-select text-capitalize">
                <option value="">All</option>
                <?php
                require("engine/connection.php");
                $getstate = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria ORDER BY state ASC");
                if ($getstate->execute()) {
                    $result_state = $getstate->get_result();
                    while ($data_state = $result_state->fetch_assoc()) { ?>
                        <option value="<?= htmlspecialchars($data_state['state']) ?>"><?= htmlspecialchars($data_state['state']) ?></option>
                    <?php }
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="categoryFilter" class="form-label fw-bold">By Category</label>
            <select name="categoryFilter" id="categoryFilter" class="form-select text-capitalize">
                <option value="">All</option>
                <option>Missing</option>
                <option>Armed Robbery</option>
                <option>Stolen Vehicles</option>
                <option>Death Cases</option>
                <option>Rape Cases</option>
                <option>Murder Cases</option>
                <option>Kidnap Cases</option>
                <option>Manslaughter</option>
                <option>Assault</option>
                <option>Domestic Violence</option>
            </select>
        </div>

        <div class="mb-3">
        <label for="orderBy" class="form-label fw-bold">Sort By</label>         
        <select name="orderBy" id="orderBy" class="form-select text-capitalize">
            <option value="date_of_arrest_DESC" >Date of Arrest (Newest)</option>
            <option value="date_of_arrest_ASC">Date of Arrest (Oldest)</option>
            <option value="offender_name_ASC" >Offender Name (A-Z)</option>
            <option value="offender_name_DESC">Offender Name (Z-A)</option>
            <option value="age_ASC">Age (Youngest First)</option>
            <option value="age_DESC">Age (Oldest First)</option>
            <option value="court_date_ASC" >Court Date (Earliest First)</option>
            <option value="court_date_DESC">Court Date (Latest First)</option>
        </select>

        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>

 $(document).ready(function(){
    $("#table-container").load("engine/police-record-engine.php");

    $("#q").on("keyup", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        getData(x);
    });

    $("#activityFilter").on("change", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        getData(x, activityFilter);
    });  
    
    $("#locationFilter").on("change", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        getData(x, activityFilter, locationFilter);
    });   
    
    $("#categoryFilter").on("change", function(e) {
        e.preventDefault();

        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();
        
        getData(x, activityFilter, locationFilter, categoryFilter);
    });

    $("#activityFilter, #locationFilter, #categoryFilter").on("change", function(e) {
        e.preventDefault();

        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();

        getData(x, activityFilter, locationFilter, categoryFilter);
    });

    $("#orderBy").on("change",function(e){
         e.preventDefault();

        let orderBy = $("#orderBy").val();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();

        getData(x, activityFilter, locationFilter, categoryFilter,orderBy);
    });
 
    $(document).on("click", ".btn-pagination", function(e) {
        e.preventDefault();

        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();
        let orderBy = $("#orderBy").val();
        let page = $(this).attr("id");
     
        getData(x, activityFilter, locationFilter, categoryFilter, orderBy, page);
    });

    function getData(x, activityFilter, locationFilter, categoryFilter, orderBy, page) {
        $(".spinner-border").show();
        $.ajax({
            url: "engine/police-record-engine.php",
            type: "POST",
            data: {
                "q": x,
                "activityFilter": activityFilter,
                "locationFilter": locationFilter,
                "categoryFilter": categoryFilter,
                "orderBy": orderBy,
                "page": page
            },
            success: function(data) {
                $(".spinner-border").hide();
                $("#table-container").html(data).show();
            },
            error: function(xhr,status, error) {
                $(".spinner-border").hide(); // Hide the spinner on error
                 console.error("AJAX Error:", status, error); // Log the error details
                 $("#table-container").html("<div class='alert alert-danger w-100'>An error occurred while loading the data. Please try again later.</div>");
            }
        });
    }
});
</script>

<script>
$(document).on("click", ".btn-more", function() {
    let id = $(this).attr("id");
    if (id.length > 0) {
        $.ajax({
            url: "engine/get-details.php",
            type: "POST",
            data: { id: id },
            success: function(response) {
                // Assuming there's a container to show the result
                $("#details-container").html(response).show();
            },
            error: function(xhr, status, error) {
                console.error("Error fetching details:", error);
                $("#details-container").html("<p>Something went wrong. Please try again.</p>");
            }
        });
    }
});

$(document).on("click",".close-details",function(){
    $("#details-container").toggle();
});
</script>


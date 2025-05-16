    <!--popup to insert data of offenders-->
    
    <div class="popup rounded">
  <a class='close-popup text-secondary' onclick="toggle()"><i class='fa fa-close fa-2x'></i></a>
  <h5 class='fw-bold ps-3 pt-2'>Add new offender</h5><br>

  <div class="modal-content px-2">
    <form id="insert-police-data" enctype="multipart/form-data">

      <!-- Nav Pills -->
      <ul class="nav nav-pills mb-4" id="caseFormTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="step1-tab" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab">Step 1: Arrest Info</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="step2-tab" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab">Step 2: Court Info</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="step3-tab" data-bs-toggle="pill" data-bs-target="#step3" type="button" role="tab">Step 3: Remarks</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="step4-tab" data-bs-toggle="pill" data-bs-target="#step4" type="button" role="tab">Step 4: Reporting</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="step5-tab" data-bs-toggle="pill" data-bs-target="#step5" type="button" role="tab">Step 5: Suspect</button>
        </li>
      </ul>

      <!-- Tab Content -->
      <div class="tab-content" id="caseFormTabsContent">

        <!-- Step 1: Arrest Info -->
        <div class="tab-pane fade show active" id="step1" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="offender_name" class="form-label">Offender Name</label>
              <input type="text" class="form-control" name="offender_name" id="offender_name">
            </div>
            <div class="col-md-6">
              <label for="offence" class="form-label">Offence</label>
              <input type="text" class="form-control" name="offence" id="offence">
            </div>
            
            <div class="col-md-6">
              <label for="date_of_arrest" class="form-label">Date of Arrest</label>
              <input type="date" class="form-control" name="date_of_arrest" id="date_of_arrest">
            </div>
            
            <div class="col-md-6">
              <label for="date_of_arrest" class="form-label">Time of Arrest</label>
              <input type="date" class="form-control" name="time_of_arrest" id="time_of_arrest">
            </div>

            <div class="col-md-6">
              <label for="date_of_release" class="form-label">Date of Release</label>
              <input type="date" class="form-control" name="date_of_release" id="date_of_release">
            </div>
            <div class="col-md-6">
              <label for="bailed_by" class="form-label">Bailed By</label>
              <input type="text" class="form-control" name="bailed_by" id="bailed_by">
            </div>
            <div class="col-md-6">
              <label for="bail_condition" class="form-label">Bail Condition</label>
              <input type="text" class="form-control" name="bail_condition" id="bail_condition">
            </div>
          </div>
        </div>

        <!-- Step 2: Court Info -->
        <div class="tab-pane fade" id="step2" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="next_appearance" class="form-label">Next Appearance</label>
              <input type="date" class="form-control" name="next_appearance" id="next_appearance">
            </div>
            <div class="col-md-6">
              <label for="court_date" class="form-label">Court Date</label>
              <input type="date" class="form-control" name="court_date" id="court_date">
            </div>
            <div class="col-md-6">
              <label for="court_process" class="form-label">Court Process</label>
              <input type="text" class="form-control" name="court_process" id="court_process">
            </div>
            <div class="col-md-6">
              <label for="court_location" class="form-label">Court Location</label>
              <input type="text" class="form-control" name="court_location" id="court_location">
            </div>
            <div class="col-md-12">
              <label for="terms_of_settlement" class="form-label">Terms of Settlement</label>
              <input type="text" class="form-control" name="terms_of_settlement" id="terms_of_settlement">
            </div>
          </div>
        </div>

        <!-- Step 3: Remarks -->
        <div class="tab-pane fade" id="step3" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-12">
              <label for="comments_about_case" class="form-label">Comments About Case</label>
              <textarea class="form-control" name="comments_about_case" id="comments_about_case" rows="2"></textarea>
            </div>
            <div class="col-md-6">
              <label for="dco_remark" class="form-label">DCO Remark</label>
              <input type="text" class="form-control" name="dco_remark" id="dco_remark">
            </div>
            <div class="col-md-6">
              <label for="dpo_remark" class="form-label">DPO Remark</label>
              <input type="text" class="form-control" name="dpo_remark" id="dpo_remark">
            </div>
            <div class="col-md-6">
              <label for="court_remark" class="form-label">Court Remark</label>
              <input type="text" class="form-control" name="court_remark" id="court_remark">
            </div>
          </div>
        </div>

        <!-- Step 4: Reporting -->
        <div class="tab-pane fade" id="step4" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="case_reported_by" class="form-label">Case Reported By</label>
              <input type="text" class="form-control" name="case_reported_by" id="case_reported_by">
            </div>
            <div class="col-md-6">
              <label for="arrested_by" class="form-label">Arrested By</label>
              <input type="text" class="form-control" name="arrested_by" id="arrested_by">
            </div>
            <div class="col-md-6">
              <label for="officer_in_charge" class="form-label">Officer in Charge</label>
              <input type="text" class="form-control" name="officer_in_charge" id="officer_in_charge">
            </div>
            <div class="col-md-6">
              <label for="complainant" class="form-label">Complainant</label>
              <input type="text" class="form-control" name="complainant" id="complainant">
            </div>
            <div class="col-md-6">
              <label for="complain_category" class="form-label">Complain Category</label>
              <input type="text" class="form-control" name="complain_category" id="complain_category">
            </div>
            <div class="col-md-6">
              <label for="police_station_lga" class="form-label">Police Station LGA</label>
              <input type="text" class="form-control" name="police_station_lga" id="police_station_lga">
            </div>
            <div class="col-md-6">
              <label for="people_arrested" class="form-label">People Arrested</label>
              <input type="text" class="form-control" name="people_arrested" id="people_arrested">
            </div>
            <div class="col-md-6">
              <label for="reason_for_arrest" class="form-label">Reason for Arrest</label>
              <input type="text" class="form-control" name="reason_for_arrest" id="reason_for_arrest">
            </div>
            <div class="col-md-6">
              <label for="counter_officer" class="form-label">Counter Officer</label>
              <input type="text" class="form-control" name="counter_officer" id="counter_officer">
            </div>
          </div>
        </div>

        <!-- Step 5: Suspect Info -->
        <div class="tab-pane fade" id="step5" role="tabpanel">
        <div class="row g-3">
             <div class="col-md-6">
                 <label for="mug_shot" class="form-label">Image</label>
                 <input type="file" class="form-control" name="mug_shot" id="mug_shot">
             </div>

             <div class="col-md-6">
                <label for="thumbprint" class="form-label">Thumbprint</label>
                <input type="file" class="form-control" name="thumbprint" id="thumbprint">
             </div>

             <div class="col-md-6">
                 <label for="nationality" class="form-label">Nationality</label>
                 <input type="text" class="form-control" name="nationality" id="nationality">
             </div>

             <div class="col-md-6">
                 <label for="profession" class="form-label">Profession</label>
                 <input type="text" class="form-control" name="profession" id="profession">
             </div>

             <div class="col-md-6">
                 <label for="age" class="form-label">Age</label>
                 <input type="number" class="form-control" name="age" id="age">
             </div>

             <div class="col-md-6">
                 <label for="address" class="form-label">Address</label>
                 <input type="text" class="form-control" name="address" id="address">
             </div>

             <div class="col-md-6">
                 <label for="next_of_kin" class="form-label">Next of Kin</label>
                 <input type="text" class="form-control" name="next_of_kin" id="next_of_kin">
             </div>

             <div class="col-md-6">
                  <label for="place_of_work" class="form-label">Place of Work</label>
                  <input type="text" class="form-control" name="place_of_work" id="place_of_work">
              </div>

             <div class="col-md-6">
                 <label for="phone_number" class="form-label">Phone Number</label>
                 <input type="tel" class="form-control" name="phone_number" id="phone_number">
             </div>

             <div class="col-md-6">
                 <label for="employer_name" class="form-label">Employer’s Name</label>
                 <input type="text" class="form-control" name="employer_name" id="employer_name">
             </div>

              <div class="col-md-6">
                   <label for="employer_number" class="form-label">Employer’s Number</label>
                   <input type="tel" class="form-control" name="employer_number" id="employer_number">
             </div>

             <div class="col-md-6">
                   <label for="employer_address" class="form-label">Employer’s Address</label>
                   <input type="text" class="form-control" name="employer_address" id="employer_address">
            </div>

            <div class="col-md-6">
                  <label for="religion" class="form-label">Religion</label>
                  <input type="text" class="form-control" name="religion" id="religion">
            </div>

            <div class="col-md-6">
                 <label for="tribe" class="form-label">Tribe</label>
                 <input type="text" class="form-control" name="tribe" id="tribe">
            </div>

             <div class="col-md-6">
               <label for="lga" class="form-label">L.G.A</label>
               <input type="text" class="form-control" name="lga" id="lga">
            </div>

            <div class="col-md-6">
               <label for="height" class="form-label">Height (e.g., 5'9")</label>
               <input type="text" class="form-control" name="height" id="height">
            </div>

            <div class="col-md-6">
               <label for="medical_condition" class="form-label">Medical condition</label>
               <input type="text" class="form-control" name="medical_condition" id="medical_condition">
            </div>
            
         </div>
     </div>

    </div>

      <!-- Submit Button -->
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Submit Case Record</button>
      </div>
    </form>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

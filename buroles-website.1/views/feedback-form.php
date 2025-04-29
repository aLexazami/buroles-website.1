<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/general.css">
  <link rel="stylesheet" href="../assets/css/feedback-form.css">
  <link rel="stylesheet" href="../assets/css/citizen-charter.css">
  <link rel="stylesheet" href="../assets/css/citizen-charter-2.css">
  <link rel="stylesheet" href="../assets/css/client-satisfaction.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <title>BES Feedback Form</title>
</head>
<body class="feedback-form-body">

  <!-- Feedback Form Header-->
  <div class="bes-navigation">
    <a href="../index.php">
      <img src="../assets/images/logo.png" alt="BES Logo" class="bes-logo">
    </a>
  </div>

  <!-- Feedback Form Section -->
   <div class="feedback-form-container">
      <form action="../controllers/submit-form.php" method="POST" class="feedback-form">
        <div class="feedback-form-header">
          <h2>109843 BUROL ELEMENTARY SCHOOL Client Satisfaction Measurement (CSM) (2025)</h2>
        </div>
        <div class="feedback-form-box">
            <h4>The Client Satisfaction (CSM) tracks the customer experience of government offices. Your feedback on your recently concluded transaction will help this office provide better service. Personal information shared will be kept confidential and you always have the option to not answer this form
            </h4>
            <br>
            <br>
            <label>Client Information</label>
            <br>
            <label><i>Pangalan</i></label>
            <input type="text" id="name" name="name" placeholder="Name (Optional)">
            <br>
            <label><i>Petsa</i></label>
            <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Date">
            <br>
            <label><i>Edad</i></label>
            <select id="age" name="age">
              <option value="" disabled selected>Age</option>
              <option value="under-19">19 or lower / 19 pababa</option>
              <option value="20-34">20 - 34</option>
              <option value="35-49">35 - 49</option>
              <option value="50-64">50 - 64</option>
              <option value="65-up">65 and higher / 65 pataas</option>
            </select>
            <br>
            <label><i>Kasarian</i></label>
            <select id="sex" name="sex">
              <option value="" disabled selected>Sex</option>
              <option value="Female">Female / Babae</option>
              <option value="Male">Male / Lalaki</option>
            </select>
            <br>
            <label><i>Uri ng Kliyente</i></label>
            <select id="customer-type" name="customer-type" onchange="updateServiceOptions()">
              <option value="" disabled selected>Customer Type</option>
              <option value="business">Business</option>
              <option value="citizen">Citizen</option>
              <option value="government">Government</option>
            </select>
            <p><b>Notes:</b> <br>
            <b>Business</b> (private school, corporations, etc.)<br>
            <b>Citizen</b> (general public, learners, parents, former DepEd employees, researchers, NGOs etc)<br>
            <b>Government</b> (current DepEd employees or employees of other government agencies & LGU)</p>
            </p>
            <br>
            <label><i>Serbisyong Natanggap</i></label>
            <select id="service-availed" name="service-availed">
              <option value="" disabled selected>Service Availed</option>
            </select>
            <br>
            <label><i>Rehiyon</i></label>
            <select id="region" name="region">
              <option value="" disabled selected>Region</option>
              <option value="RegionI - Ilocos Region">Region I - Ilocos Region</option>
              <option value="Region II - Cagayan Valley">Region II - Cagayan Valley</option>
              <option value="Region III - Central Luzon">Region III - Central Luzon</option>
              <option value="Region IV-A - Calabarzon">Region IV-A - Calabarzon</option>
              <option value="MIMAROPA - Southwestern Tagalog">MIMAROPA - Southwestern Tagalog</option>
              <option value="Region V - Bicol Region">Region V - Bicol Region</option>
              <option value="Region VI - Western Visayas">Region VI - Western Visayas</option>
              <option value="Region VII - Central Visayas">Region VII - Central Visayas</option>
              <option value="Region VIII - Eastern Visayas">Region VIII - Eastern Visayas</option>
              <option value="Region IX - Zambaonga Peninsula">Region IX - Zambaonga Peninsula</option>
              <option value="Region X - Northern Mindanao">Region X - Northern Mindanao</option>
              <option value="Region XI - Davao Region">Region XI - Davao Region</option>
              <option value="Region XII - SOCCSKSARGEN">Region XII - SOCCSKSARGEN</option>
              <option value="Region XIII - Caraga">Region XIII - Caraga</option>
              <option value="NCR - National Capital Region">NCR - National Capital Region</option>
              <option value="CAR- Cordillera Administrative Region ">CAR- Cordillera Administrative Region </option>
              <option value="BARMM - Bangsamoro Autonomous Region">BARMM - Bangsamoro Autonomous Region</option>
            </select>
            <br>
            <br>
            <!-- Error message container -->
            <p id="feedback-form-error" style="color: red; font-weight: bold;"></p>
            <br>
            <br>
              <button type="button" value="next">Next</button>
            <br>
            <br>
        </div>

        <!-- Citizen Charter Form Section -->
        <div class="citizen-charter-form-box" style="display: none;">
          <h3>Citizen's Charter</h3>
          <br>
          <label class="cc-question"><i>Are you aware of the Citizen's Charter - document of services and requirements?</i></label>
          <br>
          <br>
          <input type="radio" name="yes_no" value="yes" >
          <label for="yes">Yes</label><br>
          <input type="radio" name="yes_no" value="no" >
          <label for="no">No</label>
          <br>
          <br>
          <!-- Error message container -->
          <p id="feedback-form-error2" style="color: red; font-weight: bold;"></p>
          <br>
          <br>
          <div class="button-group">
            <button type="button" name="previous" value="previous">Previous</button>
            <button type="button" name="next" value="next">Next</button>
          </div>
        </div>

        <!-- Citizen Charter 2 Form Section -->
        <div class="citizen-charter-2-form-box" style="display: none;">
            <h3>Citizen's Charter</h3>
            <br>
            <label class="cc-question" for="cc-1"><i>CC1. Which of the following best describes your awareness of a Citizen’s Charter?</i></label>
            <br>
            <br>
            <input type="radio" name="cc-1" value="1">
            <label for="1">1. I know what a Citizen’s Charter is and I saw this office’s Citizen’s Charter.</label>
            <br>
            <input type="radio"  name="cc-1" value="2">
            <label for="2">2. I know what a Citizen’s Charter is but I did not see this office’s Citizen’s Charter.</label>
            <br>
            <input type="radio"  name="cc-1" value="3">
            <label for="3">3. I learned of the Citizen’s Charter only when I saw this office’s Citizen’s Charter.</label>
            <br>
            <input type="radio"  name="cc-1" value="4">
            <label for="4">4. I do not know what a Citizen’s Charter is and I did not see one in this office. (Answer ‘N/A’ on CC2 and CC3)</label>
            <br>
            <br>
            <label class="cc-question" for="cc-2"><i>CC2. If aware of Citizen’s Charter (answered 1-3 in CC1), would you say that the CC of this office was …?</i></label>
            <br>
            <br>
            <input type="radio" name="cc-2" value="1">
            <label for="1">1. Easy to see.</label>
            <br>
            <input type="radio"  name="cc-2" value="2">
            <label for="2">2. Somewhat easy to see.</label>
            <br>
            <input type="radio"  name="cc-2" value="3">
            <label for="3">3. Difficult to see.</label>
            <br>
            <input type="radio"  name="cc-2" value="4">
            <label for="4">4. Not visible at all</label>
            <br>
            <input type="radio"  name="cc-2" value="5">
            <label for="5">5. N/A</label>
            <br>
            <br>
            <label class="cc-question" for="cc-3"><i>CC3. If aware of Citizen’s Charter (answered 1-3 in CC1), how much did the CC help you in your transaction?</i></label>
            <br>
            <br>
            <input type="radio" name="cc-3" value="1" >
            <label for="1">1. Helped very much .</label>
            <br>
            <input type="radio"  name="cc-3" value="2" >
            <label for="2">2. Somewhat helped.</label>
            <br>
            <input type="radio"  name="cc-3" value="3" >
            <label for="3">3. Did not help.</label>
            <br>
            <input type="radio"  name="cc-3" value="4" >
            <label for="4">4. N/A</label>
            <br>
            <br>
            <!-- Error message container -->
            <p id="feedback-form-error3" style="color: red; font-weight: bold;"></p>
            <br>
            <br>
            <div class="button-group">
              <button type="button" value="previous">Previous</button>
              <button type="button" value="next">Next</button>
            </div>
        </div>

        <!-- Client Satisfaction Form Section -->
        <div class="client-satisfaction-form-box" style="display: none;">
            <h3>Client Satisfaction</h3>
            <br>
            <br>
            <label class="cc-question" for="SQD1"><i>SQD1 - I spent an acceptable amount of time to complete my transaction (Gumugol ako ng sapat na oras upang maayos na makumpleto ang aking transaksyon) (Responsiveness) </i></label>
            <br>
            <br>
            <input type="radio" name="SQD1" value="5">
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD1" value="4">
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD1" value="3">
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD1" value="2">
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD1" value="1">
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD1" value="na">
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <label class="cc-question" for="SQD2"><i>SQD2 - The office accurately informed and followed the transaction's requirements and steps. (Ang opisina ay nagbigay ng tamang impormasyon at maayos na sinunod ang mga kinakailangan at proseso ng transaksyon.) (Reliability)</i></label>
            <br>
            <br>
            <input type="radio" name="SQD2" value="5">
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD2" value="4" >
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD2" value="3" >
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD2" value="2" >
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD2" value="1" >
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD2" value="na" >
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <label class="cc-question" for="SQD3"><i>SQD3 - My transaction (including steps and payment) was simple and convenient. (Ang aking transaksyon (kasama ang mga hakbang at pagbabayad) ay simple at maginhawa.) (Access and Facilities)</i></label>
            <br>
            <br>
            <input type="radio" name="SQD3" value="5" >
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD3" value="4" >
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD3" value="3" >
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD3" value="2" >
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD3" value="1">
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD3" value="na" >
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <label class="cc-question" for="SQD4"><i>SDQ4 - I easily found information about my transaction from the office or its website (Madali kong nahanap ang impormasyon tungkol sa aking transaksyon mula sa opisina o sa kanilang website.) (Communication)</i></label>
            <br>
            <br>
            <input type="radio" name="SQD4" value="5" >
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD4" value="4" >
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD4" value="3" >
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD4" value="2" >
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD4" value="1" >
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD4" value="na">
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <label class="cc-question" for="SQD5"><i>SQD5 - I paid an acceptable amount of fees for my transaction. (If the service was free, mark the NOT APPLICABLE column) (Nagbayad ako ng katanggap-tanggap na halaga ng bayarin para sa aking transaksyon. (Costs)) </i></label>
            <br>
            <br>
            <input type="radio" name="SQD5" value="5" >
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD5" value="4">
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD5" value="3" >
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD5" value="2" >
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD5" value="1" >
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD5" value="na" >
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <label class="cc-question" for="SQD6"><i>SQD6 - I am confident my transaction was secure. (Tiwala ako na ang aking transaksyon ay protektado at ligtas.) (Integrity)</i></label>
            <br>
            <br>
            <input type="radio" name="SQD6" value="5">
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD6" value="4">
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD6" value="3">
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD6" value="2">
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD6" value="1">
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD6" value="na">
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <label class="cc-question" for="SQD7"><i>SQD7 - The office's support was quick to respond. (Ang suporta ng opisina ay agad tumugon.) (Assurance)
            </i></label>
            <br>
            <br>
            <input type="radio" name="SQD7" value="5" >
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD7" value="4">
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD7" value="3">
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD7" value="2">
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD7" value="1">
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD7" value="na">
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <label class="cc-question" for="SQD8"><i>SQD8 - I got what I needed from the government office. (Nakuha ko ang kinakailangan ko mula sa tanggapan ng gobyerno.) (Outcome)</i></label>
            <br>
            <br>
            <input type="radio" name="SQD8" value="5">
            <label for="5">( 5 ) Strongly Agree</label>
            <br>
            <input type="radio"  name="SQD8" value="4">
            <label for="4">( 4 ) Agree</label>
            <br>
            <input type="radio"  name="SQD8" value="3" >
            <label for="3">( 3 ) Neither Agree or Disagree</label>
            <br>
            <input type="radio"  name="SQD8" value="2">
            <label for="2">( 2 ) Disagree</label>
            <br>
            <input type="radio"  name="SQD8" value="1" >
            <label for="1">( 1 ) Strongly Disagree</label>
            <br>
            <input type="radio"  name="SQD8" value="na">
            <label for="na">Not Applicable</label>
            <br>
            <br>
            <br>
            <label for="remarks" class="cc-question">Remarks:</label>
            <br>
            <br>
            <textarea id="remarks" name="remarks" placeholder="Enter your answer"></textarea>
            <br>
            <br>
            <!-- Error message container -->
            <p id="feedback-form-error4" style="color: red; font-weight: bold;"></p>
            <br>
            <br>
            <div class="button-group">
              <button type="button" name="previous "value="previous">Previous</button>
              <button type="submit" name="submit"  value="submit">Submit</button>
            </div>
        </div>
      </form>
    </div>

  <!-- Footer Section -->
  <?php include '../includes/footer.php'; ?>

  <script src="../assets/js/feedbacking-form.js"></script>
  <script src="../assets/js/service-options.js"></script>
</body>
</html>
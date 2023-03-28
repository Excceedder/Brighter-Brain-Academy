<!DOCTYPE html>
<html class="no-js" lang="en">

<meta http-equiv="contenttext/html;charset=utf-8" />

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="width=device-width, initial-scale=1">
  <!-- Site Title -->
  <title>Brighter Brain Academy | Termly Report</title>
  <link rel="shortcut icon" -icon" href="_vendors/img/logo.png">
  <link rel="stylesheet" href="_vendors/css/style.css">
</head>

<body>
  <div class="cs-container">
    <div class="cs-invoice cs-style1">
      <div class="cs-invoice_in" id="download_section">
        <div class="cs-invoice_head cs
          <div class=" cs-invoice_left">
          <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b>05.01.2022</p>
          <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b>05.01.2022</p>
          <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b>05.01.2022</p>
          <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b>05.01.2022</p>
        </div>
        <div class="cs-invoice_right cs-text_right">
          <div class="cs-logo cs-mb5" style="width: 100px; height: 100px;"><img src="_vendors/img/logo.png" alt="Logo"></div>
        </div>
      </div>
      <div class="cs-invoice_head cs-mb10">
        <div class="cs-invoice_left">
          <b class="cs-primary_color">Student Credentials:</b>
          <p>
            Jennifer Richards <br>
            365 Bloor Street East, Toronto, <br>Ontario, M4W 3L4, <br>
            Canada
          </p>
        </div>
        <div class="cs-invoice_right cs-text_right">
          <b class="cs-primary_color">School Information:</b>
          <p>
            Biman Airlines <br>
            237 Roanoke Road, North York, <br>
            Ontario, Canada <br>
            demo@email.com
          </p>
        </div>
      </div>
      <div class="cs-table cs-style1">
        <div class="cs-round_border">
          <div class="cs-table_responsive">
            <table>
              <thead>
                <tr>
                  <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">CLASS SUBJECTS</th>
                  <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">1<sup>st</sup> CA SCORE(20)</th>
                  <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">2<sup>nd</sup> CA SCORE(10)</th>
                  <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">EXAMINATION SCORE(70)</th>
                  <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">SUBJECT SCORE</th>
                  <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">SUBJECT GRADE</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $db_conn = connect_to_database();

                $stmt = $db_conn->prepare("SELECT * FROM `termly_reports` WHERE `termly_report_id` = ?");
                $stmt->bind_param("s", $termly_report_data['termly_report_id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $termly_report_data = json_decode(hex2bin($row['termly_report_data']), true);
                } else {
                  $_SESSION['feedback'] = "Error: Unable to retrieve termly report.";
                  $_SESSION['type'] = "warning";
                  return false;
                }

                if ($termly_report_data["class_placement"] == "Pre Kindergarten") {
                ?>
                  <tr>
                    <td>Literacy</td>
                    <td><?php echo $termly_report_data["literacy_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["literacy_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["literacy_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Numeracy</td>
                    <td><?php echo $termly_report_data["numeracy_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["numeracy_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["numeracy_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Hand Writing</td>
                    <td><?php echo $termly_report_data["hand_writing_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["hand_writing_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["hand_writing_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Rhymes</td>
                    <td><?php echo $termly_report_data["rhymes_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["rhymes_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["rhymes_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Coloring</td>
                    <td><?php echo $termly_report_data["coloring_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["coloring_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["coloring_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Practcal Life</td>
                    <td><?php echo $termly_report_data["practcal_life_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["practcal_life_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["practcal_life_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Social Habits</td>
                    <td><?php echo $termly_report_data["social_habits_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["social_habits_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["social_habits_examination_score"] ?></td>
                  </tr>
                <?php
                } else if ($termly_report_data["class_placement"] == "Kindergarten 1" || $termly_report_data["class_placement"] == "Kindergarten 2" || $termly_report_data["class_placement"] == "Kindergarten 3") {
                ?>
                  <tr>
                    <td>English Language</td>
                    <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Mathematics</td>
                    <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Practcal Life</td>
                    <td><?php echo $termly_report_data["practcal_life_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["practcal_life_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["practcal_life_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Nature Studies</td>
                    <td><?php echo $termly_report_data["nature_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["nature_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["nature_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Christian Religious Studies</td>
                    <td><?php echo $termly_report_data["christian_religious_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Health Habits</td>
                    <td><?php echo $termly_report_data["health_habits_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["health_habits_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["health_habits_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Social Habits</td>
                    <td><?php echo $termly_report_data["social_habits_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["social_habits_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["social_habits_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Hand Writing</td>
                    <td><?php echo $termly_report_data["hand_writing_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["hand_writing_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["hand_writing_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Rhymes</td>
                    <td><?php echo $termly_report_data["rhymes_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["rhymes_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["rhymes_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Coloring</td>
                    <td><?php echo $termly_report_data["coloring_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["coloring_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["coloring_examination_score"] ?></td>
                  </tr>
                <?php
                } else if ($termly_report_data["class_placement"] == "Primary 1" || $termly_report_data["class_placement"] == "Primary 2") {
                ?>
                  <tr>
                    <td>English Language</td>
                    <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Mathematics</td>
                    <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Civic Education</td>
                    <td><?php echo $termly_report_data["civic_education_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["civic_education_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["civic_education_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Christian Religious Studies</td>
                    <td><?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Hand Writing</td>
                    <td><?php echo $termly_report_data["hand_writing_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["hand_writing_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["hand_writing_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Basic Technology</td>
                    <td><?php echo $termly_report_data["basic_technology_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_technology_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_technology_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Basic Science</td>
                    <td><?php echo $termly_report_data["basic_science_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_science_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_science_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Social Studies</td>
                    <td><?php echo $termly_report_data["social_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["social_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["social_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Home Economics</td>
                    <td><?php echo $termly_report_data["home_economics_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["home_economics_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["home_economics_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Creative Arts</td>
                    <td><?php echo $termly_report_data["creative_arts_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["creative_arts_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["creative_arts_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Agricultural Science</td>
                    <td><?php echo $termly_report_data["agricultural_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["agricultural_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["agricultural_examination_score"] ?></td>
                  </tr>
                <?php
                } else if ($termly_report_data["class_placement"] == "Primary 3" || $termly_report_data["class_placement"] == "Primary 4" || $termly_report_data["class_placement"] == "Primary 5") {
                ?>
                  <tr>
                    <td>English Language</td>
                    <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Mathematics</td>
                    <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Christian Religious Studies</td>
                    <td><?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Creative Arts</td>
                    <td><?php echo $termly_report_data["creative_arts_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["creative_arts_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["creative_arts_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Basic Science & Technology</td>
                    <td><?php echo $termly_report_data["basic_science_and_technology_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_science_and_technology_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_science_and_technology_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>National Values</td>
                    <td><?php echo $termly_report_data["national_values_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["national_values_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["national_values_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Pre Vocational Studies</td>
                    <td><?php echo $termly_report_data["pre_vocational_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["pre_vocational_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["pre_vocational_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>History</td>
                    <td><?php echo $termly_report_data["history_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["history_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["history_examination_score"] ?></td>
                  </tr>
                <?php
                } else if ($termly_report_data["class_placement"] == "JSS. 1" || $termly_report_data["class_placement"] == "JSS. 2" || $termly_report_data["class_placement"] == "JSS. 3") {
                ?>
                  <tr>
                    <td>English Language</td>
                    <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Mathematics</td>
                    <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Christian Religious Studies</td>
                    <td><?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["christian_religious_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Computer Studies</td>
                    <td><?php echo $termly_report_data["computer_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["computer_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["computer_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>National Values</td>
                    <td><?php echo $termly_report_data["national_values_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["national_values_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["national_values_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Basic Science & Technology</td>
                    <td><?php echo $termly_report_data["basic_science_and_technology_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_science_and_technology_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["basic_science_and_technology_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Pre Vocational Studies</td>
                    <td><?php echo $termly_report_data["pre_vocational_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["pre_vocational_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["pre_vocational_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>History</td>
                    <td><?php echo $termly_report_data["history_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["history_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["history_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Business Studies</td>
                    <td><?php echo $termly_report_data["business_studies_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["business_studies_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["business_studies_examination_score"] ?></td>
                  </tr>
                  <tr>
                    <td>Literature</td>
                    <td><?php echo $termly_report_data["literature_first_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["literature_second_ca_score"] ?></td>
                    <td><?php echo $termly_report_data["literature_examination_score"] ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="cs-note">
        <div class="cs-note_left">
          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
            <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
          </svg>
        </div>
        <div class="cs-note_right">
          <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>
          <p class="cs-m0">Here we can write a additional notes for the client to get a better understanding of this invoice.</p>
        </div>
      </div><!-- .cs-note -->
    </div>
    <div class="cs-invoice_btns cs-hide_print">
      <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
          <path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
          <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
          <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
          <circle cx="392" cy="184" r="24" />
        </svg>
        <span>Print</span>
      </a>
      <button id="download_btn" class="cs-invoice_btn cs-color2">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
          <title>Download</title>
          <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288" />
        </svg>
        <span>Download</span>
      </button>
    </div>
  </div>
  </div>
  <script src="_vendors/js/jquery.min.js"></script>
  <script src="_vendors/js/jspdf.min.js"></script>
  <script src="_vendors/js/html2canvas.min.js"></script>
  <script src="_vendors/js/main.js"></script>
</body>

</html>
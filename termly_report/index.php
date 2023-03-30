<!DOCTYPE html>
<html class="no-js" lang="en">

<?php

include "../server/server.php";

if (isset($_SESSION['termly_report_id'])) {
  $termly_report_data = fetch_termly_report_data($_SESSION['termly_report_id']);
} else {
  header('Location: ./verify_credentials');
  exit();
}

?>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Site Title -->
  <title>Brighter Brain Academy | Termly Report</title>
  <link rel="shortcut icon" type="image/x-icon" href="_vendors/img/logo.png">
  <link rel="stylesheet" href="_vendors/css/style.css">
</head>

<body>
  <div class="cs-container">
    <div class="cs-hide_print">
      <a href="./end_session" class="cs-invoice_btn" style="margin-bottom: 25px; border-radius: 8px; color: #2ad19d; border: 2px dashed #2ad19d;">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
          <path d="M256 80a176 176 0 10176 176A176 176 0 00256 80z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
          <path d="M232 160a72 72 0 1072 72 72 72 0 00-72-72z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M283.64 283.64L336 336" />
        </svg>
        <span>Search New Report</span>
      </a>
    </div>
    <div class="cs-invoice cs-style1" style="background-image: url('./_vendors/img/background.png'); background-repeat: no-repeat; background-size: cover;">
      <div class="cs-invoice_in" id="download_section">
        <div class="cs-invoice_head cs-type1 cs-mb25">
          <div class="cs-invoice_left">
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Campus: </b><?php echo $termly_report_data["main_campus"] ?></p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Term: </b><?php echo $termly_report_data["term_tag"] ?></p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Session: </b><?php echo $termly_report_data["session_tag"] ?></p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Collection Date: </b><?php echo date("jS M Y") ?></p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <div class="cs-logo cs-mb5" style="width: 100px; height: 100px;"><img src="_vendors/img/logo.png" alt="Logo"></div>
          </div>
        </div>
        <div class="cs-invoice_head cs-mb10">
          <div class="cs-invoice_left">
            <b class="cs-primary_color">Student Credentials:</b>
            <p style="color: #000000;">
              <b>Full Names:</b> <?php echo $termly_report_data["full_names"] ?> <br>
              <b>Class Placement:</b> <?php echo $termly_report_data["class_placement"] ?> <br>
              <b>Serial Number:</b> <?php echo $termly_report_data["serial_number"] ?> <br>
              <b>Unique Pin:</b> <?php echo $termly_report_data["unique_pin"] ?>
            </p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <b class="cs-primary_color">School Information:</b>
            <p style="color: #000000;">
              Brighter Brain Academy <br>
              2 Makolomi street, Ughelli, <br>
              Delta State, Nigeria <br>
              brighterbrainacademy.com
            </p>
          </div>
        </div>
        <div class="cs-table cs-style1">
          <div class="cs-round_border">
            <div class="cs-table_responsive">
              <table>
                <thead style="background-color: #6ad8d9ff;">
                  <tr>
                    <th class="cs-width_4 cs-semi_bold" style="color: #000000;">CLASS SUBJECTS</th>
                    <th class="cs-width_4 cs-semi_bold " style="color: #000000;">1<sup>st</sup> CA SCORE(20)</th>
                    <th class="cs-width_4 cs-semi_bold " style="color: #000000;">2<sup>nd</sup> CA SCORE(10)</th>
                    <th class="cs-width_4 cs-semi_bold " style="color: #000000;">EXAMINATION SCORE(70)</th>
                    <th class="cs-width_4 cs-semi_bold " style="color: #000000;">SUBJECT SCORE</th>
                    <th class="cs-width_4 cs-semi_bold cs-text_right" style="color: #000000;">SUBJECT GRADE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  if ($termly_report_data["class_placement"] == "Pre Kindergarten") {
                  ?>
                    <tr>
                      <td>Literacy</td>
                      <td><?php echo $termly_report_data["literacy_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["literacy_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["literacy_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["literacy_first_ca_score"] + $termly_report_data["literacy_second_ca_score"] + $termly_report_data["literacy_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Numeracy</td>
                      <td><?php echo $termly_report_data["numeracy_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["numeracy_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["numeracy_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["numeracy_first_ca_score"] + $termly_report_data["numeracy_second_ca_score"] + $termly_report_data["numeracy_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Hand Writing</td>
                      <td><?php echo $termly_report_data["hand_writing_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["hand_writing_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["hand_writing_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["hand_writing_first_ca_score"] + $termly_report_data["hand_writing_second_ca_score"] + $termly_report_data["hand_writing_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Rhymes</td>
                      <td><?php echo $termly_report_data["rhymes_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["rhymes_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["rhymes_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["rhymes_first_ca_score"] + $termly_report_data["rhymes_second_ca_score"] + $termly_report_data["rhymes_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Coloring</td>
                      <td><?php echo $termly_report_data["coloring_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["coloring_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["coloring_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["coloring_first_ca_score"] + $termly_report_data["coloring_second_ca_score"] + $termly_report_data["coloring_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Practcal Life</td>
                      <td><?php echo $termly_report_data["practcal_life_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["practcal_life_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["practcal_life_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["practcal_life_first_ca_score"] + $termly_report_data["practcal_life_second_ca_score"] + $termly_report_data["practcal_life_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Social Habits</td>
                      <td><?php echo $termly_report_data["social_habits_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["social_habits_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["social_habits_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["social_habits_first_ca_score"] + $termly_report_data["social_habits_second_ca_score"] + $termly_report_data["social_habits_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                  <?php
                  } else if ($termly_report_data["class_placement"] == "Kindergarten 1" || $termly_report_data["class_placement"] == "Kindergarten 2" || $termly_report_data["class_placement"] == "Kindergarten 3") {
                  ?>
                    <tr>
                      <td>English Language</td>
                      <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["english_language_first_ca_score"] + $termly_report_data["english_language_second_ca_score"] + $termly_report_data["english_language_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Mathematics</td>
                      <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["mathematics_first_ca_score"] + $termly_report_data["mathematics_second_ca_score"] + $termly_report_data["mathematics_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Practcal Life</td>
                      <td><?php echo $termly_report_data["practcal_life_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["practcal_life_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["practcal_life_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["practcal_life_first_ca_score"] + $termly_report_data["practcal_life_second_ca_score"] + $termly_report_data["practcal_life_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Nature Studies</td>
                      <td><?php echo $termly_report_data["nature_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["nature_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["nature_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["nature_studies_first_ca_score"] + $termly_report_data["nature_studies_second_ca_score"] + $termly_report_data["nature_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Christian Religious Studies</td>
                      <td><?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["christian_religious_studies_first_ca_score"] + $termly_report_data["christian_religious_studies_second_ca_score"] + $termly_report_data["christian_religious_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Health Habits</td>
                      <td><?php echo $termly_report_data["health_habits_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["health_habits_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["health_habits_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["health_habits_first_ca_score"] + $termly_report_data["health_habits_second_ca_score"] + $termly_report_data["health_habits_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Social Habits</td>
                      <td><?php echo $termly_report_data["social_habits_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["social_habits_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["social_habits_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["social_habits_first_ca_score"] + $termly_report_data["social_habits_second_ca_score"] + $termly_report_data["social_habits_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Hand Writing</td>
                      <td><?php echo $termly_report_data["hand_writing_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["hand_writing_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["hand_writing_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["hand_writing_first_ca_score"] + $termly_report_data["hand_writing_second_ca_score"] + $termly_report_data["hand_writing_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Rhymes</td>
                      <td><?php echo $termly_report_data["rhymes_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["rhymes_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["rhymes_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["rhymes_first_ca_score"] + $termly_report_data["rhymes_second_ca_score"] + $termly_report_data["rhymes_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Coloring</td>
                      <td><?php echo $termly_report_data["coloring_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["coloring_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["coloring_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["coloring_first_ca_score"] + $termly_report_data["coloring_second_ca_score"] + $termly_report_data["coloring_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                  <?php
                  } else if ($termly_report_data["class_placement"] == "Primary 1" || $termly_report_data["class_placement"] == "Primary 2") {
                  ?>
                    <tr>
                      <td>English Language</td>
                      <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["english_language_first_ca_score"] + $termly_report_data["english_language_second_ca_score"] + $termly_report_data["english_language_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Mathematics</td>
                      <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["mathematics_first_ca_score"] + $termly_report_data["mathematics_second_ca_score"] + $termly_report_data["mathematics_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Civic Education</td>
                      <td><?php echo $termly_report_data["civic_education_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["civic_education_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["civic_education_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["civic_education_first_ca_score"] + $termly_report_data["civic_education_second_ca_score"] + $termly_report_data["civic_education_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Christian Religious Studies</td>
                      <td><?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["christian_religious_studies_first_ca_score"] + $termly_report_data["christian_religious_studies_second_ca_score"] + $termly_report_data["christian_religious_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Computer Studies</td>
                      <td><?php echo $termly_report_data["computer_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["computer_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["computer_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["computer_studies_first_ca_score"] + $termly_report_data["computer_studies_second_ca_score"] + $termly_report_data["computer_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Hand Writing</td>
                      <td><?php echo $termly_report_data["hand_writing_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["hand_writing_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["hand_writing_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["hand_writing_first_ca_score"] + $termly_report_data["hand_writing_second_ca_score"] + $termly_report_data["hand_writing_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Basic Technology</td>
                      <td><?php echo $termly_report_data["basic_technology_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_technology_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_technology_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["basic_technology_first_ca_score"] + $termly_report_data["basic_technology_second_ca_score"] + $termly_report_data["basic_technology_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Basic Science</td>
                      <td><?php echo $termly_report_data["basic_science_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_science_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_science_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["basic_science_first_ca_score"] + $termly_report_data["basic_science_second_ca_score"] + $termly_report_data["basic_science_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Social Studies</td>
                      <td><?php echo $termly_report_data["social_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["social_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["social_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["social_studies_first_ca_score"] + $termly_report_data["social_studies_second_ca_score"] + $termly_report_data["social_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Home Economics</td>
                      <td><?php echo $termly_report_data["home_economics_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["home_economics_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["home_economics_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["home_economics_first_ca_score"] + $termly_report_data["home_economics_second_ca_score"] + $termly_report_data["home_economics_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Creative Arts</td>
                      <td><?php echo $termly_report_data["creative_arts_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["creative_arts_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["creative_arts_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["creative_arts_first_ca_score"] + $termly_report_data["creative_arts_second_ca_score"] + $termly_report_data["creative_arts_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Agricultural Science</td>
                      <td><?php echo $termly_report_data["agricultural_science_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["agricultural_science_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["agricultural_science_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["agricultural_science_first_ca_score"] + $termly_report_data["agricultural_science_second_ca_score"] + $termly_report_data["agricultural_science_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                  <?php
                  } else if ($termly_report_data["class_placement"] == "Primary 3" || $termly_report_data["class_placement"] == "Primary 4" || $termly_report_data["class_placement"] == "Primary 5") {
                  ?>
                    <tr>
                      <td>English Language</td>
                      <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["english_language_first_ca_score"] + $termly_report_data["english_language_second_ca_score"] + $termly_report_data["english_language_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Mathematics</td>
                      <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["mathematics_first_ca_score"] + $termly_report_data["mathematics_second_ca_score"] + $termly_report_data["mathematics_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Christian Religious Studies</td>
                      <td><?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["christian_religious_studies_first_ca_score"] + $termly_report_data["christian_religious_studies_second_ca_score"] + $termly_report_data["christian_religious_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Creative Arts</td>
                      <td><?php echo $termly_report_data["creative_arts_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["creative_arts_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["creative_arts_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["creative_arts_first_ca_score"] + $termly_report_data["creative_arts_second_ca_score"] + $termly_report_data["creative_arts_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Basic Science & Technology</td>
                      <td><?php echo $termly_report_data["basic_science_and_technology_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_science_and_technology_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_science_and_technology_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["basic_science_and_technology_first_ca_score"] + $termly_report_data["basic_science_and_technology_second_ca_score"] + $termly_report_data["basic_science_and_technology_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>National Values</td>
                      <td><?php echo $termly_report_data["national_values_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["national_values_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["national_values_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["national_values_first_ca_score"] + $termly_report_data["national_values_second_ca_score"] + $termly_report_data["national_values_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Pre Vocational Studies</td>
                      <td><?php echo $termly_report_data["pre_vocational_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["pre_vocational_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["pre_vocational_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["pre_vocational_studies_first_ca_score"] + $termly_report_data["pre_vocational_studies_second_ca_score"] + $termly_report_data["pre_vocational_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>History</td>
                      <td><?php echo $termly_report_data["history_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["history_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["history_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["history_first_ca_score"] + $termly_report_data["history_second_ca_score"] + $termly_report_data["history_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                  <?php
                  } else if ($termly_report_data["class_placement"] == "JSS. 1" || $termly_report_data["class_placement"] == "JSS. 2" || $termly_report_data["class_placement"] == "JSS. 3") {
                  ?>
                    <tr>
                      <td>English Language</td>
                      <td><?php echo $termly_report_data["english_language_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["english_language_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["english_language_first_ca_score"] + $termly_report_data["english_language_second_ca_score"] + $termly_report_data["english_language_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Mathematics</td>
                      <td><?php echo $termly_report_data["mathematics_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["mathematics_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["mathematics_first_ca_score"] + $termly_report_data["mathematics_second_ca_score"] + $termly_report_data["mathematics_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Christian Religious Studies</td>
                      <td><?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["christian_religious_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["christian_religious_studies_first_ca_score"] + $termly_report_data["christian_religious_studies_second_ca_score"] + $termly_report_data["christian_religious_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Computer Studies</td>
                      <td><?php echo $termly_report_data["computer_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["computer_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["computer_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["computer_studies_first_ca_score"] + $termly_report_data["computer_studies_second_ca_score"] + $termly_report_data["computer_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>National Values</td>
                      <td><?php echo $termly_report_data["national_values_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["national_values_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["national_values_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["national_values_first_ca_score"] + $termly_report_data["national_values_second_ca_score"] + $termly_report_data["national_values_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Basic Science & Technology</td>
                      <td><?php echo $termly_report_data["basic_science_and_technology_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_science_and_technology_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["basic_science_and_technology_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["basic_science_and_technology_first_ca_score"] + $termly_report_data["basic_science_and_technology_second_ca_score"] + $termly_report_data["basic_science_and_technology_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Pre Vocational Studies</td>
                      <td><?php echo $termly_report_data["pre_vocational_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["pre_vocational_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["pre_vocational_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["pre_vocational_studies_first_ca_score"] + $termly_report_data["pre_vocational_studies_second_ca_score"] + $termly_report_data["pre_vocational_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>History</td>
                      <td><?php echo $termly_report_data["history_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["history_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["history_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["history_first_ca_score"] + $termly_report_data["history_second_ca_score"] + $termly_report_data["history_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Business Studies</td>
                      <td><?php echo $termly_report_data["business_studies_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["business_studies_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["business_studies_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["business_studies_first_ca_score"] + $termly_report_data["business_studies_second_ca_score"] + $termly_report_data["business_studies_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
                    </tr>
                    <tr>
                      <td>Literature</td>
                      <td><?php echo $termly_report_data["literature_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["literature_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["literature_examination_score"] ?></td>
                      <td>
                        <?php
                        $subject_score = $termly_report_data["literature_first_ca_score"] + $termly_report_data["literature_second_ca_score"] + $termly_report_data["literature_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 35) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 36 && $subject_score <= 45) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 46 && $subject_score <= 55) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 56 && $subject_score <= 69) {
                          $subject_grade = "B";
                        } else if ($subject_score >= 70 && $subject_score <= 80) {
                          $subject_grade = "A";
                        } else if ($subject_score >= 81) {
                          $subject_grade = "A1";
                        }
                        echo $subject_score;
                        ?>
                      </td>
                      <td class="cs-text_center"><?php echo $subject_grade ?></td>
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
        <button id="download_btn" class="cs-invoice_btn cs-color2" style="border-radius: 8px;">
          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <title>Download</title>
            <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288" />
          </svg>
          <span>Download Termly Report</span>
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
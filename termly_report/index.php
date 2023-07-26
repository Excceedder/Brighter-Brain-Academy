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
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

  <style>
    .bg-img-2 {
      background-image: url('./_vendors/img/background.png') !important;
      background-repeat: no-repeat !important;
      background-size: cover !important;
    }
  </style>

</head>

<body>
  <div class="cs-container">
    <div class="cs-hide_print" style="display: inline-flexbox;">
      <a href="./end_session" class="cs-invoice_btn" style="margin-bottom: 25px; border-radius: 8px; color: #2ad19d; border: 2px dashed #2ad19d;">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
          <path d="M256 80a176 176 0 10176 176A176 176 0 00256 80z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
          <path d="M232 160a72 72 0 1072 72 72 72 0 00-72-72z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M283.64 283.64L336 336" />
        </svg>
        <span>Search New</span>
      </a>
      <a href="#" id="download" class="cs-invoice_btn cs-color2" style="margin-bottom: 25px; border-radius: 8px; border: 2px solid #2ad19d; float: right;">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
          <title>Download</title>
          <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288" />
        </svg>
        <span>Download</span>
      </a>
    </div>
    <div class="cs-invoice cs-style1 bg-img-2 download_section">
      <div class="cs-invoice_in ">
        <div class="cs-invoice_head cs-type1 cs-mb25">
          <div class="cs-invoice_left">
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Campus: </b><?php echo $termly_report_data["main_campus"] ?></p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Term: </b><?php echo $termly_report_data["term_tag"] ?></p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Session: </b><?php echo $termly_report_data["session_tag"] ?></p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Resumption Date: </b>24th Apr 2023</p>
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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

                    if ($termly_report_data["class_placement"] == "Kindergarten 2") {
                    ?>
                      <tr>
                        <td>Nature Studies</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                          -
                        </td>
                        <td class="cs-text_center">-</td>
                      </tr>
                    <?php
                    } else {
                    ?>
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
                          } else if ($subject_score >= 31 && $subject_score <= 39) {
                            $subject_grade = "E";
                          } else if ($subject_score >= 40 && $subject_score <= 49) {
                            $subject_grade = "D";
                          } else if ($subject_score >= 50 && $subject_score <= 59) {
                            $subject_grade = "C";
                          } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                      <td>Physical Health Education</td>
                      <td><?php echo $termly_report_data["physical_health_education_first_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["physical_health_education_second_ca_score"] ?></td>
                      <td><?php echo $termly_report_data["physical_health_education_examination_score"] ?></td>
                      <td>
                        <?php

                        $subject_score = $termly_report_data["physical_health_education_first_ca_score"] + $termly_report_data["physical_health_education_second_ca_score"] + $termly_report_data["physical_health_education_examination_score"];
                        if ($subject_score <= 30) {
                          $subject_grade = "F";
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                        } else if ($subject_score >= 31 && $subject_score <= 39) {
                          $subject_grade = "E";
                        } else if ($subject_score >= 40 && $subject_score <= 49) {
                          $subject_grade = "D";
                        } else if ($subject_score >= 50 && $subject_score <= 59) {
                          $subject_grade = "C";
                        } else if ($subject_score >= 60 && $subject_score <= 69) {
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
                <tfoot style="color: #000000;">
                  <tr>
                    <th style="font-weight: bold; text-align: center;">Total Subject</th>
                    <th style="font-weight: bold; text-align: center;">Overall Score</th>
                    <th style="font-weight: bold; text-align: center;">Average</th>
                    <th style="font-weight: bold; text-align: center;">Overall Grade</th>
                    <th style="font-weight: bold; text-align: center;" colspan="2">Remark(s)</th>
                  </tr>
                  <tr>
                    <td style="font-weight: bold; text-align: center;">
                      <?php
                      if ($termly_report_data["class_placement"] == "Pre Kindergarten") {
                        echo ("7");
                        $overall_score = $termly_report_data["literacy_first_ca_score"]
                          + $termly_report_data["literacy_second_ca_score"]
                          + $termly_report_data["literacy_examination_score"]
                          + $termly_report_data["numeracy_first_ca_score"]
                          + $termly_report_data["numeracy_second_ca_score"]
                          + $termly_report_data["numeracy_examination_score"]
                          + $termly_report_data["hand_writing_first_ca_score"]
                          + $termly_report_data["hand_writing_second_ca_score"]
                          + $termly_report_data["hand_writing_examination_score"]
                          + $termly_report_data["rhymes_first_ca_score"]
                          + $termly_report_data["rhymes_second_ca_score"]
                          + $termly_report_data["rhymes_examination_score"]
                          + $termly_report_data["coloring_first_ca_score"]
                          + $termly_report_data["coloring_second_ca_score"]
                          + $termly_report_data["coloring_examination_score"]
                          + $termly_report_data["practcal_life_first_ca_score"]
                          + $termly_report_data["practcal_life_second_ca_score"]
                          + $termly_report_data["practcal_life_examination_score"]
                          + $termly_report_data["social_habits_first_ca_score"]
                          + $termly_report_data["social_habits_second_ca_score"]
                          + $termly_report_data["social_habits_examination_score"];
                        $average = $overall_score / 7;
                      } else if ($termly_report_data["class_placement"] == "Kindergarten 1" || $termly_report_data["class_placement"] == "Kindergarten 2" || $termly_report_data["class_placement"] == "Kindergarten 3") {
                        echo ("10");
                        $overall_score = $termly_report_data["english_language_first_ca_score"]
                          + $termly_report_data["english_language_second_ca_score"]
                          + $termly_report_data["english_language_examination_score"]
                          + $termly_report_data["mathematics_first_ca_score"]
                          + $termly_report_data["mathematics_second_ca_score"]
                          + $termly_report_data["mathematics_examination_score"]
                          + $termly_report_data["practcal_life_first_ca_score"]
                          + $termly_report_data["practcal_life_second_ca_score"]
                          + $termly_report_data["practcal_life_examination_score"]
                          + $termly_report_data["nature_studies_first_ca_score"]
                          + $termly_report_data["nature_studies_second_ca_score"]
                          + $termly_report_data["nature_studies_examination_score"]
                          + $termly_report_data["christian_religious_studies_first_ca_score"]
                          + $termly_report_data["christian_religious_studies_second_ca_score"]
                          + $termly_report_data["christian_religious_studies_examination_score"]
                          + $termly_report_data["health_habits_first_ca_score"]
                          + $termly_report_data["health_habits_second_ca_score"]
                          + $termly_report_data["health_habits_examination_score"]
                          + $termly_report_data["social_habits_first_ca_score"]
                          + $termly_report_data["social_habits_second_ca_score"]
                          + $termly_report_data["social_habits_examination_score"]
                          + $termly_report_data["hand_writing_first_ca_score"]
                          + $termly_report_data["hand_writing_second_ca_score"]
                          + $termly_report_data["hand_writing_examination_score"]
                          + $termly_report_data["rhymes_first_ca_score"]
                          + $termly_report_data["rhymes_second_ca_score"]
                          + $termly_report_data["rhymes_examination_score"]
                          + $termly_report_data["coloring_first_ca_score"]
                          + $termly_report_data["coloring_second_ca_score"]
                          + $termly_report_data["coloring_examination_score"];
                        $average = $overall_score / 10;
                      } else if ($termly_report_data["class_placement"] == "Primary 1" || $termly_report_data["class_placement"] == "Primary 2") {
                        echo ("14");
                        $overall_score = $termly_report_data["english_language_first_ca_score"]
                          + $termly_report_data["english_language_second_ca_score"]
                          + $termly_report_data["english_language_examination_score"]
                          + $termly_report_data["mathematics_first_ca_score"]
                          + $termly_report_data["mathematics_second_ca_score"]
                          + $termly_report_data["mathematics_examination_score"]
                          + $termly_report_data["civic_education_first_ca_score"]
                          + $termly_report_data["civic_education_second_ca_score"]
                          + $termly_report_data["civic_education_examination_score"]
                          + $termly_report_data["computer_studies_first_ca_score"]
                          + $termly_report_data["computer_studies_second_ca_score"]
                          + $termly_report_data["computer_studies_examination_score"]
                          + $termly_report_data["literature_first_ca_score"]
                          + $termly_report_data["literature_second_ca_score"]
                          + $termly_report_data["literature_examination_score"]
                          + $termly_report_data["physical_health_education_first_ca_score"]
                          + $termly_report_data["physical_health_education_second_ca_score"]
                          + $termly_report_data["physical_health_education_examination_score"]
                          + $termly_report_data["christian_religious_studies_first_ca_score"]
                          + $termly_report_data["christian_religious_studies_second_ca_score"]
                          + $termly_report_data["christian_religious_studies_examination_score"]
                          + $termly_report_data["hand_writing_first_ca_score"]
                          + $termly_report_data["hand_writing_second_ca_score"]
                          + $termly_report_data["hand_writing_examination_score"]
                          + $termly_report_data["basic_technology_first_ca_score"]
                          + $termly_report_data["basic_technology_second_ca_score"]
                          + $termly_report_data["basic_technology_examination_score"]
                          + $termly_report_data["basic_science_first_ca_score"]
                          + $termly_report_data["basic_science_second_ca_score"]
                          + $termly_report_data["basic_science_examination_score"]
                          + $termly_report_data["social_studies_first_ca_score"]
                          + $termly_report_data["social_studies_second_ca_score"]
                          + $termly_report_data["social_studies_examination_score"]
                          + $termly_report_data["home_economics_first_ca_score"]
                          + $termly_report_data["home_economics_second_ca_score"]
                          + $termly_report_data["home_economics_examination_score"]
                          + $termly_report_data["creative_arts_first_ca_score"]
                          + $termly_report_data["creative_arts_second_ca_score"]
                          + $termly_report_data["creative_arts_examination_score"]
                          + $termly_report_data["agricultural_science_first_ca_score"]
                          + $termly_report_data["agricultural_science_second_ca_score"]
                          + $termly_report_data["agricultural_science_examination_score"];
                        $average = $overall_score / 14;
                      } else if ($termly_report_data["class_placement"] == "Primary 3" || $termly_report_data["class_placement"] == "Primary 4" || $termly_report_data["class_placement"] == "Primary 5") {
                        echo ("8");
                        $overall_score = $termly_report_data["english_language_first_ca_score"]
                          + $termly_report_data["english_language_second_ca_score"]
                          + $termly_report_data["english_language_examination_score"]
                          + $termly_report_data["mathematics_first_ca_score"]
                          + $termly_report_data["mathematics_second_ca_score"]
                          + $termly_report_data["mathematics_examination_score"]
                          + $termly_report_data["christian_religious_studies_first_ca_score"]
                          + $termly_report_data["christian_religious_studies_second_ca_score"]
                          + $termly_report_data["christian_religious_studies_examination_score"]
                          + $termly_report_data["creative_arts_first_ca_score"]
                          + $termly_report_data["creative_arts_second_ca_score"]
                          + $termly_report_data["creative_arts_examination_score"]
                          + $termly_report_data["basic_science_and_technology_first_ca_score"]
                          + $termly_report_data["basic_science_and_technology_second_ca_score"]
                          + $termly_report_data["basic_science_and_technology_examination_score"]
                          + $termly_report_data["national_values_first_ca_score"]
                          + $termly_report_data["national_values_second_ca_score"]
                          + $termly_report_data["national_values_examination_score"]
                          + $termly_report_data["pre_vocational_studies_first_ca_score"]
                          + $termly_report_data["pre_vocational_studies_second_ca_score"]
                          + $termly_report_data["pre_vocational_studies_examination_score"]
                          + $termly_report_data["history_first_ca_score"]
                          + $termly_report_data["history_second_ca_score"]
                          + $termly_report_data["history_examination_score"];
                        $average = $overall_score / 8;
                      } else if ($termly_report_data["class_placement"] == "JSS. 1" || $termly_report_data["class_placement"] == "JSS. 2" || $termly_report_data["class_placement"] == "JSS. 3") {
                        echo ("10");
                        $overall_score = $termly_report_data["english_language_first_ca_score"]
                          + $termly_report_data["english_language_second_ca_score"]
                          + $termly_report_data["english_language_examination_score"]
                          + $termly_report_data["mathematics_first_ca_score"]
                          + $termly_report_data["mathematics_second_ca_score"]
                          + $termly_report_data["mathematics_examination_score"]
                          + $termly_report_data["christian_religious_studies_first_ca_score"]
                          + $termly_report_data["christian_religious_studies_second_ca_score"]
                          + $termly_report_data["christian_religious_studies_examination_score"]
                          + $termly_report_data["computer_studies_first_ca_score"]
                          + $termly_report_data["computer_studies_second_ca_score"]
                          + $termly_report_data["computer_studies_examination_score"]
                          + $termly_report_data["national_values_first_ca_score"]
                          + $termly_report_data["national_values_second_ca_score"]
                          + $termly_report_data["national_values_examination_score"]
                          + $termly_report_data["basic_science_and_technology_first_ca_score"]
                          + $termly_report_data["basic_science_and_technology_second_ca_score"]
                          + $termly_report_data["basic_science_and_technology_examination_score"]
                          + $termly_report_data["pre_vocational_studies_first_ca_score"]
                          + $termly_report_data["pre_vocational_studies_second_ca_score"]
                          + $termly_report_data["pre_vocational_studies_examination_score"]
                          + $termly_report_data["history_first_ca_score"]
                          + $termly_report_data["history_second_ca_score"]
                          + $termly_report_data["history_examination_score"]
                          + $termly_report_data["business_studies_first_ca_score"]
                          + $termly_report_data["business_studies_second_ca_score"]
                          + $termly_report_data["business_studies_examination_score"]
                          + $termly_report_data["literature_first_ca_score"]
                          + $termly_report_data["literature_second_ca_score"]
                          + $termly_report_data["literature_examination_score"];
                        $average = $overall_score / 10;
                      }
                      ?>
                    </td>
                    <td style="font-weight: bold; text-align: center;"><?php echo $overall_score ?></td>
                    <td style="font-weight: bold; text-align: center;"><?php echo number_format((float)$average, 2, '.', ''); ?></td>
                    <td style="font-weight: bold; text-align: center;">
                      <?php

                      if ($average < 30) {
                        $overall_grade = "F";
                        $remark = "Fail";
                      } else if ($average < 35) {
                        $overall_grade = "E";
                        $remark = "Fair";
                      } else if ($average < 45) {
                        $overall_grade = "D";
                        $remark = "Pass";
                      } else if ($average < 55) {
                        $overall_grade = "C";
                        $remark = "Credit";
                      } else if ($average < 69) {
                        $overall_grade = "B";
                        $remark = "Very Good";
                      } else if ($average < 79) {
                        $overall_grade = "A";
                        $remark = "Excellent";
                      } else if ($average > 80) {
                        $overall_grade = "A1";
                        $remark = "Distinction";
                      }
                      echo $overall_grade;

                      ?>
                    </td>
                    <td style="font-weight: bold; text-align: center;" colspan="2"><?php echo $remark ?></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    function download(canvas, filename) {
      const data = canvas.toDataURL("image/png;base64");
      const downloadLink = document.querySelector("#download");
      downloadLink.download = filename;
      downloadLink.href = data;
    }

    html2canvas(document.querySelector('.download_section'), {
      scale: 5, // increase scale factor for higher quality
      useCORS: true, // enable CORS
    }).then((canvas) => {
      const filename = "termly_report-" + Math.floor(Math.random() * 100000) + ".png";
      download(canvas, filename);
    });
  </script>
</body>

</html>
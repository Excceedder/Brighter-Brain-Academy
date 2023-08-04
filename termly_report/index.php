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
  <!-- <link rel="stylesheet" href="_vendors/css/style.css"> -->
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
  <link rel="stylesheet" href="./bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .bg-img-2 {
      background-image: url('./_vendors/img/background.png') !important;
      background-repeat: no-repeat !important;
      background-size: cover !important;
    }
  </style>

</head>

<body>

  <div class="container mt-5 d-flex px-0" style="max-width: 63em;">
    <a href="./end_session" class="btn" style="background-color: #6ad8d9; color: #fff;">Search New <i class="bi-search"></i></a>
    <a href="javascript:void(0);" id="download" class="btn ms-auto" style="border: 1px dashed #6ad8d9; color: #6ad8d9;">Download <i class="bi-download"></i></a>
  </div>

  <div class="container card border-0 my-4 mx-auto bg-img-2 px-5 py-5 download_section" style="max-width: 63em;">
    <div class="d-flex">
      <div class="mt-2">
        <p class="mb-0"><b class="cs-primary_color">Campus: </b><?php echo $termly_report_data["main_campus"] ?></p>
        <p class="mb-0"><b class="cs-primary_color">Term: </b><?php echo $termly_report_data["term_tag"] ?></p>
        <p class="mb-0"><b class="cs-primary_color">Session: </b><?php echo $termly_report_data["session_tag"] ?></p>
        <p class="mb-0"><b class="cs-primary_color">Resumption Date: </b>11th Sep. 2023</p>
      </div>
      <div class="ms-auto"><img style="width: 100px; height: 100px;" src="_vendors/img/logo.png" alt="Logo"></div>
    </div>
    <hr>
    <div class="d-flex">
      <div class="">
        <b class="text-dark">Student Credentials:</b>
        <p class="text-dark">
          <b>Full Names:</b> <?php echo $termly_report_data["full_names"] ?> <br>
          <b>Class Placement:</b> <?php echo $termly_report_data["class_placement"] ?> <br>
          <b>Serial Number:</b> <?php echo $termly_report_data["serial_number"] ?> <br>
          <b>Unique Pin:</b> <?php echo $termly_report_data["unique_pin"] ?>
        </p>
      </div>
      <div class="ms-auto">
        <b class="text-dark">School Information:</b>
        <p class="text-dark">
          Brighter Brain Academy <br>
          2 Makolomi street, Ughelli, <br>
          Delta State, Nigeria <br>
          brighterbrainacademy.com
        </p>
      </div>
    </div>
    <table class="table table-bordered">
      <thead style="background-color: #6ad8d9 !important;" class="">
        <tr>
          <th scope="col">CLASS SUBJECTS</th>
          <th scope="col">1<sup>st</sup> CA SCORE(20)</th>
          <th scope="col">2<sup>nd</sup> CA SCORE(10)</th>
          <th scope="col">EXAMINATION SCORE(70)</th>
          <th scope="col">SUBJECT SCORE</th>
          <th scope="col">SUBJECT GRADE</th>
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
        <tr>
          <td colspan="6">
            <table class="table mb-0 text-center">
              <thead>
                <th scope="col">Total Subject</th>
                <th scope="col">Overall Score</th>
                <th scope="col">Average</th>
                <th scope="col">Overall Grade</th>
                <th scope="col" colspan="2">Remark(s)</th>
              </thead>
              <tbody>
                <tr style="border: 1px solid #000;">
                  <td style="font-weight: bold; border: 1px solid #000;">
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

                    function promoteToNextClass($previousClass)
                    {
                      $promotions = [
                        'Pre Kindergarten' => 'Kindergarten 1',
                        'Kindergarten 1' => 'Kindergarten 2',
                        'Kindergarten 2' => 'Kindergarten 3',
                        'Kindergarten 3' => 'Primary 1',
                        'Primary 1' => 'Primary 2',
                        'Primary 2' => 'Primary 3',
                        'Primary 3' => 'Primary 4',
                        'Primary 4' => 'Primary 5',
                        'Primary 5' => 'JSS. 1',
                        'JSS. 1' => 'JSS. 2',
                        'JSS. 2' => 'JSS. 3',
                        'JSS. 3' => 'SSS. 1',
                        'SSS. 2' => 'SSS. 2',
                        'SSS. 2' => 'JSS. 3',
                      ];

                      return $promotions[$previousClass] ?? 'Invalid previous class';
                    }

                    ?>
                  </td>
                  <td style="font-weight: bold; border: 1px solid #000;"><?php echo $overall_score ?></td>
                  <td style="font-weight: bold; border: 1px solid #000;"><?php echo number_format((float)$average, 2, '.', ''); ?></td>
                  <td style="font-weight: bold; border: 1px solid #000;">
                    <?php

                    $english_language_subject_score = $termly_report_data["english_language_first_ca_score"] + $termly_report_data["english_language_second_ca_score"] + $termly_report_data["english_language_examination_score"];

                    $mathematics_subject_score = $termly_report_data["mathematics_first_ca_score"] + $termly_report_data["mathematics_second_ca_score"] + $termly_report_data["mathematics_examination_score"];

                    if ($average < 30) {
                      $overall_grade = "F";
                      $remark = "Fail";
                      $director_remark = "Adviced to repeat current class!";
                    } else if ($average < 35) {
                      $overall_grade = "E";
                      $remark = "Fair";

                      if ($english_language_subject_score > 40 && $mathematics_subject_score > 40) {
                        $director_remark = "Promoted on <b>Probatioon</b> to " . promoteToNextClass($termly_report_data["class_placement"]);
                      } else {
                        $director_remark = "Adviced to repeat current class!";
                      }
                    } else if ($average < 45) {
                      $director_remark = "Promoted to " . promoteToNextClass($termly_report_data["class_placement"]);
                      $overall_grade = "D";
                      $remark = "Pass";
                    } else if ($average < 55) {
                      $overall_grade = "C";
                      $remark = "Credit";
                      $director_remark = "Promoted to " . promoteToNextClass($termly_report_data["class_placement"]);
                    } else if ($average < 69) {
                      $overall_grade = "B";
                      $remark = "Very Good";
                      $director_remark = "Promoted to " . promoteToNextClass($termly_report_data["class_placement"]);
                    } else if ($average < 79) {
                      $overall_grade = "A";
                      $remark = "Excellent";
                      $director_remark = "Promoted to " . promoteToNextClass($termly_report_data["class_placement"]);
                    } else if ($average > 80) {
                      $overall_grade = "A1";
                      $remark = "Distinction";
                      $director_remark = "Promoted to " . promoteToNextClass($termly_report_data["class_placement"]);
                    }
                    echo $overall_grade;

                    ?>
                  </td>
                  <td style="font-weight: bold;" colspan="2"><?php echo $remark ?></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>

    <?php
    if ($termly_report_data["term_tag"] == "3rd Term") {
    ?>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th style="border-right: 1px solid #000;" scope="row">Director's Remark:</th>
            <td><?php echo $director_remark ?></td>
          </tr>
          <tr>
            <th scope="row" style="border-right: 1px solid #000;">Head Teacher's Remark:</th>
            <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius molestias quidem, veritatis rem sapiente corrupti quisquam accusamus ea sint quia!</td>
          </tr>
        </tbody>
      </table>
    <?php
    }
    ?>
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

  <script src="./bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html class="no-js" lang="en">

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
    <div class="cs-invoice cs-style1">
      <?php
      if (isset($_SESSION['termly_report'])) {
      ?>
        <div class="cs-invoice_in" id="download_section">
          <div class="cs-invoice_head cs-type1 cs-mb25">
            <div class="cs-invoice_left">
              <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Campus: </b>BBA Ughelli</p>
              <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Term: </b>2nd Term</p>
              <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Session: </b>2022/23</p>
              <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Collection Date: </b>05.01.2022</p>
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
                Primary 5, <br>
                Ontario, M4W 3L4, <br>
                Canada
              </p>
            </div>
            <div class="cs-invoice_right cs-text_right">
              <b class="cs-primary_color">School Information:</b>
              <p>
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
                    <tr>
                      <td class="cs-width_4">App Development</td>
                      <td class="cs-width_4">12</td>
                      <td class="cs-width_4">2</td>
                      <td class="cs-width_4">$460</td>
                      <td class="cs-width_4">$920</td>
                      <td class="cs-width_4 cs-text_right">$920</td>
                    </tr>
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
      <?php
        unset($_SESSION['termly_report']);
      } else {
      ?>
        <div class="cs-invoice_head cs-type1 cs-mb25">
          <div class="cs-invoice_left">
            <p>
              <b class="cs-primary_color">Brighter Brain Academy</b><br>
              2 Makolomi street, Ughelli, <br>
              Delta State, Nigeria <br>
              brighterbrainacademy.com
            </p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <div class="cs-logo cs-mb5" style="width: 100px; height: 100px;"><img src="_vendors/img/logo.png" alt="Logo"></div>
          </div>
        </div>
        <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>" method="post">
          <div style="margin-bottom: 10px;">
            <h5 style="font-weight: bold;">Check Termly Report...</h5>
          </div>
          <div style="margin-bottom: 10px;">
            <label for="serial_number" style="color: #000000; font-weight: bold;">Serial Number</label>
            <input type="text" style="border: 2px solid #777777; width: 100%; padding: 8px; border-radius: 8px; margin-top: 2px;" id="serial_number">
          </div>
          <div style="margin-bottom: 10px;">
            <label for="serial_number" style="color: #000000; font-weight: bold;">Unique Pin</label>
            <input type="text" style="border: 2px solid #777777; width: 100%; padding: 8px; border-radius: 8px; margin-top: 2px;" id="serial_number">
          </div>
          <div style="margin: 18px 0 0;">
            <button id="download_btn" class="cs-invoice_btn cs-color2" style="border-radius: 8px;">
              <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                <title>Verify Credentials</title>
                <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 192L256.13 320l-47.95-48M191.95 320L144 272M305.71 192l-51.55 59" />
              </svg>
              <span>Verify Credentials</span>
            </button>
          </div>
        </form>
      <?php
      }
      ?>
    </div>
  </div>

  <script src="_vendors/js/jquery.min.js"></script>
  <script src="_vendors/js/jspdf.min.js"></script>
  <script src="_vendors/js/html2canvas.min.js"></script>
  <script src="_vendors/js/main.js"></script>
</body>

</html>
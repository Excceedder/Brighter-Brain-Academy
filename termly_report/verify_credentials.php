<!DOCTYPE html>
<html class="no-js" lang="en">

<?php

include "../server/server.php";

if (isset($_SESSION['termly_report_id'])) {
  header('Location: ./');
}

?>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Site Title -->
  <title>Brighter Brain Academy | Verify Credentials</title>
  <link rel="shortcut icon" type="image/x-icon" href="_vendors/img/logo.png">
  <link rel="stylesheet" href="_vendors/css/style.css">
</head>

<body>
  <div class="cs-container">
    <div class="cs-invoice cs-style1" style="border: 1px dashed #000;">
      <div class="cs-invoice_head cs-type1 cs-mb25">
        <div class="cs-invoice_left">
          <p>
            <b class="cs-primary_color">Brighter Brain Academy</b><br>
            2 Makolomi street, Ughelli, <br>
            Delta State, Nigeria <br>
            <a href="mailto:info@brighterbrainacademy.com" style="color: #2ad19d;">info@brighterbrainacademy.com</a>
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
          <input type="text" name="serial_number" style="border: 2px solid #777777; width: 100%; padding: 8px; border-radius: 8px; margin-top: 2px;" id="serial_number">
        </div>
        <div style="margin-bottom: 10px;">
          <label for="unique_pin" style="color: #000000; font-weight: bold;">Unique Pin</label>
          <input type="text" name="unique_pin" style="border: 2px solid #777777; width: 100%; padding: 8px; border-radius: 8px; margin-top: 2px;" id="unique_pin">
        </div>
        <div style="margin: 18px 0 0;">
          <button type="submit" name="verify_credentials" class="cs-invoice_btn cs-color2" style="border-radius: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
              <title>Verify Credentials</title>
              <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 192L256.13 320l-47.95-48M191.95 320L144 272M305.71 192l-51.55 59" />
            </svg>
            <span>Verify Credentials</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="_vendors/js/jquery.min.js"></script>
  <script src="_vendors/js/jspdf.min.js"></script>
  <script src="_vendors/js/html2canvas.min.js"></script>
  <script src="_vendors/js/main.js"></script>
</body>

</html>
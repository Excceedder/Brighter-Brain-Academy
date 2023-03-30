(function ($) {
  "use strict";

  /*--------------------------------------------------------------
  ## Down Load Button Function
  ----------------------------------------------------------------*/
  $("#download_btn").on("click", function () {
    var downloadSection = $("#download_section")[0];
    var cWidth = downloadSection.clientWidth;
    var cHeight = downloadSection.clientHeight;

    var canvas = document.createElement("canvas");
    canvas.width = cWidth;
    canvas.height = cHeight;
    var context = canvas.getContext("2d");

    html2canvas(downloadSection, { allowTaint: true, canvas: canvas }).then(
      function (canvas) {
        context.drawImage(canvas, 0, 0, cWidth, cHeight);
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var link = document.createElement("a");
        link.download = "termly_report.jpg";
        link.href = imgData;
        link.click();
      }
    );
  });
})(jQuery); // End of use strict

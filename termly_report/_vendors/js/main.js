// (function ($) {
//   "use strict";

//   /*--------------------------------------------------------------
//   ## Down Load Button Function
//   ----------------------------------------------------------------*/
//   $("#download_btn").on("click", function () {
//     var downloadSection = $("#download_section")[0];
//     var cWidth = downloadSection.offsetWidth;
//     var cHeight = downloadSection.offsetHeight;

//     html2canvas(downloadSection, { allowTaint: true }).then(function (canvas) {
//       var imgData = canvas.toDataURL("image/jpeg", 1.0);
//       var link = document.createElement("a");
//       link.download = "termly_report.jpg";
//       link.href = imgData;
//       link.click();
//     });
//   });
// })(jQuery); // End of use strict

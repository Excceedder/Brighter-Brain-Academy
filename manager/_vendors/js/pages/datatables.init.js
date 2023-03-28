$(document).ready(function () {
  $("#datatable").DataTable(),
    $("#datatable-buttons")
      .DataTable({
        lengthChange: !1,
        buttons: [
          {
            extend: "csv",
            text: "Export Table",
            className: "btn btn-success",
          },
        ],
        dom:
          '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
          '<"row"<"col-sm-12"tr>>' +
          '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
      })
      .buttons()
      .container()
      .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

  $(".dataTables_length select").addClass("form-select form-select-sm");
  $(".dataTables_filter input").addClass(
    "form-control form-control-sm bg-success text-white"
  );
});

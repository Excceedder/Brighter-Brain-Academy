<!-- JAVASCRIPT -->
<script src="_vendors/libs/jquery/jquery.min.js"></script>
<script src="_vendors/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="_vendors/libs/metismenu/metisMenu.min.js"></script>
<script src="_vendors/libs/simplebar/simplebar.min.js"></script>
<script src="_vendors/libs/node-waves/waves.min.js"></script>
<script src="_vendors/js/pages/dashboard.init.js"></script>
<script src="_vendors/js/app.js"></script>
<script src="_vendors/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="_vendors/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="_vendors/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="_vendors/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="_vendors/libs/jszip/jszip.min.js"></script>
<script src="_vendors/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="_vendors/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="_vendors/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="_vendors/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="_vendors/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="_vendors/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="_vendors/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="_vendors/js/pages/datatables.init.js"></script>
<script>
    $(document).ready(function() {
        var selectedCountry = (selectedRegion = selectedCity = "");
        var BATTUTA_KEY = "00000000000000000000000000000000";

        url =
            "https://battuta.medunes.net/api/country/all/?key=" +
            BATTUTA_KEY +
            "&callback=?";

        $.getJSON(url, function(data) {
            $.each(data, function(index, value) {
                $("#country").append(
                    '<option value="' + value.code + '">' + value.name + "</option>"
                );
            });
        });

        $("#country").change(function() {
            selectedCountry = this.options[this.selectedIndex].text;
            countryCode = $("#country").val();
            url =
                "https://battuta.medunes.net/api/region/" +
                countryCode +
                "/all/?key=" +
                BATTUTA_KEY +
                "&callback=?";
            $.getJSON(url, function(data) {
                $("#region option").remove();
                $('#region').append('<option value="">Please select your region</option>');
                $.each(data, function(index, value) {
                    $("#region").append(
                        '<option value="' + value.region + '">' + value.region + "</option>"
                    );
                });
            });
        });

        $("#region").on("change", function() {
            selectedRegion = this.options[this.selectedIndex].text;
            countryCode = $("#country").val();
            region = $("#region").val();
            url =
                "https://battuta.medunes.net/api/city/" +
                countryCode +
                "/search/?region=" +
                region +
                "&key=" +
                BATTUTA_KEY +
                "&callback=?";
            $.getJSON(url, function(data) {
                $("#city option").remove();
                $('#city').append('<option value="">Please select your city</option>');
                $.each(data, function(index, value) {
                    $("#city").append(
                        '<option value="' + value.city + '">' + value.city + "</option>"
                    );
                });
            });
        });
    });
</script>
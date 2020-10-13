<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $("#tipo_viaje_1").change(function () {
            $("#tipo_viaje_1 option:selected").each(function () {
                tipo_viaje_1 = $(this).val();
                html = '';
                if (tipo_viaje_1 == 'Solo ida') {
                    $("#end_1").prop("disabled", true);
                    document.getElementById("end_1").value = "";
                    document.getElementById("dias_1").value = "";
                    $("#dias_viaje_1").html(html);
                } else {
                    $("#end_1").prop("disabled", false);
                }
            });
        });

        $("#end_1").change(function () {
            start_1 = new Date(document.getElementById("start_1").value);
            end_1 = new Date(document.getElementById("end_1").value);

            var tiempo_1 = end_1.getTime() - start_1.getTime();
            var dias_1 = Math.round(tiempo_1/(1000*60*60*24)) + 1;

            html_1 = "(Cantidad de días: " + dias_1 + ")";
            $("#dias_viaje_1").html(html_1);
            document.getElementById("dias_1").value = dias_1;
        });

        $("#tipo_viaje_2").change(function () {
            $("#tipo_viaje_2 option:selected").each(function () {
                tipo_viaje_2 = $(this).val();
                html = '';
                if (tipo_viaje_2 == 'Solo ida') {
                    $("#end_2").prop("disabled", true);
                    document.getElementById("end_2").value = "";
                    document.getElementById("dias_2").value = "";
                    $("#dias_viaje_2").html(html);
                } else {
                    $("#end_2").prop("disabled", false);
                }
            });
        });

        $("#end_2").change(function () {
            start_2 = new Date(document.getElementById("start_2").value);
            end_2 = new Date(document.getElementById("end_2").value);

            var tiempo_2 = end_2.getTime() - start_2.getTime();
            var dias_2 = Math.round(tiempo_2/(1000*60*60*24)) + 1;

            html_2 = "(Cantidad de días: " + dias_2 + ")";
            $("#dias_viaje_2").html(html_2);
            document.getElementById("dias_2").value = dias_2;
        });

        $("#tipo_viaje_3").change(function () {
            $("#tipo_viaje_3 option:selected").each(function () {
                tipo_viaje_3 = $(this).val();
                html = '';
                if (tipo_viaje_3 == 'Solo ida') {
                    $("#end_3").prop("disabled", true);
                    document.getElementById("end_3").value = "";
                    document.getElementById("dias_3").value = "";
                    $("#dias_viaje_3").html(html);
                } else {
                    $("#end_3").prop("disabled", false);
                }
            });
        });

        $("#end_3").change(function () {
            start_3 = new Date(document.getElementById("start_3").value);
            end_3 = new Date(document.getElementById("end_3").value);

            var tiempo_3 = end_3.getTime() - start_3.getTime();
            var dias_3 = Math.round(tiempo_3/(1000*60*60*24)) + 1;

            html_3 = "(Cantidad de días: " + dias_3 + ")";
            $("#dias_viaje_3").html(html_3);
            document.getElementById("dias_3").value = dias_3;
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $("#viaticos").change(function () {
            $("#viaticos option:selected").each(function () {
                viaticos = $(this).val();

                //alert(viaticos);
                if (viaticos == 1) {
                    $("#valores").show();
                } else {
                    $("#valores").hide();
                }
            });
        });
    });

    function sumar() {
        var total = 0;
        $(".suma").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
                total += 0;
            } else {
                total += parseFloat($(this).val());
            }
        });
        //alert(total);
        document.getElementById('total').value = total;

    }
</script>
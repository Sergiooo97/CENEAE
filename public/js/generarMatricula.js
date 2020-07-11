 // Campos Nombres
 $(document).ready(function () {
    $("#periodo").keyup(function () {
            var grado = $("#grado").val();
            var grupo = $("#grupo").val();
            var curp = $("#curp_al").val();

            var value = $(this).val();
              $("#id_al").val(curp + grado + grupo + value);
              $("#id_tu").val(curp + grado + grupo + value);

          });
          $("#nLista").keyup(function () {
            var grado = $("#grado").val();
            var grupo = $("#grupo").val();
            var curp = $("#curp_al").val();
            var periodo = $("#periodo").val();

            var value = $(this).val();
              $("#id_al").val(value + curp + grado + grupo + periodo);
              $("#id_tu").val(value + curp + grado + grupo + periodo);

          });

          $("#curp_al").keyup(function () {
            var lista = $("#nLista").val();
            var grado = $("#grado").val();
            var grupo = $("#grupo").val();
            var periodo = $("#periodo").val();

            var value = $(this).val();
              $("#id_al").val(lista + value + grado + grupo + periodo);
              $("#id_tu").val(lista + value + grado + grupo + periodo);

          });
          $("#grado").change(function () {
            var lista = $("#nLista").val();

              var id =$("#curp_al").val();
              var value = $(this).val();
              var grupo = $("#grupo").val();
              var periodo = $("#periodo").val();
              $("#id_al").val(lista + id + value + grupo + periodo);
              $("#id_tu").val(lista + id + value + grupo + periodo);

          });
          $("#grupo").change(function () {
             var lista = $("#nLista").val();
              var id =$("#curp_al").val();
              var grado = $("#grado").val();
              var periodo = $("#periodo").val();
              var value = $(this).val();
              $("#id_al").val(lista +id + grado + value + periodo);
              $("#id_tu").val(lista +id + grado + value + periodo);

          });
  });
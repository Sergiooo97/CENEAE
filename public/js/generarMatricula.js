 // Campos Nombres
 $(document).ready(function () {
   
  
          $("#curp_al").keyup(function () {
            var grado = $("#grado").val();
            var grupo = $("#grupo").val();

            var value = $(this).val();
              $("#id_al").val(value + grado + grupo);
              $("#id_tu").val(value + grado + grupo);

          });
          $("#grado").change(function () {
              var id =$("#curp_al").val();
              var value = $(this).val();
              var grupo = $("#grupo").val();
              $("#id_al").val(id + value + grupo);
              $("#id_tu").val(id + value + grupo);

          });
          $("#grupo").change(function () {
              var id =$("#curp_al").val();
              var grado = $("#grado").val();
              var value = $(this).val();
              $("#id_al").val(id + grado + value);
              $("#id_tu").val(id + grado + value);

          });
  });
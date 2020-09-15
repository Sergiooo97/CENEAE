 // Campos Nombres
 $(document).ready(function () {
   
  
          $("#curp_al").keyup(function () {
            var grado = $("#grado").val();
            var grupo = $("#grupo").val();

            var value = $(this).val();
              $("#id_al").val("XX" + value + "XX" + "XXXX");
              $("#id_tu").val("XX" + value + "XX" + "XXXX");

          });
          $("#grado").change(function () {
              var id =$("#curp_al").val();
              var value = $(this).val();
              var grupo = $("#grupo").val();
              $("#id_al").val("XX" + id + "XX" + "XXXX");
              $("#id_tu").val("XX" + id + "XX" + "XXXX");

          });
          $("#grupo").change(function () {
              var id =$("#curp_al").val();
              var grado = $("#grado").val();
              var value = $(this).val();
              $("#id_al").val("XX" + id + "XX" + "XXXX");
              $("#id_tu").val("XX" + id + "XX" + "XXXX");

          });
  });
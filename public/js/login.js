var modal = document.getElementById('id01');

window.onclick = function(event){
  if (event.target == modal){
    modal.style.display = "none";
  }
}

function ocultaar(){
  document.getElementById('bttn').style.display='none';
}
function desplegar(){
ocultaar();
  document.getElementById('id01').style.display='block';
}
function ocultar(){
  document.getElementById('id01').style.display='none';
  document.getElementById('bttn').style.display='block';

}
function desplegarRegistro(){
  document.getElementById('id02').style.display='block';
}
function ocultarRegistro(){
  document.getElementById('id02').style.display='none';
}


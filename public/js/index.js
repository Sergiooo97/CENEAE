var modal = document.getElementById('id01');

window.onclick = function(event){
  if (event.target == modal){
    modal.style.display = "none";
  }
}
function desplegar(){
  document.getElementById('id01').style.display='block';
}
function ocultar(){
  document.getElementById('id01').style.display='none';
}
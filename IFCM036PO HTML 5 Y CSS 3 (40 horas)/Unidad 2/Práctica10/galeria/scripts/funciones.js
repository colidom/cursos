function PrepararHipervinculos() {
  if (!document.getElementById || !document.getElementsByTagName) return false;
  var hipervinculos = document.getElementsByTagName("a");
  for (var i = 0; i < hipervinculos.length; i++) {
    hipervinculos[i].addEventListener("click", function (e) {
                                                  e.preventDefault();
                                                  MostrarFoto(this);
                                              },
                                      false)
    }
}
function MostrarFoto(elemento) {
  var source = elemento.firstChild.getAttribute("src");
  source = source.replace("thumbnails/", "");
  document.getElementById("actual").setAttribute("src", source);
  Describir(elemento.firstChild.getAttribute("id"));
}
function Describir(id) {
  var texto = document.getElementById(id).getAttribute("alt");
  var objeto = document.getElementById("descripcion");
  if (!objeto) {
      var newText = document.createTextNode(texto);
      var newElement = document.createElement("p");
      newElement.setAttribute("id", "descripcion");
      newElement.setAttribute("class", "textoDescripcion");
      newElement.appendChild(newText);
      document.body.appendChild(newElement);
  } else {
      objeto.firstChild.nodeValue = texto;
  }  
}
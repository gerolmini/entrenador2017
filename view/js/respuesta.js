var inputsRespuesta = 0;

function nuevoInputRespuesta(){

  var inp = document.createElement("input");
  inp.type="text"; inp.name="respuestas[]"; inp.placeholder="posible respuesta"; inp.size="40";

  var rad = document.createElement("input");
  rad.type="radio"; rad.name="correcta"; rad.value=""+inputsRespuesta;

  var txt = document.createTextNode("correcta");
  var label = document.createElement("label").appendChild(txt);
  var contenedor = document.getElementById("resp");
  contenedor.appendChild(document.createElement("br"));
  contenedor.appendChild(inp);
  contenedor.appendChild(rad);
  contenedor.appendChild(label);

  inputsRespuesta++;
}

nuevoInputRespuesta();
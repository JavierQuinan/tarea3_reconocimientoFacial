function init() {
  $("#frm").on("submit", (e) => {
    RegistroAsistencia(e);
  });
}

$().ready(() => {
  tiposacceso();
});
let descriptor;
document.addEventListener("DOMContentLoaded", async (e) => {
  const video = document.getElementById('video');
  const MODEL_URL= 'public/models';

  if (navigator.mediaDevices.getUserMedia) {
    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
    video.srcObject = stream;
    video.onloadedmetadata = function(e) {
      video.play();
      onPlay();
    };
  } else {
    console.log("getUserMedia not supported");
  }

  async function onPlay() {
    await faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL);
    await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
    await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);

    const detections = await faceapi.detectSingleFace(video, new faceapi.SsdMobilenetv1Options())
      .withFaceLandmarks()
      .withFaceDescriptor();

    if (detections) {
      descriptor = detections.descriptor;
      console.log(descriptor);
    }
  }
});

var RegistroAsistencia = (e) => {
  e.preventDefault();
  var formulario = new FormData($("#frm")[0]);
  alert("aqui");
  $.ajax({
    url: "controllers/usuario.controllers.php?op=unoconCedula",
    type: "post",
    data: formulario,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      
    },
  }).done((usuarioId) => {
    usuarioId = JSON.parse(usuarioId);
    $.ajax({
      url: "controllers/usuario.controllers.php?op=Descriptor",
      type: "post",
      data: {cedula: usuarioId.cedula},
      success: (respuesta) => {
        let res = JSON.parse(respuesta);
        let descriptorValues = res.Descriptor.split(",").map(Number);
        let dbDescriptor = new Float32Array(descriptorValues);
        console.log(dbDescriptor.length, descriptor.length);
        let distance = faceapi.euclideanDistance(dbDescriptor, descriptor);
        if(distance < 0.5) {
          console.log("Reconocimiento facial correcto.");
        }else{
          console.log("Reconocimiento facial erróneo.");
        }
      }
    })
    formulario.append("usuariosId", usuarioId.idUsuarios);
    $.ajax({
      url: "controllers/accesos.controllers.php?op=insertar",
      type: "post",
      data: formulario,
      processData: false,
      contentType: false,
      cache: false,
      success: (respuesta) => {
        console.log(respuesta);
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") { // condición 
          Swal.fire("Registro de Asistencia", "Se guardo con éxito", "success");
        } else {
          Swal.fire(
            "Registro de Asistencia",
            "Hubo un error al guardar",
            "danger"
          );
        }
      },
    });
  });
};

var tiposacceso = () => {
  return new Promise((resolve, reject) => {
    var html = `<option value="0">Seleccione una opción</option>`;
    $.post("controllers/tipoacceso.controllers.php?op=todos", async (lista) => {
      lista = JSON.parse(lista);
      $.each(lista, (index, tipo) => {
        html += `<option value="${tipo.IdTipoAcceso}">${tipo.Detalle}</option>`;
      });
      await $("#tipo").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};
init();







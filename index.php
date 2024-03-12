<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nube Colectiva">
    <title>Home | Mi Proyecto</title>
    <!-- Favicon -->
    <link rel="icon" href="https://nubecolectiva.com/favicon.ico">
    <!-- Archivo CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="container mb-5">
        <!-- Header -->
        <header class="d-flex flex-wrap py-3 mb-5 border-bottom">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">Tienda</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
        </header>
        <!-- Planes -->
        <div class="row">
          <div class="col-md-12 text-center mt-5 mb-5">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg" id="buscadorvoz" placeholder="Ingresa un Término">
              <button class="btn btn-outline-secondary" type="button" id="start" onclick="iniciarGrabacion()">🎙️</button>
            </div>
            <div id="contenedor"></div>
          </div>
        </div>
      </div>
    </main>
    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
      
    </footer>
    <!-- Archivo JS Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <script type="text/javascript">
      
      var reconocimiento = new webkitSpeechRecognition();
      reconocimiento.continuous = false;
      reconocimiento.lang = "es-ES";
      reconocimiento.interimResults = true;
      reconocimiento.onresult = function(event) {
        console.log(event);
        var decirTexto = "";
        for (var i = event.resultIndex; i < event.results.length; i++) {
          if (event.results[i].isFinal) {
            decirTexto = event.results[i][0].transcript;
          } else {
            decirTexto += event.results[i][0].transcript;
          }
        }
        document.getElementById('buscadorvoz').value = decirTexto;
        buscarDatos(decirTexto);
      }

      function iniciarGrabacion() {
        document.getElementById('buscadorvoz').value = "";
        document.getElementById('buscadorvoz').focus();
        reconocimiento.start();
      }

      function buscarDatos(decirTexto) {
        var xhr = new XMLHttpRequest();
        var url = 'obtenerDatos.php';
        var params = 'buscadorvoz=' + decirTexto;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function(responseText) {
          if (this.readyState == 4 && this.status == 200) {
            const datos = this.responseText;
            document.getElementById('contenedor').innerHTML = datos;
          }
        }
        xhr.send(params);
      }
      
    </script>
    
  </body>
</html>

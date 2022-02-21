<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
    #my_camera {
      width: 320px;
      height: 240px;
    }
  </style>
  <title>Camera</title>
</head>

<body>
  <center>
    <div id="my_camera"></div>
    <button style="width: 500px;" class="btn btn-primary" type="submit" onClick="take_snapshot()">Сделать фото</button>
    <div class="mt-4" id="results"></div>
  </center>
  <script type="text/javascript" src="webcam.min.js"></script>
  <script language="JavaScript">
    // Настройка и подключение камеры
    Webcam.set({
      width: 354,
      height: 472,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach('#my_camera');

    function take_snapshot() {

      // Симок и получение данных изображения 
      Webcam.snap(function(data_uri) {
        Webcam.upload(data_uri, 'saveimage.php', function(code, text, Name) {
          document.getElementById('results').innerHTML =
            '' +
            '<img src="' + data_uri + '"style=" width: 354px;">';
        });
      });
    }
  </script>
</body>

</html>
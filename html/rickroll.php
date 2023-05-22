<!DOCTYPE html>
<html>
<head>
  <title>Has sido rickrolleado</title>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    #video-container {
      width: 100vw;
      height: 100vh;
      overflow: hidden;
    }
    #video-container video {
      width: 100%;
      height: auto;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>
<body>
  <div id="video-container">
    <video src="../images/rickroll.mp4" autoplay loop muted></video>
  </div>
</body>
</html>

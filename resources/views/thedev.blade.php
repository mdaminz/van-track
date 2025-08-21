<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The Dev - Muhammad Amin Bin Abd Rani</title>
  <link rel="icon" type="image/png" href="assets/img/amin-removebg-preview.png">

  <style>
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      font-family: "Comic Sans MS", cursive, sans-serif;
      text-align: center;
      animation: bgFlash 1s infinite;
    }

    @keyframes bgFlash {
      0%   { background: red; }
      25%  { background: yellow; }
      50%  { background: lime; }
      75%  { background: cyan; }
      100% { background: magenta; }
    }

    h1 {
      font-size: 60px;
      margin-top: 30px;
      animation: textFlash 0.5s infinite;
    }

    @keyframes textFlash {
      0%   { color: white; }
      25%  { color: black; }
      50%  { color: blue; }
      75%  { color: green; }
      100% { color: orange; }
    }

    .amin {
      position: absolute;
      width: 120px;
      opacity: 0;
      animation: spin 8s linear infinite, fadeIn 2s forwards;
    }

    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    #soundBtn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      padding: 15px 25px;
      font-size: 20px;
      font-weight: bold;
      background: red;
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      z-index: 9999;
      animation: btnFlash 1s infinite;
    }

    #soundBtn:hover {
      background: darkred;
    }

    @keyframes btnFlash {
      0%   { background: red; }
      50%  { background: purple; }
      100% { background: red; }
    }
  </style>
</head>
<body>

  <h1>🤣 MUHAMMAD AMIN PRODUCTION 🤣</h1>

  <!-- Sound -->
  <audio id="trollMusic" src="assets/video/music.mp3" preload="auto" loop></audio>

  <!-- Button -->
  <button id="soundBtn">Don't Click on This Button</button>

  <script>
    const maxFaces = 1000; // total faces
    let count = 0;

    function spawnFace() {
      if (count >= maxFaces) return;
      const face = document.createElement("img");
      face.src = "assets/img/amin-removebg-preview.png";
      face.className = "amin";
      face.style.top = Math.random() * window.innerHeight + "px";
      face.style.left = Math.random() * window.innerWidth + "px";
      document.body.appendChild(face);
      count++;
    }

    // Slowly populate (1 face every 500ms)
    setInterval(spawnFace, 100);

    // Handle sound button
    const btn = document.getElementById("soundBtn");
    const music = document.getElementById("trollMusic");

    btn.addEventListener("click", () => {
      music.volume = 1.0;
      music.play();
      btn.innerText = "😂 Gotcha!";
      btn.disabled = true; // disable after click
    });
  </script>
</body>
</html>

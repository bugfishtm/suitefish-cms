<?php @http_response_code(503); ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>We'll be back shortly!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #080808;
      color: #FF5707;
      font-family: 'Fira Mono', 'Consolas', 'Monaco', monospace;
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    .console-container {
      padding: 32px 24px 24px 24px;
      min-width: 340px;
      max-width: 90vw;
      min-height: 180px;
      border-radius: 8px;
    }
    .console-text {
      font-size: 1.1rem;
      line-height: 1.6;
      white-space: pre-line;
      min-height: 100px;
      letter-spacing: 0.04em;
      word-break: break-word;
    }
    .blinker {
      display: inline-block;
      width: 0.7em;
      animation: blink 1s steps(1) infinite;
      color: #FF5707;
      font-weight: bold;
    }
    .console-link {
      color: #FF5707;
      text-decoration: underline;
      cursor: pointer;
      transition: color 0.2s;
      font-size: 1rem;
      margin-top: 1.5em;
      display: inline-block;
    }
    .console-link:hover {
      color: #ff8c42;
    }
    @keyframes blink {
      50% { opacity: 0; }
    }
    @media (max-width: 500px) {
      .console-container {
        padding: 20px 8px 16px 8px;
        min-width: 0;
      }
      .console-text {
        font-size: 1rem;
      }
      .console-link {
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>
  <div class="console-container">
    <div class="console-text" id="console"></div>
    <a class="console-link" href="https://bugfishtm.github.io" target="_blank" rel="noopener">Visit bugfishtm.github.io</a>
  </div>
  <script>
    const lines = [
      "SYSTEM MAINTENANCE MODE",
      "",
      "$> The site is currently undergoing maintenance.",
      "$> Content will be back up when work is finished.",
      "$> Please stand by..."
    ];
    const consoleEl = document.getElementById('console');
    const blinkerHTML = '<span class="blinker">█</span>';
    let line = 0, char = 0;
    let output = '';

    function typeLine() {
      if (line < lines.length) {
        if (char < lines[line].length) {
          output += lines[line][char];
          char++;
          consoleEl.innerHTML = output + blinkerHTML;
          setTimeout(typeLine, 30);
        } else {
          output += '\n';
          char = 0;
          line++;
          consoleEl.innerHTML = output + blinkerHTML;
          setTimeout(typeLine, 200);
        }
      } else {
        // After typing, keep the blinker at the end
        consoleEl.innerHTML = output + blinkerHTML;
      }
    }

    typeLine();
  </script>
</body>
</html>

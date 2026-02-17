<?php
// This file ensures proper mobile support and performance
?>

<!-- Mobile Viewport (REQUIRED for all devices) -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Prevent zoom issues on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Better mobile rendering -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Smooth fonts -->
<style>
  html {
    -webkit-text-size-adjust: 100%;
  }

  body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
  }

  img {
    max-width: 100%;
    height: auto;
  }
</style>

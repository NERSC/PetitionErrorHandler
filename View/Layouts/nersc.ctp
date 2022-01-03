<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Identity Already Linked</title>
        <link rel="stylesheet" type="text/css" href="https://login-proxy-stage.nersc.gov/fedid/css/main.css">
        <link rel="stylesheet" type="text/css" href="https://login-proxy-stage.nersc.gov/fedid/css/nersc-login.css">
        <link rel="stylesheet" type="text/css" href="https://login-proxy-stage.nersc.gov/fedid/css/bootstrap.css"> </head>
        <link rel="shortcut icon" href="https://login-proxy-stage.nersc.gov/fedid/img/favicon.ico">
    <body>
      <div id="outer-wrap">
        <div id="inner-wrap">
          <div id="nersc-login">
          <div id="login-content">
          <div class="row">
            <div id="nersc-header">
              <img id="nersc-logo" src="https://login-proxy-stage.nersc.gov/fedid/img/nerschorizLOCKUP-crop.png"
                   alt="NERSC logo">
            </div>
          </div>

<?php print $this->fetch('content'); ?>

      </div> <!-- login-content -->
      </div> <!-- nersc-login -->
      </div> <!-- inner-wrap -->
      </div> <!-- outer-wrap -->

      <div id="footer">
        <div id="footer-logos">
          <a href="https://www.lbl.gov/" target="_blank"><img src="https://login-proxy-stage.nersc.gov/fedid/img/berkeley-lab-badge.png" alt="LBL logo"/></a></li>
          <a href="https://science.energy.gov/" target="_blank"><img src="https://login-proxy-stage.nersc.gov/fedid/img/doe-badge.png" alt="DOE Office of Science logo"/></a></li>
        </div>
        <div id="footer-links">
          <ul>
            <li><a href="https://www.nersc.gov/about/contact-us/">Contact us</a></li>
            <li><a href="http://www.lbl.gov/Disclaimers.html">Privacy &amp; Security Notice</a></li>
          </ul>
        </div>
      </div>
    
    </body>
</html>
<?php require 'scripts/login.php';?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Uusi tervehdys | Metropolian joulutervehdys</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
    <link href="public/css/lity.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles0.css" type="text/css">
  </head>
  <body>
    <div class="wrapper">
      <main class="grid-container">
        <section class="introductory-text-block">
          <h2>Luo uusi tervehdys</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.</p>
        </section>
        <div class="grid-placeholder"></div>
        <section class="create-card-form">
          <h3>Lähetystiedot:</h3>
          <form id="sending-info-form" method="post">
            <input id="fuser" type="text" name="user" required="required" value="<?php echo phpCAS::getUser(); ?>" readonly>
            <input id="fsender" type="text" name="sender" required="required" placeholder="Lähettäjä">
            <input id="freceiver" type="text" name="receiver" required="required" placeholder="Vastaanottaja">
            <input id="fmessage" type="text" name="message" required="required" placeholder="Viesti"></input>
            <section class="grid-container form-previews">
              <div class="gallery-card">
                <a class="" href="public/video/lapsuuden-haave.mp4" data-lity data-lity-desc="">
                  <img src="public/img/lapsuuden-haave.jpg" width="100%"/>
                </a>
                <label><input type="radio" name="animation" value="A"> Animaatio 1</label>
              </div>
              <div class="gallery-card">
                <a class="" href="public/video/lapsuuden-haave.mp4" data-lity data-lity-desc="">
                  <img src="public/img/lapsuuden-haave.jpg" width="100%"/>
                </a>
                <label><input type="radio" name="animation" value="B"> Animaatio 2</label>
              </div>
              <div class="gallery-card">
                <a class="" href="public/video/lapsuuden-haave.mp4" data-lity data-lity-desc="">
                  <img src="public/img/lapsuuden-haave.jpg" width="100%"/>
                </a>
                <label><input type="radio" name="animation" value="C"> Animaatio 3</label>
              </div>
            </section>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
              sed diam nonummy nibh euismod tincidunt ut laoreet dolore rat volutpat.</p>
            <input type="submit" value="Tallenna ja lähetä">
          </form>
        </section>
      </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="public/js/lity.min.js"></script>
    <script src="public/js/functions.js"></script>
  </body>
</html>
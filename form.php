<?php
  require 'scripts/database.php';
  require 'scripts/login.php';

  $sql = "SELECT * FROM animations";
  $result = $mysqli->query($sql);

  function template( $file, $args ){
    // ensure the file exists
    if ( !file_exists( $file ) ) {
      return '';
    }
    // Make values in the associative array easier to access by extracting them
    if ( is_array( $args ) ){
      extract( $args );
    }
    // buffer the output (including the file is "output")
    ob_start();
    include $file;
    return ob_get_clean();
  }

  $mysqli->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Uusi tervehdys | Metropolian joulutervehdys</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
    <link href="public/css/lity.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body>
    <div class="wrapper">
      <header>
        <a class="go-back" href="index.php"><i class="material-icons">arrow_back</i><span>Palaa etusivulle</span></a>
      </header>
      <main class="grid-container">
        <section class="introductory-text-block">
          <h2>Luo uusi tervehdys</h2>
          <!-- <p>Kustomoi Metropolian graafisen suunnittelun opiskelijoiden
            suunnittelemat ja toteuttamat joulutervehdysanimaatiot
            yhteistyökumppaneillesi ja ystävillesi tällä alustalla.</p>
          <p>Voit lisätä animaation loppukuvaan oman persoonallisen viestisi
            sekä oman nimesi allekirjoitukseksi. Voit halutessasi kohdentaa
            viestin myös jollekin ryhmälle yksilöiden sijaan.</p>
          <p>Kustomoinnin jälkeen voit kopioida yksilöllisen nettiosoitteen ja
            lähettää sen sähköpostilla tai jakaa suoraan sosiaalisen median kanaviisi.</p> -->
        </section>
        <div class="grid-placeholder"></div>
        <section class="create-card-form">
          <h3>Lähetystiedot:</h3>
          <form id="sending-info-form" method="post">

            <input id="fuser" type="text" name="user" required="required" value="<?php echo phpCAS::getUser(); ?>" readonly>
            <label for="fsender">Lähettäjä (oma nimi tai yksikön nimi)</label>
            <input id="fsender" type="text" name="sender" required="required">
            <label for="freceiver">Vastaanottaja</label>
            <input id="freceiver" type="text" name="receiver" required="required">
            <label for="fmessage">Viesti</label>
            <textarea id="fmessage" type="text" name="message" required="required"></textarea>
            <section id="form-previews" class="grid-container form-previews">
              <?php
                $file = __DIR__ . '/templates/preview-template.php';

                $output = '';

                foreach ( $result as $row ){
                  $output.= template( $file, $row );
                }

                print $output;
              ?>
            </section>
            <input type="submit" value="Tallenna ja siirry lähettämään">
          </form>
        </section>
        <section class="input-preview">
          <div class="input-preview-wrapper">
            <article class="input-preview-content">
              <span id="preview-input-sender"></span>
              <span id="preview-input-receiver"></span>
              <span id="preview-input-message"></span>
              <img src="public/img/endpic2611.jpg" width="100%" />
            </article>
          </div>
        </section>
      </main>
    </div>
    <!-- MODAL -->
    <div id="share-options" class="modal">
      <div class="wrapper">
        <div class="grid-container">
          <div class="modal-content">
            <section class="modal-content-preview">
              <h2>Lähetä tervehdys</h2>
              <figure>
                <figcaption>Esikatselu</figcaption>
                <video src="lapsuuden-haave.mp4" controls width="100%;"></video>
              </figure>
              <section class="modal-social-options">
                <h3>Kopioi linkki tai jaa se somessa</h3>
                <div class="shareable-link-container">
                  <input id="shareable-link" class="card-url" type="text" value=" " readonly>
                  <button onclick="copyLink()">Kopioi</button>
                </div>
              </section>
              <a class="button page-reload" type="button" name="button">Luo uusi joulutervehdys</a>
              <a href="index.php" class="button" name="button">Palaa aloitussivulle</a>
            </section>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="public/js/lity.min.js"></script>
    <script src="public/js/submit.js"></script>
    <script type="text/javascript">
      $('#fsender').keyup(function() {
        $('#preview-input-sender').html(this.value);
      });
      $('#freceiver').keyup(function() {
        $('#preview-input-receiver').html(this.value);
      });
      $('#fmessage').keyup(function() {
        $('#preview-input-message').html(this.value);
      });

      $('.card-preview input').on('change', function() {
        if ($(this).is(':checked')) {
          $(this).closest('.card-preview').find('.card-preview-img').addClass('preview-border');
        }
        $('.card-preview input').not(this).closest('.card-preview').find('.card-preview-img').removeClass('preview-border');
      });

      $('.page-reload').click(function() {
          location.reload(true);
      });
      function copyLink() {
        var shareableLink = document.getElementById("shareable-link");
        shareableLink.select();
        document.execCommand("copy");
      }
    </script>
  </body>
</html>

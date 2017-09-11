<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Julika veebiprogrammeerimise asjad</title>
</head>
<body>
  <h1>Julika Maiste</h1>
  <p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
  <p>Esimene katse kodust muudatust teha.</p>
  <h2>Pealkirja katsetus</h2>
  <p>koos tavateksti katsetusega</p>
  <p>Teine katsetus mitu päeva hiljem kodust tunneli kaudu muudatust teha.</p>
  <?php
  echo "<p>Kõige esimene PHP abil väljastatud sõnum</p>";
  echo "<p>Täna on ";
  echo date("d.m.Y");
  echo ".</p>";
  echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .".</p>";
  
  ?>
</body>

</html>
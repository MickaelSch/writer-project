<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="./public/css/bootstrap.css" rel="stylesheet">
  <link href="./public/css/style.css" rel="stylesheet">

  <!-- Police et fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./public/js/jquery-3.3.1.js"></script>
  <script src="./public/js/bootstrap.js"></script>
  <script src="./public/js/jquery.dataTables.min.js"></script>





  <title><?= $title ?></title>

</head>

<body>
  <div id="mainNotify">

  </div>
  <header>

    <?= $header ?>
  </header>


  <?= $content ?>


  <footer id="footer">
    <p class="copyright">© 2018 Copyright : Mickael Schimpf</p>
  </footer>
  <script src="./public/js/comment.js" ></script>
  <script src="./public/js/main.js" ></script>
  <script src="./public/js/user.js" ></script>
</body>

</html>

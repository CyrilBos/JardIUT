<?php include("includes/data.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_TITLE; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include("includes/header.php"); ?>

    <!-- Navigation -->
    <?php include("includes/nav.php"); ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Le blog du
                        <strong>projet</strong>
                    </h2>
                    <hr>
                </div>

                <?php
                $files = array_reverse(glob("articles/*.xml"));
                $i = 0;
                foreach ($files as $file) {
                  try {
                    $article = simplexml_load_file($file);
                    ?>
                    <div class="col-lg-12 text-center">
                        <img class="img-responsive img-border img-full" src="img/<?php echo $article->illustration; ?>" alt="">
                        <h2><?php echo $article->titre; ?>
                            <br>
                            <small>Le <?php echo $article->date; ?> par <?php echo $article->auteur; ?></small>
                        </h2>
                        <div class="blog-article" id="article-<?php echo $i; ?>">
                          <?php
                          $paragraphes = $article->contenu;
                          foreach($paragraphes as $p) {
                            echo "<p>" + $p->texte + "</p>";
                          }
                          ?>
                        </div>
                        <button class="btn btn-default btn-lg" onclick="toggle_article('#article-<?php echo $i; ?>');">Lire l'article</button>
                        <hr>
                    </div>
                    <?php
                  } catch (Exception $e) {
                    echo "<div class='alert alert-danger'>Erreur lors du chargement du fichier "+$file+"</div>";
                  }
                  $i++;
                }
                ?>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <?php include("includes/footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/load.js"></script>
    <script>
    $(document).ready(function() {
      $(".blog-article").hide();
    });

    function toggle_article(article) {
      $(article).toggle();
      var button = $(article+" + button");
      button.text(button.text() == "Lire l'article" ? "Réduire l'article" : "Lire l'article");
    }
    </script>

</body>

</html>

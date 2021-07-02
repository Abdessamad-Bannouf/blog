<html>
    <head>
        <title>Commentaire</title>
        <meta charset="UTF-8"/>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

    <body>
        <?php while ($donnees = $data['commentary']->fetch()){ 
            if(isset($donnees['content'])){ ?>
                <div><?= $donnees['content']; ?>
                <?php if($_SESSION['isAdmin']){ ?>

                        <a href="<?= WebSiteLink; ?>commentary/accepted/<?= $donnees['commentary_id']; ?>">
                            <button class="btn btn-success">
                                Valider commentaire
                            </button>
                        </a>

                        <a href="<?= WebSiteLink; ?>commentary/refused/<?= $donnees['commentary_id']; ?>">
                            <button class="btn btn-danger">
                                Rejeter commentaire
                            </button>
                        </a>

                </div>
                <?php } ?>
        <?php }} ?>
    </body>
</html>
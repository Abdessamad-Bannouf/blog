<!DOCTYPE html>
<html>
    <head>
        <title>Commentaire</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" src="../App/Public/template/css/commentary.css"/>
    </head>

    <body>
        <?php require 'App/View/NavBar.php'; ?>
        <table>
            <?php while ($donnees = $data['commentary']->fetch()){ 
                if(isset($donnees['content'])){ ?>
                    <tr><td><div><?= $donnees['content']; ?>
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
                            </td>
                        </tr>

                    </div>
                    <?php } ?>
            <?php }} ?>
        </table>
        <?php require 'App/View/Footer.php'; ?>
    </body>
</html>
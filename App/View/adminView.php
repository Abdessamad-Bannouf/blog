<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8"/>
        <!-- Bootstrap Core CSS -->
        <link href="../App/Public/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../App/Public/template/css/post.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../App/Public/css/post.css" />
        <script src="../App/Public/template/vendor/jquery/jquery.min.js" type="text/javascript"></script>
        
        <!-- Custom Fonts -->
        <link href="../App/Public/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php require 'App/View/NavBar.php'; ?>
        <a>
            <button class="btn btn-success" onclick="add()">
                Ajouter article
            </button>
        </a>

        <div class="container-fluid">
            <form method="post" action='<?= WebSiteLink ?>admin/Add' enctype="multipart/form-data">            
                <div class="container">
                    <div class="formBox">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1>Création de post</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox ">
                                    <div class="inputText">Titre</div>
                                    <input type="text" name="title" class="input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <div class="inputText">Chapô</div>
                                    <input type="text" name="chapo" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Image</div>
                                    <input type="file" name="image" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Message</div>
                                    <textarea class="input" name="content"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" name="" class="button" value="Send Message">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php 
            while($donnees = $data['post']->fetch()):
        ?>

                <div class="col-md-10 blogShort">
                    <h1><?= $donnees['title'] ?></h1>
                    <h3><?= $donnees['chapo'] ?></h3>
                    <img src="../App/Public/img/<?= $donnees['image'] ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
                    <article>
                        <p><?= $donnees['content'] ?></p>
                    </article>
                    <a class="btn btn-danger pull-right marginBottom10" href="<?= WebSiteLink; ?>admin/delete/<?= $donnees['post_id']; ?>"><i class="fa fa-trash" style="color:white"></i></a> 
                    <a class="btn btn-warning pull-right marginBottom10" href="<?= WebSiteLink; ?>admin/update/<?= $donnees['post_id']; ?>" ><i class="fa fa-wrench" style="color:green"></i></a> 
                </div>
        <?php 
            endwhile;
        ?>
        <a>
        <?php require 'App/View/Footer.php'; ?>
    </body>

    <script type="text/javascript">
        $(document).ready(function(){

        $(".input").focus(function() {
            $(this).parent().addClass("focus");
        })   
        });

            function add()
            {
                document.getElementsByTagName("form")[0].style.display = "block";
            }
    </script>
</html>


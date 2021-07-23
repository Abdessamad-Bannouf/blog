<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8"/>
        <!-- Bootstrap Core CSS -->
        <link href="../App/Public/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../App/Public/template/vendor/jquery/jquery.min.js" type="text/javascript"></script>
        <link href="../App/Public/template/css/post.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php require 'App/View/NavBar.php'; ?>
        <div class="container-fluid">
            <form method="post" action='<?= WebSiteLink ?>' enctype="multipart/form-data">            
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
        <?php ?>
        <?php require 'App/View/Footer.php'; ?>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
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
        <a>
            <button class="btn btn-success" onclick="add()">
                Ajouter article
            </button>
        </a>

        <a>
            <button class="btn btn-warning" onclick="update()">
                Modifier article
            </button>
        </a>

        <div>
        </div>


        <div class="container-fluid">
            <form method="post" action='<?= WebSiteLink ?>User/Add' enctype="multipart/form-data">            
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


            <form method="post" action='<?= WebSiteLink ?>User/Update' enctype="multipart/form-data">            
                <div class="container">
                    <div class="formBox">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1>Modification de post</h1>
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
                document.getElementsByTagName("form")[1].style.display = "none";
            }

            function update(){
                document.getElementsByTagName("form")[1].style.display = "block";
                document.getElementsByTagName("form")[0].style.display = "none";
            }
        </script>
</html>


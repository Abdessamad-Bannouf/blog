<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8"/>
        <!-- Bootstrap Core CSS -->
        <link href="../../App/Public/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../App/Public/template/css/post.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../App/Public/css/post.css" />
    </head>

    <body>
        <?php require 'App/View/NavBar.php'; ?>
        <div class="container-fluid">
            <form method="post" action='<?= WebSiteLink ?>Admin/Update' enctype="multipart/form-data">            
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
                                    <?php if(isset($data['post']['post_id'])){ ?>
                                        <input type="text" name="title" class="input" value="<?= $data['post']['title']; ?>">
                                    <?php } 

                                     else{ ?>
                                        <input type="text" name="title" class="input">
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <div class="inputText">Chapô</div>
                                    <?php if(isset($data['post']['post_id'])){ ?>
                                        <input type="text" name="chapo" class="input" value="<?= $data['post']['chapo']; ?>">
                                    <?php }
                                    
                                    else{ ?>
                                        <input type="text" name="chapo" class="input">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Image</div>
                                    <?php if(isset($data['post']['image'])){ ?>
                                        <input type="file" name="image" class="input" value="C:\wamp64\www\Blog\App\Public\img\image_deux.jpg">
                                        <img src="../../App/Public/img/<?= $data['post']['image']; ?>" />
                                    <?php }

                                    else{ ?>
                                        <input type="text" name="chapo" class="input">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Message</div>
                                    <?php if(isset($data['post']['content'])){ ?>
                                        <textarea class="input" name="content"><?= $data['post']['content']; ?></textarea>
                                    <?php }    
                                    
                                    else{ ?>
                                        <textarea class="input" name="content"></textarea>
                                    <?php } ?>
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
        <?php require 'App/View/Footer.php'; ?>
    </body>
    <script src="../../App/Public/template/vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        document.getElementsByTagName("form")[0].style.display = "block";
    </script>
    
</html>
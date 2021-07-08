<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="../App/Public/css/post.css" />
        <!------ Include the above in your HEAD tag ---------->
    </head>

    <body>
        <div class="container">
            <div id="blog" class="row"> 
                        
                <div class="col-sm-2 paddingTop20">
                    <nav class="nav-sidebar">
                        <ul class="nav">
                            <li class="active"><a href="javascript:;"><span class="glyphicon glyphicon-star"></span> News</a></li>
                            <li><a href="javascript:;">Latest news</a></li>
                            <li><a href="javascript:;">Updates</a></li>
                            <li><a href="javascript:;">Training</a></li>
                            <li><a href="javascript:;">Nutrition</a></li>
                            <li><a href="javascript:;">Proteins</a></li>
                            <li><a href="javascript:;">Recipes</a></li>
                            <li><a href="javascript:;">Challenge</a></li>
                            <li class="nav-divider"></li>
                            <li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>
                        </ul>
                    </nav>
                        <div><h2 class="add">Place for your add!</h2></div>
                </div>

                <?php while ($donnees = $Data['post']->fetch()){ ?>
                <div class="col-md-10 blogShort">
                    <h1><?= $donnees['title'] ?></h1>
                    <h3><?= $donnees['chapo'] ?></h3>
                    <img src="../App/Public/img/<?= $donnees['image'] ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
                    <article><p>
                         <?= $donnees['content'] ?>  
                    </p></article>
                    <a class="btn btn-blog pull-right marginBottom10" href="http://bootsnipp.com/user/snippets/2RoQ">Lire plus</a> 
                </div>
                <?php } ?>
                        
                        
                    <div class="col-md-12 gap10"></div>
            </div>
        </div>
    </body>
</html>
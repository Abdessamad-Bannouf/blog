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
                <?php while ($donnees = $data['post']->fetch()){ ?>
                <div class="col-md-10 blogShort">
                    <h1><?= $donnees['title'] ?></h1>
                    <h3><?= $donnees['chapo'] ?></h3>
                    <img src="../App/Public/img/<?= $donnees['image'] ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
                    <article><p>
                         <?= $donnees['content'] ?>  
                    </p></article>
                    <a class="btn btn-blog pull-right marginBottom10" href="http://bootsnipp.com/user/snippets/2RoQ">Lire plus</a> 
                </div>
            </div>    

            <div class="container">
                <div class="row">
                    <div class="panel panel-default widget">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-comment"></span>
                            <h3 class="panel-title">
                                Recent Comments</h3>
                            <span class="label label-info">
                                78</span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-2 col-md-1">
                                            <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                        <div class="col-xs-10 col-md-11">
                                            <div>
                                                <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                                    Google Style Login Page Design Using Bootstrap</a>
                                                <div class="mic-info">
                                                    By: <a href="#">Bhaumik Patel</a> on 2 Aug 2013
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <form method="post" action="<?= WebSiteLink; ?>commentary/add">
                                                    <textarea name="commentary" rows="4" cols="150"></textarea>
                                                    <input type="hidden" name="post_id" value="<?= $donnees['post_id']; ?>"/>
                                                    <input type="submit" name="send" />
                                                </form>
                                            </div>
                                            <div class="action">
                                                <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                                <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                    <span class="glyphicon glyphicon-ok"></span>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
                        </div>
                    </div>
                </div>
            </div>
                <?php } ?>                     
            
        </div>
    </body>
</html>
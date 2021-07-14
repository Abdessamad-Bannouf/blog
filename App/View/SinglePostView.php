<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="../../App/Public/css/post.css" />
        <!------ Include the above in your HEAD tag ---------->
    </head>

    <body>
        <div class="container">
            <div id="blog" class="row"> 
                <?php $i=0; while ($donnees = $data['post']->fetch()){if($i==0){ ?>
                <div class="col-md-10 blogShort">
                    <h1><a href="<?=  WebSiteLink; ?>post/show/<?= $donnees['post_id'] ?>"><?= $donnees['title'] ?></a></h1>
                    <h3><?= $donnees['chapo'] ?></h3>
                    <img src="../../App/Public/img/<?= $donnees['image'] ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
                    <a class="btn btn-blog pull-right marginBottom10" href="http://bootsnipp.com/user/snippets/2RoQ">Lire plus</a> 
                </div>
            </div>    
            <div class="container">
                <div class="row">
                    <div class="panel panel-default widget">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-2 col-md-1">
                                            <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                        <div class="col-xs-10 col-md-11">
                                            <div>
                                                <div class="mic-info">
                                                    Par: <a href="#"><?= $_SESSION['firstName']; ?></a> Le <?= $donnees['date']; ?>
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
                <?php  $i++; } ?>
            
            <article><p>
                         <?php if($donnees['is_valid']){
                            echo $donnees['firstname'].' : '.$donnees['content'];
                         } 
                         
                         ?>  
                    </p></article>
           <?php } ?>       
            
        </div>
    </body>
</html>
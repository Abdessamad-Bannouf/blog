<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8"/>
        <link href="../App/Public/template/css/register.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">         
    </head>

    <body>  
        <?php require 'App/View/NavBar.php'; ?>
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	        <div class="panel panel-default">
        		        <div class="panel-heading">
                            <h3 class="panel-title">Connectez-vous</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?= WebSiteLink; ?>/User/login">
                                <?php if($data['mail'] == 1 OR $data['password'] == 1){ ?>
                                    <p>mauvais identifiants</p>    
                                <?php } ?>
                                <div class="form-group">
                                    <input type="email" name="mail" id="email" class="form-control input-sm" placeholder="Email Address">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
    
                                </div>
                                
                                <div class="form-group">
                                    <a href="http://localhost/Blog/User/register">Pas de compte ? S'enregistrer</a>
                                </div>
                                
                                <input type="submit" value="Se connecter" class="btn btn-info btn-block">
                            
                            </form>
                        </div>
	    		    </div>
    		    </div>
    	    </div>
        </div>
        <?php require 'App/View/Footer.php'; ?>
</body>
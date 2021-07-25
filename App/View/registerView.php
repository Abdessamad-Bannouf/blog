<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <link rel="stylesheet" href="../App/Public/template/css/register.css"/>
    </head>

    <body> 
        <?php require 'App/View/NavBar.php'; ?>
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inscrivez vous <small>C'est gratuit !</small></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?= WebSiteLink; ?>/User/register">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="firstName" id="first_name" class="form-control input-sm" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="lastName" id="lastname" class="form-control input-sm" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="mail" id="mail" class="form-control input-sm" placeholder="Email Address">
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="confirmPassword" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="submit" value="S'enregistrer" class="btn btn-info btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'App/View/Footer.php'; ?>
    </body>
</html>
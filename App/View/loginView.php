<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    </head>

    <body>  
        <div class="container">
        <br><p class="text-center">More bootstrap 4 components on <a href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com</a></p>
        <hr>


        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Se connecter</h4>
                <p class="text-center">Commencez avec un compte gratuit</p>
                <p>

                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
                </p>
                <p class="divider-text">
                    <span class="bg-light">OR</span>
                </p>
                <form method="post" action="<?= WebSiteLink; ?>/User/login"> 
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="mail" class="form-control" placeholder="mail" type="email">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password" class="form-control" placeholder="Create password" type="password">
                    </div> <!-- form-group// -->
    
                        <button name="confirmPassword" type="submit" class="btn btn-primary btn-block"> Se connecter  </button>
                        
                    <p class="text-center">Vous n'avez pas de compte ? <a href="<?= WebSiteLink ?>User/register
                    ">S'inscrire</a> </p>                                                                 
                </form>
            </article>
        </div> <!-- card.// -->

    </div> 
    <!--container end.//-->

    <br><br>
    <article class="bg-secondary mb-3">  
    <div class="card-body text-center">
        <h3 class="text-white mt-3">Bootstrap 4 UI KIT</h3>
    <p class="h5 text-white">Components and templates  <br> for Ecommerce, marketplace, booking websites 
    and product landing pages</p>   <br>
    <p><a class="btn btn-warning" target="_blank" href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com  
    <i class="fa fa-window-restore "></i></a></p>
    </div>
    <br><br>
    </article>
</body>


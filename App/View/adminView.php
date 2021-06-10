<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8"/>
        <!-- Bootstrap Core CSS -->
        <link href="../App/Public/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../App/Public/template/vendor/jquery/jquery.min.js" type="text/javascript"></script>
    </head>

    <body>
        <a>
            <button class="btn btn-success">
                Ajouter article
            </button>
        </a>

        <div>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $("button").click(function(){

            $.ajax({
                type: 'GET',
                url: '../App/View/AdminAddView.php',
                dataType: 'html',
                success: function(reponse,statut) {
                    $("div").html(reponse);

                }
            });
   });
});
</script>
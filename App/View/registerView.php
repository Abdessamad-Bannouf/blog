<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="UTF-8"/>
    </head>

    <body>
        <form method="post" action="<?= WebSiteLink; ?>/User/register">
            <input type="text" name="lastName" />
            <input type="text" name="firstName" />
            <input type="text" name="mail" />
            <input type="text" name="password" />
            <input type="submit" />
        </form>
    </body>
</html>

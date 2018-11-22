<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="public/css/style.css" rel="stylesheet"/>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><a href="index.php">Forum</a></h1>
                </div>
                <div class="col-md-6">
                    <a style="float: right;" href="index.php?deconnexion">Se deconnecter</a>
                     <span style="float: right;">&nbsp;&nbsp;-&nbsp;&nbsp;</span>
                    <a style="float: right;" href="index.php?action=myaccount">Mon compte</a>
                </div>
            </div>

            <?= $content ?>
        </div>
    </body>
</html>



<?php

ob_start();

?>
<form class="form-horizontal" method="POST" action="index.php?action=home">
    <fieldset>

        <!-- Form Name -->
        <legend>Créer un nouveau sujet</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="title">Titre du sujet</label>
            <div class="col-md-4">
                <input id="title" name="title" type="text" placeholder="Entrez le titre de votre sujet" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="question">Votre question</label>
            <div class="col-md-4">
                <textarea class="form-control" id="question" name="question"></textarea>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="addsubject"></label>
            <div class="col-md-4">
                <button id="addsubject" name="addsubject" class="btn btn-primary">Créer le sujet</button>
            </div>
        </div>

    </fieldset>
</form>

<?php

$content = ob_get_clean();
$title = 'Créer un sujet';

require ('template.php');

?>
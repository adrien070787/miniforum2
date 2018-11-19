<?php
$title = 'Sujet : '.$subject['title'];
ob_start();

$memberManager = new MemberManager;

?>

<h2>Lecture du sujet : <?= $subject['title'] ?></h2>
<br>
<a href="index.php?action=home">Revenir à la liste des sujets</a>
<br>
<br>
<?= $message ?>

    <div class="row">
        <div class="col-md-12">
            <div class="post">
                <div class="post-info">
                    Posté par <img class="img_user" src="public/img/<?= $subject['id_member'] ?>/<?= $memberManager->get_member_by_id($subject['id_member'])['profil_pic'] ?>"><strong><?= $memberManager->get_member_by_id($subject['id_member'])['name'].' '.$memberManager->get_member_by_id($subject['id_member'])['firstname'] ?></strong>
                    &nbsp;&nbsp;<br>
                    <small><?= $subject['date'] ?></small>
                </div>
                <div>
                    <?= $subject['question'] ?>
                </div>
            </div>
            <?php
                while ($answer = $answers->fetch()) {
            ?>
                    <div class="post-answer">
                        <div class="post-answer-info">
                            Posté par <img class="img_user" src="public/img/<?= $answer['id_member'] ?>/<?= $memberManager->get_member_by_id($answer['id_member'])['profil_pic'] ?>"> <strong><?= $memberManager->get_member_by_id($answer['id_member'])['name'].' '.$memberManager->get_member_by_id($answer['id_member'])['firstname'] ?></strong>
                            &nbsp;&nbsp;<br>
                            <small><?= $answer['date'] ?></small>
                        </div>
                        <div>
                            <?= $answer['comment'] ?>
                        </div>
                    </div>
            <?php
                }
            ?>
            <br><br>
            <form method="POST" class="form-horizontal" action="index.php?action=displaysubject&id=<?= $subject['id'] ?>">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Répondre</legend>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="reponse">Réponse</label>
                        <div class="col-md-4">

                            <textarea class="form-control" id="reponse" name="reponse"></textarea>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button type="input" name="validate_answer" class="btn btn-success">Valider</button>
                            <button type="input" name="cancel_answer" class="btn btn-danger">Annuler</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
<?php

$content = ob_get_clean();
include ('template.php');
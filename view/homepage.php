<?php
ob_start(); //commence à conserver en mémoire tampon (buffer) ce qui va suivre
?>
<table class="table table-striped">
    <tr>
        <th>Sujet</th>
        <th>Question</th>
        <th>Date</th>
        <th>Auteur</th>
    </tr>
    <?php

    while ($sujet = $sujets->fetch()) {
    ?>

    <tr>
        <td><?= $sujet['title'] ?></td>
        <td><?= $sujet['question'] ?></td>
        <td><?= $sujet['date'] ?></td>
        <td><?= $sujet['id_member'] ?></td>
    </tr>

    <?php
        }
    ?>

</table>
<?php

$content = ob_get_clean();
$title = 'Page d\'accueil';

include('template.php');

?>
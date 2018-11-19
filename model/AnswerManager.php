<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 13/11/2018
 * Time: 16:29
 */

class AnswerManager extends Manager
{

    public function getAnswerByIdSubject($id_subject) {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('SELECT * FROM answer WHERE id_subject = ?');
        $requete->execute(array($id_subject));
        return $requete;
    }

    public function addAnswer($answer, $id_subject, $id_member) {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('INSERT INTO `answer`(`date`, `comment`, `id_subject`, `id_member`) 
                                VALUES (NOW(),?,?,?)');
        $requete->execute(array($answer, $id_subject, $id_member));
        return $requete;
    }
}
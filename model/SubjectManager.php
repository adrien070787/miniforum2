<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 13/11/2018
 * Time: 16:29
 */

class SubjectManager extends Manager
{

    public function getSubjects() {
        $bdd = $this->dbConnect();
        return $bdd->query('SELECT * FROM subject');
    }

    public function get_subject_by_id($id) {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('SELECT * FROM subject WHERE id = ?');
        $requete->execute(array($id));
        return $requete->fetch();
    }

}
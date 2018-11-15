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

}
<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 13/11/2018
 * Time: 16:25
 */


/*
 * Gere le chargement automatique des classes à la volées (quand on en a besoin)
 *
 */
function loadClass($class) {
    require('model/'. $class .'.php');
}

spl_autoload_register('loadClass');





function listsubject() {
   /*
    $sujets = array(
        array('Title' => 'Premier sujet', 'Auteur' => 'Adrien'),
        array('Title' => 'Deuxieme sujet', 'Auteur' => 'Martin'),
        array('Title' => 'Troisieme sujet', 'Auteur' => 'Martin'),
    );
    */

   //je créer un objet $subjectManager qui est une instance de la classe SubjectManager
    $subjectManager = new SubjectManager;

    /* Je peux à présent utiliser les fonctions public de cette objet, nottamment getSubjects()
     * qui me retourne la requete SQL de tous les sujets de la base de donnée
     */
    $sujets = $subjectManager->getSubjects();
    include('view/homepage.php');
}

function displaysubject() {

}

function createsubject() {


}

function displaylogin() {

    $message = '';
    include('view/login.php');

}


function login() {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $memberManager = new MemberManager;
        if ($memberManager->user_connect($_POST['login'], $_POST['password'])) {
            header('Location:index.php?action=home');
        } else {
            $message = '
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">Mauvais login ou mot de passe</div>
                </div>
            </div>';
            include('view/login.php');
        }
    } else {
        $message = '
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">Veuillez renseigner un login et un mot de passe</div>
                </div>
            </div>';
        include('view/login.php');
    }

}
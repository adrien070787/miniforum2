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
    $message ='';

    if (isset($_POST['addsubject'])) {
        $affectedLines = $subjectManager->addSubject($_POST['title'], nl2br($_POST['question']));
        if ($affectedLines == false) {
            throw new Exception('Impossible d\'ajouter le sujet');
        } else {
            $message = '<div class="alert alert-success">Votre sujet a été publiée avec succes</div>';
        }

    }

    /* Je peux à présent utiliser les fonctions public de cette objet, nottamment getSubjects()
     * qui me retourne la requete SQL de tous les sujets de la base de donnée
     */
    $sujets = $subjectManager->getSubjects();
    include('view/homepage.php');
}

function displaysubject() {
    $message = '';

    if (isset($_GET['message'])) {
        $message = '<div class="alert alert-success">Votre réponse a été supprimée avec succes</div>';
    }

    if (isset($_GET['id'])) {
        $subjectManager = new SubjectManager;
        $subject = $subjectManager->get_subject_by_id($_GET['id']);
        if (empty($subject)) {
            throw new Exception('Ce sujet n\'existe pas');
        } else {
            $answerManager = new AnswerManager;

            if (isset($_POST['validate_answer'])) {
                $affectedLines = $answerManager->addAnswer(nl2br($_POST['reponse']), $_GET['id'], $_SESSION['id']);
                if ($affectedLines == false) {
                    throw new Exception('Impossible d\'ajouter la réponse');
                } else {
                    $message = '<div class="alert alert-success">Votre réponse a été publiée avec succes</div>';
                }
            }
            $answers = $answerManager->getAnswerByIdSubject($_GET['id']);
        }
    } else {
        throw new Exception('Aucun id de sujet dans l\'url');
    }
    include('view/subject.php');
}




function createsubject() {

    include ('view/subject_view.php');

}

function deleteanswer() {
    $answerManager = new AnswerManager();
    $affectedLines = $answerManager->supp_answer($_GET['id_answer']);
    if ($affectedLines == false) {
        throw new Exception('Impossible de supprimer cette reponse');
    } else {
        header('Location:index.php?action=displaysubject&id='.$_GET['id_subject'].'&message');
    }
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
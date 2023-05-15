<?php
session_start();
$request = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);

switch ($request) {
    case 'home':
        require_once "../app/views/home_page.php";
        break;

    case 'login':
        require_once "../app/views/login_page.php";
        break;

    case 'nuovoUtente':
        require_once "../app/views/new_user_page.php";
        break;

    case 'personal_area':
        require_once "../app/views/personal_area_page.php";
        break;

    case 'elimina':
        require_once "../app/formHandler/remove.php";
        break;
    case 'stampa':
        require_once "../app/views/stampa.php";
        break;
    case 'nuovaValutazione':
        require_once "../app/views/new_evaluation_page.php";
        break;

    case 'modifica':
        require_once "../app/views/modify_page.php";
        break;
    case 'loginHandler':
        require_once "../app/formHandler/login.php";
        break;

    case 'newUserHandler':
        require_once "../app/formHandler/new_user.php";
        break;

    case 'change_credentialsHandler':
        require_once "../app/formHandler/change_credentials.php";
        break;

    case 'LogoutHandler':
        require_once "../app/formHandler/logout.php";
        break;

    case 'modifyHandler':
        require_once "../app/formHandler/modifyHandler.php";
        break;

    case 'new_evaluationHandler':
        require_once "../app/formHandler/new_evaluationHandler.php";
        break;

    default:
        require_once "../app/views/login_page.php";
        break;
}
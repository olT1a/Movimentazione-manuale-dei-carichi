<?php
session_start();
$request = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);

//new_evaluationHandler fa query su database, poi nelle home fare query che mostra i dati del record set
switch ($request) {
    case 'home':
        require_once "../app/views/home_page.php";
        break;

    case 'login':
        require_once "../app/views/login_page.php";
        break;

    /*case 'signUp':
        require_once "../app/views/registration_page.php";
        break;*/

    case 'personal_area':
        require_once "../app/views/personal_area_page.php";
        break;

    /*case 'change_credentials':
        require_once "../app/views/change_credentials_page.php";
        break;*/

    case 'nuovaValutazione':
        require_once "../app/views/new_evaluation_page.php";
        break;

    case 'loginHandler':
        require_once "../app/formHandler/login.php";
        break;

    /*case 'signUpHandler':
        require_once "../app/formHandler/registration.php";
        break;*/

    case 'change_credentialsHandler':
        require_once "../app/formHandler/change_credentials.php";
        break;

    case 'LogoutHandler':
        require_once "../app/formHandler/logout.php";
        break;

    /*case 'RegistrationHandler':
        require_once "../app/formHandler/registration.php";
        break;*/

    case 'new_evaluationHandler':
        require_once "../app/formHandler/new_evaluationHandler.php";
        break;

    default:
        require_once "../app/views/login_page.php";
        break;
}
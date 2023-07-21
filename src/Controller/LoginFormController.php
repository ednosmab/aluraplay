<?php

namespace Alura\Mvc\Controller;

class LoginFormController implements Controller
{
    public function processaRequisicao(): void
    {

        if(array_key_exists('logged', $_SESSION) && $_SESSION['logged'] === true){
            header('Location: /');
            return;
        }

        require_once __DIR__ . '/../../views/login-form.php';
    }
}

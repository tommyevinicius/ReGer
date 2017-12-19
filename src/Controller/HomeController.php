<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 19/12/17
 * Time: 09:08
 */

namespace TVTS\Controller;

use TVTS\View;

class HomeController extends BaseController
{
    public function index()
    {
        session_start();
        $_SESSION['user'] = 'Tommye';
        $_SESSION['user'] = [];

        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            $view = new View('login');

            return $view->render();
        }

        $view = new View('home');

        return $view->render();
    }
}

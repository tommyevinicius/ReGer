<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 18/12/17
 * Time: 11:22
 */

namespace TVTS\Controller;

use TVTS\Service\SessionService;

abstract class BaseController
{
    protected function getConfig($configName)
    {
        if (!file_exists($config = CONFIG_PATH . $configName . '.php')) {
            throw new \Exception("Config not found");
        }

        return require $config;
    }

    protected function addFlash($key, $msg)
    {
        return SessionService::addFlash($key, $msg);
    }

    protected function redirect($to)
    {
        return header('Location: ' . HOME . $to);
    }
}
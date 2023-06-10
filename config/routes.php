<?php

declare(strict_types=1);

return [
    'GET|/' => \ruan\psr\Controller\VideoListController::class,
    'GET|/novo-video' => \ruan\psr\Controller\VideoFormController::class,
    'POST|/novo-video' => \ruan\psr\Controller\NewVideoController::class,
    'GET|/editar-video' => \ruan\psr\Controller\VideoFormController::class,
    'POST|/editar-video' => \ruan\psr\Controller\EditVideoController::class,
    'GET|/remover-video' => \ruan\psr\Controller\DeleteVideoController::class,
    'GET|/login' => \ruan\psr\Controller\LoginFormController::class,
    'POST|/login' => \ruan\psr\Controller\LoginController::class,
    'GET|/logout' => \ruan\psr\Controller\LogoutController::class,
    'GET|/videos-json' => \ruan\psr\Controller\JsonVideoListController::class,
    'POST|/videos' => \ruan\psr\Controller\NewJsonVideoController::class,
];

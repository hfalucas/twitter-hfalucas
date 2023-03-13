<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Twitter\TweetsController;
use App\Http\Controllers\Auth\AuthenticationController;

$router->get('/', [AuthenticationController::class, 'create'])->name('login.create');
$router->get('/login/{provider}', [SocialiteController::class, 'login'])->name('social.login');
$router->get('/login/{provider}/callback', [SocialiteController::class, 'callback'])->name('social.callback');

$router->get('/tweets/create', [TweetsController::class, 'create'])->name('tweets.create');
$router->post('/tweets', [TweetsController::class, 'store'])->name('tweets.store');

<?php

use Illuminate\Support\Facades\Route;
use DefStudio\Telegraph\Facades\Telegraph;
use App\Http\Telegraph\StartHandler;

Telegraph::bot('lms_school_bot')->webhook()
    ->message(StartHandler::class)
    ->start(StartHandler::class);

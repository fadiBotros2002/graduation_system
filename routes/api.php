<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SupervisorController;
use App\Http\Controllers\API\HeadController;
use App\Http\Middleware\HeadMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\SupervisorMiddleware
;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);


    Route::middleware(['auth:sanctum', StudentMiddleware::class])->group(function () {
        Route::post('/student/project', [StudentController::class, 'createProject']);
        Route::post('/student/project/{id}/update', [StudentController::class, 'addUpdate']);
        Route::get('/student/project/{id}/notes', [StudentController::class, 'getNotes']);
    });


    Route::middleware(['auth:sanctum', SupervisorMiddleware::class])->group(function () {
        Route::get('/supervisor/projects', [SupervisorController::class, 'getMyProjects']);
        Route::post('/supervisor/project/{id}/note', [SupervisorController::class, 'addNote']);
        Route::post('/supervisor/project/{id}/evaluate', [SupervisorController::class, 'evaluateProject']);
    });


    Route::middleware(['auth:sanctum', HeadMiddleware::class])->group(function () {
        Route::get('/head/projects', [HeadController::class, 'getAllProjects']);
        Route::post('/head/project/{id}/accept', [HeadController::class, 'acceptProject']);
        Route::post('/head/project/{id}/assign', [HeadController::class, 'assignSupervisor']);
        Route::post('/head/project/{id}/final-evaluate', [HeadController::class, 'finalEvaluate']);
    });
});

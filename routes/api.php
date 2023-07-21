<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainSectionController;
use App\Http\Controllers\ModuleChapterArticleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestQuestionController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingSectionController;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::controller(TrainingController::class)->prefix('training')->group(function () {

        Route::get('/getAll', 'getAllTrainings');
        Route::get('/getById/{training}', 'getTraining');
        Route::post('/create', 'postTraining');

    });

    Route::controller(TestController::class)->prefix('test')->group(function (){

        Route::get('/getAll', 'getAllTests');
        Route::get('/getById/{test}', 'getTest');
        Route::post('/create', 'postTest');
        Route::get('/{test}/questions', 'getQuestions');

    });

    Route::controller(MainSectionController::class)->prefix('main-section')->group(function (){

        Route::get('/getAll', 'getAllMainSections');
        Route::get('/getById/{mainSection}', 'getMainSectionById');
        Route::post('/create', 'postMainSection');
    });

    Route::controller(TrainingSectionController::class)->prefix('training-section')->group(function (){

        Route::get('/getAll', 'getAllTrainingSections');
        Route::get('/getById/{trainingSection}', 'getTrainingSectionById');
        Route::post('/create', 'postTrainingSection');
    });

    Route::controller(TestQuestionController::class)->prefix('test-question')->group(function (){

        Route::get('/getAll', 'getAllTestQuestions');
        Route::get('/getById/{testQuestion}', 'getTestQuestionById');
        Route::post('/create', 'postTestQuestion');
    });

    Route::controller(ArticleController::class)->prefix('article')->group(function (){

        Route::get('/getAll', 'getAllArticles');
        Route::get('/getById/{article}', 'getArticleById');
        Route::post('/create', 'postArticle');
    });

    Route::controller(ModuleChapterArticleController::class)->prefix('module-chapter-article')->group(function (){

        Route::get('/getAll', 'getAllModuleChapterArticles');
        Route::get('/getById/{moduleChapterArticle}', 'getModuleChapterArticleById');
        Route::post('/create', 'postModuleChapterArticle');
    });


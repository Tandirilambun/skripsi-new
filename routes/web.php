<?php

use App\Models\IndikatorOutcome;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataPageController;
use App\Http\Controllers\StrategiController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\RenstraPageController;
use App\Http\Controllers\IndikatorOutcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Main Routes
Route::resource('home',HomeController::class);
// Route::get('/departemen/{departemen}',[DepartemenController::class,'show']);
// Route::get('/unit/{unit}',[UnitController::class,'show']);

//Route for data page
Route::resource('/data-page', DataPageController::class);

//Route for activity log page
Route::resource('/activity-log', ActivityLogController::class);
Route::post('/activity-log/{item}', [ActivityLogController::class, 'filterAction']);

//CRUD routes for Strategi
Route::post('periode/',[HomeController::class, 'addPeriode']);
Route::post('/general-objective',[ HomeController::class, 'addGeneral']);
Route::post('/ultimate-objective',[ HomeController::class, 'addUltimate']);
Route::post('/intermediate-objective',[ HomeController::class, 'addIntermediate']);
Route::post('/outcome',[ HomeController::class, 'addOutcome']);
Route::post('/use-of-output',[ HomeController::class, 'addUseOfOutput']);
Route::post('/output',[ HomeController::class, 'addOutput']);

Route::get('/renstrapage/{id_periode}',[RenstraPageController::class,'show']);

Route::put('/general-objective/{generalObjective}',[ DataPageController::class, 'updateGeneral']);
Route::put('/ultimate-objective/{ultimateObjective}',[ DataPageController::class, 'updateUltimate']);
Route::put('/intermediate-objective/{intermediateObjective}',[ DataPageController::class, 'updateIntermediate']);
Route::put('/outcome/{outcome}',[ DataPageController::class, 'updateOutcome']);
Route::put('/use-of-output/{useOfOutput}',[ DataPageController::class, 'updateUseOfOutput']);
Route::put('/output/{output}',[ DataPageController::class, 'updateOutput']);

Route::delete('/general-objective/{generalObjective}',[ DataPageController::class, 'delGeneral']);
Route::delete('/ultimate-objective/{ultimateObjective}',[ DataPageController::class, 'delUltimate']);
Route::delete('/intermediate-objective/{intermediateObjective}',[ DataPageController::class, 'delIntermediate']);
Route::delete('/outcome/{outcome}',[ DataPageController::class, 'delOutcome']);
Route::delete('/use-of-output/{useOfOutput}',[ DataPageController::class, 'delUseOfOutput']);
Route::delete('/output/{output}',[ DataPageController::class, 'delOutput']);


//CRUD routes for Indikator
Route::get('/general-objective/{generalObjective}',[ StrategiController::class, 'showIndikatorGeneral']);
Route::get('/ultimate-objective/{ultimateObjective}',[ StrategiController::class, 'showIndikatorUltimate']);
Route::get('/intermediate-objective/{intermediateObjective}',[ StrategiController::class, 'showIndikatorIntermediate']);
Route::get('/outcome/{outcome}',[ StrategiController::class, 'showIndikatorOutcome']);
Route::get('/use-of-output/{useOfOutput}',[ StrategiController::class, 'showIndikatorUseOfOutput']);
Route::get('/output/{output}',[ StrategiController::class, 'showIndikatorOutput']);

Route::post('/indikator-general',[HomeController::class, 'addIndGeneral']);
Route::post('/indikator-ultimate',[HomeController::class, 'addIndUltimate']);
Route::post('/indikator-intermediate',[HomeController::class, 'addIndIntermediate']);
Route::post('/indikator-outcome',[HomeController::class, 'addIndOutcome']);
Route::post('/indikator-use-of-output',[HomeController::class, 'addIndUseOfOutput']);
Route::post('/indikator-output',[HomeController::class, 'addIndOutput']);

Route::delete('/indikator-general/{indikatorGeneral}',[DataPageController::class, 'delIndGeneral']);
Route::delete('/indikator-ultimate/{indikatorUltimate}',[DataPageController::class, 'delIndUltimate']);
Route::delete('/indikator-intermediate/{indikatorIntermediate}',[DataPageController::class, 'delIndIntermediate']);
Route::delete('/indikator-outcome/{indikatorOutcome}', [DataPageController::class, 'delIndOutcome']);
Route::delete('/indikator-use-of-output/{indikatorUseOfOutput}',[DataPageController::class, 'delIndUseOfOutput']);
Route::delete('/indikator-output/{indikatorOutput}',[DataPageController::class, 'delIndOutput']);

Route::put('/indikator-general/{indikatorGeneral}',[DataPageController::class, 'updateIndGeneral']);
Route::put('/indikator-ultimate/{indikatorUltimate}',[DataPageController::class, 'updateIndUltimate']);
Route::put('/indikator-intermediate/{indikatorIntermediate}',[DataPageController::class, 'updateIndIntermediate']);
Route::put('/indikator-outcome/{indikatorOutcome}',[DataPageController::class, 'updateIndOutcome']);
Route::put('/indikator-use-of-output/{indikatorUseOfOutput}',[DataPageController::class, 'updateIndUseOfOutput']);
Route::put('/indikator-output/{indikatorOutput}',[DataPageController::class, 'updateIndOutput']);


//CRUD routes for Capaian Indikator
Route::get('/indikator-general/{indikatorGeneral}',[IndikatorController::class, 'showCapaianGeneral']);
Route::get('/indikator-ultimate/{indikatorUltimate}',[IndikatorController::class, 'showCapaianUltimate']);
Route::get('/indikator-intermediate/{indikatorIntermediate}',[IndikatorController::class, 'showCapaianIntermediate']);
Route::get('/indikator-outcome/{indikatorOutcome}',[IndikatorController::class, 'showCapaianOutcome']);
Route::get('/indikator-use-of-output/{indikatorUseOfOutput}',[IndikatorController::class, 'showCapaianUseOfOutput']);
Route::get('/indikator-output/{indikatorOutput}',[IndikatorController::class, 'showCapaianOutput']);

Route::post('/capaian-indikator-general',[IndikatorController::class, 'addCapaianGeneral']);
Route::post('/capaian-indikator-ultimate',[IndikatorController::class, 'addCapaianUltimate']);
Route::post('/capaian-indikator-intermediate',[IndikatorController::class, 'addCapaianIntermediate']);
Route::post('/capaian-indikator-outcome',[IndikatorController::class, 'addCapaianOutcome']);
Route::post('/capaian-indikator-use-of-output',[IndikatorController::class, 'addCapaianUseOfOutput']);
Route::post('/capaian-indikator-output',[IndikatorController::class, 'addCapaianOutput']);

Route::delete('/capaian-indikator-general/{capaianIndikatorGeneral}',[IndikatorController::class, 'delCapaianGeneral']);
Route::delete('/capaian-indikator-ultimate/{capaianIndikatorUltimate}',[IndikatorController::class, 'delCapaianUltimate']);
Route::delete('/capaian-indikator-intermediate/{capaianIndikatorIntermediate}',[IndikatorController::class, 'delCapaianIntermediate']);
Route::delete('/capaian-indikator-outcome/{capaianIndikatorOutcome}',[IndikatorController::class, 'delCapaianOutcome']);
Route::delete('/capaian-indikator-use-of-output/{capaianIndikatorUseOfOutput}',[IndikatorController::class, 'delCapaianUseOfOutput']);
Route::delete('/capaian-indikator-output/{capaianIndikatorOutput}',[IndikatorController::class, 'delCapaianOutput']);

Route::put('/capaian-indikator-general/{capaianIndikatorGeneral}',[IndikatorController::class, 'updateCapaianGeneral']);
Route::put('/capaian-indikator-ultimate/{capaianIndikatorUltimate}',[IndikatorController::class, 'updateCapaianUltimate']);
Route::put('/capaian-indikator-intermediate/{capaianIndikatorIntermediate}',[IndikatorController::class, 'updateCapaianIntermediate']);
Route::put('/capaian-indikator-outcome/{capaianIndikatorOutcome}',[IndikatorController::class, 'updateCapaianOutcome']);
Route::put('/capaian-indikator-use-of-output/{capaianIndikatorUseOfOutput}',[IndikatorController::class, 'updateCapaianUseOfOutput']);
Route::put('/capaian-indikator-output/{capaianIndikatorOutput}',[IndikatorController::class, 'updateCapaianOutput']);
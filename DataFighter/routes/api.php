<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CombatController;
use App\Http\Controllers\CombattantController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\TypesportController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AuthController;

use App\Http\Middleware\isUserAuthenticated;
use App\Http\Middleware\UserAccess;

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

// Login pour récupérer le token
Route::post('/login', [AuthController::class, 'auth']);

// Logout pour supprimer le token (il faut être authentifié pour accéder à cette route)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// ================= Routes pour les statistiques =================
Route::controller(StatistiqueController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/statistique', 'all');
    // table association on affichera seulement les infos du combat ou du combattatn en faisant un join
    // Route::get('/statistique/{id}', 'show');
});
// Routes accessibles uniquement par les administrateurs
Route::controller(StatistiqueController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/statistique', 'store');
    Route::put('/statistique/{id}', 'update');
    Route::delete('/statistique/{id}', 'destroy');
});
// ===============================================================


// ================= Routes pour les catégories ==================
Route::controller(CategorieController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/categories', 'all');
    Route::get('/categorie/{id}', 'show');
});

Route::controller(CategorieController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/categorie', 'store');
    Route::put('/categorie/{id}', 'update');
    Route::delete('/categorie/{id}', 'destroy');
});
// ===============================================================


// ================= Routes pour les combats =====================
Route::controller(CombatController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/combats', 'all');
    Route::get('/combat/{id}', 'show');
});

Route::controller(CombatController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/combat', 'store');
    Route::put('/combat/{id}', 'update');
    Route::delete('/combat/{id}', 'destroy');
});
// ===============================================================

// ================= Routes pour les combattants =================
Route::controller(CombattantController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/combattants', 'all');
    Route::get('/combattant/{id}', 'show');
});

Route::controller(CombattantController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/combattant', 'store');
    Route::put('/combattant/{id}', 'update');
    Route::delete('/combattant/{id}', 'destroy');
});
// ===============================================================

// ================= Routes pour les équipes =====================
Route::controller(EquipeController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/equipes', 'all');
    Route::get('/equipe/{id}', 'show');
});

Route::controller(EquipeController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/equipe', 'store');
    Route::put('/equipe/{id}', 'update');
    Route::delete('/equipe/{id}', 'destroy');
});
// ===============================================================

// ================= Routes pour les organisations ===============
Route::controller(OrganisationController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/organisations', 'all');
    Route::get('/organisation/{id}', 'show');
});

Route::controller(OrganisationController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/organisation', 'store');
    Route::put('/organisation/{id}', 'update');
    Route::delete('/organisation/{id}', 'destroy');
});
// ===============================================================

// ================= Routes pour les personnes ===================
//Route::controller(PersonneController::class)->middleware('auth:sanctum')->group(function () {
//    Route::get('/personnes', 'all');
//    Route::get('/personne/{id}', 'show');
//});

Route::controller(PersonneController::class)->middleware(['auth:sanctum', 'user.access'])->group(function () {
    Route::get('/personne/{id}', 'show');
});

Route::controller(PersonneController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/personne', 'store');
    Route::put('/personne/{id}', 'update');
    Route::delete('/personne/{id}', 'destroy');
    Route::get('/personnes', 'all');
});
// ===============================================================

// ================= Routes pour les prédictions =================
Route::controller(PredictionController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/predictions', 'all');
    Route::get('/prediction/{id}', 'show');
});

Route::controller(PredictionController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/prediction', 'store');
    Route::put('/prediction/{id}', 'update');
    Route::delete('/prediction/{id}', 'destroy');
});
// ===============================================================

// ================= Routes pour les types de sport ===============

Route::controller(TypesportController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/typesport', 'all');
    Route::get('/typesport/{id}', 'show');
});

Route::controller(TypesportController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/typesport', 'store');
    Route::put('/typesport/{id}', 'update');
    Route::delete('/typesport/{id}', 'destroy');
});
// ===============================================================

// ================= Routes pour les utilisateurs =================
// seulement l'utilisateur peut accéder à ses propres infos
Route::controller(UtilisateurController::class)->middleware(['auth:sanctum', 'user.access'])->group(function () {
    Route::get('/utilisateur/{id}', 'show');
});

// seulement l'administrateur peut accéder à toutes les infos
Route::controller(UtilisateurController::class)->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/utilisateur', 'store');
    Route::put('/utilisateur/{id}', 'update');
    Route::delete('/utilisateur/{id}', 'destroy');
    Route::get('/utilisateur', 'all');
});
// ===============================================================


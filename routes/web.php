<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MesureController;
use App\Http\Controllers\ApprentiController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/zuu', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
//Aprentit
Route::resource('apprentis', ApprentiController::class);
Route::post('apprentis/{apprenti}/payer', [ApprentiController::class, 'payer'])
    ->name('apprentis.payer');

//Mesure
Route::get('/mesure/create/{client_id}', [MesureController::class, 'create'])->name('mesure.create');
Route::get('/mesures/{mesure}/edit', [MesureController::class, 'edit'])->name('mesure.edit');
Route::put('/mesures/{mesure}', [MesureController::class, 'update'])->name('mesure.update');

 Route::post('/mesure', [MesureController::class, 'store'])->name('mesure.store');
Route::get('/mesures/index/{client_id}', [MesureController::class, 'index'])->name('mesure.index');
Route::get('/mesures', [MesureController::class, 'all'])->name('mesure.all');

// Client
Route::get('/clients', [ClientController::class, 'index'])->name('client.index');
Route::get('/profiles', [ClientController::class, 'profile'])->name('profile.create');
Route::get('/profil', [ClientController::class, 'edite'])->name('profil.edit');
Route::get('/utilisateur', [ClientController::class, 'users'])->name('user.create');
 Route::post('/utilisateur/store', [ClientController::class, 'storeuser'])->name('user.store');
 Route::get('/utilisateur/index', [ClientController::class, 'indexe'])->name('user.index');

 // Modifier nom
    Route::put('/profile', [ClientController::class, 'updat'])
        ->name('profile.update');

    // Modifier mot de passe
    Route::put('/profile/password', [ClientController::class, 'updatePassword'])
        ->name('profile.password.update');

    // Modifier photo
    Route::post('/profile/photo', [ClientController::class, 'updatePhoto'])
        ->name('profile.photo.update');
// Supprimer
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

Route::get('/client', [ClientController::class, 'create'])->name('client.create');
 Route::post('client', [ClientController::class, 'store'])->name('client.store');

Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');

Route::put('/clients/{client}', [ClientController::class, 'update'])->name('client.update');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');


Route::get('/dashboards', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

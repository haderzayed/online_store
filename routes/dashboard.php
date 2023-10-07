<?php
use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::group([
    'middleware'=>['auth'],
    'as'=>'dashboard.', // before name
    'prefix'=>'dashboard', // before route
],function(){

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/categories/trash',[CategoriesController::class,'trash'])->name('categories.trash');
    Route::put('/categories/{category}/restore',[CategoriesController::class,'restore'])->name('categories.restore');
    Route::delete('/categories/{category}/force-delete',[CategoriesController::class,'forceDelete'])->name('categories.force-delete');
    Route::resource('categories', CategoriesController::class);

});

// Route::middleware('auth')->prefix('dashboard')->as('dashboard.')->group(function(){
//     Route::get('/',[DashboardController::class,'index'])->name('dashboard');
//     Route::resource('categories', CategoriesController::class);

// });
<?php

use App\Http\Controllers\AttractionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;



Route::prefix('/')->name('landing')->group(function () {
    Route::get('/', function () {
        $zones = \App\Models\Zone::all();
        $attractions = \App\Models\Attraction::all();
        return view('landing.pages.index', compact('zones', 'attractions'));
    })->name('index');
    Route::prefix('/attraction')->group(function () {
        Route::get('/{attraction}', [AttractionController::class, 'showAttractions'])->name('attractions');
        Route::get('/review', [ReviewController::class, 'store'])->name('attraction.review.store');
    });
    Route::prefix('/zone')->group(function () {
        Route::get('/{zone}', [ZoneController::class, 'showZones'])->name('zones');
        Route::post('/review', [ReviewController::class, 'store'])->name('zone.review.store');
    });
});

Route::get('detail', function () {
    return view('landing.pages.detail');
})->name('zone.detail');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $zones = \App\Models\Zone::all();
        $attractions = \App\Models\Attraction::all();
        $publishedReviews = \App\Models\Review::where('is_approved', true)->get();
        $unpublishedReviews = \App\Models\Review::where('is_approved', false)->get();
        $counter = [
            'zones' => $zones->count(),
            'attractions' => $attractions->count(),
            'publishedReviews' => $publishedReviews->count(),
            'unpublishedReviews' => $unpublishedReviews->count(),

        ];
        return view('admin.pages.index', compact('counter'));
    })->name('index');

    Route::resource('/zones', App\Http\Controllers\ZoneController::class);
    Route::resource('/attractions', App\Http\Controllers\AttractionController::class);
    Route::resource('/reviews',  App\Http\Controllers\ReviewController::class);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

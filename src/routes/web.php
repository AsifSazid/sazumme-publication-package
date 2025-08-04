<?php

use Illuminate\Support\Facades\Route;

use SazUmme\Publication\Http\Controllers\PublicationController;
use SazUmme\Publication\Http\Controllers\EbookController;
//use namespace

// Route::group(['middleware' => 'web'], function () {
// 	Route::resource('members', MemberController::class);
// 	Route::get('members-list', [MemberController::class, 'getData']);
// 	Route::resource('faqs', FaqController::class);
// 	Route::get('faqs-list', [FaqController::class, 'getData']);
// 	Route::resource('roles', RoleController::class);
// 	Route::get('roles-list', [RoleController::class, 'getData']);
// 	Route::resource('tournaments', TournamentController::class);
// 	Route::get('tournaments-list', [TournamentController::class, 'getData']);
// 	Route::resource('membership-categories', MembershipCategoryController::class);
// 	Route::get('membership-categories-list', [MembershipCategoryController::class, 'getData']);
// 	Route::resource('divisions', DivisionController::class);
// 	Route::get('divisions-list', [DivisionController::class, 'getData']);
// //Place your route here
// });

Route::domain('publication.sazumme.com')->group(function () {
// Route::domain('publication.sazumme-tech-laravel.test')->group(function () {
	Route::middleware(['web'])->group(function () {
		Route::get('/', [PublicationController::class, 'index'])->name('publication.landing');
		Route::get('/about-us', [PublicationController::class, 'aboutUs'])->name('publication.about-us');
		// Route::middleware(['auth'])->group(function(){
		// Route::resources([
			// admin panel er jonno
			// 'ebooks' => EbookController::class,
		// ]);

		Route::get('/my-ebooks', [EbookController::class, 'myEbooks'])->name('ebooks.my-ebooks');
	});
});

<?php 
use Illuminate\Support\Facades\Route;
use Baf\Afgl\Afgl\Http\Controllers\Api\MemberController;
use Baf\Afgl\Afgl\Http\Controllers\Api\MemberHistoryController;
use Baf\Afgl\Afgl\Http\Controllers\Api\FaqController;
use Baf\Afgl\Afgl\Http\Controllers\Api\FaqHistoryController;
use Baf\Afgl\Afgl\Http\Controllers\Api\RoleController;
use Baf\Afgl\Afgl\Http\Controllers\Api\RoleHistoryController;
use Baf\Afgl\Afgl\Http\Controllers\Api\TournamentController;
use Baf\Afgl\Afgl\Http\Controllers\Api\TournamentHistoryController;
use Baf\Afgl\Afgl\Http\Controllers\Api\MembershipCategoryController;
use Baf\Afgl\Afgl\Http\Controllers\Api\MembershipCategoryHistoryController;
use Baf\Afgl\Afgl\Http\Controllers\Api\DivisionController;

use Baf\Afgl\Afgl\Http\Controllers\Api\DivisionHistoryController;
//use namespace

Route::group(['middleware' => 'api', 'prefix' => 'api', 'as' => 'api.'], function () {
	Route::apiResource('members', MemberController::class);
	Route::get('member-histories-list/{uuid}', [MemberHistoryController::class,'list']);
	Route::apiResource('member-histories', MemberHistoryController::class);
	Route::apiResource('faqs', FaqController::class);
	Route::get('faq-histories-list/{uuid}', [FaqHistoryController::class,'list']);
	Route::apiResource('faq-histories', FaqHistoryController::class);
	Route::apiResource('roles', RoleController::class);
	Route::get('role-histories-list/{uuid}', [RoleHistoryController::class,'list']);
	Route::apiResource('role-histories', RoleHistoryController::class);
	Route::apiResource('tournaments', TournamentController::class);
	Route::get('tournament-histories-list/{uuid}', [TournamentHistoryController::class,'list']);
	Route::apiResource('tournament-histories', TournamentHistoryController::class);
	Route::apiResource('membership-categories', MembershipCategoryController::class);
	Route::get('membership-category-histories-list/{uuid}', [MembershipCategoryHistoryController::class,'list']);
	Route::apiResource('membership-category-histories', MembershipCategoryHistoryController::class);
	Route::apiResource('divisions', DivisionController::class);
	Route::get('division-histories-list/{uuid}', [DivisionHistoryController::class,'list']);
	Route::apiResource('division-histories', DivisionHistoryController::class);
//Place your route here
});
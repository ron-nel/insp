<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});


	Route::get('/home', 'CapstoneController@showHome');
	Route::get('/collection', 'CapstoneController@showCollection');
	Route::get('/professionals', 'CapstoneController@professionals');
	
Route::middleware("user")->group(function(){
	Route::get('/create_profile', 'CapstoneController@showCreateProfileForm');
	Route::get('/profile', 'CapstoneController@showProfile');
	Route::post('/addToBoard/{id}', 'CapstoneController@addToBoard');
	Route::delete('/deleteFromBoard/{id}', 'CapstoneController@deleteFromBoard');
	Route::patch('/add_new_profile/{id}', 'CapstoneController@saveNewProfile');
	Route::get('/applyProfessionalForm', 'CapstoneController@applyProfessionalForm');
	Route::get('/needVisit', 'CapstoneController@needVisit');
	Route::post('/sendJournal/{id}', 'CapstoneController@sendJournal');
	Route::patch('/applyProffesionalAcct/{id}', 'CapstoneController@applyProffesionalAcct');
	Route::get('/viewJournal', 'CapstoneController@viewJournal');
	Route::delete('/deleteJournal/{id}', 'CapstoneController@deleteJournal');
	Route::get('/editJournalForm/{id}', 'CapstoneController@editJournalForm');
	Route::patch('/editJournal/{id}', 'CapstoneController@editJournal');
});


Route::middleware("admin")->group(function(){
	Route::get('/admin/add_collection', 'CapstoneController@showAddCollectionForm');
	Route::post('/admin/add_collection', 'CapstoneController@saveNewCollection');
	Route::delete('/admin/collection_delete/{id}', 'CapstoneController@deleteCollection');
	Route::get('/admin/collection_edit/{id}', 'CapstoneController@editCollection');
	Route::patch('/admin/edit_collection/{id}', 'CapstoneController@saveEdit');
	Route::get('/admin/view_profiles', 'CapstoneController@viewProfiles');
	Route::get('/admin/view_journals', 'CapstoneController@viewJournals');
	Route::delete('/admin/delete_user/{id}', 'CapstoneController@deleteUser');
	Route::delete('/admin/delete_journal/{id}', 'CapstoneController@deleteJournals');
	Route::patch('/admin/edit_journal/{id}', 'CapstoneController@editJournals');
	Route::get('/admin/view_applications', 'CapstoneController@viewApplications');
	Route::patch('/admin/delete_application/{id}', 'CapstoneController@deleteApplications');
	Route::patch('/admin/approve_application/{id}', 'CapstoneController@approveApplications');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/', 'WelcomeController@index');
Route::get('about', function (){
    return view('about');
});
Route::get('statia', function (){
    return view('statia');
});
Route::get('gallery', function (){
    return view('gallery');
});
Route::get('contacts',function (){
    return view('contacts');
});
Route::get('learner', function (){
     return view('learner');
});
Route::get('mainInformation', function (){
    return view('documentation.mainInformation');
});
Route::get('structureOrgansAuthority', function (){
    return view('documentation.structureOrgansAuthority');
});
Route::get('dopolnitelnie-zaniatia', function (){
    return view('dopolnitelnieZaniatia');
});
Route::get('stadion', function (){
    return view('stadion');
});



/* роуты для статей*/
Route::get('articleNews/{id}', 'NewsController@view');
Route::get('news/{id}', 'NewsController@index');
Route::get('news/categories/{cat}/{id}', 'NewsController@categorieView');
Route::delete('articleDelete/{id}', 'NewsController@delete');
Route::get('articles', 'ArticlesController@editor');
Route::post('article', 'ArticlesController@store');
Route::delete('article/{article}', 'ArticlesController@destroy');
Route::get('articleEdit/article/{id}','ArticlesController@edit');
Route::post('articleEditRequest','ArticlesController@editStore');


//Роуты учителей
Route::get('/teachers','TeacherController@index');
Route::get('/addTeacher','TeacherController@add');
Route::post('/addTeacherPost','TeacherController@post');

//Роут для комментариев
Route::post('comment', 'CommentController@store')->name('comment');
Route::any('commentDelete', 'CommentController@delete');

//Роут uLogin
Route::post('ulogin','uLoginController@login');

//Роуты Документов
Route::get('/documentsAll','DocumentController@index');
Route::get('/documentView/{id}','DocumentController@view');
Route::get('/documentCreateOpen','DocumentController@createOpen');
Route::post('/documentCreatePost','DocumentController@createPost');
Route::get('/documentEditOpen/{id}','DocumentController@editOpen');
Route::post('/documentEditPost','DocumentController@editPost');
Route::delete('/documentDelete/{id}','DocumentController@delete');



Route::get('logout', function (){
    auth::logout();
    return redirect('/');
});

Auth::routes();



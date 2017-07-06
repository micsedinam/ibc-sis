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

Route::group(['prefix' => 'admin'], function() {
    Route::get('/','adminController@index')->name('admin.index');
    Route::get('/login', 'Auth\adminLoginController@showLoginForm')->name('admin.adminLogin');
    Route::post('/login', 'Auth\adminLoginController@login')->name('admin.adminLogin');
    Route::post('/logout', 'Auth\adminLoginController@logout')->name('admin.adminLogout');

    //


    Route::resource('notice', 'noticeController');

	Route::resource('add-admin', 'adminregisterController');

	Route::resource('staff', 'staffregisterController');

	Route::resource('student', 'studentregisterController');

	Route::resource('parent', 'parentController');
	Route::get('parent/{id}/confirm', 'parentController@confirm');
	Route::get('parent/{id}/deny', 'parentController@deny');

	Route::resource('subjects', 'subjectcoreController');
	Route::resource('core', 'subjectcoreController');

	Route::resource('elective', 'electiveSubjectController');

	Route::resource('optional', 'optionalSubjectController');

	Route::resource('forum', 'ForumpostController');

	Route::resource('fees', 'studFeesController');
	Route::get('manage-details', 'feesController@index');
	//Route::get('getImport', 'studFeesController@getImport');
	Route::post('feesImport', 'studFeesController@postImport');
	Route::get('getExport', 'studFeesController@getExport');
	Route::get('feesdeleteAll', 'studFeesController@deleteAll');
	Route::get('feelist', 'studFeesController@feerecords');
	Route::get('fees/{fee}/edit', 'studFeesController@edit');
	Route::post('/fees/{fee}', 'studFeesController@update');
	Route::post('detailsImport', 'feesController@postImport');
	Route::get('/fees/{fee}/delete', 'studFeesController@destroy');


	Route::resource('results', 'resultsController');
	//Route::post('resultsImport', 'resultsController@postImport');
	Route::get('resultsExport', 'resultsController@getExport');
	Route::get('manage-results', 'resultsController@resultsrecords');
	//Route::get('search', 'resultsController@index');
	Route::get('subject-results', 'resultsController@subresults');
	Route::post('subject-result', 'resultsController@subresults');
	Route::post('manage-result', 'resultsController@resultsrecords');
	Route::get('results/{result}/edit', 'resultsController@edit');
	Route::post('results/{result}', 'resultsController@update');
	Route::get('results/{result}/delete', 'resultsController@destroy');


	Route::resource('/notice', 'noticeController');
	Route::get('/notices', 'noticeController@viewNotice');
	Route::get('/notice/{notice}/edit', 'noticeController@edit');
	Route::post('/notice/{notice}', 'noticeController@update');
	Route::get('/notice/{notice}/delete', 'noticeController@destroy');

	Route::resource('passreset', 'adminResetController');
	Route::post('passresets', 'adminResetController@update');

	Route::resource('programme', 'programmeController');

	//Route::get('grade-report', 'gradeReportController@index');
	Route::get('grade-report', 'gradeReportController@subresults');
	Route::post('report', 'gradeReportController@subresults');

});



Route::group(['prefix' => 'guardian'], function() {
    Route::get('/','guardianController@index')->name('guardian.index');
    Route::get('/login', 'Auth\guardianLoginController@showLoginForm')->name('guardian.guardianLogin');
    Route::post('/login', 'Auth\guardianLoginController@login')->name('guardian.guardianLogin');

	Route::get('/notice', 'parentNoticeController@viewNotice');

	Route::get('/fees', 'parentBillController@index');
	Route::get('/fee', 'parentBillController@view');
	Route::post('/fee', 'parentBillController@view');

	Route::get('results', 'parentResultController@index');
	Route::get('result', 'parentResultController@view');
	Route::post('result', 'parentResultController@view');

	Route::resource('passreset', 'guardianResetController');
	Route::post('passresets', 'guardianResetController@update');

	Route::get('/ward', 'parentwardController@index')->name('parent.ward');
	Route::get('/ward/find', 'parentwardController@index')->name('parent.ward');
	Route::post('/ward/find', 'parentwardController@indexfind')->name('parent.wardfind');
	Route::get('/ward/{id}/add', 'parentwardController@addward')->name('parent.addward');
	Route::get('/ward/{id}/delete', 'parentwardController@deleteward')->name('parent.deleteward');


});


Route::group(['prefix' => 'staff'], function() {
    Route::get('/','staffController@index')->name('staff.index');
    Route::get('/login', 'Auth\staffLoginController@showLoginForm')->name('staff.staffLogin');
    Route::post('/login', 'Auth\staffLoginController@login')->name('staff.staffLogin');


	Route::get('/notice', 'staffNoticeController@viewNotice');

	Route::resource('results', 'staffResultController');
	Route::post('resultsImport', 'staffResultController@postImport');
	Route::get('resultsExport', 'staffResultController@getExport');
	Route::get('manage-results', 'staffResultController@resultsrecords');
	Route::get('results/{result}/edit', 'staffResultController@edit');
	Route::post('results/{result}', 'staffResultController@update');
	Route::get('results/{result}/delete', 'staffResultController@destroy');
	Route::resource('passreset', 'staffResetController');
	Route::post('passresets', 'staffResetController@update');


});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminlogin', function () {
    return view('auth.adminlogin');
});

Route::get('subjects', function () {
    return view('admin.register-electives');
})->middleware('auth:admin');

/*Route::get('fees', function () {
    return view('admin.fees');
});*/

/*Route::get('results', function () {
    return view('admin.results');
});*/




Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[ 
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);


//Student Panel Routes
Route::get('/notice', 'studNoticeController@viewNotice');
Route::get('fees', 'studBillController@showbill');
Route::get('results', 'studResultController@showresult');
Route::resource('passreset', 'resetController');
Route::post('passresets', 'resetController@update');



Route::get('/home', 'HomeController@index')->name('home');


//All admin routes goes into this rout group!!!

Auth::routes();
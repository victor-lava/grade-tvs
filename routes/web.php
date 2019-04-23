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

Route::get('/', 'StudentController@index')->name('public.students.index');
Route::get('/student/{id}', 'StudentController@showGrades')->name('public.students.grades');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/lectures', 'Admin\LectureController')->middleware('auth');

Route::resource('/admin/students', 'Admin\StudentController')->middleware('auth');

Route::resource('/admin/grades', 'Admin\GradeController')->middleware('auth');

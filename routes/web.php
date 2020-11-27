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
    return view('welcome');
});

//Login Admin
Route::get('admin/login','admin\loginController@getLogin');
Route::post('admin/login','admin\loginController@postLogin');
Route::get('admin/dashboard','admin\loginController@dashboard');
Route::get('admin/logout','admin\loginController@getLogin');

// Room
Route::get('all-room','roomController@all_room');
Route::post('all-room/search','roomController@all_student_search');
Route::get('all-room/{room_id}','roomController@all_student');
Route::get('add-room','roomController@add_room');
Route::post('save-room','roomController@save_room');
Route::get('edit-room/{room_id}','roomController@edit_room');
Route::post('update-room/{room_id}','roomController@update_room');
Route::get('delete-room/{room_id}','roomController@delete_room');
Route::post('all-room/search-room','roomController@search_room');
Route::post('all-flood/search-flood','roomController@search_flood');

// Student
Route::get('all-student','studentController@all_student');
Route::get('add-student','studentController@add_student');
Route::post('save-student/{room_id}','studentController@save_student');
Route::get('edit-student/{st_id}','studentController@edit_student');
Route::post('update-student/{st_id}','studentController@update_student');
Route::get('delete-student/{st_id}','studentController@delete_student');
Route::post('all-student/search-student','studentController@search_student');

// Bill

Route::get('/all-bill','billController@all_bill');
Route::get('/bill-detail/{bill_id}','billController@bill_detail');
Route::get('edit-bill/{bill_id}','billController@edit_bill');
Route::post('update-bill/{bill_id}','billController@update_bill');
Route::get('delete-bill/{bill_id}','billController@delete_bill');
Route::post('search-bill','billController@search_bill');
Route::get('print_invoice/{bill_id}','billController@print_invoice');


//Noti
Route::get('all-noti','notiController@all_noti');
Route::get('add-noti','notiController@add_noti');
Route::post('save-noti','notiController@save_noti');
Route::get('edit-noti/{noti_id}','notiController@edit_noti');
Route::post('update-noti/{noti_id}','notiController@update_noti');
Route::get('delete-noti/{noti_id}','notiController@delete_noti');

//Baocao
Route::get('all-baocao','notiController@all_baocao');
Route::get('edit-baocao/{id_baocao}','notiController@edit_baocao');
Route::post('update-baocao/{id_baocao}','notiController@update_baocao');
Route::get('delete-baocao/{id_baocao}','notiController@delete_baocao');





//view cho user
//dang nhap dang c=xuat
Route::get('user/register','User\LoginController@getRegister');
Route::post('save-register/{room_id}','User\LoginController@postRegister');
Route::get('user/login','User\LoginController@getlogin');
Route::post('user/login','User\LoginController@postlogin');
Route::get('user/logout','User\LoginController@logout');
//view 
Route::get('user/thongbao','User\ViewController@thongbao');
Route::get('user/sinhvien','User\ViewController@sinhvien');
Route::get('user/dssinhvien','User\ViewController@dssinhvien');

//return
Route::get('user/baocao','User\ReturnController@getbaocao');
Route::post('user/baocao','User\ReturnController@postbaocao');
Route::get('user/noptien','User\ReturnController@getnoptien');
Route::post('user/noptien','User\ReturnController@postnoptien');
Route::get('user/hoadon','User\ReturnController@hoadon');
Route::get('user/lichsu','User\ReturnController@lichsu');
Route::get('user/chitiethoadon/{bill_id}','User\ReturnController@chitiethoadon');
Route::post('all-bill/search-bill','User\ReturnController@search_bill');







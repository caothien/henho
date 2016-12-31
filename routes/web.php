<?php

Route::get('/', 'IndexController@index');

Route::get('/confessions', 'IndexController@getListConfession');

Route::get('/thongbao', 'IndexController@getEvents');

Route::get('/thongbao/{id}', 'IndexController@getEvent');

Route::get('/lienhe', 'IndexController@getLienhe');

Route::post('/lienhe', 'IndexController@postLienhe');

Route::get('/dangki', 'DangkiController@getDangki');

Route::post('/dangki', 'DangkiController@postDangki');

Route::get('/profile/{id}', 'IndexController@getProfile');

Route::post('/search-sdt', 'SearchController@searchSdt');

Route::get('/search-nam', 'SearchController@searchNam');

Route::get('/search-nu', 'SearchController@searchNu');

Route::get('/search-nangcao', 'SearchController@searchNangcao');

Route::post('/search-truong', 'SearchController@searchTruong');

Route::post('/search-quequan', 'SearchController@searchQuequan');

Route::post('/search-namsinh', 'SearchController@searchNamsinh');

Route::post('/send-confession', 'IndexController@postConfession');

Route::get('/confession/{id}/{stt}', 'IndexController@getConfession');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/manage-confession', 'HomeController@confessions');

Route::get('/delete-confession/{id}', 'HomeController@deleteConfession');

Route::get('/edit-confession/{id}', 'HomeController@editConfession');

Route::post('/edit-confession', 'HomeController@updateConfession');

Route::get('/duyet-confession', 'HomeController@duyetConfession');

Route::get('/duyet-delete-confession/{id}', 'HomeController@duyetDeleteConfession');

Route::get('/duyet-edit-confession/{id}', 'HomeController@duyetEditConfession');

Route::post('/duyet-edit-confession', 'HomeController@duyetUpdateConfession');

Route::get('/manage-member', 'HomeController@members');

Route::get('/member/{id}', 'HomeController@showMember');

Route::get('/delete-member/{id}', 'HomeController@deleteMember');

Route::post('/update-idmember', 'HomeController@updateIdMember');

Route::get('/duyet-member', 'HomeController@duyetMembers');

Route::post('/duyet-member', 'HomeController@updateMember');

Route::get('/duyet-member/{id}', 'HomeController@showDuyetMember');

Route::get('/events', 'HomeController@events');

Route::get('/add-event', 'HomeController@addEvent');

Route::post('/add-event', 'HomeController@postEvent');

Route::get('/delete-event/{id}', 'HomeController@deleteEvent');

Route::get('/edit-event/{id}', 'HomeController@editEvent');

Route::post('/edit-event', 'HomeController@updateEvent');

Route::get('/check-lienhe', 'HomeController@checkLienhe');

Route::get('/delete-lienhe/{id}', 'HomeController@deleteLienhe');

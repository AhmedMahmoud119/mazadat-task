<?php
//header('Access-Control-Allow-Origin:  *');
//header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
//header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

//Route::redirect('/', '/login');
//Route::redirect('/dashboard', '/admin/dashboard');

//Auth::routes(['register' => false]);

Route::group([
    'prefix'     => '/',
    'as'         => 'admin.',
    'namespace'  => 'Admin',
], function () {
    Route::view('/{any?}', 'layouts.admin.app')->name('dashboard')->where('any', '.*');
});

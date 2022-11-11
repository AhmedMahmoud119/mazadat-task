<?php


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::get('get-all-cats', 'CategoriesController@getAllCats');
    Route::get('get-properties', 'CategoriesController@getProperties');
});

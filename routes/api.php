<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$version = 'v1';

Route::group(['prefix'=> $version], function () {
    Route::group(['prefix' => 'trending'], function () {
        Route::get('{media_type}/{time_window}',   'TrendingController@getTrending');
    });
    Route::group(['prefix' => 'genre'], function () {
        Route::get('movie/list',   'GenresController@getGenresList');
    });
});

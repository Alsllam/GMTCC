<?php

Route::group(['namespace' => 'GMTCC\Search\Http\Controllers'], function (){
    Route::get('/live_search/action','liveSearchController@action')->name('liveSearchController.action');    
});



    
    
    
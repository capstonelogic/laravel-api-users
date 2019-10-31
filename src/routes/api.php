<?php

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('users', 'Http\Controllers\Api\UserController', [
        'except' => [ 'create', 'edit' ]
    ]);
});

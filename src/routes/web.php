<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => config('mage.prefix'), 'middleware' => ['web']], function () {
     
    Route::group(['middleware' => ['mageRedirectIfAuthenticated']], function () {
        Route::get('login', 'Omatech\Mage\App\Http\Controllers\Auth\LoginController@showLoginForm')
             ->name('mage.auth.login.index');

        Route::post('login', 'Omatech\Mage\App\Http\Controllers\Auth\LoginController@login')
             ->name('mage.auth.login');

        Route::post('password/email', 'Omatech\Mage\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')
             ->name('mage.auth.password.email');

        Route::get('password/reset', 'Omatech\Mage\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')
             ->name('mage.auth.password.request');

        Route::get('password/reset/{token}', 'Omatech\Mage\App\Http\Controllers\Auth\ResetPasswordController@showResetForm')
             ->name('mage.auth.password.reset');

        Route::post('password/reset', 'Omatech\Mage\App\Http\Controllers\Auth\ResetPasswordController@reset')
             ->name('mage.auth.password.update');
    });

    Route::group(['middleware' => ['mageRedirectIfNotAuthenticated']], function () {

        Route::get('logout', 'Omatech\Mage\App\Http\Controllers\Auth\LoginController@logout')
             ->name('mage.auth.logout');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'Omatech\Mage\App\Http\Controllers\UserController@index')
                 ->name('mage.users.index');
     
            Route::get('list', 'Omatech\Mage\App\Http\Controllers\UserController@list')
                 ->name('mage.users.list');

            Route::get('create', 'Omatech\Mage\App\Http\Controllers\UserController@create')
                 ->name('mage.users.create');

            Route::post('/', 'Omatech\Mage\App\Http\Controllers\UserController@store')
                 ->name('mage.users.store');

            Route::get('{id}', 'Omatech\Mage\App\Http\Controllers\UserController@show')
                 ->name('mage.users.show');

            Route::get('{id}/edit', 'Omatech\Mage\App\Http\Controllers\UserController@edit')
                 ->name('mage.users.edit');

            Route::put('{id}', 'Omatech\Mage\App\Http\Controllers\UserController@update')
                 ->name('mage.users.update');

            Route::delete('{id}', 'Omatech\Mage\App\Http\Controllers\UserController@destroy')
                 ->name('mage.users.destroy');
        });
     
        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', 'Omatech\Mage\App\Http\Controllers\RolController@index')
                 ->name('mage.roles.index');

            Route::get('list', 'Omatech\Mage\App\Http\Controllers\RolController@list')
                 ->name('mage.roles.list');

            Route::get('create', 'Omatech\Mage\App\Http\Controllers\RolController@create')
                 ->name('mage.roles.create');

            Route::post('/', 'Omatech\Mage\App\Http\Controllers\RolController@store')
                 ->name('mage.roles.store');

            Route::get('{id}', 'Omatech\Mage\App\Http\Controllers\RolController@show')
                 ->name('mage.roles.show');

            Route::get('{id}/edit', 'Omatech\Mage\App\Http\Controllers\RolController@edit')
                 ->name('mage.roles.edit');

            Route::put('{id}', 'Omatech\Mage\App\Http\Controllers\RolController@update')
                 ->name('mage.roles.update');

            Route::delete('{id}', 'Omatech\Mage\App\Http\Controllers\RolController@destroy')
                 ->name('mage.roles.destroy');

            Route::post('{id}/permissions', 'Omatech\Mage\App\Http\Controllers\RolController@assignPermissions')
                 ->name('mage.roles.permissions.assign');
        });

        Route::group(['prefix' => 'permissions'], function () {
            Route::get('/', 'Omatech\Mage\App\Http\Controllers\PermissionController@index')
                 ->name('mage.permissions.index');

            Route::get('list', 'Omatech\Mage\App\Http\Controllers\PermissionController@list')
                 ->name('mage.permissions.list');

            Route::get('create', 'Omatech\Mage\App\Http\Controllers\PermissionController@create')
                 ->name('mage.permissions.create');

            Route::post('/', 'Omatech\Mage\App\Http\Controllers\PermissionController@store')
                 ->name('mage.permissions.store');

            Route::get('{id}', 'Omatech\Mage\App\Http\Controllers\PermissionController@show')
                 ->name('mage.permissions.show');

            Route::get('{id}/edit', 'Omatech\Mage\App\Http\Controllers\PermissionController@edit')
                 ->name('mage.permissions.edit');

            Route::put('{id}', 'Omatech\Mage\App\Http\Controllers\PermissionController@update')
                 ->name('mage.permissions.update');

            Route::delete('{id}', 'Omatech\Mage\App\Http\Controllers\PermissionController@destroy')
                 ->name('mage.permissions.destroy');
        });

        Route::group(['prefix' => 'translations'], function () {
            Route::get('/', 'Omatech\Mage\App\Http\Controllers\TranslationController@index')
                 ->name('mage.translations.index');

            Route::get('list', 'Omatech\Mage\App\Http\Controllers\TranslationController@list')
                 ->name('mage.translations.list');

            Route::get('create', 'Omatech\Mage\App\Http\Controllers\TranslationController@create')
                 ->name('mage.translations.create');

            Route::post('/', 'Omatech\Mage\App\Http\Controllers\TranslationController@store')
                 ->name('mage.translations.store');

            Route::put('{id}', 'Omatech\Mage\App\Http\Controllers\TranslationController@update')
                 ->name('mage.translations.update');
        });

        Route::get('datatables/i18n', 'Omatech\Mage\App\Http\Controllers\DatatableController@i18n')
             ->name('mage.datatables.i18n');
    });
});

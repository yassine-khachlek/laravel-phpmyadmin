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

Route::group(['prefix' => 'phpmyadmin'], function () {
	Route::any('/{uri?}', function ($uri=null) {
		
		$phpmyadmin = 'https://files.phpmyadmin.net/phpMyAdmin/4.6.6/phpMyAdmin-4.6.6-english.zip';
		
		copy($phpmyadmin, public_path(basename($phpmyadmin)));
		
		$zip = new ZipArchive;
		
		if ($zip->open(basename($phpmyadmin)) === TRUE) {
		    $zip->extractTo(public_path());
		    $zip->close();
		    return redirect('/'.basename($phpmyadmin, '.zip'));
		} else {
		    return 'failed';
		}

	});
});

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

Route::get('/','IndexController@index')->name('index');
Route::get('/about-us','IndexController@about')->name('index.about');
Route::get('/product','IndexController@product')->name('index.product');
Route::get('/product/{slug}', 'IndexController@productDetail')->name('index.product.detail');
Route::get('/liputan','IndexController@liputan')->name('index.liputan');
Route::get('/artikel','IndexController@artikel')->name('index.artikel');
Route::get('/department','IndexController@department')->name('index.department');
Route::get('/kantor-dpc','IndexController@kantor_dpc')->name('index.kantor');
Route::get('/gallery','IndexController@gallery')->name('index.gallery');

/**
 * Detail Artikel
 */
Route::get('/artikel/{slug}', 'IndexController@detailArtikel')->name('index.artikel.detail');

Auth::routes();


Route::prefix('dashboard')->group( function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('slider')->group( function() {
        Route::get('/', 'CMS\SliderController@index')->name('dashboard.slider');
        Route::get('/create', 'CMS\SliderController@create')->name('dashboard.slider.create');
        Route::post('/create', 'CMS\SliderController@store')->name('dashboard.slider.create.post');
        Route::get('/{id}/delete', 'CMS\SliderController@delete')->name('dashboard.slider.delete');
    });

    Route::prefix('artikel')->group( function() {
        Route::get('/', 'CMS\ArtikelController@index')->name('dashboard.artikel');
        Route::get('/cari', 'CMS\ArtikelController@cari')->name('dashboard.artikel.cari');
        Route::get('/create', 'CMS\ArtikelController@create')->name('dashboard.artikel.create');
        Route::post('/create', 'CMS\ArtikelController@store')->name('dashboard.artikel.create.post');
        Route::get('/edit/{slug}', 'CMS\ArtikelController@edit')->name('dashboard.artikel.edit');
        Route::patch('/edit/{slug}', 'CMS\ArtikelController@update')->name('dashboard.artikel.edit.patch');
        Route::get('/delete/{slug}', 'CMS\ArtikelController@delete')->name('dashboard.artikel.delete');
    });

    Route::prefix('gallery')->group( function() {
        Route::get('/', 'CMS\GalleryController@index')->name('dashboard.gallery');
        Route::get('create', 'CMS\GalleryController@create')->name('dashboard.gallery.create');
        Route::post('create/post', 'CMS\GalleryController@store')->name('dashboard.gallery.create.post');
        Route::get('{id}/delete', 'CMS\GalleryController@delete')->name('dashboard.gallery.delete');
    });

    Route::prefix('product')->group( function() {
        Route::get('/', 'CMS\ProductController@index')->name('dashboard.product');
        Route::get('cari', 'CMS\ProductController@cari')->name('dashboard.product.cari');
        Route::get('create', 'CMS\ProductController@create')->name('dashboard.product.create');
        Route::post('create', 'CMS\ProductController@store')->name('dashboard.product.create.post');
        Route::get('edit/{slug}', 'CMS\ProductController@edit')->name('dashboard.product.edit');
        Route::patch('edit/{slug}', 'CMS\ProductController@update')->name('dashboard.product.edit.patch');
        Route::get('delete/{slug}', 'CMS\ProductController@delete')->name('dashboard.product.delete');
    });
});

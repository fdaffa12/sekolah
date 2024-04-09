<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontendController@index')->name('home.route');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');


Route::group(['middleware'=>'admin'],function(){
    //add pages
    Route::get('admin/add-pages', 'Admin\PagesController@add')->name('add-pages');
    Route::post('admin/store-pages', 'Admin\PagesController@store')->name('store-pages');
    Route::get('admin/index-pages', 'Admin\PagesController@index')->name('index-pages');
    Route::get('admin/edit-pages/{pages_id}', 'Admin\PagesController@edit');
    Route::post('admin/update-pages', 'Admin\PagesController@update')->name('update-pages');
    Route::get('admin/delete-pages/{pages_id}', 'Admin\PagesController@destroy');
    Route::get('admin/draft-pages/{pages_id}', 'Admin\PagesController@draft');
    Route::get('admin/publish-pages/{pages_id}', 'Admin\PagesController@publish');

    //publikasi
    Route::get('admin/publikasi', 'Admin\PublikasiController@index')->name('publikasi');
    Route::post('admin/publikasi-store', 'Admin\PublikasiController@StorePublikasi')->name('publikasi-store');
    Route::get('admin/edit-publikasi/{publikasi_id}', 'Admin\PublikasiController@edit');
    Route::post('admin/update-publikasi', 'Admin\PublikasiController@update')->name('update-publikasi');
    Route::get('admin/delete-publikasi/{publikasi_id}', 'Admin\PublikasiController@destroy');
    Route::get('admin/draft-publikasi/{publikasi_id}', 'Admin\PublikasiController@draft');
    Route::get('admin/publish-publikasi/{publikasi_id}', 'Admin\PublikasiController@publish');
    Route::get('admin/post', 'Admin\PublikasiController@post')->name('post');
    Route::get('admin/add-post', 'Admin\PublikasiController@addPost')->name('add.post');
    Route::post('admin/store-post', 'Admin\PublikasiController@storePost')->name('store.post');
    Route::get('admin/manage-post', 'Admin\PublikasiController@managePost')->name('manage.post');
    Route::get('admin/edit-posts/{post_id}', 'Admin\PublikasiController@editPost');
    Route::post('admin/update-post', 'Admin\PublikasiController@updatePost')->name('update.post');
    Route::get('admin/delete-posts/{post_id}', 'Admin\PublikasiController@destroyPost');
    Route::get('admin/draft-posts/{post_id}', 'Admin\PublikasiController@draftPost');
    Route::get('admin/publish-posts/{post_id}', 'Admin\PublikasiController@publishPost');

    //desa
    Route::get('admin/desa', 'Admin\DesaController@index')->name('desa');
    Route::get('admin/add-desa', 'Admin\DesaController@addDesa')->name('add.desa');
    Route::post('admin/desa-store', 'Admin\DesaController@store')->name('store.desa');
    Route::get('admin/edit-desa/{desa_id}', 'Admin\DesaController@editDesa');
    Route::post('admin/update-desa', 'Admin\DesaController@updateDesa')->name('update.desa');
    Route::get('admin/delete-desa/{desa_id}', 'Admin\DesaController@destroyDesa');
    Route::get('admin/draft-desa/{desa_id}', 'Admin\DesaController@draftDesa');
    Route::get('admin/publish-desa/{desa_id}', 'Admin\DesaController@publishDesa');

    //potensi
    Route::get('admin/potensi', 'Admin\PotensiController@index')->name('potensi');
    Route::get('admin/add-potensi', 'Admin\PotensiController@addPotensi')->name('add.potensi');
    Route::post('admin/potensi-store', 'Admin\PotensiController@storePotensi')->name('store.potensi');
    Route::get('admin/edit-potensi/{potensi_id}', 'Admin\PotensiController@editPotensi');
    Route::post('admin/update-potensi', 'Admin\PotensiController@updatePotensi')->name('update.potensi');
    Route::get('admin/delete-potensi/{potensi_id}', 'Admin\PotensiController@destroyPotensi');
    Route::get('admin/draft-potensi/{potensi_id}', 'Admin\PotensiController@draftPotensi');
    Route::get('admin/publish-potensi/{potensi_id}', 'Admin\PotensiController@publishPotensi');

    //paten
    Route::get('admin/paten', 'Admin\PatenController@index')->name('paten');
    Route::get('admin/add-paten', 'Admin\PatenController@addPaten')->name('add.paten');
    Route::post('admin/store-paten', 'Admin\PatenController@storePaten')->name('store.paten');
    Route::get('admin/edit-paten/{paten_id}', 'Admin\PatenController@editPaten');
    Route::post('admin/update-paten', 'Admin\PatenController@updatePaten')->name('update.paten');
    Route::get('admin/delete-paten/{paten_id}', 'Admin\PatenController@destroyPaten');
    Route::get('admin/draft-paten/{paten_id}', 'Admin\PatenController@draftPaten');
    Route::get('admin/publish-paten/{paten_id}', 'Admin\PatenController@publishPaten');

    //unduhan
    Route::get('admin/unduhan', 'Admin\UnduhanController@index')->name('unduhan');
    Route::get('admin/add-unduhan', 'Admin\UnduhanController@addUnduhan')->name('add.unduhan');
    Route::post('admin/store-unduhan', 'Admin\UnduhanController@storeUnduhan')->name('store.unduhan');
    Route::get('admin/edit-unduhan/{unduhan_id}', 'Admin\UnduhanController@editUnduhan');
    Route::post('admin/update-unduhan', 'Admin\UnduhanController@updateUnduhan')->name('update.unduhan');
    Route::get('admin/delete-unduhan/{unduhan_id}', 'Admin\UnduhanController@destroyUnduhan');
    Route::get('admin/draft-unduhan/{unduhan_id}', 'Admin\UnduhanController@draftUnduhan');
    Route::get('admin/publish-unduhan/{unduhan_id}', 'Admin\UnduhanController@publishUnduhan');

    //struktur
    Route::get('admin/struktur', 'Admin\StrukturController@index')->name('struktur');
    Route::get('admin/add-struktur', 'Admin\StrukturController@addStruktur')->name('add.struktur');
    Route::post('admin/store-struktur', 'Admin\StrukturController@storeStruktur')->name('store.struktur');
    Route::get('admin/edit-struktur/{struktur_id}', 'Admin\StrukturController@editStruktur');
    Route::post('admin/update-struktur', 'Admin\StrukturController@update')->name('update.struktur');
    Route::get('admin/delete-struktur/{struktur_id}', 'Admin\StrukturController@destroyStruktur');
    Route::get('admin/draft-struktur/{struktur_id}', 'Admin\StrukturController@draftStruktur');
    Route::get('admin/publish-struktur/{struktur_id}', 'Admin\StrukturController@publishStruktur');

    //coba galeri
    Route::get('admin/gallery', 'GalleryController@index')->name('gallery.index');
    Route::post('admin/store-video', 'GalleryController@store')->name('gallery.store');
    Route::post('admin/gallery/update', 'GalleryController@update')->name('gallery.update');
    Route::get('admin/gallery/delete/{id}', 'GalleryController@delete')->name('gallery.delete');
    Route::get('admin/gallery/getByID/{id}', 'GalleryController@getByID')->name('gallery.getByID');
    Route::get('admin/gallery/images/{id}', 'GalleryItemController@index')->name('gallery.images');
    Route::post('admin/gallery/image/store', 'GalleryItemController@store')->name('gallery.image.store');
    Route::post('admin/gallery/image/update', 'GalleryItemController@update')->name('gallery.image.update');
    Route::get('admin/gallery/image/delete/{id}', 'GalleryItemController@delete')->name('gallery.image.delete');

    //video
    Route::get('admin/video', 'Admin\VideoController@index')->name('video.index');
    Route::get('admin/add-video', 'Admin\VideoController@add')->name('add.video');
    Route::post('admin/store', 'Admin\VideoController@store')->name('store.video');
    Route::get('admin/edit-video/{video_id}', 'Admin\VideoController@edit');
    Route::post('admin/update-video', 'Admin\VideoController@update')->name('update.video');
    Route::get('admin/delete-video/{video_id}', 'Admin\VideoController@destroyVideo');
    Route::get('admin/draft-video/{video_id}', 'Admin\VideoController@draftVideo');
    Route::get('admin/publish-video/{video_id}', 'Admin\VideoController@publishVideo');

    //setting
    Route::get('admin/setting', 'Admin\SettingController@index')->name('setting.index');
    Route::post('admin/store-setting', 'Admin\SettingController@store')->name('setting.store');
    Route::post('admin/update-setting', 'Admin\SettingController@update')->name('update.setting');

    //agenda
    Route::get('admin/agenda', 'Admin\AgendaController@index')->name('agenda.index');
    Route::get('admin/add-agenda', 'Admin\AgendaController@add')->name('add.agenda');
    Route::post('admin/store-agenda', 'Admin\AgendaController@store')->name('store.agenda');
    Route::get('admin/edit-agenda/{agenda_id}', 'Admin\AgendaController@edit');
    Route::post('admin/update-agenda', 'Admin\AgendaController@update')->name('update.agenda');
    Route::get('admin/delete-agenda/{agenda_id}', 'Admin\AgendaController@destroyAgenda');
    Route::get('admin/draft-agenda/{agenda_id}', 'Admin\AgendaController@draftAgenda');
    Route::get('admin/publish-agenda/{agenda_id}', 'Admin\AgendaController@publishAgenda');

    //statistik
    Route::get('admin/statistik-pekerjaan', 'Admin\StatistikController@StatPekerjaan')->name('stat.pekerjaan');
    Route::post('admin/store-pekerjaan', 'Admin\StatistikController@storePekerjaan')->name('pekerjaan-store');
    Route::get('admin/edit-pekerjaan/{pekerjaan_id}', 'Admin\StatistikController@editPekerjaan');
    Route::post('admin/update-pekerjaan', 'Admin\StatistikController@updatePekerjaan')->name('update.pekerjaan');
    Route::get('admin/delete-pekerjaan/{pekerjaan_id}', 'Admin\StatistikController@destroyPekerjaan');
    Route::get('admin/draft-pekerjaan/{pekerjaan_id}', 'Admin\StatistikController@draftPekerjaan');
    Route::get('admin/publish-pekerjaan/{pekerjaan_id}', 'Admin\StatistikController@publishPekerjaan');

    Route::get('admin/statistik-pendidikan', 'Admin\StatistikController@StatPendidikan')->name('stat.pendidikan');
    Route::post('admin/store-pendidikan', 'Admin\StatistikController@storePendidikan')->name('pendidikan-store');
    Route::get('admin/edit-pendidikan/{pendidikan_id}', 'Admin\StatistikController@editPendidikan');
    Route::post('admin/update-pendidikan', 'Admin\StatistikController@updatePendidikan')->name('update.pendidikan');
    Route::get('admin/delete-pendidikan/{pendidikan_id}', 'Admin\StatistikController@destroyPendidikan');
    Route::get('admin/draft-pendidikan/{pendidikan_id}', 'Admin\StatistikController@draftPendidikan');
    Route::get('admin/publish-pendidikan/{pendidikan_id}', 'Admin\StatistikController@publishPendidikan');

    Route::get('admin/statistik-perkawinan', 'Admin\StatistikController@StatPerkawinan')->name('stat.perkawinan');
    Route::post('admin/store-perkawinan', 'Admin\StatistikController@storePerkawinan')->name('perkawinan-store');
    Route::get('admin/edit-perkawinan/{perkawinan_id}', 'Admin\StatistikController@editPerkawinan');
    Route::post('admin/update-perkawinan', 'Admin\StatistikController@updatePerkawinan')->name('update.perkawinan');
    Route::get('admin/delete-perkawinan/{perkawinan_id}', 'Admin\StatistikController@destroyPerkawinan');
    Route::get('admin/draft-perkawinan/{perkawinan_id}', 'Admin\StatistikController@draftPerkawinan');
    Route::get('admin/publish-perkawinan/{perkawinan_id}', 'Admin\StatistikController@publishPerkawinan');
    
    Route::get('admin/statistik-goldarah', 'Admin\StatistikController@StatGoldarah')->name('stat.goldarah');
    Route::post('admin/store-goldarah', 'Admin\StatistikController@storeGoldarah')->name('goldarah-store');
    Route::get('admin/edit-goldarah/{goldarah_id}', 'Admin\StatistikController@editGoldarah');
    Route::post('admin/update-goldarah', 'Admin\StatistikController@updateGoldarah')->name('update.goldarah');
    Route::get('admin/delete-goldarah/{goldarah_id}', 'Admin\StatistikController@destroyGoldarah');
    Route::get('admin/draft-goldarah/{goldarah_id}', 'Admin\StatistikController@draftGoldarah');
    Route::get('admin/publish-goldarah/{goldarah_id}', 'Admin\StatistikController@publishGoldarah');

    Route::get('admin/statistik-agama', 'Admin\StatistikController@StatAgama')->name('stat.agama');
    Route::post('admin/store-agama', 'Admin\StatistikController@storeAgama')->name('agama-store');
    Route::get('admin/edit-agama/{agama_id}', 'Admin\StatistikController@editAgama');
    Route::post('admin/update-agama', 'Admin\StatistikController@updateAgama')->name('update.agama');
    Route::get('admin/delete-agama/{agama_id}', 'Admin\StatistikController@destroyAgama');
    Route::get('admin/draft-agama/{agama_id}', 'Admin\StatistikController@draftAgama');
    Route::get('admin/publish-agama/{agama_id}', 'Admin\StatistikController@publishAgama');

    //contact
    Route::get('admin/contact', 'Admin\ContactController@index')->name('message.index');
    Route::get('admin/reply-message/{message_id}', 'Admin\ContactController@replyMessage');
    Route::get('admin/delete-message/{message_id}', 'Admin\ContactController@destroyMessage');
    Route::post('admmin/reply-store', 'Admin\ContactController@storeReply')->name('reply.message');

});

Route::get('page/{title_slug}', 'FrontendController@pages');
Route::get('publikasi/{nama}', 'FrontendController@publikasi');
Route::get('post/{post_slug}', 'FrontendController@post');
Route::get('desa/{nama_slug}', 'FrontendController@desa');
Route::get('potensi/{potensi_slug}', 'FrontendController@potensi');
Route::get('paten/{judul_slug}', 'FrontendController@paten');
Route::get('unduhan', 'FrontendController@unduhan');
Route::get('search', 'FrontendController@search');
Route::get('gallery', 'FrontendController@gallery');
Route::get('gallery/item/{id}', 'FrontendController@galleryItem');
Route::get('video', 'FrontendController@video');
Route::get('video/detail/{slug}', 'FrontendController@videoDetail');
Route::get('agenda/detail/{slug}', 'FrontendController@agendaDetail');
Route::get('agenda', 'FrontendController@agenda');
Route::get('pekerjaan', 'FrontendController@pekerjaan');
Route::get('pendidikan', 'FrontendController@pendidikan');
Route::get('perkawinan', 'FrontendController@perkawinan');
Route::get('goldarah', 'FrontendController@goldarah');
Route::get('agama', 'FrontendController@agama');
Route::get('contact', 'FrontendController@contact');
Route::post('/contact-post', 'FrontendController@contactPost');
Route::post('/comment', 'FrontendController@comment');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('budidaya', 'Home::budidaya');
$routes->get('berita', 'Home::berita');
$routes->get('berita/(:num)', 'Home::detailBerita/$1');
$routes->post('komentar', 'Home::komentar');
$routes->get('budidaya/(:num)', 'Home::detailBudidaya/$1');

$routes->get('konsultasi', 'Home::konsultasi');
$routes->get('konsultasi/(:num)', 'Home::chat/$1');
$routes->post('konsultasi/create', 'Home::startKonsultasi');
$routes->post('ajax/kirimchat', 'Ajax::kirimChat');
$routes->get('ajax/getchat', 'Ajax::getChat');
$routes->get('ajax/getharga', 'Ajax::getHarga');

$routes->group('auth', static function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
    $routes->post('logout', 'Auth::logout');
    $routes->post('signup', 'Auth::registrasi');
    $routes->get('signup', 'Auth::signup');
});
$routes->group('petani', ['filter' => 'petani'], static function ($routes) {
    //baru
    $routes->get('/', 'Home::petani');
    $routes->get('budidaya', 'Budidaya::index');
    $routes->get('budidaya/tambah', 'Budidaya::tambah');
    $routes->get('budidaya/detail/(:num)', 'Budidaya::detail/$1');
    $routes->get('budidaya/(:num)', 'Budidaya::edit/$1');
    $routes->post('budidaya/store', 'Budidaya::store');
    $routes->post('budidaya/update', 'Budidaya::update');
    $routes->post('budidaya/delete', 'Budidaya::delete');

    $routes->get('profil', 'Petani::profil');

    $routes->post('profil/update', 'Petani::update');
    $routes->post('profil/ganti-password', 'Petani::updatePassword');
});
$routes->group('admin', ['filter' => 'admin'], static function ($routes) {

    //baru
    $routes->get('/', 'Home::admin');

    $routes->get('user', 'User::index');
    $routes->get('user/(:num)', 'User::detail/$1');
    $routes->post('user/reset-password', 'User::resetPassword');
    $routes->post('user/delete', 'User::delete');
    $routes->post('user/update', 'User::update');
    $routes->post('user/store', 'User::store');

    $routes->get('budidaya', 'Budidaya::index');
    $routes->get('budidaya/tambah', 'Budidaya::tambah');
    $routes->get('budidaya/detail/(:num)', 'Budidaya::detail/$1');
    $routes->get('budidaya/(:num)', 'Budidaya::edit/$1');
    $routes->post('budidaya/store', 'Budidaya::store');
    $routes->post('budidaya/update', 'Budidaya::update');
    $routes->post('budidaya/delete', 'Budidaya::delete');

    $routes->get('konsultasi', 'Konsultasi::index');
    $routes->get('terima-chat/(:num)', 'Konsultasi::terima/$1');
    $routes->get('chat/(:num)', 'Konsultasi::chat/$1');
    $routes->post('end-chat', 'Konsultasi::endChat');

    $routes->get('galeri', 'Galeri::index');
    $routes->post('galeri/store', 'Galeri::store');
    $routes->post('galeri/update', 'Galeri::update');
    $routes->post('galeri/hapus', 'Galeri::delete');

    $routes->get('berita', 'Berita::index');
    $routes->get('berita/tambah', 'Berita::tambah');
    $routes->post('berita/insert', 'Berita::insert');
    $routes->post('berita/update', 'Berita::update');
    $routes->post('berita/delete', 'Berita::delete');
    $routes->get('berita/edit/(:num)', 'Berita::edit/$1');

    $routes->get('trend-harga', 'Trend::index');
    $routes->post('trend-harga/store', 'Trend::store');
    $routes->post('trend-harga/update', 'Trend::update');
    $routes->post('trend-harga/hapus', 'Trend::delete');
});

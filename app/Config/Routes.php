<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
$folder_backend = "Backend\'";

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontend\Home\Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->set404Override(function () {
    $param['code']      = 403;
    $param['message']   = "Whoaa Halaman tidak ditemukan... ";
    $param['image']     = "forbidden.png";
    $param['desc']      = "<p>Sepertinya halaman web yang Anda akses tidak ditemukan</p>";
    return view('response/page', $param);
});

$routes->add('denied', function () {
    $param['code']      = 403;
    $param['message']   = "Uups Akses ditolak... ";
    $param['image']     = "denied.jpg";
    $param['desc']      = "<p>Anda tidak mempunyai hak akses untuk masuk ke dalam halaman yang ingin Anda tuju</p>";
    return view('response/page', $param);
});

$routes->add('error', function () {
    $param['code']      = 101;
    $param['message']   = "Uups Erros Gaes... ";
    $param['image']     = "denied.jpg";
    $param['desc']      = "<p>Sepertinya ada kesalahan teknis, mohon bersabar untuk perbaikan selanjutnya ya... </p>";
    return view('response/page', $param);
});

$routes->add('done', function () {
    $param['code']      = ')';
    $param['message']   = "Yeayy pengisian selesai... ";
    $param['image']     = "barloader.gif";
    $param['desc']      = "<p>Terima kasih telah melengkapi isiannya. Silakan melanjutkan aktivitas lainnya...</p>";
    return view('response/page', $param);
});

$routes->add('/404', 'Pages\Response::not_found');
$routes->add('/403', 'Pages\Response::denied');
$routes->add('/101', 'Pages\Response::unavailable');
$routes->add('/comingsoon', 'Pages\Response::comingsoon');

$routes->get('/', 'Frontend\Home\Main::index');


//frontend
$routes->group('auth', function ($routes) {
    $root_menu = "Pages\Auth\Auth";
    //pages
    $routes->add('/', $root_menu . '::index');
    $routes->get('signout', $root_menu.'::signout');
    $routes->get('logout',  $root_menu.'::signout');

    $routes->post('login',  $root_menu.'::signin');
    $routes->post('signin',  $root_menu.'::signin');
});

$routes->group('event', function ($routes) {
    $root_menu = "Frontend\Event\Main";
    //pages
    $routes->add('/', $root_menu . '::index');
});

$routes->group('event-detail', function ($routes) {
    $root_menu = "Frontend\Event\Detail";
    //pages
    $routes->get('/', $root_menu . '::index');
});



$routes->group('backend', function ($routes) {

    $routes->group('beranda', function ($routes) {
        $root_folder = "Backend\Dashboard\Main";
        //pages
        $routes->add('/', $root_folder . '::index', ['filter' => 'auth']);
    });

    $routes->group('site', function ($routes) {
        $root_folder = "Backend\Option\Site";
        //pages
        $routes->add('/', $root_folder . '::index', ['filter' => 'auth']);
    });

    // Route Option    
    $routes->group('menu', function ($routes) {
        $root_menu = "Backend\Option\Menu";
        //pages
        $routes->add('/', $root_menu . '::index');
        $routes->add('add', $root_menu . '::add', ['filter' => 'auth']);
        $routes->get('edit', $root_menu . '::edit', ['filter' => 'auth']);
        //process
        $routes->post('insert', $root_menu . '::insert', ['filter' => 'auth']);
        $routes->post('update', $root_menu . '::update', ['filter' => 'auth']);
        $routes->get('delete', $root_menu . '::delete', ['filter' => 'auth']);
        $routes->post('sorting', $root_menu . '::sorting', ['filter' => 'auth']);

        $routes->add('get_primary_key', $root_menu . '::get_primary_key', ['filter' => 'auth']);
        $routes->add('get_list_menu', $root_menu . '::get_list_menu', ['filter' => 'auth']);
    });

    $routes->group('groups', function ($routes) {
        $root_groups = "Backend\Option\Groups";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->add('add', $root_groups . '::add', ['filter' => 'auth']);
        $routes->get('edit', $root_groups . '::edit', ['filter' => 'auth']);
        //process
        $routes->post('insert', $root_groups . '::insert', ['filter' => 'auth', 'filter' => 'entry']);
        $routes->post('update', $root_groups . '::update', ['filter' => 'auth']);
        $routes->get('delete', $root_groups . '::delete', ['filter' => 'auth']);
    });

    $routes->group('role', function ($routes) {
        $root_role = "Backend\Option\Role";
        //pages
        $routes->add('/', $root_role.'::index', ['filter' => 'auth']);
        //process
        $routes->add('getRole', $root_role.'::getRole', ['filter' => 'auth']);
        $routes->add('setRole', $root_role.'::setRole', ['filter' => 'auth']);
    });

    $routes->group('users', function ($routes) {
        $root_user = "Backend\Option\Users";
        //pages
        $routes->add('/', $root_user.'::index', ['filter' => 'auth']);
        $routes->add('add', $root_user.'::add', ['filter' => 'auth']);
        $routes->get('edit', $root_user.'::edit', ['filter' => 'auth']);

        //process
        $routes->post('insert', $root_user.'::insert', ['filter' => 'auth']);
        $routes->post('update', $root_user.'::update', ['filter' => 'auth']);
        $routes->get('delete', $root_user.'::delete', ['filter' => 'auth']);
        $routes->get('is_active', $root_user.'::is_active', ['filter' => 'auth']);
    });

    $routes->group('profile', function ($routes) {
        $root_profile = "Backend\Option\Profile";
        //pages
        $routes->add('/', $root_profile.'::index', ['filter' => 'auth']);
        $routes->post('update', $root_profile.'::update', ['filter' => 'auth']);
    });


    //Master
    $routes->group('kategori-event', function ($routes) {
        $root_user = "Backend\Master\EventKategori";
        //pages
        $routes->add('/', $root_user.'::index', ['filter' => 'auth']);
        $routes->add('add', $root_user.'::add', ['filter' => 'auth']);
        $routes->get('edit', $root_user.'::edit', ['filter' => 'auth']);

        //process
        $routes->post('insert', $root_user.'::insert', ['filter' => 'auth']);
        $routes->post('update', $root_user.'::update', ['filter' => 'auth']);
        $routes->get('delete', $root_user.'::delete', ['filter' => 'auth']);
        $routes->get('is_active', $root_user.'::is_active', ['filter' => 'auth']);
    });

    $routes->group('event', function ($routes) {
        $root_event = "Backend\Master\Events";
        //pages
        $routes->add('/', $root_event.'::index', ['filter' => 'auth']);
        $routes->add('add', $root_event.'::add', ['filter' => 'auth']);
        $routes->get('edit', $root_event.'::edit', ['filter' => 'auth']);

        //process
        $routes->post('insert', $root_event.'::insert', ['filter' => 'auth']);
        $routes->post('update', $root_event.'::update', ['filter' => 'auth']);
        $routes->get('delete', $root_event.'::delete', ['filter' => 'auth']);
        $routes->get('is_active', $root_event.'::is_active', ['filter' => 'auth']);
    });

    //Konten
    $routes->group('kategori-konten', function ($routes) {
        $root_kategori = "Backend\Konten\KontenKategori";
        //pages
        $routes->add('/', $root_kategori.'::index', ['filter' => 'auth']);
        $routes->add('add', $root_kategori.'::add', ['filter' => 'auth']);
        $routes->get('edit', $root_kategori.'::edit', ['filter' => 'auth']);

        //process
        $routes->post('insert', $root_kategori.'::insert', ['filter' => 'auth']);
        $routes->post('update', $root_kategori.'::update', ['filter' => 'auth']);
        $routes->get('delete', $root_kategori.'::delete', ['filter' => 'auth']);
        $routes->get('is_active', $root_kategori.'::is_active', ['filter' => 'auth']);
    });
    
    $routes->group('konten', function ($routes) {
        $root_konten = "Backend\Konten\Konten";
        //pages
        $routes->add('/', $root_konten.'::index', ['filter' => 'auth']);
        $routes->add('add', $root_konten.'::add', ['filter' => 'auth']);
        $routes->get('edit', $root_konten.'::edit', ['filter' => 'auth']);

        //process
        $routes->post('insert', $root_konten.'::insert', ['filter' => 'auth']);
        $routes->post('update', $root_konten.'::update', ['filter' => 'auth']);
        $routes->get('delete', $root_konten.'::delete', ['filter' => 'auth']);
        $routes->get('is_active', $root_konten.'::is_active', ['filter' => 'auth']);
    });
});


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
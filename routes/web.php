<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('/temp', function () {
    return view('templates.master');
});

Route::get('/etiket',function(){
  return view('etiket.etiketcetak');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify/{token}/{id}','Auth\RegisterController@verify_register');

Route::post('/notification/get','notificationController@get');
Route::post('/notification/read','notificationController@read');
Route::group(['middleware'=>'auth'],function(){




  Route::group(['middleware' => 'role:admin'],function(){
    Route::get('/admin/dashboard','adminController@dashboard')->name('admin.dashboard');
    Route::get('/orders','orderController@index')->name('order.index');
    Route::get('/orders/tambah','orderController@tambah')->name('order.tambah');
    Route::post('/orders/simpan','orderController@simpan')->name('order.simpan');
    Route::get('/orders/detail/{id}','orderController@detail')->name('order.detail');
    Route::get('/orders/edit/{id}','orderController@edit')->name('order.edit');
    Route::get('/order/cancel/{id}','orderController@cancel')->name('order.cancel');
    Route::put('/orders/edit/{id}','orderController@update')->name('order.update');
    Route::delete('/orders/hapus/{id}','orderController@delete')->name('order.hapus');
    Route::put('/order/konfirmasi/pembayaran/{id}','orderController@konfirmasi')->name('order.konfirmasibayar');
    Route::get('/order/konfirmasi/pembayaran/{id}/wrong','orderController@salahbukti')->name('order.salahbukti');
    Route::put('/order/konfirmasi/pembayaran/{id}/wrong','orderController@salahbukti')->name('order.salahbukti');


    Route::get('/pembeli','pembeliController@index')->name('pembeli.index');
    Route::get('/pembeli/edit/{id}','pembeliController@edit')->name('pembeli.edit');
    Route::put('/pembeli/edit/{id}','pembeliController@update')->name('pembeli.update');
    Route::delete('/pembeli/hapus/{id}','pembeliController@hapus')->name('pembeli.hapus');
    Route::get('/pembeli/profile/{id}','pembeliController@show')->name('pembeli.profile');
    Route::get('/pembeli/foto/edit/{id}','pembeliController@editfoto')->name('foto.edit');
    Route::put('/pembeli/foto/edit/{id}','pembeliController@updatefoto')->name('foto.update');

    Route::get('/travel/tiket','TiketController@index')->name('tiket.index');
    Route::get('/travel/tiket/tambah','TiketController@create')->name('tiket.tambah');
    Route::post('/travel/tiket/simpan','TiketController@store')->name('tiket.simpan');
    Route::get('/travel/tiket/edit/{id}','TiketController@edit')->name('tiket.edit');
    Route::put('/travel/tiket/edit/{id}','TiketController@update')->name('tiket.update');
    Route::delete('/travel/tiket/hapus/{id}','TiketController@destroy')->name('tiket.hapus');

    Route::get('/travel/kategori','KategoriController@index')->name('kategori.index');
    Route::get('/travel/kategori/tambah','KategoriController@create')->name('kategori.tambah');
    Route::post('/travel/kategori/simpan','KategoriController@store')->name('kategori.simpan');
    Route::get('/travel/kategori/edit/{id}','KategoriController@edit')->name('kategori.edit');
    Route::put('/travel/kategori/edit/{id}','KategoriController@update')->name('kategori.update');
    Route::delete('/travel/kategori/hapus/{id}','KategoriController@destroy')->name('kategori.hapus');

    Route::get('/travel/kota','kotaController@index')->name('kota.index');
    Route::get('/travel/kota/tambah','kotaController@tambah')->name('kota.tambah');
    Route::post('/travel/kota/simpan','kotaController@simpan')->name('kota.simpan');
    Route::get('/travel/kota/edit/{id}','kotaController@edit')->name('kota.edit');
    Route::put('/travel/kota/edit/{id}','kotaController@update')->name('kota.update');
    Route::delete('travel/kota/hapus/{id}','kotaController@hapus')->name('kota.hapus');

    Route::get('/admin','adminController@index')->name('admin.index');
    Route::get('/admin/tambah','adminController@create')->name('admin.tambah');
    Route::post('/admin/simpan','adminController@store')->name('admin.simpan');
    Route::get('/admin/profile/{id}','adminController@profile')->name('admin.profile');
    Route::get('/admin/edit/{id}','adminController@edit')->name('admin.edit');
    Route::put('admin/edit/{id}','adminController@update')->name('admin.update');
    Route::delete('/admin/hapus/{id}','adminController@destroy')->name('admin.hapus');

  });

  Route::group(['middleware' => 'role:pembeli'],function(){

    Route::get('/penerbangan','penerbanganController@index')->name('penerbangan.index');
    Route::get('/penerbangan/search','penerbanganController@search')->name('penerbangan.search');

    Route::get('/penerbangan/detail/{id}/{jml}','penerbanganController@detail')->name('penerbangan.detail');
    Route::post('/penerbangan/order','penerbanganController@booking')->name('penerbangan.order');
    Route::view('/penerbangan/doneorder','penerbangan.done_order')->name('penerbangan.doneorder');

    Route::view('/pembeli/order/pembayaran/done','pembeliorder.donebayar')->name('pembeli_order.donebayar');
    Route::get('/pembeli/order/{id}','pembeliOrderController@index')->name('pembeli_order.index');
    Route::get('pembeli/order/detail/{order_id}','pembeliOrderController@detail')->name('pembeli_order.detail');
    Route::get('/pembeli/order/pembayaran/{id}','pembeliOrderController@transfer')->name('pembeli_order.transfer');
    Route::put('/pembeli/order/pembayaran/{id}','pembeliOrderController@pembayaran')->name('pembeli_order.pembayaran');
    Route::post('/pembeli/order/cancelorder/{id}','pembeliOrderController@cancelOrder')->name('pembeli_order.cancelorder');


    Route::get('/pembeli/profile/{id}','pembeliController@show')->name('pembeli.profile');
    Route::get('/pembeli/foto/edit/{id}','pembeliController@editfoto')->name('foto.edit');
    Route::put('/pembeli/foto/edit/{id}','pembeliController@updatefoto')->name('foto.update');
    Route::get('/pembeli/edit/{id}/profile' ,'pembeliController@profileedit')->name('profile.edit');
    Route::put('/pembeli/edit/{id}/profile' ,'pembeliController@profilesimpan')->name('profile.simpan');

    Route::get('/etiket/{id}','TiketController@etiket')->name('etiket');
    Route::get('/etiket/cetak/{id}','TiketController@etiketcetak')->name('etiket.cetak');

  });


});

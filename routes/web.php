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

// Route::get('/', function () {
//     return view('welcome');
// });
// Master Penyaluran Anggaran
route::resource('list_penyaluran', 'PenyaluranController');
Route::get('/penyaluran_add','PenyaluranController@create');
Route::post('/penyaluran_insert','PenyaluranController@store');
Route::get('/penyaluran_edit/{id}','PenyaluranController@edit');
Route::post('/penyaluran_update','PenyaluranController@update');

// Master Program
route::resource('list_program', 'ProgramController');
Route::get('/program_add','ProgramController@create');
Route::post('/program_insert','ProgramController@store');
Route::get('/program_edit/{id}','ProgramController@edit');
Route::post('/program_update','ProgramController@update');



// Master Program Kerja
route::resource('list_programkerja', 'ProgramkerjaController');
Route::get('/programkerja_add','ProgramkerjaController@create');
Route::post('/programkerja_insert','ProgramkerjaController@store');
Route::get('/programkerja_edit/{id}','ProgramkerjaController@edit');
Route::post('/programkerja_update','ProgramkerjaController@update');


Route::get('getkegiatan/{id}','ProgramkerjaController@getkegiatan');


Route::get('/detailprogramkerja_add/{id}','ProgramkerjaController@indexdetail');
Route::get('/programkerjadetail_add/{id}','ProgramkerjaController@createdetail');
Route::get('/programkerjadetail_edit/{id}','ProgramkerjaController@editdetail');
Route::post('/programkerjadetail_insert','ProgramkerjaController@storedetail');
Route::post('/programkerjadetail_update','ProgramkerjaController@updatedetail');
Route::get('detailprogramkerjadelete/{id}/{idprogram}','ProgramkerjaController@destroydetail');


Route::get('/adendum_edit/{id}','ProgramkerjaController@editdetailadendum');
Route::post('/programkerjaadendum_update','ProgramkerjaController@updatedetailadendum');

Route::get('/edit_adendum/{id}/{iddetail}','ProgramkerjaController@editeditadendum');
Route::post('/adendum_update','ProgramkerjaController@adendum_update');
Route::get('hapuseadendum/{id}/{idprogram}','ProgramkerjaController@destroyadendum');


route::get('viewlap', 'ProgramkerjaController@viewlap');
route::get('editnotif/{id}', 'ProgramkerjaController@editnotif');
route::get('cetaklaporan', 'ProgramkerjaController@cetaklaporan');



// Master Rencana Kegiatan
route::resource('list_rengiat', 'MasterRengiatController');
Route::get('/rengiat_add','MasterRengiatController@create');
Route::post('/rengiat_insert','MasterRengiatController@store');
Route::get('/rengiat_edit/{id}','MasterRengiatController@edit');
Route::post('/rengiat_update','MasterRengiatController@update');


// Master Kegiatan
route::resource('list_kegiatan', 'KegiatanController');
Route::get('/kegiatan_add','KegiatanController@create');
Route::post('/kegiatan_insert','KegiatanController@store');
Route::get('/kegiatan_edit/{id}','KegiatanController@edit');
Route::post('/kegiatan_update','KegiatanController@update');

//master sub kegiatan
route::resource('list_subkegiatan', 'SubKegiatanController');
Route::get('/sub_kegiatan_add','SubKegiatanController@create');
Route::post('/sub_kegiatan_insert','SubKegiatanController@store');
Route::get('/sub_kegiatan_edit/{id}','SubKegiatanController@edit');
Route::post('/sub_kegiatan_update','SubKegiatanController@update');

//master Akun
route::resource('list_akun', 'AkunController');
Route::get('/akun_add','AkunController@create');
Route::post('/akun_insert','AkunController@store');
Route::get('/akun_edit/{id}','AkunController@edit');
Route::post('/akun_update','AkunController@update');

//pelaporan rengiat
route::resource('laporan_rengiat', 'LaporanRengiatController');
route::get('/view_pelaporan_rengiat_apbn/{id}', 'LaporanRengiatController@view_apbn');
route::get('/view_pelaporan_rengiat_pnbp/{id}', 'LaporanRengiatController@view_pnbp');

//print
route::get('/view_pelaporan_rengiat_apbn_cetak/{id}', 'LaporanRengiatController@view_apbn_cetak');
route::get('/view_pelaporan_rengiat_pnbp_cetak/{id}', 'LaporanRengiatController@view_pnbp_cetak');


//checklist kelengkapan
route::get('ceklist_rengiat', 'LaporanRengiatController@ceklist_rengiat');
route::get('/checklist_rengiat_apbn/{id}', 'LaporanRengiatController@checklist_apbn');
route::get('/checklist_rengiat_pnbp/{id}', 'LaporanRengiatController@checklist_pnbp');
Route::post('feedbackrengiat','LaporanRengiatController@feedbackrengiat');
route::get('/terimarengiat/{id}', 'LaporanRengiatController@terimarengiat');


//Front Page
Route::get('/', 'HomeController@index');
Route::get('tentang_kami', 'Front\FrontController@tentangkami');
Route::get('layanan', 'Front\FrontController@layanan');
Route::get('informasi', 'Front\FrontController@informasi');
Route::get('faq', 'Front\FrontController@faq');
Route::get('getdata/{id}/{kemajuan}','HomeController@getdata');
Route::get('getdata/{id}','HomeController@getdata');

Route::get('/dashboard', 'DashboardController@index');

//Login Page
Route::get('signin', 'SigninController@form');
Route::post('attempt', 'SigninController@attempt')->name('signin.attempt');

//Sign Up
Route::get('signup', 'SignupController@index');
Route::post('regis', 'SignupController@simpanRegis');
Route::get('cekmail', 'SignupController@cekemail');
Route::get('confirm/{id}', 'SignupController@confirm');


//Admin Page
Route::get('admin_page', 'Admin\AdminController@index');

//Bank
Route::get('detail_pemohon', 'Verifikasi@listdetail')->middleware('auth');
Route::get('detail/{id}', 'Verifikasi@detail')->middleware('auth');


Auth::routes();

Route::post('/login');
Route::post('/register');
Route::get('/logout');

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
Route::get('riwayat_pengajuan', 'Registrasi@index');
Route::get('registrasi_pinjaman', 'Registrasi@add');
Route::post('registrasi/submit', 'Registrasi@submit');
Route::get('registrasi/submitEksportir', 'Registrasi@submitEksportir');
Route::get('registrasi/submitPengajuan', 'Registrasi@submitPengajuan');
Route::post('registrasi/submitAll', 'Registrasi@submitAll');
Route::get('pengajuan_baru', 'Registrasi@syarat');
Route::post('update_dokumen','Registrasi@update_dokumen');
Route::get('delete_registrasi/{id}', 'Registrasi@destroy');
Route::post('kabupaten','Registrasi@kabupaten');
Route::post('kecamatan','Registrasi@kecamatan');
Route::get('registrasi_detail/{id}', 'Registrasi@regdetail');

Auth::routes();
Route::get('verifikasi', 'Verifikasi@index')->middleware('auth');
Route::get('terverifikasi', 'Verifikasi@after')->middleware('auth');
Route::get('verifikasi/{jenis}/{id}', 'Verifikasi@verif')->middleware('auth');
Route::get('assets/lampiran/{name}', 'Verifikasi@file_view')->middleware('auth');

Auth::routes();
Route::get('approve_kemendag/{id}', 'Verifikasi@approve_kemendag')->middleware('auth');
Route::get('approve_kemendag_bh/{id}', 'Verifikasi@approve_kemendag_bh')->middleware('auth');
Route::get('acc_pinjaman/{id}', 'Verifikasi@acc_pinjaman')->middleware('auth');
Route::get('acc_pinjaman_bh/{id}', 'Verifikasi@acc_pinjaman_bh')->middleware('auth');
Route::post('reject_pinjaman', 'Verifikasi@reject_pinjaman');
Route::post('reject_pinjaman_bh', 'Verifikasi@reject_pinjaman_bh')->middleware('auth');
Route::get('approve-bank', 'Verifikasi@approveBank')->middleware('auth');

//laporan
Route::get('laporan', 'LaporanController@index')->middleware('auth');
Route::get('laporanditerima', 'LaporanController@getditerima')->middleware('auth');
Route::get('laporanditolak', 'LaporanController@getditolak')->middleware('auth');
Route::get('laporanbelumverifikasi', 'LaporanController@getbelumverifikasi')->middleware('auth');
Route::get('export/{status}', 'LaporanController@export');

Auth::routes();
Route::get('pinjaman', 'PinjamanController@index')->middleware('auth');

// profil
Auth::routes();
Route::get('profil','ProfileController@index');
Route::post('profil_update/{id}','ProfileController@update');
Route::post('profil_company_update/{id}','ProfileController@update_company');
Route::post('upload_dokumen/{id}','ProfileController@update_dokumen');


//haksaskes

route::resource('hakakses', 'HakaksesController');
Route::get('/create_hakakses/{id}','HakaksesController@create');
Route::post('/hakakses_insert','HakaksesController@store');

//menu

Route::get('/create_submenu/{id}','MenuController@create_submenu');
Route::post('/submenu_insert','MenuController@subinsert');
Route::post('/submenu_update/{id}','MenuController@subupdate');
Route::get('/menu_hapus/{id}','MenuController@destroy');



route::resource('menu', 'MenuController');
Route::get('/create_menu','MenuController@create');
Route::post('/menu_insert','MenuController@store');
Route::get('/menu_edit/{id}','MenuController@edit');
Route::get('/submenu_edit/{id}','MenuController@edit_submenu');
Route::post('/menu_update/{id}','MenuController@update');


//Grup User
route::resource('grup', 'GrupController');
Route::get('/grup_add','GrupController@create');
Route::post('/grup_insert','GrupController@store');
Route::get('/grup_edit/{id}','GrupController@edit');
Route::post('/grup_update/{id}','GrupController@update');

//hakakses
route::resource('hak_akses', 'HakaksesController');
Route::get('create_hakakses/{id}','HakaksesController@create');
Route::post('hakakses_insert','HakaksesController@store');

//users
route::resource('users', 'UsersController');
Route::get('user_delete/{id}', 'UsersController@destroy');
Route::get('user_edit/{id}', 'UsersController@edit');
Route::post('user_save', 'UsersController@store');
Route::post('user_update/{id}', 'UsersController@update');
Route::post('readmen', 'DashboardController@store');


//notifikasi

route::resource('notifikasi', 'NotifikasireadmenController');
route::resource('tugas_dan_fungsi', 'TupoksiController');
Route::post('tupoksi_update/', 'TupoksiController@update');

route::resource('etrade_pofil', 'ProfilEtradeController');
Route::post('etrade_update/', 'ProfilEtradeController@update');

route::resource('keuntungan', 'KeuntunganController');
Route::post('keuntungan_update/', 'KeuntunganController@update');

route::resource('harapan', 'HarapanController');
Route::post('harapan_update/', 'HarapanController@update');

route::resource('tentang_kami', 'TentangKamiController');
Route::post('kami_update/', 'TentangKamiController@update');

//renggiat APBN

route::resource('rengiat_apbn', 'RengiatApbnController');
Route::get('tambah_rengiat_apbn', 'RengiatApbnController@create');
Route::get('tambah_rengiat_apbn/{id}', 'RengiatApbnController@createid');
Route::post('apbn_insert','RengiatApbnController@store');
Route::post('apbn_insert_id','RengiatApbnController@storeid');
Route::get('getApbn','RengiatApbnController@getApbn');
Route::get('list_ceklist_Apbn/{id}','RengiatApbnController@list_ceklist_Apbn');
Route::get('apbn_form1/{id}','RengiatApbnController@apbn_form1');
Route::post('save_apbn_form1','RengiatApbnController@store_form1');
Route::get('apbn_form2/{id}','RengiatApbnController@apbn_form2');
Route::post('save_apbn_form2','RengiatApbnController@store_form2');
Route::get('apbn_form3/{id}','RengiatApbnController@apbn_form3');
Route::post('save_apbn_form3','RengiatApbnController@store_form3');
Route::get('apbn_form4/{id}','RengiatApbnController@apbn_form4');
Route::post('save_apbn_form4','RengiatApbnController@store_form4');
Route::get('apbn_form5/{id}','RengiatApbnController@apbn_form5');
Route::post('save_apbn_form5','RengiatApbnController@store_form5');
Route::get('apbn_form6/{id}','RengiatApbnController@apbn_form6');
Route::post('save_apbn_form6','RengiatApbnController@store_form6');
Route::get('apbn_form7/{id}','RengiatApbnController@apbn_form7');
Route::post('save_apbn_form7','RengiatApbnController@store_form7');
Route::get('apbn_form8/{id}','RengiatApbnController@apbn_form8');
Route::post('save_apbn_form8','RengiatApbnController@store_form8');
Route::get('apbn_form9/{id}','RengiatApbnController@apbn_form9');
Route::post('save_apbn_form9','RengiatApbnController@store_form9');

Route::get('/get_kegiatan/{id}','RengiatApbnController@get_kegiatan');



// Rengiat PNBP
route::resource('rengiat_pnbp', 'RengiatpnbpController');
Route::get('getPnbp','RengiatpnbpController@getPnbp');
Route::get('pnbp_add','RengiatpnbpController@create');
Route::get('pnbp_add/{id}','RengiatpnbpController@createid');
Route::post('pnbp_insert','RengiatpnbpController@store');
Route::post('pnbp_insert_id','RengiatpnbpController@storeid');
Route::get('list_ceklist/{id}','RengiatpnbpController@list_ceklist');
Route::get('pnbp_form1/{id}','RengiatpnbpController@pnbp_form1');
Route::post('save_form1','RengiatpnbpController@store_form1');
Route::get('pnbp_form2/{id}','RengiatpnbpController@pnbp_form2');
Route::post('save_form2','RengiatpnbpController@store_form2');
Route::get('pnbp_form3/{id}','RengiatpnbpController@pnbp_form3');
Route::post('save_form3','RengiatpnbpController@store_form3');
Route::get('pnbp_form4/{id}','RengiatpnbpController@pnbp_form4');
Route::post('save_form4','RengiatpnbpController@store_form4');
Route::get('pnbp_form5/{id}','RengiatpnbpController@pnbp_form5');
Route::post('save_form5','RengiatpnbpController@store_form5');
Route::get('pnbp_form6/{id}','RengiatpnbpController@pnbp_form6');
Route::post('save_form6','RengiatpnbpController@store_form6');
Route::get('pnbp_form7/{id}','RengiatpnbpController@pnbp_form7');
Route::post('save_form7','RengiatpnbpController@store_form7');
Route::get('pnbp_form8/{id}','RengiatpnbpController@pnbp_form8');
Route::post('save_form8','RengiatpnbpController@store_form8');
Route::get('pnbp_form9/{id}','RengiatpnbpController@pnbp_form9');
Route::post('save_form9','RengiatpnbpController@store_form9');


//hapus notif
Route::get('hapusnotif/{id_perencanaan_kegiatan}','RengiatApbnController@hapusnotif');


//Renja APBN
route::resource('renja_apbn', 'RenjaApbnController');
Route::get('tambah_renja','RenjaApbnController@create');
Route::post('tambahrencana','RenjaApbnController@tambahrencana');
Route::post('editrencana1','RenjaApbnController@editrencana1');
Route::post('editrencana2','RenjaApbnController@editrencana2');

Route::get('getsub/{id_kegiatan}', 'RenjaApbnController@subkegiatan');

Route::get('pascarenaku1/{id_renbin}','RenjaApbnController@paskarenaku1');
Route::get('pascarenaku2/{id_renbin}','RenjaApbnController@paskarenaku2');
Route::get('renbutkirim/{id_renbin}','RenjaApbnController@renbutkirim');
Route::get('prarenaku2','RenjaApbnController@prarenaku2');

Route::get('detailrenbut_form2/{id}','RenjaApbnController@apbn_form2');
Route::post('save_detailrenbut_form2','RenjaApbnController@store_form2');
Route::get('detailrenbut_form3/{id}','RenjaApbnController@apbn_form3');
Route::post('save_detailrenbut_form3','RenjaApbnController@store_form3');
Route::get('detailrenbut_form4/{id}','RenjaApbnController@apbn_form4');
Route::post('save_detailrenbut_form4','RenjaApbnController@store_form4');
Route::get('detailrenbut_form5/{id}','RenjaApbnController@apbn_form5');
Route::post('save_detailrenbut_form5','RenjaApbnController@store_form5');
Route::get('detailrenbut_form6/{id}','RenjaApbnController@apbn_form6');
Route::post('save_detailrenbut_form6','RenjaApbnController@store_form6');
Route::get('detailrenbut_form7/{id}','RenjaApbnController@apbn_form7');
Route::post('save_detailrenbut_form7','RenjaApbnController@store_form7');



//view renja
Route::get('lihatrenja/{id_renbin}', 'RenjaApbnController@lihatrenja');


//dirrena renja
route::resource('pelaporan_renja', 'PelaporanRenjaController');
Route::get('pelaporanedit/{id_renbin}', 'PelaporanRenjaController@pelaporanedit');
Route::get('pelaporanedit2/{id_renbin}', 'PelaporanRenjaController@pelaporanedit2');
Route::get('pelaporanedit3/{id_renbin}', 'PelaporanRenjaController@pelaporanedit3');
Route::get('viewpelaporanedit/{id_renbin}', 'PelaporanRenjaController@viewpelaporanedit');


Route::post('editrenaku1','PelaporanRenjaController@editrenaku1');
Route::post('editrenaku2','PelaporanRenjaController@editrenaku2');
Route::post('editrenaku3','PelaporanRenjaController@editrenaku3');

//satkerupload formulir Berita
//note : buat url di user management di server dengan nama formulir berita
Route::prefix('laporan_upload_satker')->group(function(){
  Route::resource('/','LaporanUploadSatkerController');
  Route::get('/upload/{id}','LaporanUploadSatkerController@upload');
  Route::post('/store_upload','LaporanUploadSatkerController@store_upload');
});

// Admin Formulir berita
Route::prefix('formulir_berita')->group(function(){
  Route::resource('/','LaporanUploadadminController');
  Route::get('/upload/{id}','LaporanUploadadminController@upload');
});

//dirrena renja
route::resource('shopinglist', 'ShopinglistController');
Route::get('editshop/{id}','ShopinglistController@edit');

//CETAK RENBIN
Route::get('cetak_renbin/{id}','CetakrenbinController@index');


Route::get('ambilkegiatan/{id}','RenjaApbnController@getkegiatan');

// SATKER
Route::prefix('satker')->group(function(){
  Route::resource('/','SatkerController');
  Route::get('/add','SatkerController@add');
  Route::post('/insert','SatkerController@store');
  Route::get('/edit/{id}', 'SatkerController@edit');
  Route::post('/update', 'SatkerController@update');
  Route::post('/delete', 'SatkerController@delete')->name('satker.delete');
  Route::post('/getSatker', 'SatkerController@getSatker')->name('satker.getSatker');
  Route::post('/store_upload','LaporanUploadSatkerController@store_upload');
});
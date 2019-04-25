<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Program;
use App\Uraian_biaya_administrasi;
use App\Uraian_kegiatan_rincian_biaya;
use Illuminate\Support\Facades\DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use Auth;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('satker.index');
    }

    public function getSatker(Request $request)
    {
        $columns = array(
            0 => 'id_jenis_satker',
            1 => 'nama_jenis_satker',
            2 => 'keterangan'
        );

        $totalData = DB::table('jenis_satker')->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = DB::table('jenis_satker')
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order, $dir)
                        ->get();

            $totalFiltered = DB::table('jenis_satker')->count();
        } else {
            $search = $request->input('search.value');
            $posts = DB::table('jenis_satker')
                        ->where('nama_jenis_satker','like', "'%".$search."%'")
                        // ->orWhere('keterangan','like', "'%".$search."%'")
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order, $dir)
                        ->get();
            $totalFiltered = DB::table('jenis_satker')
                                ->where('nama_jenis_satker','like', "'%".$search."%'")
                                // ->orWhere('keterangan','like', "'%".$search."%'")
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order, $dir)
                                ->count();
        }

        $data = array();

        if ($posts) {
        $count = $start+1;
        foreach ($posts as $d) {
            $token = csrf_token();
            $nestedData['no'] = $count;
            $nestedData['nama_jenis_satker'] = $d->nama_jenis_satker;
            $nestedData['keterangan'] = $d->keterangan;
            $nestedData['aksi'] = '<center><a title="hapus" href="'.url('satker/edit',$d->id_jenis_satker).'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> <form method="post" action="'.route('satker.delete').'" style="display: inline;"><input type="hidden" name="_token" value="'.$token.'"/><input type="hidden" name="id_jenis_satker" value="'.$d->id_jenis_satker.'"/><button type="submit" onclick="return confirm(\'Konfirmasi Hapus\')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></form></center>';
            $data[] = $nestedData;
            $count++;
        }
        }

        $json_data = array(
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval($totalData),
        'recordsFiltered' => intval($totalFiltered),
        'data' => $data
        );

        echo json_encode($json_data);
    }

    public function add()
    {
        $url = "satker/insert";
        return View('satker.add',compact('url'));
    }

    public function store(Request $request)
    {
        $id_jenis_satker = DB::table('jenis_satker')
                            ->orderBy('id_jenis_satker', 'DESC')
                            ->first()->id_jenis_satker;

        $insert = DB::table('jenis_satker')
                    ->insert([
                        'id_jenis_satker' => $id_jenis_satker+1,
                        'nama_jenis_satker' => $request->nama_jenis_satker,
                        'keterangan' => $request->keterangan
                    ]);

        if($insert){
            return redirect('/satker');
        }else{
            return "gagal";
        }
    }

    public function edit($id)
    {
        //
        $url = "satker/update";
        $data = DB::table('jenis_satker')
                ->where('id_jenis_satker', $id)
                ->first();
        return view ('satker.add',compact('data','url','id'));
    }

    public function update(Request $request)
    {
        $update = DB::table('jenis_satker')
                    ->where('id_jenis_satker', $request->id_jenis_satker)
                    ->update([
                        'nama_jenis_satker' => $request->nama_jenis_satker,
                        'keterangan' => $request->keterangan
                    ]);

         if($update){
            return redirect('/satker');
        }else{
            return "gagal";
        }
    }

    public function delete(Request $request)
    {
        DB::table('jenis_satker')->where('id_jenis_satker', $request->id_jenis_satker)->delete();

        Session::flash('flash_message', 'Satker berhasil dihapus.');

        return redirect('/satker');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use Illuminate\Support\Facades\DB;
use Session;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('bauth');
    }


    public function index()
    {
        //

        $program = Program::all();
        return view('master.program.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $url = "program_insert";
        return View('master.program.form', compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = DB::table('master_program')->insert([
            'nama_program' => $request->nama_program,
            'keterangan' => $request->keterangan,
            'status' => $request->status,


        ]);

        if ($insert) {
            return redirect('/list_program');
        } else {
            return "gagal";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $url = "program_update";
        $program = Program::where('id_program', $id)->first();
        return view('master.program.form', compact('program', 'url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $update = Program::where('id_program', $request->id_program)->update(['nama_program' => $request->nama_program,
            'keterangan' => $request->keterangan]);

        if ($update) {
            return redirect('/list_program');
        } else {
            return "gagal";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Program::destroy($id);

        Session::flash('flash_message', 'Program deleted!');

        return redirect('/list_program');
    }
}

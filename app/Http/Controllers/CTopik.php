<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CTopik extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function topik_dashboard()
    {
        //
        //ambil data topik
        $topik = DB::table('topik')
            //->join('sub_topik','sub_topik.id_topik','=','topik.id')
            ->orderBy('topik.id', 'asc')
            ->get();


        return (['status' => 'success', 'data' => $topik, 'RC' => '00' , 'message' => 'Berhasil mengembalikan topik dashboard']);

    }

    public function jumlah_sub_topik_dashboard(Request $request)
    {
        //
        //ambil data topik
        $sub_topik = DB::table('sub_topik')
            ->where('id_topik','=',$request['id'])
            ->count();


        return (['status' => 'success', 'data' => $sub_topik, 'RC' => '00' , 'message' => 'Berhasil mengembalikan topik dashboard']);

    }

    public function topik_yang_sudah_dikerjakan(Request $request){

        $topik_sudah_dikerjakan = DB::table('mahasiswa_mengambil_topik')
            ->select('nama_topik')
            ->join('topik', 'topik.id', '=', 'mahasiswa_mengambil_topik.id_topik')
            ->where('id_pengguna', '=', $request["id"])
            ->distinct()
            ->get();

        return (['status' => 'success', 'data' => $topik_sudah_dikerjakan, 'RC' => '00' , 'message' => 'Berhasil mengembalikan topik yang sudah dikerjakan']);
    }

    public function daftar(){

        $topik = DB::table('topik')
            ->select('id','nama_topik','thumbnail')
            ->get();

        return (['status' => 'success', 'data' => $topik, 'RC' => '00' , 'message' => 'Berhasil mengembalikan daftar topik']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

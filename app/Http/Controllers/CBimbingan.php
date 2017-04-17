<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CBimbingan extends Controller
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

    public function ambil_judul(Request $request){
        $judul_bimbingan = DB::table('bimbingan')
            ->select('bimbingan.judul','topik.nama_topik','bimbingan.created_at')
            ->join('mahasiswa','mahasiswa.id','=', 'bimbingan.mahasiswa')
            ->join('users','users.id','=', 'mahasiswa.id_users')
            ->join('topik','topik.id','=', 'bimbingan.topik')
            ->where('users.id','=',$request["id"])
            ->orderBy('bimbingan.created_at','desc')
            ->get();

        return (['status' => 'success', 'data' => $judul_bimbingan, 'RC' => '00' , 'message' => 'Berhasil mengembalikan judul bimbingan']);
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

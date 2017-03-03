<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\MUsers;
use App\MLecturers;
use App\MStudents;

class CUsers extends Controller
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

    /** POST login */
    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];

        $array = array(
            'message' => 'Mohon isi email dan password.',
        );

        if ($email == '' || $password == '') {//Bila field email atau password kosong
            return (['status' => 'success', 'data' => $array, 'RC' => '01', 'message' => 'email atau password harus diisi']);
        }

        //Mencocokan email dengan password
        $userdata = array(
            'email' => $email,
            'password' => $password
        );

        if (Auth::attempt($userdata)) {//email dan password sesuai
            $user = DB::table('users')
                ->select('*')
                ->where('email', '=', $email)
                ->get();

            return (['status' => 'success', 'data' => $user, 'RC' => '00', 'message' => 'email atau password sesuai']);
        } else {
            $array = array(
                'message' => 'Email atau password salah.',
            );

            return (['status' => 'success', 'data' => $array, 'RC' => '01', 'message' => 'email atau password salah']);
        }

    }

    /** POST register */
    public function register(Request $request)
    {
        $peran = $request['peran'];
        $email = $request['email'];
        $nim = $request['nim'];
        $universitas = $request['universitas'];
        $username = $request['username'];
        $password = bcrypt($request['password']);

        $array = array(
            'message' => 'Mohon isi semua field yang diminta.',
        );

        if ($peran == '' || $email == '' || $nim == '' || $universitas == '' || $username == '' || $password == '') {//Bila ada field yang kosong
            return (['status' => 'success', 'data' => $array, 'RC' => '01']);
        }

        //Bila email atau username sudah terdaftar
        $akunTerdaftar = DB::table('users')
            ->where('email', '=', $email)
            ->orWhere('username', $username)
            ->count();

        if ($akunTerdaftar != 0) {
            $array = array(
                'message' => 'Maaf username atau email sudah terdafar.',
            );

            return (['status' => 'success', 'data' => $array, 'RC' => '01']);
        }

        //Masukan ke tabel user
        $user = new MUsers();
        $user->peran = $peran;
        $user->email = $email;
        $user->nim = $nim;
        $user->universitas = $universitas;
        $user->username = $username;
        $user->password = bcrypt($request['password']);
        $user->status_konfirmasi = 0;
        $user->save();

        //Masukan ke tabel peran
        switch ($peran) {
            case 2:
                //Masukan ke tabel dosen
                $id_users = DB::table("users")
                    ->where('email', '=', $email)
                    ->get();

                $id_users_val = NULL;

                foreach ($id_users as $id_users) {
                    $id_users_val = $id_users->id;
                }

                $dosen = new MLecturers();
                $dosen->id_users = $id_users_val;
                $dosen->save();
                //Data user
                $user = DB::table('users')
                    ->select('*')
                    ->where('email', '=', $email)
                    ->get();

                return (['status' => 'success', 'data' => $user, 'RC' => '00']);break;
            case 4:
                //Masukan ke tabel mahasiswa
                $id_users = DB::table("users")
                    ->where('email', '=', $email)
                    ->get();

                $id_users_val = NULL;

                foreach ($id_users as $id_users) {
                    $id_users_val = $id_users->id;
                }

                $students = new MStudents();
                $students->id_users = $id_users_val;
                $students->save();

                //Data user
                $user = DB::table('users')
                    ->select('*')
                    ->where('email', '=', $email)
                    ->get();

                return (['status' => 'success', 'data' => $user, 'RC' => '00']);break;
        }

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}

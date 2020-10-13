<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kategorictrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategoris')->get();
       // return $kategori;
        return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategoris')->get();
       
         return view('kategori.add',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_kategori' => 'required|min:2',
            'nama_kategori' => 'required',
        ],['kd_kategori.required'=> 'kode kategori harus di isi']);

        DB::table('kategoris')->insert(
            [
                'kd_kategori' => $request->kd_kategori
                ,'nama_kategori' => $request->nama_kategori


            ]
        );
        return redirect('kategori')->with('status', 'kategori berhasil di tambahkan!');
        //return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = DB::table('kategoris')->where('id', $id)->first();
        return view("kategori.edit",["kategori" => $kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $validatedData = $request->validate([
            'kd_kategori' => 'required|min:2',
            'nama_kategori' => 'required',
        ],['kd_kategori.required'=> 'kode kategori harus di isi']);

        DB::table('kategoris')->where("id",$id)->Update(
            [
                'kd_kategori' => $request->kd_kategori
                ,'nama_kategori' => $request->nama_kategori


            ]
        );
        return redirect('kategori')->with('status', 'kategori berhasil di edit!');
        //return $request;
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
        $kategori = DB::table('kategoris')->where('id', $id)->delete();
        return redirect('kategori')->with('status', 'kategori berhasil di hapus!');

    }
}

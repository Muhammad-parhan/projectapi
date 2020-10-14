<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\produk;
use App\kategori;

class produkctrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=kategori::get();
        $produk= produk::with('kategori')->get();
        return view('produk.index',compact("produk"));
        // return $produk;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori= kategori::get();
        $produk= produk::with('kategori')->get();
        return view('produk.add',compact("produk",'kategori'));
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
            'kode' => 'required|min:2',
            'nama' => 'required',
        ],['kode.required'=> 'kode kategori harus di isi']);

        DB::table('produks')->insert(
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'kd_kategori' => $request->kd_kategori,
                'berat'=> $request->berat

            ]
        );
        return redirect('produk')->with('status', 'produk berhasil di tambahkan!');
        // return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $produk= produk::with('kategori')->where('id',$id)->first();
        $kategori= kategori::get();
         return view('produk.edit',compact("produk",'kategori'));

        // return $produk;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|min:2',
            'nama' => 'required',
        ],['kode.required'=> 'kode kategori harus di isi']);

        DB::table('produks')->where('id',$id)->update(
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'kd_kategori' => $request->kd_kategori,
                'berat'=> $request->berat

            ]
        );
        return redirect('produk')->with('status', 'produk berhasil di tambahkan!');
        // return $request;
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

        $kategori = DB::table('produks')->where('id', $id)->delete();
        return redirect('produk')->with('status', 'kategori berhasil di hapus!');
    }
}

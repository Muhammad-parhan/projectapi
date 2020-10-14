<?php

namespace App\Http\Controllers;

use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk= produk::with('kategori')->get();
        return view('transaksi.index', compact("produk"));
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


    public function setCookie(Request $req){


        $nama = $req->nama;
        $jumlah = 1;
        $harga = $req->harga;
        $subtotal = $jumlah * $harga;
        $berat = $req->berat;

        $hallo = $nama.'|'.$jumlah.'|'.$harga.'|'.$subtotal.'|'.$berat;

        $produk2 = Cookie::make('produk2',$hallo,1);
        return $produk;
        // return view('transaksi.index',compact('$produk2'));
    }
    }


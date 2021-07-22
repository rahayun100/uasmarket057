<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['show','index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //echo 'Databases Suskses  Terhubung';
        //$data = Produk::all();  
        $data = Produk::with('kategori')->get();  
          
        return response()->json($data);
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
        $validator = Validator::make($request->all(), [ 
            'nama_produk' => 'required',
           'stok' => 'required',
           'deskripsi' => 'required',
           'harga' => 'required',
           'id_kategori' => 'required'

                
       ]);
       if($validator->passes()){
           return Produk::create($request->all());
       }
       return response()->json(['message' => 'Data Produk Gagal Di Tambahkan!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($produk)
    {
        //
        $data = Produk::with('kategori')->where('id',$produk)->first();
        if(!empty($data)){
            return $data;
        }
        return response()->json(['message' => 'Data Tidak Di Temukan'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $produk)
    {
        //
        $data = Produk::with('kategori')->where('id',$produk)->first();
        if(!empty($data)){
            $validator = Validator::make($request->all(), [ 
            'nama_produk' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_kategori' => 'required'
            

            ]);
            
            if($validator->passes()){
                $data->update($request->all());
                return response()->json([
                    'message' => 'Data Berhasil Di Ubah',
                    'data' => $data
                ]);
            }else{
                return response()->json([
                    'message' => 'Data gagal di Ubah',
                    'data' => $validator->errors()->all()
                ]);
            }
        }
        return response()->json(['message' => 'Data Tidak di temukan!'], 404);
            
            
        
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($produk)
    {
        //
        $data = Produk::where('id', $produk)->first();
        if(empty($data)){
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        $data->delete();
        return response()->json([
            'message' => 'Data berhasil di hapus'
        ]);
    }
}

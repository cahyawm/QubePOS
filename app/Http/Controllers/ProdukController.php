<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function store image
    private function upload_img($request) {
        $file = $request->img;

        if($file != NULL){
            $filename = time() . "-img-" . $file->getClientOriginalName();
            $uploadPath = "img/";
            $request->file('img')->move($uploadPath, $filename);
        }
        else{
            $filename = "blank.png";
        }
        
        return $filename;
    }

    // function update image
    private function update_img($request, $id) {
        $model = Produk::find($id);
        $file = $request->img;

        if($file != NULL){
            $filename = time() . "-img-" . $file->getClientOriginalName();
            $uploadPath = "img/";
            $request->file('img')->move($uploadPath, $filename);
        }
        else{
            $filename = $model->img;
        }
        
        return $filename;
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'nama' => ['required', 'string', 'max:100'],
    //         'kategori_id' => ['required'],
    //         'harga' => ['required', 'numeric'],
    //     ]);
    // }
    
    public function index()
    {
        $datas = Produk::all();

        return view('pages.katalog.produk.index',[
            'datas' => $datas,
            'title' => 'katalog',
            'head_title' => 'Katalog'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $model = new Produk;
        $kategori = Kategori::all();

        return view('pages.katalog.produk.create',[
            // 'model' => $model,
            'kategori' => $kategori,
            'title' => 'katalog',
            'head_title' => 'Tambah Katalog'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'img' => 'image|file|max:2048'
        ]);

        Produk::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'img' => $this->upload_img($request)
        ]);


        // cara create manual
        // $model = new Produk;
        // $model->nama = $request->nama;
        // $model->kategori_id = $request->kategori_id;
        // $model->harga = $request->harga;
        // $model->img = $this->upload_img($request);

        // $model->save();

        return redirect('produk');
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
        $model = Produk::find($id);
        $kategori = Kategori::all();

        return view('pages.katalog.produk.edit',[
            'model' => $model,
            'kategori' => $kategori,
            'title' => 'katalog',
            'head_title' => 'Edit Katalog'

        ]);
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
        $model = Produk::find($id);
        $model->nama = $request->nama;
        $model->kategori_id = $request->kategori_id;
        $model->harga = $request->harga;
        $model->img = $this->update_img($request, $id);

        $model->save();

        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Produk::find($id);
        $model->delete();

        return redirect('produk');
    }
}

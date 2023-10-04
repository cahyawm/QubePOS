<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Kategori::all();
        return view('pages.katalog.kategori.index', [
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
        // $model = new Kategori;

        return view('pages.katalog.kategori.create', [
            // 'model' => $model,
            'title' => 'katalog',
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
        ]);

        Kategori::create([
            'nama' => $request->nama
        ]);

        // $model = new Kategori;
        // $model->nama = $request->nama;
        // $model->save();

        return redirect('kategori');
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
        $model = Kategori::find($id);

        return view('pages.katalog.kategori.edit', [
            'model' => $model,
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
        $model = Kategori::find($id);
        $model->nama = $request->nama;
        $model->save();

        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Kategori::find($id);
        $model->delete();

        return redirect('kategori');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskon;
use App\Models\JenisDiskon;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Diskon::all();

        return view('pages.diskon.index',[
            'datas' => $datas,
            'title' => 'diskon',
            'head_title' => 'Diskon'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Diskon;
        $jenisdiskon = JenisDiskon::all();

        return view('pages.diskon.create',[
            'model' => $model,
            'jenisdiskon' => $jenisdiskon,
            'title' => 'diskon',
            'head_title' => 'Tambah Diskon'
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
        $model = new Diskon;
        $model->nama = $request->nama;
        $model->jenisdiskon_id = $request->jenisdiskon_id;
        $model->tgl_mulai = $request->tgl_mulai;
        $model->tgl_berakhir = $request->tgl_berakhir;
        $model->besar_diskon = $request->besar_diskon;

        $model->save();

        return redirect('diskon');
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
        $model = Diskon::find($id);
        $jenisdiskon = JenisDiskon::all();

        return view('pages.diskon.edit', [
            'model' => $model,
            'title' => 'diskon',
            'jenisdiskon' => $jenisdiskon,
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
        $model = Diskon::find($id);
        $model->nama = $request->nama;
        $model->jenisdiskon_id = $request->jenisdiskon_id;
        $model->tgl_mulai = $request->tgl_mulai;
        $model->tgl_berakhir = $request->tgl_berakhir;
        $model->besar_diskon = $request->besar_diskon;
        $model->save();

        return redirect('diskon');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Diskon::find($id);
        $model->delete();

        return redirect('diskon');
    }
}

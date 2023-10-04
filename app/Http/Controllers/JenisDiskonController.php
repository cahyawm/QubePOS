<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDiskon;

class JenisDiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = JenisDiskon::all();
        return view('pages.jenisdiskon.index', [
            'datas' => $datas,
            'title' => 'diskon',
        ]);
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
        $request->validate([
            'nama' => 'required|max:100',
        ]);
        JenisDiskon::create([
            'nama' => $request->nama
        ]);
        return redirect('jenisdiskon');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = JenisDiskon::find($id);

        return view('pages.jenisdiskon.edit', [
            'model' => $model,
            'title' => 'diskon',
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
        $model = JenisDiskon::find($id);
        $model->nama = $request->nama;
        $model->save();

        return redirect('jenisdiskon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = JenisDiskon::find($id);
        $model->delete();

        return redirect('jenisdiskon');
    }
}

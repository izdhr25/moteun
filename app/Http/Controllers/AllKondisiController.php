<?php

namespace App\Http\Controllers;

use App\Models\Sakit_Sehat;
use App\Models\Obat;
use App\Models\JenisTernak;
use App\Models\JenisTani;
use App\Models\Ternak;
use App\Models\Tani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AllKondisiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query');

        $kondisis = Sakit_Sehat::where('nama_id', 'LIKE', '%'.$keyword.'%')
        ->orWhere('nama', 'LIKE', '%'.$keyword.'%')
        ->orWhere('jenis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('tgl_sakit', 'LIKE', '%'.$keyword.'%')
        ->orWhere('lama_sakit', 'LIKE', '%'.$keyword.'%')
        ->orWhere('tgl_sembuh', 'LIKE', '%'.$keyword.'%')
        ->orWhere('obat', 'LIKE', '%'.$keyword.'%')
        ->orWhere('perawat', 'LIKE', '%'.$keyword.'%')
        ->orWhere('status', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.kondisi.index', compact('kondisis'));
    }

    public function create()
    {
        $obats = Obat::all();
        $tanis = Tani::all();
        $ternaks = Ternak::all();
        $jenisternaks = JenisTernak::all();
        $jenistanis = JenisTani::all();
        return view('admin.kondisi.create', compact('obats', 'jenisternaks', 'jenistanis', 'tanis', 'ternaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_id' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'tgl_sakit' => 'required',
            'lama_sakit' => 'required',
            'tgl_sembuh' => 'nullable',
            'obat' => 'required',
            'perawat' => 'required',
            'status' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        Sakit_Sehat::create($input);

        return redirect('/allkondisi')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Sakit_Sehat $allkondisi)
    {
        //
    }

 
    public function edit(Sakit_Sehat $allkondisi)
    {
        $obats = Obat::all();
        $tanis = Tani::all();
        $ternaks = Ternak::all();
        $jenisternaks = JenisTernak::all();
        $jenistanis = JenisTani::all();
        return view('admin.kondisi.edit', compact('allkondisi', 'jenisternaks', 'jenistanis', 'tanis', 'ternaks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sakit_Sehat $allkondisi)
    {
        $request->validate([
            'nama_id' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'tgl_sakit' => 'required',
            'lama_sakit' => 'required',
            'tgl_sembuh' => 'nullable',
            'obat' => 'required',
            'perawat' => 'required',
            'status' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        $allkondisi->update($input);

        return redirect('/allkondisi')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sakit_Sehat $allkondisi)
    {
        $allkondisi->delete();

        return redirect('/allkondisi')->with('message', 'Data Berhasil Dihapus'); 
    }
}

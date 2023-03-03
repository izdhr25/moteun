<?php

namespace App\Http\Controllers;

use App\Models\JenisTani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JenisTaniController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query');

        $jenistanis = JenisTani::where('name', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);

        return view('admin.jenistani.index', compact('jenistanis'));
    }

    public function create()
    {
        return view('admin.jenistani.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        // if($image = $request->file('image')){
        //     $destinationPath = 'image/';
        //     $imageName = $image->getClientOriginalName();
        //     $image->move($destinationPath, $imageName);
        //     $input['image'] = $imageName;
        // }

        JenisTani::create($input);

        return redirect('/jenistani')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(JenisTani $jenistani)
    {
        //
    }

 
    public function edit(JenisTani $jenistani)
    {
        return view('admin.jenistani.edit', compact('jenistani'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisTani $jenistani)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        $jenistani->update($input);

        return redirect('/jenistani')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTani $jenistani)
    {
        $jenistani->delete();

        return redirect('/jenistani')->with('message', 'Data Berhasil Dihapus'); 
    }
}
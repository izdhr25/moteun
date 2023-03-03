<?php

namespace App\Http\Controllers;

use App\Models\JenisTernak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JenisTernakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query');

        $jenisternaks = JenisTernak::where('name', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);

        return view('admin.jenisternak.index', compact('jenisternaks'));
    }

    public function create()
    {
        return view('admin.jenisternak.create');
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

        jenisternak::create($input);

        return redirect('/jenisternak')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(JenisTernak $jenisternak)
    {
        //
    }

 
    public function edit(JenisTernak $jenisternak)
    {
        return view('admin.jenisternak.edit', compact('jenisternak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisTernak $jenisternak)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        $jenisternak->update($input);

        return redirect('/jenisternak')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTernak $jenisternak)
    {
        $jenisternak->delete();

        return redirect('/jenisternak')->with('message', 'Data Berhasil Dihapus'); 
    }
}
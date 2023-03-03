<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAkunController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query');

    	$akunusers = User::where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('jk', 'LIKE', '%'.$keyword.'%')
        ->orWhere('email', 'LIKE', '%'.$keyword.'%')
        ->orWhere('no_telp', 'LIKE', '%'.$keyword.'%')
        ->orWhere('alamat', 'LIKE', '%'.$keyword.'%')
        ->orWhere('role_id', 'LIKE', '%'.$keyword.'%')
        ->orWhere('id', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.akunuser.index', compact('akunusers'));
    }

    public function create()
    {
        // return view('user.akunuser.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

 
    public function edit(User $akunuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $akunuser)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'image' => 'image',
            'jk' => 'string',
            'email' => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:8'],
            'no_telp' => ['string', 'max:15'],
            'alamat' => 'string',
            'role_id' => 'string',
        ]);       

        if($image = $request->file('image')){
            $imageName = $image->getClientOriginalName();
            $tujuan_upload = 'assets/img/userprofile';
            $image->move($tujuan_upload, $imageName);
        } else {
            unset($request['image']);
        }  

        if($image == null) {
                User::where('id', Auth::user()->id)->update([
                'name' => $request['name'],
                'image' => $request['imageLama'],
                'jk' => $request['jk'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'no_telp' => $request['no_telp'],
                'alamat' => $request['alamat'],
                'role_id' => $request['role_id'],
            ]);
        } else {
                User::where('id', Auth::user()->id)->update([
                'name' => $request['name'],
                'image' => $imageName,
                'jk' => $request['jk'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'no_telp' => $request['no_telp'],
                'alamat' => $request['alamat'],
                'role_id' => $request['role_id'],
            ]);
        }

        return redirect('/akunuser')->with('message', 'Data Berhasil Diedit'); 
    }

    public function destroy(User $akunuser)
    {
        $akunuser->delete();

        return redirect('/akunuser')->with('message', 'Data Berhasil Dihapus'); 
    }
}
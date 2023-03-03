<?php
 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

 
class RegisterAdminController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.register');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => 'image',
            'jk' => ['string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_telp' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'role_id' => ['required', 'string']
        ]);

        if($image = $request->file('image')){
            $imageName = $image->getClientOriginalName();
            $tujuan_upload = 'assets/img/userprofile';
            $image->move($tujuan_upload, $imageName);
        }
        
        if($image == null){
            User::create([
                'name' => $request['name'],
                'image' => $request['default'],
                'jk' => $request['jk'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'no_telp' => $request['no_telp'],
                'alamat' => $request['alamat'],
                'role_id' => $request['role_id'],
            ]);
        } else {
            User::create([
                'name' => $request['name'],
                'image' => $imageName,
                'jk' => $request['jk'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'no_telp' => $request['no_telp'],
                'alamat' => $request['alamat'],
                'role_id' => $request['role_id'],
            ]); 
        }

        return redirect('/registeradmin')->with('success', 'Registrasi Berhasil! Silakan Login');
    }
}

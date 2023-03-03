<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tani;
use App\Models\Ternak;
use App\Models\Obat;
use App\Models\Sakit_Sehat;
use App\Models\Alert;
use App\Models\Tentang;
use App\Models\Kontak;
use App\Models\Artikel;
use App\Models\Grow;
use App\Models\Metode;


class MoterController extends Controller
{
    public function index(){
        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();
        $artikels = Artikel::take(3)->latest()->get();

        $tanis = Tani::all();
        $ternaks = Ternak::all();
        $alerttani = Alert::where('jenis', 'Tanaman')->get();
        $alertternak = Alert::where('jenis', 'Hewan')->get();
        $kondisiternak = Sakit_Sehat::where('nama', 'Tanaman')->get();
        $kondisitani = Sakit_Sehat::where('nama', 'Hewan')->get();
        $grows = Grow::all();
        $metodes = Metode::all();

        $jumlahtani = count($tanis);
        $jumlahternak = count($ternaks);
        $jumlahalerttani = count($alerttani);
        $jumlahalertternak = count($alertternak);
        $jumlahkondisiternak = count($kondisiternak);
        $jumlahkondisitani = count($kondisiternak);
        $jumlahgrow = count($grows);
        $jumlahmetode = count($metodes);

        return view('moter/index', compact('tentangs', 'kontaks', 'jumlahtani', 'jumlahternak', 'jumlahkondisiternak', 'jumlahkondisitani', 'tanis', 'ternaks', 'jumlahalerttani', 'jumlahalertternak', 'artikels', 'jumlahgrow', 'jumlahmetode'));
    }

    public function tentang(){
        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();
        return view('moter/tentang', compact('tentangs', 'kontaks'));
    }

    public function tanis(){
        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();

        $tanis = Tani::all();
        $ternaks = Ternak::all();
        $alerttani = Alert::where('jenis', 'Tanaman')->get();
        $alertternak = Alert::where('jenis', 'Hewan')->get();
        $kondisiternak = Sakit_Sehat::where('nama', 'Tanaman')->get();
        $kondisitani = Sakit_Sehat::where('nama', 'Hewan')->get();
        $grows = Grow::all();
        $metodes = Metode::all();

        $jumlahtani = count($tanis);
        $jumlahternak = count($ternaks);
        $jumlahalerttani = count($alerttani);
        $jumlahalertternak = count($alertternak);
        $jumlahkondisiternak = count($kondisiternak);
        $jumlahkondisitani = count($kondisiternak);
        $jumlahgrow = count($grows);
        $jumlahmetode = count($metodes);
        return view('moter/tani', compact('tentangs', 'kontaks', 'jumlahtani', 'jumlahternak', 'jumlahkondisiternak', 'jumlahkondisitani', 'tanis', 'ternaks', 'jumlahalerttani', 'jumlahalertternak', 'jumlahgrow', 'jumlahmetode'));
    }

    public function ternaks(){
        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();

        $tanis = Tani::all();
        $ternaks = Ternak::all();
        $alerttani = Alert::where('jenis', 'Tanaman')->get();
        $alertternak = Alert::where('jenis', 'Hewan')->get();
        $kondisiternak = Sakit_Sehat::where('nama', 'Tanaman')->get();
        $kondisitani = Sakit_Sehat::where('nama', 'Hewan')->get();
        $grows = Grow::all();
        $metodes = Metode::all();

        $jumlahtani = count($tanis);
        $jumlahternak = count($ternaks);
        $jumlahalerttani = count($alerttani);
        $jumlahalertternak = count($alertternak);
        $jumlahkondisiternak = count($kondisiternak);
        $jumlahkondisitani = count($kondisiternak);
        $jumlahgrow = count($grows);
        $jumlahmetode = count($metodes);
        return view('moter/ternak', compact('tentangs', 'kontaks', 'jumlahtani', 'jumlahternak', 'jumlahkondisiternak', 'jumlahkondisitani', 'tanis', 'ternaks', 'jumlahalerttani', 'jumlahalertternak', 'jumlahgrow', 'jumlahmetode'));
    }

    public function forum(){
        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();
        return view('moter/diskusi', compact('tentangs', 'kontaks'));
    }

    public function layanan(){
        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();
        return view('moter/layanan', compact('tentangs', 'kontaks'));
    }

    public function artikels(Request $request){
        $keyword = $request->input('query'); 

        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();

        $artikels = Artikel::where('judul', 'LIKE', '%'.$keyword.'%')
        ->orWhere('tgl_tulis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('penulis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('deskripsi', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(15);
        return view('moter/artikel', compact('tentangs', 'kontaks', 'artikels'));
    }

    public function detail($id){
        $tentangs = Tentang::all(); 
        $kontaks = Kontak::all();

        $artikel = Artikel::find($id);

        return view('moter.detail', compact('tentangs', 'kontaks', 'artikel'));
    }
}

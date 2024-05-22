<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Profile; // Menambahkan impor Profile di sini

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {

        $showdashboard = auth()->user()->isAdmin();
        $profile =  DB::table('profile')->get();

        $title = 'Peringatan !';
        $text = "Apakah anda yakin ingin menghapus ?";
        $icon = "Question";
        confirmDelete($title, $text);
        return view('pelanggan.indexpelanggan', compact('profile','showdashboard'));
    }

    public function tambahpelanggan()
    {
        $showdashboard = auth()->user()->isAdmin();
        return view('pelanggan.tambahpelanggan', compact('showdashboard'));
    }

    public function pelanggan(Request $request) {

        $request->validate([
            'nama' => 'required|',
            'nohp' => 'required|',
            'alamat' => 'required|',
        ]);
    
        DB::table('profile')-> insert([
            'nama_lengkap' => $request->nama,
            'no_hp' => $request->nohp,
            'alamat' => $request->alamat,
    
        ]);

        Alert::success('Success', 'Data Berhasil');

        return redirect('/pelanggan'); }

        public function show($id){
            $showdashboard = auth()->user()->isAdmin();
            $profile = DB::table('profile')->find($id);
            return view('pelanggan.detailpelanggan', compact('profile','showdashboard'));

            
        }

        public function edit($id) {
            $showdashboard = auth()->user()->isAdmin();
            $profile = DB::table('profile')->find($id);
            return view ('pelanggan.editpelanggan', compact('profile', 'showdashboard'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'nama' => 'required',
                'nohp' => 'required|',
                'alamat' => 'required|',
            ]);

            $request = DB::table('profile')
            ->where('id', $id)
            ->update([
                'nama_lengkap' => $request->nama,
                'no_hp' => $request->nohp,
                'alamat' => $request->alamat,

            ]);
            Alert::success('Success', 'Data Berhasil Di Update');

            return redirect('/pelanggan');
        }

        public function destroy($id) {
            $profile = DB::table('profile')->where('id', $id)->delete();
            Alert::success('Success', 'Data Berhasil Di Hapus');
            return redirect('/pelanggan');
        }

        public function search(Request $request)
        {
         $query = $request->input('query');
         $profile = Profile::where('nama_lengkap', 'LIKE', "%$query%")->get();
         return view('pelanggan.search', compact('profile'));
        }
}

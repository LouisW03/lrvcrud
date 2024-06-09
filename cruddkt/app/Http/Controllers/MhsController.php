<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_mhs;
use App\Models\Tbl_jk;
use App\Models\Tbl_prodi;
use Illuminate\Support\Facades\Storage;

class MhsController extends Controller
{
    public function index()
    {
        $mhs = Tbl_mhs::all();
        return view('mhs.index', compact('mhs'));
    }

    public function create()
    {
        $jks = Tbl_jk::all();
        $prodis = Tbl_prodi::all();
        return view('mhs.form', compact('jks', 'prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:tbl_mhs,nim',
            'nama_mhs' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'prodi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:tbl_mhs,email'
        ]);

        $data = $request->except('_token'); // Mengabaikan _token dari request

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Tbl_mhs::create($data);

        return redirect()->route('mhs.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mhs = Tbl_mhs::findOrFail($id);
        $jks = Tbl_jk::all();
        $prodis = Tbl_prodi::all();
        return view('mhs.form', compact('mhs', 'jks', 'prodis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:tbl_mhs,nim,'.$id,
            'nama_mhs' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'prodi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:tbl_mhs,email,'.$id
        ]);

        $mhs = Tbl_mhs::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($mhs->foto) {
                Storage::disk('public')->delete($mhs->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $mhs->update($data);

        return redirect()->route('mhs.index')->with('success', 'Mahasiswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $mhs = Tbl_mhs::findOrFail($id);
        if ($mhs->foto) {
            Storage::disk('public')->delete($mhs->foto);
        }
        $mhs->delete();
        return redirect()->route('mhs.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}

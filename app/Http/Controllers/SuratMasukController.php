<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratRequest;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    function index(Request $request) {

        $surat = Surat::query();

        $surat->when($request->search, function ($query) use ($request) {
            return $query->where('category_id', 1)
            ->where('tanggal', 'LIKE', "%{$request->search}%")
            ->orWhere('nomor_surat', 'LIKE', "%{$request->search}%")
            ->orWhere('asal_surat', 'LIKE', "%{$request->search}%")
            ->orWhere('nomor_tanggal_surat', 'LIKE', "%{$request->search}%")
            ->orWhere('perihal', 'LIKE', "%{$request->search}%");
        });

        $surat = $surat->latest()->where('category_id', 1)->paginate(10);
        
        return view('pages.surat_masuk.index', [
            'surats' => $surat
        ]);
    }

    function create() {
        return view('pages.surat_masuk.create');
    }

    function store(StoreSuratRequest $request) {
        try {
            $data = $request->validate([
                'category_id' => 'required',
                'tanggal' => 'required',
                'nomor_surat' => 'required|unique:surats',
                'asal_surat' => 'required',
                'nomor_tanggal_surat' => 'required',
                'perihal' => 'required',
                'file' => 'required|file|mimes:pdf|max:1000000',
                'disposisi' => 'nullable|file|mimes:pdf|max:1000000',
            ]);
            
            $data['file'] = $request->file('file')->storePublicly('files/surat-masuk', 'public');
            $request->hasFile('disposisi') ? $data['disposisi'] = $request->file('disposisi')->storePublicly('files/disposisi', 'public') : $data['disposisi'] = null;
    
            Surat::create([
                'category_id' => $data['category_id'],
                'tanggal' => $data['tanggal'],
                'nomor_surat' => $data['nomor_surat'],
                'asal_surat' => $data['asal_surat'],
                'nomor_tanggal_surat' => $data['nomor_tanggal_surat'],
                'perihal' => $data['perihal'],
                'file' => $data['file'],
                'disposisi' => $data['disposisi'],
            ]);

            return redirect()->route('surat-masuk')->with('success' , 'Surat Berhasil Ditambahkan!');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    function show(Surat $surat) {
        
    }

    function destroy(Surat $surat) {
        if (isset($surat->file)) {
            Storage::disk('public')->delete($surat->file);
        }
        if (isset($surat->disposisi)) {
            Storage::disk('public')->delete($surat->disposisi);
        }
        $surat->delete();
        return redirect()->route('surat-masuk');
    }
}


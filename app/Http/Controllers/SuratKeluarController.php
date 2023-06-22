<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratRequest;
use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    function index(Request $request) {
        $surat = Surat::query();

        $surat->when($request->search, function ($query) use ($request) {
            return $query->where('category_id', 2)
            ->where('tanggal', 'LIKE', "%{$request->search}%")
            ->orWhere('nomor_surat', 'LIKE', "%{$request->search}%")
            ->orWhere('kepada', 'LIKE', "%{$request->search}%")
            ->orWhere('keperluan', 'LIKE', "%{$request->search}%");
        });

        $surat = $surat->latest()->where('category_id', 2)->paginate(10);

        return view('pages.surat_keluar.index', [
            'surats' => $surat,
        ]);
    }

    function create() {
        return view('pages.surat_keluar.create');
    }

    function store(StoreSuratRequest $request) {
        try {
            $data = $request->validate([
                'category_id' => 'required',
                'tanggal' => 'required',
                'nomor_surat' => 'required|unique:surats',
                'kepada' => 'required',
                'keperluan' => 'required',
                'file' => 'required|file',
                'laporan' => 'nullable|file', 
            ]);

            $data['file'] = $request->file('file')->storePublicly('files/surat-keluar', 'public');
            $request->hasFile('laporan') ? $data['laporan'] = $request->file('laporan')->storePublicly('files/laporan', 'public') : $data['laporan'] = null;

            Surat::create([
                'category_id' => $data['category_id'],
                'tanggal' => $data['tanggal'],
                'nomor_surat' => $data['nomor_surat'],
                'kepada' => $data['kepada'],
                'keperluan' => $data['keperluan'],
                'file' => $data['file'],
                'laporan' => $data['laporan'],
            ]);

            return redirect()->route('surat-keluar');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    function edit(Surat $surat) {
        return view('pages.surat_keluar.edit' , [
            'surat' => $surat
        ]);
    }

    function update(Request $request, Surat $surat) {
        try {
            $data = $request->validate([
                'category_id' => 'required',
                'tanggal' => 'required',
                'kepada' => 'required',
                'keperluan' => 'required',
                'file' => 'nullable|file',
                'laporan' => 'nullable|file', 
            ]);

            if($request->hasFile('file')) {
                if(isset($surat->file)) {
                    Storage::disk('public')->delete($surat->file);
                }
                $data['file'] = $request->file('file')->storePublicly('files/surat-keluar', 'public');
            } else {
                $data['file'] = $surat->file;
            }
            
            if($request->hasFile('laporan')) {
                if(isset($surat->laporan)) {
                    Storage::disk('public')->delete($surat->laporan);
                }
                $data['laporan'] = $request->file('laporan')->storePublicly('files/laporan', 'public');
            } elseif (isset($surat->laporan)) {
                $data['laporan'] = $surat->laporan;
            } else {
                $data['laporan'] = null;
            }
            
            $surat->update([
                'tanggal' => $data['tanggal'],
                'kepada' => $data['kepada'],
                'keperluan' => $data['keperluan'],
                'file' => $data['file'],
                'laporan' => $data['laporan'],
            ]);

            return redirect()->route('surat-keluar');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    function destroy(Surat $surat) {
        if (isset($surat->file)) {
            Storage::disk('public')->delete($surat->file);
        }
        if (isset($surat->laporan)) {
            Storage::disk('public')->delete($surat->laporan);
        }
        $surat->delete();
        return redirect()->route('surat-keluar');
    }
}

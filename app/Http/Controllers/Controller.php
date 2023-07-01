<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function __invoke(Surat $surat)
    {
        $file = $surat->file;
        return view('pages.preview', [
            'file' => $file
        ]);
    }
    
    function disposisi(Surat $surat) {
        return view('pages.preview', [
            'file' => $surat->disposisi
        ]);
    }
    
    function laporan(Surat $surat) {
        return view('pages.preview', [
            'file' => $surat->laporan
        ]);
    }
}

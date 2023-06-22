<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $dari_tanggal = $filters['dari_tanggal'] ?? null;
        $sampai_tanggal = $filters['sampai_tanggal'] ?? null;
        $jenis = $filters['jenis'] ?? null;

        $query->when($jenis, function($query) use ($dari_tanggal, $sampai_tanggal, $jenis) {
                return $query->where('category_id', $jenis)
                ->whereBetween('tanggal' , [$dari_tanggal,$sampai_tanggal]);
        });

    }
}

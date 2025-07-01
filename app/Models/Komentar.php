<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komentar extends Model
{
    use HasFactory;
     protected $table = 'komentar';
    protected $fillable = [
        'isi_komentar',
        'user_id',
        'artikels_id',
        'tanggal_komentar',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, "user_id");
    }
    public function artikel(): BelongsTo
    {
        return $this->belongsTo(Artikels::class, "artikels_id");
    }
}

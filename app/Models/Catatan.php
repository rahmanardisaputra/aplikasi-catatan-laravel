<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    //
    protected $table = 'catatan';
    protected $fillable = ['judul', 'isi', 'lampiran', 'user_id','is_archived'];

    public function user()
    {
        return $this->belongsTo(User::class);
        ff
    }

}

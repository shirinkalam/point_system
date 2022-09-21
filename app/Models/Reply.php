<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    const XP = 2 ;

    protected $fillable = [
        'user_id',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreateAtAttribute($value)
    {
        $time =new Verta($value);

        return $time->formatDifference();
    }
}

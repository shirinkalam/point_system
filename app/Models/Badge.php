<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'required_number',
        'type',
        'icon_url',
    ];

    public function scopeXp($query)
    {
        $query->where('type',0);
    }

    public function scopeTopic($query)
    {
        $query->where('type',1);
    }

    public function scopeReply($query)
    {
        $query->where('type',2);
    }
}

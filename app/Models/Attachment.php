<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id', 'filePath', 'space_id', 'user_id'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}

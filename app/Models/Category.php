<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";

    protected $fillable = [
        'id',
        'id_user',
        'tc_title',
    ];
    public function userItem()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}

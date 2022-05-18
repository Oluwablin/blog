<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RSS extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [''];

    protected $fillable = [
        'guid', 
        'author',
        'title', 
        'description',
        'user_id',
        'link',
        'published_at',
    ];

    //RSS feed relationship with Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

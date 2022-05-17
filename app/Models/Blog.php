<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [''];

    protected $fillable = [
        'title', 
        'description',
        'user_id',
    ];

    //Blog relationship with Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

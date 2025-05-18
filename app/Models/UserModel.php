<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticable;

class UserModel extends Authenticable
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
    ];

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(DosenModel::class, 'id', 'user_id');
    }
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(MahasiswaModel::class, 'id', 'user_id');
    }


}

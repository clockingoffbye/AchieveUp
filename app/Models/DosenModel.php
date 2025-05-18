<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $primaryKey = 'id_dsn';

    protected $fillable = [
        'nidn',
        'program_studi',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'program_studi', 'id');
    }

}

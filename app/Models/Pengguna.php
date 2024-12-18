<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Model
{
    use SearchableTrait;
    use HasFactory;

    protected $searchable = [
        'columns' => [
            'penggunas.nama' => 1,
            'penggunas.id_pengguna' => 10,
        ],
    ];
    protected $guarded = [];
    protected $primaryKey = 'id_pengguna';
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'id_pengguna', 'id_pengguna');
    }
}

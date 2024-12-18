<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class Order extends Model
{
    use SearchableTrait;
    use HasFactory;

    protected $searchable = [
        'columns' => [
            'penggunas.nama' => 1,
            'penggunas.id_pengguna' => 10,
            'packages.nama_paket' => 2,
        ],
        'joins' => [
            'penggunas' => ['penggunas.id_pengguna','orders.id_pengguna'],
            'packages' => ['packages.id_package','packages.id_package'],
        ],
    ];
    protected $guarded = [];
    protected $primaryKey = 'id_order';

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'id_package', 'id_package');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_order', 'id_order');
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'id_order', 'id_order');
    }
}

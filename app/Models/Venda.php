<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto_id',
        'quantidade',
        'horario_venda',
    ];

    public function produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
        
    }
}

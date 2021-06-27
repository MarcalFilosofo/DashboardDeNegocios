<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\EstatisticaProduto;
use App\Models\Venda;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco_venda',
        'descricao',
        'user_id',
    ];

    public function estatistica()
    {
        return $this->hasOne(EstatisticaProduto::class, 'id', 'produto_id');
    }

    public function vendas()
    {
        return $this->belongsTo(Venda::class, 'id', 'produto_id');
    }
}

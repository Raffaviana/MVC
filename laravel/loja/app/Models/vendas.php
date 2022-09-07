<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendas extends Model
{
    use HasFactory;

    protected $fillable = ['id',
                            'cliente_id',
                            'vendedor_id',
                            'data_da_venda',];

    protected $table = 'vendas';

    public function comprador()
    {
        return $this->belongsTo( clientes::class, 'clientes_id');
    }

    public function vendedor()
    {
        return $this->belongsTo( vendedores::class, 'vendedor_id');
    }
}

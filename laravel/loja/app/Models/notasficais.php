<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notasficais extends Model
{
    use HasFactory;

    protected $fillable = ['id',
                            'venda_id',
                            'valor',
                            'imposto'];

    protected $table = 'notasficais';
}

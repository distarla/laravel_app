<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fornecedor extends Model
{
    use SoftDeletes;
    
    protected $table='fornecedores';

    protected $fillable=['nome','site','email','pais'];
}

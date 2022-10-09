<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siteContacto extends Model
{
    //
    protected $fillable=['nome','telefone','email','motivo_id','mensagem'];
}

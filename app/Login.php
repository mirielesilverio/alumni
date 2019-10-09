<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';

    public $timestamps = false;
    
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = [
        'email',
        'senha',
        'idTipoUsuario'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';

    public $timestamps = false;
    
    protected $primaryKey = 'prontuario';

    protected $guarded = ['prontuario'];

    protected $fillable = [
        'idCurso',
        'idCampus',
        'idStatusFormacao',
        'cpfAluno'
    ];
}

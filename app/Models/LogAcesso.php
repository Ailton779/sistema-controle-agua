<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    protected $table = 'logs_acesso';
    protected $fillable = ['user_id', 'consumidor_id', 'acao'];
}

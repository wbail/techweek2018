<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'titulo',
        'descricao'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
    
    public function user()
    {
        return $this->belongsToMany(User::class, 'usuario_tarefas')
            ->withPivot('data_inicio', 'data_entrega')
            ->withTimestamps();
    }
}

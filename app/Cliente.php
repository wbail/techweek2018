<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nome',
        'documento',
        'email'
    ];

    public function projeto()
    {
        return $this->hasMany(Projeto::class);
    }
}

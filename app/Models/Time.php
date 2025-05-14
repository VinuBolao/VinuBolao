<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'nome_completo', 'sigla', 'escudo', 'estadio', 'estado', 'pais'];

    public $order = "nome ASC, nome_completo ASC";

    protected $appends = ['escudo_url'];

    protected function escudoUrl(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attr) => $attr['escudo'],
        );
    }

    public function rules()
    {
        return [
            "nome" => "required|min:3|max:50",
            "nome_completo" => "required|min:3|max:100",
            "sigla" => "required|min:3|max:3",
            "estadio" => "required|min:3|max:70",
            "estado" => "required|min:2|max:2",
            "pais" => "required|min:3|max:50",
        ];
    }
}

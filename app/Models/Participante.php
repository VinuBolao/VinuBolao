<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Participante extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bolao_id'];

    protected $guarded = ['id'];

    protected $appends = ['created_format'];

    protected function createdFormat(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => Carbon::createFromFormat('Y-m-d H:i:s', $attr['created_at'])->format('d/m/Y'),
        );
    }

    public function rules()
    {
        return [
            "user_id" => "required|exists:users,id",
            "bolao_id" => "required|exists:bolaos,id",
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bolao()
    {
        return $this->belongsTo(Bolao::class, 'bolao_id', 'id');
    }

    public function getByBolao($id)
    {
        return $this->join('users', 'users.id', '=', 'user_id')
            ->where('bolao_id', $id)
            ->orderBy('users.name')
            ->get();
    }

    public function getRanking($campeonato_id, $rodada = null, $turno = null)
    {
        $inicio = 1;
        $fim = 38;

        if ($turno == 1) $fim = 19;
        if ($turno == 2) $inicio = 20;
        if ($rodada) {$inicio = $rodada;$fim = $rodada;}

        return DB::select('CALL pr_classificacao(?, ?, ?)', [$campeonato_id, $inicio, $fim]);
    }
}

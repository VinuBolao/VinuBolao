<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RankingService
{
    public function getRanking(int $campeonatoId, ?int $rodada = null, ?int $turno = null): array
    {
        [$inicio, $fim] = $this->definirIntervaloRodadas($rodada, $turno);

        $ranking = DB::table('palpites as p')
            ->join('jogos as j', 'j.id', '=', 'p.jogo_id')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->join('bolaos as b', 'b.campeonato_id', '=', 'j.campeonato_id')
            ->whereNotNull('j.placar_casa')
            ->whereNotNull('j.placar_fora')
            ->whereNotNull('p.palpite_casa')
            ->whereNotNull('p.palpite_fora')
            ->when($campeonatoId > 0, function ($query) use ($campeonatoId) {
                $query->where('j.campeonato_id', $campeonatoId);
            })
            ->whereBetween('j.rodada', [$inicio, $fim])
            ->select([
                'u.id',
                'u.name',

                DB::raw("
                    SUM(
                        CASE
                            WHEN j.placar_casa = p.palpite_casa
                             AND j.placar_fora = p.palpite_fora
                            THEN 1
                            ELSE 0
                        END
                    ) AS placarexato
                "),

                DB::raw("
                    SUM(
                        CASE
                            WHEN j.placar_casa = p.palpite_casa
                             AND j.placar_fora = p.palpite_fora
                            THEN 0

                            WHEN (j.placar_casa - j.placar_fora) = 0
                             AND (p.palpite_casa - p.palpite_fora) = 0
                            THEN 1

                            WHEN (j.placar_casa - j.placar_fora) > 0
                             AND (p.palpite_casa - p.palpite_fora) > 0
                            THEN 1

                            WHEN (j.placar_casa - j.placar_fora) < 0
                             AND (p.palpite_casa - p.palpite_fora) < 0
                            THEN 1

                            ELSE 0
                        END
                    ) AS placarvencedor
                "),

                DB::raw("
                    SUM(
                        CASE
                            WHEN j.rodada >= COALESCE(b.rodada_dobro, 999999) THEN
                                CASE
                                    WHEN j.placar_casa = p.palpite_casa
                                     AND j.placar_fora = p.palpite_fora
                                    THEN b.placar_exato * 2

                                    WHEN (j.placar_casa - j.placar_fora) = 0
                                     AND (p.palpite_casa - p.palpite_fora) = 0
                                    THEN b.placar_vencedor * 2

                                    WHEN (j.placar_casa - j.placar_fora) > 0
                                     AND (p.palpite_casa - p.palpite_fora) > 0
                                    THEN b.placar_vencedor * 2

                                    WHEN (j.placar_casa - j.placar_fora) < 0
                                     AND (p.palpite_casa - p.palpite_fora) < 0
                                    THEN b.placar_vencedor * 2

                                    ELSE 0
                                END
                            ELSE
                                CASE
                                    WHEN j.placar_casa = p.palpite_casa
                                     AND j.placar_fora = p.palpite_fora
                                    THEN b.placar_exato

                                    WHEN (j.placar_casa - j.placar_fora) = 0
                                     AND (p.palpite_casa - p.palpite_fora) = 0
                                    THEN b.placar_vencedor

                                    WHEN (j.placar_casa - j.placar_fora) > 0
                                     AND (p.palpite_casa - p.palpite_fora) > 0
                                    THEN b.placar_vencedor

                                    WHEN (j.placar_casa - j.placar_fora) < 0
                                     AND (p.palpite_casa - p.palpite_fora) < 0
                                    THEN b.placar_vencedor

                                    ELSE 0
                                END
                        END
                    ) AS pontosganhos
                "),
            ])
            ->groupBy('u.id', 'u.name')
            ->orderByDesc('pontosganhos')
            ->orderByDesc('placarexato')
            ->orderByDesc('placarvencedor')
            ->orderBy('u.name')
            ->get();

        return $ranking->map(function ($item, $index) {
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
                'posicao' => $index + 1,
                'placarexato' => (int) $item->placarexato,
                'placarvencedor' => (int) $item->placarvencedor,
                'pontosganhos' => (int) $item->pontosganhos,
            ];
        })->toArray();
    }

    private function definirIntervaloRodadas(?int $rodada = null, ?int $turno = null): array
    {
        $inicio = 1;
        $fim = 38;

        if ($turno == 1) {
            $fim = 19;
        }

        if ($turno == 2) {
            $inicio = 20;
        }

        if ($rodada) {
            $inicio = $rodada;
            $fim = $rodada;
        }

        return [$inicio, $fim];
    }
}

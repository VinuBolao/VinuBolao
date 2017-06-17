<template>
    <div>
        <div class="col-sm-12 box">
            <h2>Jogos</h2>
            <p>teste</p>
        </div>

        <div class="col-sm-12 box">
            <div class="btn-group" role="group">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="infoCampeonato">Campeonato:</label>
                        <select id="infoCampeonato" class="form-control">
                            <option v-for="campeonato in campeonatos" :value="campeonato.id">{{ campeonato.nome_completo }}</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getJogosCampeontato(1, rodada - 1);">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default">
                    {{ rodada }}ª Rodada
                </button>
                <button type="button" class="btn btn-default" @click="getJogosCampeontato(1, rodada + 1);">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </button>
            </div>
        </div>

        <div class="col-sm-12 box" v-if="jogos.length > 0">
            <table class="table table-striped">
                <tr class="tr-head">
                    <th>status</th>
                    <th colspan="3" class="text-center">Jogos</th>
                    <th class="hidden-xs">Horário | Estádio</th>
                </tr>
                <tr v-for="(jogo, key) in jogos">
                    <td>{{ (jogo.placar_casa === null && jogo.placar_fora === null) ? 'X' : 'OK' }}</td>
                    <td class="text-right">
                        {{ jogo.timecasa.nome }}
                    </td>
                    <td class="td-jogo">
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_casa === null" v-model="placar[key].casa">
                        <strong class="placar-casa" v-else>{{ jogo.placar_casa }}</strong>
                        x
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_fora === null" v-model="placar[key].fora" @blur="updatedJogos(jogo, key);">
                        <strong class="placar-fora" v-else>{{ jogo.placar_fora }}</strong>
                    </td>
                    <td class="text-left">
                        {{ jogo.timefora.nome }}
                    </td>
                    <td class="hidden-xs">
                        {{ jogo.inicio|moment('HH:mm DD/MM/YY') }} | {{ jogo.timecasa.estadio }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-12 box" v-if="jogos.length == 0">
            <div class="alert alert-danger">
                <p class="text-center">Não existe dados para listar!</p>
            </div>
        </div>
    </div>
</template>

<style>
    .tr-head {
        background-color: #666;
        color: #fff;
    }
    .input-placar {
        width: 35px;
    }
    .td-jogo {
        width: 100px;
        text-align: center;
    }
    .placar-casa, .placar-fora {
        font-size: 20px;
    }
    .placar-casa {
        padding-right: 11px;
    }
    .placar-fora {
        padding-left: 10px;
    }
</style>

<script>
    export default {
        data() {
            return {
                placar: [
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null },
                    { casa: null, fora: null }
                ],
                jogos: [],
                rodada: 1,
                campeonatoId: 1,
                campeonatos: []
            }
        },
        mounted() {
            this.getCampeontatos();
            this.getJogosCampeontato(1, this.rodada);
        },
        methods: {
            getJogosCampeontato(id, rodada) {
                this.$http.get('/api/jogo/get_campeonato/' + id + '/' + rodada).then((response) => {
                    this.jogos = response.data;
                    this.rodada = rodada;
                }).catch((error) => {
                    console.error('!Get JogosCampeonato', error);
                });
            },

            getCampeontatos() {
                this.$http.get('/api/campeonato/get').then((response) => {
                    this.campeonatos = response.data;
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            updatedJogos(jogo, key) {
                jogo.placar_casa = this.placar[key].casa;
                jogo.placar_fora = this.placar[key].fora;

                this.$http.post('/api/jogo/save', jogo).then((response) => {
                    console.log(response.data);
                }).catch((error) => {
                    this.getJogosCampeontato(1, this.rodada);
                    console.error('!Get Campeonatos', error);
                });
            }
        }
    }
</script>

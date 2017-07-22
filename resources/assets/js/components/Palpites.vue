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
    .glyphicon.glyphicon-remove {
        color: #d9534f;
    }
    .glyphicon.glyphicon-ok {
        color: #398439;
    }
    .dropdown-rodada-ol{
        left: -39px;
        min-width: 170px;
        height: 150px;
        overflow-y: auto;
    }
    .dropdown-rodada-li{
        display: inline-table;
        border: 1px solid #cccecf;
        width: 30%;
        margin-left: 4px;
        margin-bottom: 5px;
        padding: 0;
        font-size: 14px;
        border-radius: 2px;
    }
    .dropdown-rodada-a {
        padding: 5px !important;
        text-align: center;
    }
</style>

<template>
    <div>
        <div class="col-sm-12 box">
            <div class="btn-group" role="group">
                <form class="form-inline">
                    <div class="form-group">
                        <select id="infoCampeonato" class="form-control" v-model="campeonato.id" @change="getPalpites(campeonato.id, rodada);">
                            <option v-for="campeonato in campeonatos" :value="campeonato.id">{{ campeonato.nome_completo }}</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getPalpites(campeonato.id, rodada - 1);">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ rodada }}ª Rodada
                    </button>
                    <ol class="dropdown-menu dropdown-rodada-ol">
                        <li class="dropdown-rodada-li" v-for="n in 38">
                            <a @click="getPalpites(campeonato.id, n);" class="dropdown-rodada-a">{{ n }}ª</a>
                        </li>
                    </ol>
                </div>
                <button type="button" class="btn btn-default" :disabled="rodada >= campeonato.qtd_rodada" @click="getPalpites(campeonato.id, rodada + 1);">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="col-sm-12 box">
            <table class="table" v-if="jogos.length > 0">
                <tr class="tr-head">
                    <th class="text-center">Status</th>
                    <th colspan="3" class="text-center">Palpites</th>
                    <th class="text-center">Editar</th>
                </tr>
                <tr v-for="(jogo, key) in jogos">
                    <td class="text-center">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" v-if="jogo.placar_casa === null && jogo.placar_fora === null"></span>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true" v-else></span>
                    </td>
                    <td class="text-right">
                        <span class="hidden-sm hidden-xs">{{ jogo.timecasa.nome }}</span>
                        <span class="hidden-md hidden-lg">{{ jogo.timecasa.sigla }}</span>
                    </td>
                    <td class="td-jogo">
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_casa === null" v-model="jogo.palpite.casa" @blur="savePalpite(jogo);">
                        <strong class="placar-casa" v-else>{{ jogo.placar_casa }}</strong>
                        x
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_fora === null" v-model="jogo.palpite.fora" @blur="savePalpite(jogo);">
                        <strong class="placar-fora" v-else>{{ jogo.placar_fora }}</strong>
                    </td>
                    <td class="text-left">
                        <span class="hidden-sm hidden-xs">{{ jogo.timefora.nome }}</span>
                        <span class="hidden-md hidden-lg">{{ jogo.timefora.sigla }}</span>
                    </td>
                    <td class="text-center">
                        <a href="" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null" @click.prevent="savePalpite(jogo, true)">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null"></span>
                        </a>
                    </td>
                </tr>
            </table>
            <div class="alert alert-danger" v-if="jogos.length == 0">
                <p class="text-center">Não existe dados para listar!</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                jogos: [],
                rodada: 1,
                bolaoId: 1,
                palpites: [],
                campeonatos: [],
                campeonato: {}
            }
        },
        mounted() {
            this.getCampeontatos();
        },
        methods: {
            getCampeontatos(id) {
                const param = (id) ? '/' + id : '';
                this.$http.get('/api/campeonato/get' + param).then((response) => {
                    if(id){
                        this.campeonato = response.data;
                    } else {
                        this.campeonatos = response.data;
                        this.campeonato = this.campeonatos[0];
                        this.rodada = this.campeonato.rodada;

                        this.getPalpites(this.campeonato.id, this.rodada);
                    }
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            getPalpites(campeonatoId, rodada) {
                this.$http.get('/api/palpite/get_palpites/' + campeonatoId + '/' + rodada).then((response) => {
                    response.data.forEach(function (jogo) {
                        jogo.palpite = {
                            casa: null,
                            fora: null
                        }
                    });

                    this.jogos = response.data;
                    this.rodada = rodada;
                }).catch((error) => {
                    console.error('!Get JogosCampeonato', error);
                });
            },

            savePalpite(jogo, edit) {
                if( (edit) || (jogo.palpite.casa !== null && jogo.palpite.fora !== null) ){
                    jogo.placar_casa = (jogo.placar_casa === null) ? jogo.palpite.casa : null;
                    jogo.placar_fora = (jogo.placar_fora === null) ? jogo.palpite.fora : null;

                    this.$http.post('/api/palpite/save', jogo).then((response) => {
                        this.getPalpites(this.campeonato.id, this.rodada);
                    }).catch((error) => {
                        console.error('!Save Palpite', error);
                    });
                }
            }
        }
    }
</script>

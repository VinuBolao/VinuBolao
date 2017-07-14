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
    }
    .dropdown-rodada-li{
        display: inline-table;
        border: 1px solid #cccecf;
        width: 30%;
        margin-left: 2.5px;
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
                        <select id="infoCampeonato" class="form-control" v-model="campeonato.id" @change="getJogosCampeontato(campeonato.id, 1);">
                            <option v-for="campeonato in campeonatos" :value="campeonato.id">{{ campeonato.nome_completo }}</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getJogosCampeontato(campeonato.id, rodada - 1);">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ rodada }}ª Rodada
                    </button>
                    <ol class="dropdown-menu dropdown-rodada-ol">
                        <li class="dropdown-rodada-li" v-for="n in 38">
                            <a href="#" class="dropdown-rodada-a">{{ n }}ª</a>
                        </li>
                    </ol>
                </div>
                <button type="button" class="btn btn-default" :disabled="rodada >= campeonato.qtd_rodada" @click="getJogosCampeontato(campeonato.id, rodada + 1);">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </button>
            </div>
        </div>

        <div class="col-sm-12 box" v-if="jogos.length > 0">
            <table class="table table-hover">
                <tr class="tr-head">
                    <th class="text-center">Status</th>
                    <th colspan="3" class="text-center">Jogos</th>
                    <th class="hidden-xs">Horário | Estádio</th>
                    <th class="text-center">Editar</th>
                </tr>
                <tr v-for="(jogo, key) in jogos">
                    <td class="text-center">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" v-if="jogo.placar_casa === null && jogo.placar_fora === null"></span>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true" v-else></span>
                    </td>
                    <td class="text-right">
                        {{ jogo.timecasa.nome }}
                    </td>
                    <td class="td-jogo">
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_casa === null" v-model="jogo.placar_real_casa" @blur="updatedPlacar(jogo);">
                        <strong class="placar-casa" v-else>{{ jogo.placar_casa }}</strong>
                        x
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_fora === null" v-model="jogo.placar_real_fora" @blur="updatedPlacar(jogo);">
                        <strong class="placar-fora" v-else>{{ jogo.placar_fora }}</strong>
                    </td>
                    <td class="text-left">
                        {{ jogo.timefora.nome }}
                    </td>
                    <td class="hidden-xs">
                        {{ jogo.inicio|moment('HH:mm DD/MM/YY') }} | {{ jogo.timecasa.estadio }}
                    </td>
                    <td class="text-center">
                        <a href="" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null" @click.prevent="updatedPlacar(jogo, jogo.id)">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
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

<script>
    export default {
        data() {
            return {
                jogos: [],
                rodada: 1,
                campeonato: { id: 1 },
                campeonatos: []
            }
        },
        mounted() {
            this.getCampeontatos();
            this.getJogosCampeontato(this.campeonato.id, this.rodada);
        },
        methods: {
            getCampeontatos(id) {
                let param = (id) ? '/' + id : '';
                this.$http.get('/api/campeonato/get' + param).then((response) => {
                    if(id){
                        this.campeonato = response.data;
                    } else {
                        this.campeonatos = response.data;
                    }
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            getJogosCampeontato(id, rodada) {
                this.$http.get('/api/jogo/get_campeonato/' + id + '/' + rodada).then((response) => {
                    response.data.forEach(function (jogo) {
                        jogo.placar_real_casa = null;
                        jogo.placar_real_fora = null;
                    });
                    this.jogos = response.data;
                    this.rodada = rodada;
                    this.getCampeontatos(id);
                }).catch((error) => {
                    console.error('!Get JogosCampeonato', error);
                });
            },

            updatedPlacar(jogo, id) {
                if( (id) || (jogo.placar_real_casa !== null && jogo.placar_real_fora !== null) ){
                    jogo.placar_casa = (id >= 0) ? null : jogo.placar_real_casa;
                    jogo.placar_fora = (id >= 0) ? null : jogo.placar_real_fora;

                    this.$http.post('/api/jogo/update', jogo).then((response) => {
                        console.log(response.data);
                    }).catch((error) => {
                        this.getJogosCampeontato(this.campeonato.id, this.rodada);
                        console.error('!Get Update Jogo', error);
                    });
                }
            }
        }
    }
</script>

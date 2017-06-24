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
        </div>

        <div class="col-sm-6 box" v-if="jogos.length > 0">
            <div class="row">
                <div class="btn-group col-xs-5" role="group">
                    <div class="form-group">
                        <select class="form-control" v-model="participante.id" @change="getParticipantesBolao(bolaoId);">
                            <option v-for="participante in participantes" :value="participante.id">{{ participante.user.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getPalpitesCampeontato(campeonato.id, rodada - 1);">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default">
                        {{ rodada }}ª Rodada
                    </button>
                    <button type="button" class="btn btn-default" :disabled="rodada >= campeonato.rodada" @click="getPalpitesCampeontato(campeonato.id, rodada + 1);">
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

            <table class="table">
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
                        {{ jogo.timecasa.nome }}
                    </td>
                    <td class="td-jogo">
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_casa === null" v-model="jogo.palpite.casa" @blur="savePalpite(jogo);">
                        <strong class="placar-casa" v-else>{{ jogo.placar_casa }}</strong>
                        x
                        <input class="input-placar" type="number" min="0" v-if="jogo.placar_fora === null" v-model="jogo.palpite.fora" @blur="savePalpite(jogo);">
                        <strong class="placar-fora" v-else>{{ jogo.placar_fora }}</strong>
                    </td>
                    <td class="text-left">
                        {{ jogo.timefora.nome }}
                    </td>
                    <td class="text-center">
                        <a href="" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null" @click.prevent="savePalpite(jogo, true)">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null"></span>
                        </a>
                    </td>
                </tr>
            </table>
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
                campeonatos: [],
                participantes: [],
                campeonato: { id: 1 },
                participante: { id: this.user }
            }
        },
        props: ['user'],
        mounted() {
            this.getCampeontatos();
            this.getPalpitesCampeontato(this.campeonato.id, this.rodada);
            this.getParticipantesBolao(this.bolaoId);
        },
        methods: {
            getCampeontatos(id) {
                const param = (id) ? '/' + id : '';
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

            getPalpitesCampeontato(id, rodada) {
                this.$http.get('/api/palpite/get_campeonato/' + id + '/' + rodada).then((response) => {
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

            getParticipantesBolao(id) {
                this.$http.get('/api/participante/get_bolao/' + id).then((response) => {
                    this.participantes = response.data;
                }).catch((error) => {
                    console.error('!Get Participantes Bolao', error);
                });
            },

            savePalpite(jogo, edit) {
                if( (edit) || (jogo.palpite.casa !== null && jogo.palpite.fora !== null) ){
                    jogo.placar_casa = (jogo.placar_casa === null) ? jogo.palpite.casa : null;
                    jogo.placar_fora = (jogo.placar_fora === null) ? jogo.palpite.fora : null;

                    this.$http.post('/api/palpite/save', jogo).then((response) => {
                        console.log(response.data);
                    }).catch((error) => {
                        console.error('!Get Create Palpite', error);
                    });

                    this.getPalpitesCampeontato(this.campeonato.id, this.rodada);
                }
            }
        }
    }
</script>

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
            <div class="btn-group" role="group">
                <form class="form-inline">
                    <div class="form-group">
                        <select class="form-control" v-model="participante.id" @change="getParticipantesBolao(bolaoId);">
                            <option v-for="participante in participantes" :value="participante.id">{{ participante.user.name }}</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getJogosCampeontato(campeonato.id, rodada - 1);">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default">
                    {{ rodada }}ª Rodada
                </button>
                <button type="button" class="btn btn-default" :disabled="rodada >= campeonato.rodada" @click="getJogosCampeontato(campeonato.id, rodada + 1);">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </button>
            </div>
            <table class="table">
                <tr class="tr-head">
                    <th class="text-center">Status</th>
                    <th colspan="3" class="text-center">Palpites</th>
                    <th class="text-center">Editar</th>
                </tr>
                <tr v-for="(jogo, key) in jogos">
                    <td class="text-center">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td class="text-right">
                        {{ jogo.timecasa.nome }}
                    </td>
                    <td class="td-jogo">
                        <input class="input-placar" type="number" min="0">
                        x
                        <input class="input-placar" type="number" min="0">
                    </td>
                    <td class="text-left">
                        {{ jogo.timefora.nome }}
                    </td>
                    <td class="text-center">
                        <a href="">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
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
                palpites: [],
                campeonatos: [],
                participantes: [],
                campeonato: { id: 1 },
                participante: { id: this.user }
            }
        },
        props: ['user'],
        mounted() {
            this.mountedData(this.bolaoId, this.campeonato.id, this.rodada);
            this.getCampeontatos();
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
                    this.jogos = response.data;
                }).catch((error) => {
                    console.error('!Get JogosCampeonato', error);
                });
            },

            getPalpitesCampeontato(id) {
                this.$http.get('/api/palpite/get').then((response) => {
                    this.palpites = response.data;
                }).catch((error) => {
                    console.error('!Get PalpitesCampeontato', error);
                });
            },

            getParticipantesBolao(id) {
                this.$http.get('/api/participante/get_bolao/' + id).then((response) => {
                    this.participantes = response.data;
                }).catch((error) => {
                    console.error('!Get Participantes Bolao', error);
                });
            },

            updatedPlacar(jogo, key) {
                jogo.placar_casa = (key >= 0) ? this.placar[key].casa : null;
                jogo.placar_fora = (key >= 0) ? this.placar[key].fora : null;

                this.$http.post('/api/jogo/update', jogo).then((response) => {
                    console.log(response.data);
                }).catch((error) => {
                    this.getJogosCampeontato(this.campeonato.id, this.rodada);
                    console.error('!Get Update Jogo', error);
                });
            },

            mountedData(bolaoId, campeonatoId, rodada) {
                this.getJogosCampeontato(campeonatoId, rodada);
                this.getParticipantesBolao(bolaoId);
                this.getPalpitesCampeontato(campeonatoId);
                console.log(this.jogos);
            }
        }
    }
</script>

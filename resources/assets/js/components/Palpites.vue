<template>
    <div>
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
        <div class="col-sm-6 box" v-if="jogos.length > 0">
            <div>
                <table class="table table-striped">
                    <tr style="background-color: #666; color: #fff;">
                        <th class="text-center" colspan="4">
                            <form class="form-inline" style="padding: 3px;">
                                <div class="form-group">
                                    <label for="infoParticipante">Participantes:</label>
                                    <select id="infoParticipante" class="form-control input-sm">
                                        <option v-for="participante in participantes" :value="participante.user_id">
                                            {{ participante.user.name }}
                                        </option>
                                    </select>
                                </div>
                            </form>
                        </th>
                    </tr>
                    <tr v-for="jogo in jogos">
                        <td class="text-right">
                            {{ jogo.timecasa.nome }}
                        </td>
                        <td style="width: 101px; padding-left: 8px">
                            <input name="jogo[][palpite_casa]" type="number" min="0" style="width: 35px;">
                            x
                            <input name="jogo[][palpite_fora]" type="number" min="0" style="width: 35px;">
                        </td>
                        <td class="text-left">
                            {{ jogo.timefora.nome }}
                        </td>
                        <td>
                            {{ jogo.inicio|moment('HH:mm DD/MM/Y') }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-sm-6 box" v-if="jogos.length > 0">
            <div>
                <table class="table table-striped">
                    <tr style="background-color: #666; color: #fff;">
                        <th class="text-center" colspan="4">
                            <form class="form-inline" style="padding: 3px;">
                                <div class="form-group">
                                    <label for="infoParticipante">Participantes:</label>
                                    <select id="infoParticipante" class="form-control input-sm">
                                        <option v-for="participante in participantes" :value="participante.user_id">
                                            {{ participante.user.name }}
                                        </option>
                                    </select>
                                </div>
                            </form>
                        </th>
                    </tr>
                    <tr v-for="jogo in jogos">
                        <td class="text-right">
                            {{ jogo.timecasa.nome }}
                        </td>
                        <td style="width: 101px; padding-left: 8px">
                            <input name="jogo[][palpite_casa]" type="number" min="0" style="width: 35px;">
                            x
                            <input name="jogo[][palpite_fora]" type="number" min="0" style="width: 35px;">
                        </td>
                        <td class="text-left">
                            {{ jogo.timefora.nome }}
                        </td>
                        <td>
                            {{ jogo.inicio|moment('HH:mm DD/MM/Y') }}
                        </td>
                    </tr>
                </table>
            </div>
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
                campeonatos: [],
                campeonatoId: 1,
                participantes: []
            }
        },
        mounted() {
            this.getCampeontatos();
            this.getParticipantesBolao(1);
            this.getJogosCampeontato(1, this.rodada);
        },
        methods: {
            getParticipantesBolao(id) {
                this.$http.get('/api/participante/get_bolao/' + id).then((response) => {
                    this.participantes = response.data;
                }).catch((error) => {
                    console.error('!Get Participante', error);
                });
            },

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
            }
        }
    }
</script>

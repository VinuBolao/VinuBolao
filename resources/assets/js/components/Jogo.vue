<template>
    <div>
        <div class="col-sm-12 box" v-if="!user && jogos.length == 0">
            <div class="alert alert-danger">
                <p class="text-center">Não existe dados para listar!</p>
            </div>
        </div>
        <div v-else="">
            <div class="col-sm-12 box">
                <div class="btn-group btn-rodada" role="group">
                    <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getJogosCampeontato(campeonato.id, rodada - 1);">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ rodada }}ª Rodada <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu dropdown-rodada">
                            <div class="flex-container">
                                <div class="flex-items" v-for="n in campeonato.qtd_rodadas">
                                    <a @click="getJogosCampeontato(campeonato.id, n);" class="dropdown-rodada-a">{{ n }}ª</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" :disabled="rodada >= campeonato.qtd_rodada" @click="getJogosCampeontato(campeonato.id, rodada + 1);">
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

            <div class="col-sm-12 box" v-if="dataLoading">
                <i class="glyphicon glyphicon-refresh"></i> Loading...
            </div>

            <div v-if="!dataLoading">
                <div class="col-sm-12 box">
                    <div v-if="saveLoading" style="margin-bottom: 5px;">
                        <i class="glyphicon glyphicon-refresh"></i> Loading...
                    </div>

                    <div class="col-sm-12">
                        <div class="row table-head">
                            <div class="col-xs-1 col-sm-1 table-td text-center">
                                <strong>Status</strong>
                            </div>
                            <div class="col-xs-9 col-sm-6 col-md-5 table-td td-divisor">
                                <strong>Jogos</strong>
                            </div>
                            <div class="hidden-xs col-sm-4 col-md-5 table-td">
                                <strong>Horário | Estádio</strong>
                            </div>
                            <div class="col-xs-2 col-sm-1 table-td" v-if="user.master">
                                <strong>Editar</strong>
                            </div>
                        </div>
                        <div class="row table-body" v-for="(jogo, key) in jogos">
                            <div class="col-xs-1 col-sm-1 table-td td-icons">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true" v-if="jogo.placar_casa === null && jogo.placar_fora === null"></span>
                                <span class="glyphicon glyphicon-ok" aria-hidden="true" v-else></span>
                            </div>
                            <div class="col-xs-3 col-sm-2 table-td td-mandante">
                                <strong>
                                    <span class="hidden-xs">{{ jogo.timecasa.nome }}</span>
                                    <span class="hidden-sm hidden-md hidden-lg">{{ jogo.timecasa.sigla }}</span>
                                </strong>
                            </div>
                            <div class="col-xs-4 col-sm-2 col-md-1 table-td td-divisor">
                                <input class="input-placar" type="number" min="0" :disabled="saveLoading" v-if="user.master && jogo.placar_casa === null" v-model="jogo.placar_real_casa" @blur="updatedPlacar(jogo);">
                                <span class="placar-palpite" v-else>
                                    <strong>{{ jogo.placar_casa }}</strong>
                                </span>
                                x
                                <input class="input-placar" type="number" min="0" :disabled="saveLoading" v-if="user.master && jogo.placar_fora === null" v-model="jogo.placar_real_fora" @blur="updatedPlacar(jogo);">
                                <span class="placar-palpite" v-else>
                                    <strong>{{ jogo.placar_fora }}</strong>
                                </span>
                            </div>
                            <div class="col-xs-3 col-sm-2 table-td td-visitante">
                                <strong>
                                    <span class="hidden-xs">{{ jogo.timefora.nome }}</span>
                                    <span class="hidden-sm hidden-md hidden-lg">{{ jogo.timefora.sigla }}</span>
                                </strong>
                            </div>
                            <div class="hidden-xs col-sm-4 col-md-5 table-td">
                                <strong>{{ jogo.inicio|moment('HH:mm') }}</strong>
                                {{ jogo.inicio|moment('DD/MM/YY') }}
                                | <strong>{{ jogo.timecasa.estadio }}</strong>
                            </div>
                            <div class="col-xs-1 col-sm-1 table-td td-icons" v-if="user.master">
                                <div v-show="user.master && !saveLoading">
                                    <a href="" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null" @click.prevent="updatedPlacar(jogo, jogo.id)">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: JSON.parse(this.users),
                bolao: JSON.parse(this.data_bolao),
                dataLoading: false,
                saveLoading: false,
                campeonato: {},
                rodada: null,
                jogos: []
            }
        },
        props: ['users', 'data_bolao'],
        mounted() {
            if(this.user) this.getCampeontatos(this.bolao.campeonato_id);
        },
        methods: {
            getCampeontatos(id) {
                this.dataLoading = true;
                this.$http.get('/api/campeonato/get/' + id).then((response) => {
                    this.campeonato = response.data;
                    this.rodada = this.campeonato.rodada;

                    this.getJogosCampeontato(this.campeonato.id, this.rodada);
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            getJogosCampeontato(id, rodada) {
                this.saveLoading = true;
                this.$http.get('/api/jogo/getCampeonato/' + id + '/' + rodada).then((response) => {
                    response.data.forEach(function (jogo) {
                        jogo.placar_real_casa = null;
                        jogo.placar_real_fora = null;
                    });
                    this.jogos = response.data;
                    this.rodada = rodada;

                    //Remove Loading
                    this.dataLoading = false;
                    this.saveLoading = false;
                }).catch((error) => {
                    console.error('!Get JogosCampeonato', error);
                });
            },

            updatedPlacar(jogo, id) {
                if( (id) || (jogo.placar_real_casa !== null && jogo.placar_real_fora !== null) ){
                    this.saveLoading = true;
                    jogo.placar_casa = (id >= 0) ? null : jogo.placar_real_casa;
                    jogo.placar_fora = (id >= 0) ? null : jogo.placar_real_fora;

                    jogo.userId = this.user.id;

                    this.$http.post('/api/jogo/update', jogo).then((response) => {
                        this.getJogosCampeontato(this.campeonato.id, this.rodada);
                    }).catch((error) => {
                        this.getJogosCampeontato(this.campeonato.id, this.rodada);
                        console.error('!Get Update Jogo', error);
                    });
                }
            }
        }
    }
</script>

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
                        <ol class="dropdown-menu dropdown-rodada-ol">
                            <li class="dropdown-rodada-li" v-for="n in 38">
                                <a @click="getJogosCampeontato(campeonato.id, n);" class="dropdown-rodada-a">{{ n }}ª</a>
                            </li>
                        </ol>
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
                            <div class="col-xs-2 col-sm-1 table-td">
                                <strong>Status</strong>
                            </div>
                            <div class="col-xs-8 col-sm-7 table-td">
                                <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
                                    <strong>Jogos</strong>
                                </div>
                            </div>
                            <div class="col-sm-3 table-td hidden-xs">
                                <strong>Horário | Estádio</strong>
                            </div>
                            <div class="col-xs-2 col-sm-1 table-td" v-if="user.master">
                                <strong>Editar</strong>
                            </div>
                        </div>
                        <div class="row table-body" v-for="(jogo, key) in jogos">
                            <div class="col-xs-2 col-sm-1 table-td">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true" v-if="jogo.placar_casa === null && jogo.placar_fora === null"></span>
                                <span class="glyphicon glyphicon-ok" aria-hidden="true" v-else></span>
                            </div>
                            <div class="col-xs-8 col-sm-7 table-td">
                                <div class="col-xs-3 col-sm-4 text-right">
                                    <strong>
                                        <span class="hidden-xs">{{ jogo.timecasa.nome }}</span>
                                        <span class="hidden-sm hidden-md hidden-lg">{{ jogo.timecasa.sigla }}</span>
                                    </strong>
                                </div>
                                <div class="col-xs-9 col-sm-4 td-jogo">
                                    <input class="input-placar" type="number" min="0" :disabled="saveLoading" v-if="user.master && jogo.placar_casa === null" v-model="jogo.placar_real_casa" @blur="updatedPlacar(jogo);">
                                    <strong class="placar-casa" v-else>{{ jogo.placar_casa }}</strong>
                                    x
                                    <input class="input-placar" type="number" min="0" :disabled="saveLoading" v-if="user.master && jogo.placar_fora === null" v-model="jogo.placar_real_fora" @blur="updatedPlacar(jogo);">
                                    <strong class="placar-fora" v-else>{{ jogo.placar_fora }}</strong>
                                </div>
                                <div class="col-xs-3 col-sm-4 text-left">
                                    <strong>
                                        <span class="hidden-xs">{{ jogo.timefora.nome }}</span>
                                        <span class="hidden-sm hidden-md hidden-lg">{{ jogo.timefora.sigla }}</span>
                                    </strong>
                                </div>
                            </div>
                            <div class="col-sm-3 table-td hidden-xs">
                                <strong>{{ jogo.inicio|moment('HH:mm') }}</strong>
                                {{ jogo.inicio|moment('DD/MM/YY') }}
                                | <strong>{{ jogo.timecasa.estadio }}</strong>
                            </div>
                            <div class="col-xs-2 col-sm-1 table-td" v-if="user.master">
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
                currentBolao: JSON.parse(this.bolao),
                dataLoading: false,
                saveLoading: false,
                campeonato: {},
                rodada: null,
                jogos: []
            }
        },
        props: ['users', 'bolao'],
        mounted() {
            if(this.user) this.getCampeontatos(this.currentBolao.campeonato_id);
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

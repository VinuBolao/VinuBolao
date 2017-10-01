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
                    <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getPalpites(user.id, campeonato.id, rodada - 1);">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ rodada }}ª Rodada <span class="caret"></span>
                        </button>
                        <ol class="dropdown-menu dropdown-rodada-ol">
                            <li class="dropdown-rodada-li" v-for="n in 38">
                                <a @click="getPalpites(user.id, campeonato.id, n);" class="dropdown-rodada-a">{{ n }}ª</a>
                            </li>
                        </ol>
                    </div>
                    <button type="button" class="btn btn-default" :disabled="rodada >= campeonato.qtd_rodada" @click="getPalpites(user.id, campeonato.id, rodada + 1);">
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="col-sm-12 box">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <select class="form-control" v-model="participanteId" @change="getPalpites(participanteId, campeonato.id, rodada);">
                            <option v-for="participante in participantes" :value="participante.user.id">{{ participante.user.name }}</option>
                        </select>
                    </div>
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
                            <div class="col-xs-2 col-sm-1 table-td text-center"><strong>Status</strong></div>
                            <div class="col-xs-8 col-sm-7 table-td">
                                <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4"><strong>Palpites</strong></div>
                            </div>
                            <div class="col-sm-3 table-td hidden-xs"><strong>Horário</strong></div>
                            <div class="col-xs-2 col-sm-1 table-td" v-if="user.id === participanteId"><strong>Editar</strong></div>
                        </div>
                        <div class="row table-body" v-for="(jogo, key) in jogos">
                            <div class="col-xs-2 col-sm-1 table-td">
                                <i class="glyphicon glyphicon-remove" v-if="jogo.placar_casa === null && jogo.placar_fora === null"></i>
                                <i class="glyphicon glyphicon-ok" v-else></i>
                            </div>
                            <div class="col-xs-8 col-sm-7 table-td">
                                <div class="col-xs-3 col-sm-4 text-right">
                                    <strong>
                                        <span class="hidden-xs">{{ jogo.timecasa.nome }}</span>
                                        <span class="hidden-sm hidden-md hidden-lg">{{ jogo.timecasa.sigla }}</span>
                                    </strong>
                                </div>
                                <div class="col-xs-6 col-sm-4 td-jogo">
                                    <input class="input-placar" type="number" :disabled="disableInput(jogo) == jogo.id || saveLoading" min="0" v-if="jogo.placar_casa === null && user.id === participanteId" v-model="jogo.palpite.casa" @blur="savePalpite(jogo);">
                                    <strong class="placar-casa" v-else>{{ jogo.placar_casa }}</strong>
                                    x
                                    <input class="input-placar" type="number" :disabled="disableInput(jogo) == jogo.id || saveLoading" min="0" v-if="jogo.placar_fora === null && user.id === participanteId" v-model="jogo.palpite.fora" @blur="savePalpite(jogo);">
                                    <strong class="placar-fora" v-else>{{ jogo.placar_fora }}</strong>
                                    <strong class="text-danger" v-if="disableInput(jogo) == jogo.id && jogo.placar_casa === null && user.id === participanteId">Esgotado!</strong>
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
                            <div class="col-xs-2 col-sm-1 table-td" v-if="user.id === participanteId">
                                <div v-show="(disableInput(jogo) != jogo.id) && !saveLoading">
                                    <a href="" v-if="(jogo.placar_casa !== null || jogo.placar_fora !== null)" @click.prevent="savePalpite(jogo, true)">
                                        <i class="glyphicon glyphicon-edit" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null"></i>
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
                bolao: JSON.parse(this.currentbolao),
                dataLoading: false,
                saveLoading: false,
                participanteId: null,
                participantes: [],
                campeonato: {},
                palpites: [],
                jogos: [],
                rodada: 1
            }
        },
        props: ['users', 'currentbolao'],
        mounted() {
            if(this.user) this.getCampeontatos(this.bolao.campeonato_id);
            this.getParticipantes();
        },
        methods: {
            getCampeontatos(id) {
                this.dataLoading = true;
                this.$http.get('/api/campeonato/get/' + id).then((response) => {
                    this.campeonato = response.data;
                    this.rodada = this.campeonato.rodada;

                    this.getPalpites(this.user.id, this.campeonato.id, this.rodada);

                    //Remove Loading
                    this.dataLoading = false;
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            getParticipantes() {
                this.dataLoading = true;
                this.$http.get('/api/participante/get').then((response) => {
                    this.participantes = response.data;

                    //Remove Loading
                    this.dataLoading = false;
                }).catch((error) => {
                    console.error('!Get Usuarios', error);
                });
            },

            getPalpites(userId, campeonatoId, rodada) {
                this.saveLoading = true;
                if(userId > 0 && campeonatoId > 0){
                    this.$http.get('/api/palpite/getPalpites/' + userId + '/' + campeonatoId + '/' + rodada).then((response) => {
                        response.data.forEach(function (jogo) {
                            jogo.palpite = {
                                casa: null,
                                fora: null
                            }
                        });

                        this.jogos = response.data;
                        this.rodada = rodada;
                        this.participanteId = userId;

                        //Remove Loading
                        this.dataLoading = false;
                        this.saveLoading = false;
                    }).catch((error) => {
                        console.error('!Get JogosCampeonato', error);
                    });
                }
            },

            savePalpite(jogo, edit) {
                if( (edit) || (jogo.palpite.casa !== null && jogo.palpite.fora !== null) ){
                    this.saveLoading = true;
                    jogo.placar_casa = (jogo.placar_casa === null) ? jogo.palpite.casa : null;
                    jogo.placar_fora = (jogo.placar_fora === null) ? jogo.palpite.fora : null;

                    jogo.userId = this.user.id;

                    this.$http.post('/api/palpite/save', jogo).then((response) => {
                        this.getPalpites(this.user.id, this.campeonato.id, this.rodada);

                        if(!response.data.success){
                            console.log('O jogo já comecou!');
                        }
                    }).catch((error) => {
                        console.error('!Save Palpite', error);
                    });
                }
            },

            disableInput(jogo) {
                if(moment() > moment(jogo.inicio)) {
                    return jogo.id;
                }
            }
        }
    }
</script>

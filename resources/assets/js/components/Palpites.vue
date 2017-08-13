<template>
    <div>
        <div class="col-sm-12 box" v-if="!user && jogos.length == 0">
            <div class="alert alert-danger">
                <p class="text-center">Não existe dados para listar!</p>
            </div>
        </div>
        <div v-else="">
            <div class="col-sm-12 box">
                <div class="btn-group xs-12" role="group">
                    <select id="infoCampeonato" class="form-control" v-model="campeonato.id">
                        <option v-for="campeonato in campeonatos" :value="campeonato.id">{{ campeonato.nome_completo }}</option>
                    </select>
                </div>
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
                            <div class="col-xs-2 col-sm-1 table-td"><strong>Editar</strong></div>
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
                                    <input class="input-placar" type="number" :disabled="disableInput(jogo) == jogo.id || saveLoading" min="0" v-if="jogo.placar_casa === null" v-model="jogo.palpite.casa" @blur="savePalpite(jogo);">
                                    <strong class="placar-casa" v-else>{{ jogo.placar_casa }}</strong>
                                    x
                                    <input class="input-placar" type="number" :disabled="disableInput(jogo) == jogo.id || saveLoading" min="0" v-if="jogo.placar_fora === null" v-model="jogo.palpite.fora" @blur="savePalpite(jogo);">
                                    <strong class="placar-fora" v-else>{{ jogo.placar_fora }}</strong>
                                    <strong class="text-danger" v-if="disableInput(jogo) == jogo.id && jogo.placar_casa === null">Esgotado!</strong>
                                </div>
                                <div class="col-xs-3 col-sm-4 text-left">
                                    <strong>
                                        <span class="hidden-xs">{{ jogo.timefora.nome }}</span>
                                        <span class="hidden-sm hidden-md hidden-lg">{{ jogo.timefora.sigla }}</span>
                                    </strong>
                                </div>
                            </div>
                            <div class="col-sm-3 table-td hidden-xs">
                                {{ jogo.inicio|moment('HH:mm DD/MM/YYYY') }}
                            </div>
                            <div class="col-xs-2 col-sm-1 table-td">
                                <div v-show="(disableInput(jogo) != jogo.id) && !saveLoading">
                                    <a href="" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null" @click.prevent="savePalpite(jogo, true)">
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
                dataLoading: false,
                saveLoading: false,
                user: JSON.parse(this.users),
                jogos: [],
                rodada: 1,
                palpites: [],
                campeonatos: [],
                campeonato: {}
            }
        },
        props: ['users'],
        mounted() {
            if(this.user) this.getCampeontatos();
        },
        methods: {
            getCampeontatos(id) {
                this.dataLoading = true;
                const param = (id) ? '/' + id : '';
                this.$http.get('/api/campeonato/get' + param).then((response) => {
                    if(id){
                        this.campeonato = response.data;
                    } else {
                        this.campeonatos = response.data;
                        this.campeonato = this.campeonatos[0];
                        this.rodada = this.campeonato.rodada;

                        this.getPalpites(this.user.id, this.campeonato.id, this.rodada);
                    }

                    //Remove Loading
                    this.dataLoading = false;
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            getPalpites(userId, campeonatoId, rodada) {
                this.saveLoading = true;
                this.$http.get('/api/palpite/getPalpites/' + userId + '/' + campeonatoId + '/' + rodada).then((response) => {
                    response.data.forEach(function (jogo) {
                        jogo.palpite = {
                            casa: null,
                            fora: null
                        }
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

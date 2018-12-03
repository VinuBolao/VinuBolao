<template v-html="rawHtml">
    <div id="palpites">
        <div class="col-sm-12 box" v-if="!user && jogos.length == 0">
            <div class="alert alert-danger">
                <p class="text-center">Não existe dados para listar!</p>
            </div>
        </div>
        <div v-else="">
            <div class="col-sm-12 box">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <select class="form-control" v-model="participanteId" @change="getPalpites(participanteId, campeonato.id, rodada);">
                            <option v-for="participante in participantes" :value="participante.user.id">{{ participante.user.name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 box">
                <div class="btn-group btn-rodada" role="group">
                    <button type="button" class="btn btn-default" :disabled="rodada < 2" @click="getPalpites(user.id, campeonato.id, rodada - 1);">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ rodada }}ª Rodada <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu dropdown-rodada">
                            <div class="flex-container">
                                <div class="flex-items" v-for="n in campeonato.qtd_rodadas">
                                    <a @click="getPalpites(user.id, campeonato.id, n);" class="dropdown-rodada-a">{{ n }}ª</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" :disabled="rodada >= campeonato.qtd_rodadas" @click="getPalpites(user.id, campeonato.id, rodada + 1);">
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="col-sm-12 box text-center" v-if="dataLoading">
                <i class="glyphicon glyphicon-refresh"></i> Loading...
            </div>
            <div v-if="!dataLoading">
                <div class="col-sm-12 box">
                    <div v-if="saveLoading" class="text-center loading">
                        <i class="glyphicon glyphicon-refresh"></i> Loading...
                    </div>

                    <div class="col-sm-12 table-custom">
                        <div class="row table-head">
                            <div class="td">Status</div>
                            <div class="td">Palpites</div>
                            <div class="hidden-xs td">Horário</div>
                            <div class="td" v-if="user.id === participanteId">Editar</div>
                        </div>
                        <div class="row table-body" v-for="(jogo, key) in jogos"
                             :class="{ 'bg-placarexato': jogo.palpite_status === 10, 'bg-placarvencedor': jogo.palpite_status === 7 }">

                            <div class="td">
                                <i class="glyphicon glyphicon-remove" v-if="jogo.placar_casa === null && jogo.placar_fora === null"></i>
                                <i class="glyphicon glyphicon-ok" v-else></i>
                            </div>
                            <div class="td">
                                <div class="mandante">
                                    <span class="hidden-xs hidden-sm">{{ jogo.timecasa.nome }}</span>
                                    <span class="hidden-md hidden-lg">{{ jogo.timecasa.sigla }}</span>
                                    <img :src="`/img/${jogo.timecasa.sigla}_${jogo.timecasa.estado}.png`" class="escudo-time">
                                </div>

                                <div class="placar">
                                    <div class="visible-xs horario">{{ jogo.inicio|moment('ddd DD/MM HH:mm') }}</div>

                                    <div class="numbers">
                                        <input type="number" :disabled="disableInput(jogo) == jogo.id || saveLoading" min="0"
                                               v-if="jogo.placar_casa === null && user.id === participanteId"
                                               v-model="jogo.palpite.casa">

                                        <span v-else>{{ jogo.placar_casa }}</span>
                                        x
                                        <input type="number" :disabled="disableInput(jogo) == jogo.id || saveLoading" min="0"
                                               v-if="jogo.placar_fora === null && user.id === participanteId"
                                               v-model="jogo.palpite.fora" @blur="savePalpite(jogo)">

                                        <span v-else>{{ jogo.placar_fora }}</span>
                                    </div>

                                    <strong class="text-danger" v-if="disableInput(jogo) == jogo.id && jogo.placar_casa === null && user.id === participanteId">
                                        Esgotado!
                                    </strong>
                                </div>

                                <div class="visitante">
                                    <img :src="`/img/${jogo.timefora.sigla}_${jogo.timefora.estado}.png`" class="escudo-time">
                                    <span class="hidden-xs hidden-sm">{{ jogo.timefora.nome }}</span>
                                    <span class="hidden-md hidden-lg">{{ jogo.timefora.sigla }}</span>
                                </div>
                            </div>
                            <div class="hidden-xs td">
                                <strong>{{ jogo.inicio|moment('HH:mm') }}</strong>&nbsp;
                                {{ jogo.inicio|moment('DD/MM/YY') }}&nbsp;|&nbsp;
                                <a href="" data-toggle="modal" data-target=".bs-example-modal-lg"
                                   @click.prevent="compararPalpites(jogo)">
                                    Comparar Palpites
                                </a>
                            </div>
                            <div class="td" v-if="user.id === participanteId">
                                <div v-show="(disableInput(jogo) != jogo.id) && !saveLoading">
                                    <a href="" v-if="(jogo.placar_casa !== null || jogo.placar_fora !== null)" @click.prevent="savePalpite(jogo, true)">
                                        <i class="glyphicon glyphicon-edit" v-if="jogo.placar_casa !== null || jogo.placar_fora !== null"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 box">
                    <h4><strong>Legenda</strong></h4>
                    <p>
                        <i class="glyphicon glyphicon-stop exato"></i> - Placar Exato ({{ bolao.placar_exato }} pontos),
                    </p>
                    <p>
                        <i class="glyphicon glyphicon-stop vencedor"></i> - Placar Vencedor ({{ bolao.placar_vencedor }} pontos).
                    </p>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">
                            <strong>{{ titleComparacao }}</strong>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr v-for="(item, key) in comparacao">
                                    <td>{{ key + 1 }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.palpite_casa }} x {{ item.palpite_fora }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
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
                user: this.users ? JSON.parse(this.users) : null,
                bolao: JSON.parse(this.data_bolao),
                dataLoading: false,
                saveLoading: false,
                participanteId: null,
                titleComparacao: '',
                participantes: [],
                comparacao: [],
                campeonato: {},
                palpites: [],
                jogos: [],
                rodada: 1
            }
        },
        props: ['users', 'data_bolao'],
        mounted() {
            if(this.user) this.getCampeontatos(this.bolao.campeonato_id);
            this.getParticipantes(this.bolao.id);
        },
        methods: {
            getCampeontatos(id) {
                this.dataLoading = true;
                this.$http.get(`/api/campeonato/get/${id}`).then((response) => {
                    this.campeonato = response.data;
                    this.rodada = this.campeonato.rodada;

                    this.getPalpites(this.user.id, this.campeonato.id, this.rodada);

                    //Remove Loading
                    this.dataLoading = false;
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            getParticipantes(bolaoId) {
                this.dataLoading = true;
                this.$http.get(`/api/participante/getBolao/${bolaoId}`).then((response) => {
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
                    this.$http.get(`/api/palpite/getPalpites/${userId}/${campeonatoId}/${rodada}`).then((response) => {
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

            compararPalpites(jogo) {
                if(jogo.id > 0) {
                    this.$http.get(`/api/palpite/compararPalpites/${jogo.id}`).then((response) => {
                        this.comparacao = response.data;
                        this.titleComparacao = `${jogo.timecasa.nome} x ${jogo.timefora.nome}`;
                    }).catch((error) => {
                        console.error('!Get compararPalpites', error);
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

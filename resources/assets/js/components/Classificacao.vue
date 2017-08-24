<template v-html="rawHtml">
    <div>
        <div class="col-sm-12 box">
            <div class="btn-group btn-rodada" role="group">
                <button type="button" class="btn btn-default" :disabled="rodada < 1" @click="updatedData(rodada - 1);">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span v-if="rodada > 0">{{ rodada }}ª Rodada <span class="caret"></span></span>
                        <span v-else="">Classificação Geral <span class="caret"></span></span>
                    </button>
                    <ol class="dropdown-menu dropdown-rodada-ol">
                        <li class="dropdown-rodada-li" style="width: 95%">
                            <a class="dropdown-rodada-a" @click="updatedData(0);">Geral</a>
                        </li>
                        <li class="dropdown-rodada-li" v-for="n in user.bolao.campeonato.qtd_rodadas">
                            <a class="dropdown-rodada-a" @click="updatedData(n);">{{ n }}ª</a>
                        </li>
                    </ol>
                </div>
                <button type="button" class="btn btn-default" :disabled="rodada >= user.bolao.campeonato.qtd_rodadas" @click="updatedData(rodada + 1);">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="col-sm-12 box" v-if="dataLoading">
            <i class="glyphicon glyphicon-refresh"></i> Loading...
        </div>
        <div class="col-sm-12 box" v-if="!dataLoading">
            <div class="col-sm-12 box" v-if="!user && participantes.length == 0">
                <div class="alert alert-danger">
                    <p class="text-center">Não existe dados para listar!</p>
                </div>
            </div>
            <div class="col-sm-12 box" v-else="">
                <div class="row table-head">
                    <div class="col-xs-1 col-sm-1 table-td">#</div>
                    <div class="col-xs-6 col-sm-7 table-td" style="text-align: left;"><strong>Participante</strong></div>
                    <div class="col-xs-1 col-sm-1 table-td"><strong>PG</strong></div>
                    <div class="col-xs-1 col-sm-1 table-td"><strong>PE</strong></div>
                    <div class="col-xs-1 col-sm-1 table-td"><strong>PV</strong></div>
                    <div class="col-xs-2 col-sm-1 table-td"><strong>DP</strong></div>
                </div>
                <div class="row table-body" :class="{ 'bg-yellow': rodada > 0 }" v-for="(participante, key) in participantesFiltered">
                    <div class="col-xs-1 col-sm-1 table-td">{{ key + 1 }}º</div>
                    <div class="col-xs-6 col-sm-7 table-td" style="text-align: left;"><b>{{ participante.user.name }}</b></div>
                    <div class="col-xs-1 col-sm-1 table-td">{{ participante.pontosganhos }}</div>
                    <div class="col-xs-1 col-sm-1 table-td">{{ participante.placarexato }}</div>
                    <div class="col-xs-1 col-sm-1 table-td">{{ participante.placarvencedor }}</div>
                    <div class="col-xs-2 col-sm-1 table-td">{{ participante.pontosganhos - participantesFiltered[0].pontosganhos }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 box" v-if="!dataLoading">
            <h4><strong>Legenda</strong></h4>
            <p>
                <strong>PG</strong> - Pontos Ganhos,
                <strong>PE</strong> - Placar Exato,
                <strong>PV</strong> - Placar Vencedor,
                <strong>DP</strong> - Diferença de pontos em relação ao primeiro colocado.
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: (this.users) ? JSON.parse(this.users) : null,
                dataLoading: false,
                participantes: [],
                rodada: 0,
                order: {
                    keys: ['pontosganhos', 'placarexato', 'placarvencedor'],
                    sort: ['desc', 'desc', 'desc']
                }
            }
        },
        props: ['users'],
        mounted() {
            this.updatedData(this.rodada);
        },
        computed: {
            participantesFiltered(){
                return _.orderBy(this.participantes, this.order.keys, this.order.sort);
            }
        },
        methods: {
            getParticipantes() {
                this.$http.get('/api/participante/get').then((response) => {
                    this.participantes = response.data;
                    this.dataLoading = false;
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            updatedData(rodada) {
                this.dataLoading = true;
                this.rodada = rodada;
                this.$http.get('/api/participante/updatedData/' + rodada).then((response) => {
                    this.getParticipantes();
                }).catch((error) => {
                    this.getParticipantes();
                    this.dataLoading = false;
                    console.error('!Get Updated Data', error);
                });
            }
        }
    }
</script>
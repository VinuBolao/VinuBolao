<template v-html="rawHtml">
    <div>
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
                    <div class="col-xs-2 col-sm-1 table-td"><strong>Posição</strong></div>
                    <div class="col-xs-5 col-sm-7 table-td"><strong>Participante</strong></div>
                    <div class="col-xs-2 col-sm-1 table-td"><strong>PG</strong></div>
                    <div class="col-xs-2 col-sm-1 table-td"><strong>PE</strong></div>
                    <div class="col-xs-1 col-sm-1 table-td"><strong>PV</strong></div>
                    <div class="col-sm-1 table-td hidden-xs"><strong>V</strong></div>
                </div>
                <div class="row table-body" v-for="(participante, key) in participantesFiltered">
                    <div class="col-xs-2 col-sm-1 table-td">{{ key + 1 }}º</div>
                    <div class="col-xs-5 col-sm-7 table-td"><b>{{ participante.user.name }}</b></div>
                    <div class="col-xs-2 col-sm-1 table-td">{{ participante.pontosganhos }}</div>
                    <div class="col-xs-2 col-sm-1 table-td">{{ participante.placarexato }}</div>
                    <div class="col-xs-1 col-sm-1 table-td">{{ participante.placarvencedor }}</div>
                    <div class="col-sm-1 table-td hidden-xs"><span class="glyphicon glyphicon-stop icon-blue" aria-hidden="true"></span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 box" v-if="!dataLoading">
            <h4><strong>Legenda</strong></h4>
            <p>
                <strong>PG</strong> - Pontos Ganhos,
                <strong>PE</strong> - Placar Exato,
                <strong>PV</strong> - Placar Vencedor,
                <strong>V</strong> - Variação de posição
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                dataLoading: false,
                user: (this.users) ? JSON.parse(this.users) : null,
                participantes: [],
                order: {
                    keys: ['pontosganhos', 'placarexato', 'placarvencedor'],
                    sort: ['desc', 'desc', 'desc']
                }
            }
        },
        props: ['users'],
        mounted() {
            this.dataLoading = true;
            this.updatedData();
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
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            },

            updatedData() {
                this.$http.get('/api/participante/updatedData').then((response) => {
                    this.getParticipantes();
                    this.dataLoading = false;
                }).catch((error) => {
                    this.getParticipantes();
                    this.dataLoading = false;
                    console.error('!Get Updated Data', error);
                });
            }
        }
    }
</script>
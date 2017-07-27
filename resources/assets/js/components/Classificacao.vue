<template v-html="rawHtml">
    <div>
        <div class="col-sm-12 box" v-if="boloes.length > 0 && participantes.length > 0">
            <table class="table table-striped table-hover">
                <tr style="background-color: #666; color: #fff;">
                    <th><strong>Posição</strong></th>
                    <th><strong>Participante</strong></th>
                    <th><strong>PG</strong></th>
                    <th><strong>PE</strong></th>
                    <th><strong>PV</strong></th>
                    <th><strong>V</strong></th>
                </tr>
                <tr v-for="(participante, key) in participantesFiltered">
                    <td>{{ key + 1 }}º</td>
                    <td><b>{{ participante.user.name }}</b></td>
                    <td>{{ participante.pontosganhos }}</td>
                    <td>{{ participante.placarexato }}</td>
                    <td>{{ participante.placarvencedor }}</td>
                    <td><span class="glyphicon glyphicon-stop icon-blue" aria-hidden="true"></span></td>
                </tr>
            </table>

            <h4><strong>Legenda</strong></h4>
            <p><strong>PG</strong> - Pontos Ganhos, <strong>PE</strong> - Placar Exato, <strong>PV</strong> - Placar Vencedor, <strong>V</strong> - Variação de posição</p>
        </div>
        <div class="col-sm-12 box" v-if="boloes.length == 0 || participantes.length == 0">
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
                boloes: JSON.parse(this.bolao),
                participantes: [],
                order: {
                    keys: ['pontosganhos', 'placarexato', 'placarvencedor'],
                    sort: ['desc', 'desc', 'desc']
                }
            }
        },
        props: ['bolao'],
        mounted() {
            if(this.boloes.length > 0) {
                this.updatedData();
                this.getParticipantes();
            }
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
                this.$http.get('/api/participante/updated_data').then((response) => {
                    console.log(response.data);
                }).catch((error) => {
                    console.error('!Get Updated Data', error);
                });
            }
        }
    }
</script>

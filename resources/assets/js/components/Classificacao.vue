<style>

</style>

<template>
    <div>
        <div class="col-sm-12 box" v-if="participantes.length > 0">
            <div class="col-sm-12 box">
                <table class="table table-striped table-hover">
                    <tr style="background-color: #666; color: #fff;">
                        <th><strong>Posição</strong></th>
                        <th><strong>Participante</strong></th>
                        <th><strong>PG</strong></th>
                        <th><strong>PE</strong></th>
                        <th><strong>PV</strong></th>
                        <th><strong>V</strong></th>
                    </tr>
                    <tr v-for="(participante, key) in participantes">
                        <td>{{ key + 1 }}º</td>
                        <td><b>{{ participante.user.name }}</b></td>
                        <td>{{ participante.pontosganhos }}</td>
                        <td>{{ participante.placarexato }}</td>
                        <td>{{ participante.placarvencedor }}</td>
                        <td><span class="glyphicon glyphicon-stop icon-blue" aria-hidden="true"></span></td>
                    </tr>
                </table>
            </div>

            <div class="col-sm-12 box">
                <h4><strong>Legenda</strong></h4>
                <p><strong>PG</strong> - Pontos Ganhos, <strong>PE</strong> - Placar Exato, <strong>PV</strong> - Placar Vencedor, <strong>V</strong> - Variação de posição</p>
            </div>
        </div>
        <div class="col-sm-12 box" v-if="participantes.length == 0">
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
                participantes: []
            }
        },
        mounted() {
            this.getCampeontatos();
        },
        methods: {
            getCampeontatos(id) {
                //let param = (id) ? '/' + id : '';
                this.$http.get('/api/participante/get').then((response) => {
                    this.participantes = response.data;
                }).catch((error) => {
                    console.error('!Get Campeonatos', error);
                });
            }
        }
    }
</script>

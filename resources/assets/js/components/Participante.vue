<style>
    .mtb-20 {
        margin: 20px 0;
    }
</style>

<template>
    <div>
        <div class="col-sm-12 box">
            <div class="row">
                <div class="col-sm-4">
                    <select class="form-control" v-model="bolaoId" @change="getParticipantesByBolao(bolaoId);">
                        <option value="0">Selecione o bolão...</option>
                        <option v-for="bolao in boloes" :value="bolao.id">{{ bolao.nome }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-12 box">

            <div class="row">
                <div class="col-sm-9">
                    <label for="infoParticipante" class="label"></label>
                    <select class="form-control" id="infoParticipante" v-model="userId" required>
                        <option value="0">Selecione o participante...</option>
                        <option v-for="user in users" :value="user.id">
                            {{ user.name }}
                        </option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-block btn-success" :disabled="userId == 0" @click="addParticipante(userId)">Adicionar</button>
                </div>
            </div>

            <table class="table table-bordered mtb-20" v-if="participantes.length > 0">
                <thead>
                <tr>
                    <th colspan="4" class="text-center">Participantes</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(participante, key) in participantes">
                    <td class="text-center">{{ key + 1 }}</td>
                    <td class="text-center">{{ participante.user.name }}</td>
                    <td class="text-right">Desde: {{ participante.created_at|moment('DD/MM/YY') }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger" @click="deleteParticipante(participante.id)">
                            Excluir
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="alert alert-danger mtb-20" v-else="">
                <p class="text-center">Você não participa de nenhum bolão ainda.</p>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                boloes: JSON.parse(this.data),
                participantes: [],
                bolaoId: 0,
                users: [],
                userId: 0
            }
        },
        props: ['data'],
        mounted() {
            this.getUsers();
            this.getParticipantesByBolao(this.bolaoId);
        },
        methods: {
            getUsers() {
                this.$http.get('/api/user/get').then((response) => {
                    this.users = response.data;

                }).catch((error) => {
                    console.error('!Get Users', error);
                });
            },

            getParticipantesByBolao(bolaoId) {
                this.$http.get('/api/participante/getBolao/' + bolaoId).then((response) => {
                    this.participantes = response.data;

                }).catch((error) => {
                    console.error('!Get Participantes', error);
                });
            },

            addParticipante(userId) {
                var data = {
                    bolaoId: this.bolaoId,
                    userId: userId
                };

                this.$http.post('/api/participante/create', data).then((response) => {
                    this.userId = 0;
                    this.getParticipantesByBolao(this.bolaoId);
                }).catch((error) => {
                    console.error('!Create Participantes', error);
                });
            },

            deleteParticipante(participanteId) {
                this.$http.post('/api/participante/delete/' + participanteId).then((response) => {
                    this.userId = 0;
                    this.getParticipantesByBolao(this.bolaoId);
                }).catch((error) => {
                    console.error('!Delete Participantes', error);
                });
            }
        }
    }
</script>

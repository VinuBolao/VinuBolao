<template v-html="rawHtml">
  <div id="jogos">
    <div class="col-sm-12 box" v-if="!user && jogos.length == 0">
      <div class="alert alert-danger">
        <p class="text-center">Não existe dados para listar!</p>
      </div>
    </div>
    <div v-else>
      <div
        class="col-sm-12 box"
        style="display: flex;justify-content: space-between;align-items: center;"
      >
        <div class="btn-group btn-rodada" role="group">
          <button
            type="button"
            class="btn btn-default"
            :disabled="rodada < 2"
            @click="getJogosCampeontato(campeonato.id, rodada - 1)"
          >
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
          </button>
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-default dropdown-toggle"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              {{ rodada }}ª Rodada
              <span class="caret"></span>
            </button>
            <div class="dropdown-menu dropdown-rodada">
              <div class="flex-container">
                <div class="flex-items" v-for="(n, key) in campeonato.qtd_rodadas" :key="key">
                  <a
                    @click="getJogosCampeontato(campeonato.id, n);"
                    class="dropdown-rodada-a"
                  >{{ n }}ª</a>
                </div>
              </div>
            </div>
          </div>
          <button
            type="button"
            class="btn btn-default"
            :disabled="rodada >= campeonato.qtd_rodadas"
            @click="getJogosCampeontato(campeonato.id, rodada + 1)"
          >
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
          </button>
        </div>

        <button
          type="button"
          class="btn btn-primary"
          v-if="user.master && campeonato.rodada !== rodada"
          @click="rodadaAtual()"
        >Rodada atual?</button>
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
              <div class="td">Jogos</div>
              <div class="hidden-xs td">Horário | Estádio</div>
              <div class="td" v-if="user.master">Editar</div>
            </div>
            <div class="row table-body" v-for="(jogo, key) in jogos" :key="key">
              <div class="td">
                <i
                  class="glyphicon glyphicon-remove"
                  v-if="jogo.placar_casa === null && jogo.placar_fora === null"
                ></i>
                <i class="glyphicon glyphicon-ok" v-else></i>
              </div>
              <div class="td">
                <div class="mandante">
                  <span class="hidden-xs hidden-sm">{{ jogo.timecasa.nome }}</span>
                  <span class="hidden-md hidden-lg">{{ jogo.timecasa.sigla }}</span>
                  <img
                    :src="`https://raw.githubusercontent.com${jogo.timecasa.escudo}`"
                    class="escudo-time"
                  />
                </div>

                <div class="placar">
                  <div class="visible-xs horario">{{ jogo.inicio|moment('ddd DD/MM HH:mm') }}</div>

                  <div class="numbers">
                    <input
                      type="number"
                      min="0"
                      :disabled="saveLoading || disableInput(jogo) === jogo.id"
                      v-if="user.master && jogo.placar_casa === null"
                      v-model="jogo.placar_real_casa"
                      @blur="updatedPlacar(jogo)"
                    />

                    <span v-else>{{ jogo.placar_casa }}</span>
                    x
                    <input
                      type="number"
                      min="0"
                      :disabled="saveLoading || disableInput(jogo) === jogo.id"
                      v-if="user.master && jogo.placar_fora === null"
                      v-model="jogo.placar_real_fora"
                      @blur="updatedPlacar(jogo)"
                    />

                    <span v-else>{{ jogo.placar_fora }}</span>
                  </div>
                </div>

                <div class="visitante">
                  <img
                    :src="`https://raw.githubusercontent.com${jogo.timefora.escudo}`"
                    class="escudo-time"
                  />
                  <span class="hidden-xs hidden-sm">{{ jogo.timefora.nome }}</span>
                  <span class="hidden-md hidden-lg">{{ jogo.timefora.sigla }}</span>
                </div>
              </div>
              <div class="hidden-xs td">
                <strong>{{ jogo.inicio|moment('HH:mm') }}</strong>
                &nbsp;
                {{ jogo.inicio|moment('DD/MM/YY') }}&nbsp;|&nbsp;
                <strong>{{ jogo.timecasa.estadio }}</strong>
              </div>
              <div class="td" v-if="user.master">
                <div v-show="user.master && !saveLoading">
                  <a
                    href
                    v-if="jogo.placar_casa !== null || jogo.placar_fora !== null"
                    @click.prevent="updatedPlacar(jogo, jogo.id)"
                  >
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
      user: this.users ? JSON.parse(this.users) : null,
      bolao: JSON.parse(this.data_bolao),
      dataLoading: false,
      saveLoading: false,
      campeonato: {},
      rodada: null,
      jogos: [],
    };
  },
  props: ["users", "data_bolao"],
  mounted() {
    if (this.user) this.getCampeontatos(this.bolao.campeonato_id);
  },
  methods: {
    getCampeontatos(id) {
      this.dataLoading = true;
      this.$http
        .get("/api/campeonato/get/" + id)
        .then((response) => {
          this.campeonato = response.data;
          this.rodada = this.campeonato.rodada;

          this.getJogosCampeontato(this.campeonato.id, this.rodada);
        })
        .catch((error) => {
          console.error("!Get Campeonatos", error);
        });
    },

    getJogosCampeontato(id, rodada) {
      this.saveLoading = true;
      this.$http
        .get("/api/jogo/getCampeonato/" + id + "/" + rodada)
        .then((response) => {
          response.data.forEach(function (jogo) {
            jogo.placar_real_casa = null;
            jogo.placar_real_fora = null;
          });
          this.jogos = response.data;
          this.rodada = rodada;

          //Remove Loading
          this.dataLoading = false;
          this.saveLoading = false;
        })
        .catch((error) => {
          console.error("!Get JogosCampeonato", error);
        });
    },

    updatedPlacar(jogo, id) {
      if (
        id ||
        (jogo.placar_real_casa !== null && jogo.placar_real_fora !== null)
      ) {
        this.saveLoading = true;
        jogo.placar_casa = id >= 0 ? null : jogo.placar_real_casa;
        jogo.placar_fora = id >= 0 ? null : jogo.placar_real_fora;

        jogo.userId = this.user.id;

        this.$http
          .post("/api/jogo/update", jogo)
          .then((response) => {
            this.getJogosCampeontato(this.campeonato.id, this.rodada);
          })
          .catch((error) => {
            this.getJogosCampeontato(this.campeonato.id, this.rodada);
            console.error("!Get Update Jogo", error);
          });
      }
    },

    rodadaAtual() {
      this.$http
        .get(
          "/api/campeonato/rodadaAtual/" +
            this.campeonato.id +
            "/" +
            this.rodada
        )
        .then((res) => {
          if (res.data.success) {
            this.campeonato.rodada = this.rodada;
          }
        })
        .catch((error) => {
          console.error("!Set Rodada Atual", error);
        });
    },

    disableInput(jogo) {
      if (moment() < moment(jogo.inicio)) {
        return jogo.id;
      }
    },
  },
};
</script>

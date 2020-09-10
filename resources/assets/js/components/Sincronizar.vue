<template v-html="rawHtml">
  <div>
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <label for="infoSincronizar">URL:</label>
        <input
          id="infoSincronizar"
          name="info"
          v-model="url"
          class="form-control"
          placeholder="Digite..."
        />
      </div>

      <div class="col-md-3 col-sm-12">
        <button
          type="button"
          class="btn btn-primary btn-block btn-admin btn-admin-filter"
          title="Filtrar"
          @click="getJogos(url)"
        >
          <i class="glyphicon glyphicon-search"></i> Buscar Jogos
        </button>
      </div>

      <span
        class="col-md-12"
        style="font-size: 10px; margin-top: 5px;"
      >Ex: https://api.globoesporte.globo.com/tabela/d1a37fa4-e948-43a6-ba53-ab24ab3a45b1/fase/fase-unica-seriea-2020/rodada/1/jogos</span>
    </div>

    <hr class="row" v-if="jogos.length > 0" />

    <div v-if="message" class="col-sm-6 col-sm-offset-3" style="margin-top: 5rem;">
      <div class="alert alert-success text-center">{{ message }}</div>
    </div>

    <div class="row" v-if="jogos.length > 0">
      <div class="col-sm-12">
        <h4>
          <strong>Jogos Encontrados</strong>
        </h4>

        <div v-for="(jogo, key) in jogos" :key="key">
          <span>{{ key + 1 }} -</span>
          <strong>{{ jogo.horario }} -</strong>
          <span>
            <strong>{{ jogo.mandante.nome }}</strong> x
            <strong>{{ jogo.visitante.nome }}</strong>
          </span>
        </div>
      </div>
    </div>

    <hr class="row" v-if="jogos.length > 0" />

    <div class="row" v-if="outros.length > 0">
      <div class="col-sm-12">
        <h4>
          <strong>Times Não Encontrados</strong>
        </h4>

        <div v-for="(item, key) in outros" :key="key">
          <strong>{{ key + 1 }} -</strong>
          <span>{{ item }}</span>
        </div>
      </div>
    </div>

    <hr class="row" v-if="outros.length > 0" />

    <div class="row">
      <div class="col-sm-2" v-if="jogos.length > 0">
        <label for="infoBolao">BolaoID:</label>
        <input id="infoBolao" name="bolao" v-model="bolao" class="form-control" />
      </div>
      <div class="col-sm-2" v-if="jogos.length > 0">
        <label for="infoCampeonato">CampeonatoID:</label>
        <input id="infoCampeonato" name="campeonato" v-model="campeonato" class="form-control" />
      </div>
      <div class="col-sm-2" v-if="jogos.length > 0">
        <label for="infoRodada">Rodada:</label>
        <input id="infoRodada" name="rodada" v-model="rodada" class="form-control" />
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        <button
          type="button"
          class="btn btn-primary btn-admin-filter"
          @click="saveJogos()"
          v-if="jogos.length > 0"
        >Salvar Jogos</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url: "",
      bolao: "",
      rodada: "",
      campeonato: "",
      message: "",
      jogos: [],
      outros: [],
    };
  },
  props: [],
  mounted() {},
  methods: {
    getJogos(url) {
      this.$http
        .post("/api/jogo/getJogosGE", { url })
        .then((response) => {
          if (response.data) {
            this.message = "";
            this.jogos = response.data.jogos;
            this.outros = response.data.outros;
          }
        })
        .catch((error) => {
          console.error("!Get JogosGE", error);
        });
    },

    saveJogos() {
      const jogos = [];

      if (this.jogos.length > 0) {
        this.jogos.forEach((jogo) => {
          jogos.push({
            rodada: this.rodada,
            inicio: jogo.horario,
            bolao_id: this.bolao,
            campeonato_id: this.campeonato,
            timecasa_id: jogo.mandante.id,
            timefora_id: jogo.visitante.id,
          });
        });

        this.$http
          .post("/api/jogo/save", { jogos })
          .then((response) => {
            if (response.data.success) {
              this.bolao = "";
              this.jogos = [];
              this.outros = [];
              this.rodada = "";
              this.campeonato = "";
              this.message = "Jogos Salvos Com Sucesso!";
            }
          })
          .catch((error) => {
            console.error("!Get JogosGE", error);
          });
      }
    },
  },
};
</script>
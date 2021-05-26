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
      >Ex: https://api.globoesporte.globo.com/tabela/d1a37fa4-e948-43a6-ba53-ab24ab3a45b1/fase/fase-unica-campeonato-brasileiro-2021/rodada/1/jogos</span>
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
        <select id="infoBolao" class="form-control" v-model="bolaoId" @change="setCampeonato(bolaoId)">
          <option :key="key" v-for="(bolao, key) in boloes" :value="bolao.id">
            {{ bolao.nome }}
          </option>
        </select>
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
      rodada: "",
      bolaoId: "",
      campeonatoId: "",
      message: "",
      jogos: [],
      outros: [],
      boloes: [],
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
            this.boloes = response.data.boloes;
            this.outros = response.data.outros;
          }
        })
        .catch((error) => {
          console.error("!Get JogosGE", error);
        });
    },

    setCampeonato(bolaoId) {
      let campeonatoId = 0;

      this.boloes.forEach(function (bolao) {
        if (bolao.id == bolaoId) {
          campeonatoId = bolao.campeonato_id;
        }
      });

      this.campeonatoId = campeonatoId;
    },

    saveJogos() {
      const jogos = [];

      if (this.jogos.length > 0) {
        this.jogos.forEach((jogo) => {
          jogos.push({
            rodada: this.rodada,
            inicio: jogo.horario,
            bolao_id: this.bolaoId,
            campeonato_id: this.campeonatoId,
            timecasa_id: jogo.mandante.id,
            timefora_id: jogo.visitante.id,
          });
        });

        this.$http
          .post("/api/jogo/save", { jogos })
          .then((response) => {
            if (response.data.success) {
              this.bolaoId = "";
              this.jogos = [];
              this.outros = [];
              this.rodada = "";
              this.campeonatoId = "";
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

<template v-html="rawHtml">
  <div id="classificacao">
    <div class="col-sm-12 box">
      <div class="btn-group btn-rodada" role="group">
        <button
          type="button"
          class="btn btn-default"
          :disabled="rodada < 1"
          @click="getRanking(rodada - 1)"
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
            <span v-if="rodada > 0">
              {{ rodada }}ª Rodada
              <span class="caret"></span>
            </span>
            <span v-else>
              Classificação Geral
              <span class="caret"></span>
            </span>
          </button>
          <div class="dropdown-menu dropdown-rodada">
            <div class="flex-container">
              <div class="flex-items" v-for="(n, key) in bolao.campeonato.qtd_rodadas" :key="key">
                <a class="dropdown-rodada-a" @click="getRanking(n)">{{ n }}ª</a>
              </div>
              <div class="flex-items geral">
                <a class="dropdown-rodada-a" @click="getRanking(0)">Geral</a>
              </div>
              <div class="flex-items geral" style="width: calc(50% - 2.5px);">
                <a class="dropdown-rodada-a" @click="getRanking(0, 1)" style="padding: 0;">1º turno</a>
              </div>
              <div class="flex-items geral" style="width: calc(50% - 2.5px);margin-left: 5px;">
                <a class="dropdown-rodada-a" @click="getRanking(0, 2)" style="padding: 0;">2º turno</a>
              </div>
            </div>
          </div>
        </div>
        <button
          type="button"
          class="btn btn-default"
          :disabled="rodada >= bolao.campeonato.qtd_rodadas"
          @click="getRanking(rodada + 1);"
        >
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
      <div class="col-sm-12 table-custom" v-else>
        <div class="row table-head">
          <div class="td">#</div>
          <div class="td">Participante</div>
          <div class="td">PG</div>
          <div class="td">PE</div>
          <div class="td">PV</div>
          <div class="td">DP</div>
        </div>
        <div
          class="row table-body"
          :class="{ 'bg-colors': rodada === 0 }"
          v-for="(participante, key) in participantes"
          :key="key"
        >
          <div class="td">{{ key + 1 }}º</div>
          <div class="td">{{ participante.name }}</div>
          <div class="td">{{ participante.pontosganhos }}</div>
          <div class="td">{{ participante.placarexato }}</div>
          <div class="td">{{ participante.placarvencedor }}</div>
          <div class="td">{{ participante.pontosganhos - participantes[0].pontosganhos }}</div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 box" v-if="!dataLoading">
      <h4>
        <strong>Legenda</strong>
      </h4>
      <p>
        <strong>PG</strong> - Pontos Ganhos,
        <strong>PE</strong> - Placar Exato,
        <strong>PV</strong> - Placar Vencedor,
        <strong>DP</strong> - Diferença de pontos em relação ao primeiro colocado.
      </p>
      <p>
        <i class="glyphicon glyphicon-stop campeoes"></i> - Campeões,
        <i class="glyphicon glyphicon-stop lanternas"></i> - Lanternas.
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: this.data_user ? JSON.parse(this.data_user) : null,
      dataLoading: false,
      participantes: [],
      bolao: this.data_bolao ? JSON.parse(this.data_bolao) : null,
      rodada: 0,
    };
  },
  props: ["data_user", "data_bolao"],
  mounted() {
    this.getRanking(this.rodada);
  },
  methods: {
    getRanking(rodada, turno = 0) {
      this.dataLoading = true;
      this.rodada = rodada;
      this.$http
        .get("/api/participante/getRanking/" + rodada + "/" + turno)
        .then((response) => {
          this.participantes = response.data;
          this.dataLoading = false;
        })
        .catch((error) => {
          this.dataLoading = false;
          console.error("!Get Updated Data", error);
        });
    },
  },
};
</script>

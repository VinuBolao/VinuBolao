import React, { Component } from 'react';

import './../../sass/components/Classificacao.scss';

class Classificacao extends Component {
    constructor(props) {
        super(props);

        this.state = {
            rodada: 0,
            rodadas: 0,
            loading: true,
            participantes: [],
            bolao: { 
                campeonato: {
                    qtd_rodadas: 0
                } 
            }
        }
    }

    async componentDidMount() {
        await this.getBolao();
        await this.getClassificacao(0);
    }

    async getBolao() {
        const { data } = await axios.get(`/api/bolao/getActive`);
        this.setState({ bolao: data, rodadas: data.campeonato.qtd_rodadas, loading: false });
    }

    async getClassificacao(rodada) {
        let params = rodada > 0 ? `getRanking/${rodada}` : 'getRanking';
        const { data } = await axios.get(`/api/participante/${params}`);
        this.setState({ participantes: data, rodada, loading: false });
    }

    render () {
        const { bolao, loading, rodada, rodadas, participantes } = this.state;

        return (
            <div id="classificacao" className="container">
                <div className="box">
                    <h1 className="title-box">Classificação</h1>
                    <p>
                        Veja sua posição em relação aos outros 
                        participantes no bolão <strong>{bolao.nome}</strong>!
                    </p>
                </div>

                <div className="box">
                    <ul className="pagination rodada">
                        <li className={`page-item ${rodada == 0 ? 'disabled' : ''}`}>
                            <button className="page-link" disabled={rodada == 0}
                                onClick={() => this.getClassificacao(rodada - 1)}>
                                Anterior
                            </button>
                        </li>
                        <li className="page-item">
                            <button className="page-link">
                                {rodada == 0 ? 'Classificação Geral' : `${rodada}ª Rodada`}
                            </button>
                        </li>
                        <li className={`page-item ${rodada == rodadas ? 'disabled' : ''}`}>
                            <button className="page-link" disabled={rodada == rodadas}
                                onClick={() => this.getClassificacao(rodada + 1)}>
                                Próximo
                            </button>
                        </li>
                    </ul>
                </div>

                <div className="col-sm-12 box">
                    {loading ? <div id="loading">
                        <div className="spinner-border" role="status">
                            <span className="sr-only">Loading...</span>
                        </div>
                        Carregando...
                    </div> :
                    <div className="col-sm-12 table-custom">
                        <div className="row table-head">
                            <div className="td">#</div>
                            <div className="td">Participante</div>
                            <div className="td">PG</div>
                            <div className="td">PE</div>
                            <div className="td">PV</div>
                            <div className="td">DP</div>
                        </div>
                        {participantes.map((participante, key) => (
                            <div key={key} className={`row table-body ${rodada == 0 ? 'color' : ''}`}>
                                <div className="td">{ key + 1 }º</div>
                                <div className="td">{ participante.name }</div>
                                <div className="td">{ participante.pontosganhos }</div>
                                <div className="td">{ participante.placarexato }</div>
                                <div className="td">{ participante.placarvencedor }</div>
                                <div className="td">{ participante.pontosganhos - participantes[0].pontosganhos }</div>
                            </div>
                        ))}
                    </div>}
                </div>

                <div className="col-sm-12 box">
                    <h4 className="title-box">Legenda</h4>
                    <p>
                        <strong> PG</strong> - Pontos Ganhos,
                        <strong> PE</strong> - Placar Exato,
                        <strong> PV</strong> - Placar Vencedor,
                        <strong> DP</strong> - Diferença de pontos em relação ao primeiro colocado.
                    </p>
                    <div className="box-legend">
                        <div className="legend winner"></div> - Campeões,&nbsp;
                        <div className="legend loser"></div> - Lanternas.
                    </div>
                </div>
            </div>
        )
    }
}

export default Classificacao;

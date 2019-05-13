import React, { Component } from 'react';
import axios from 'axios';

import './../../sass/components/Jogo.scss';

class Jogo extends Component {
    constructor(props) {
        super(props);

        this.state = {
            jogos: [],
            rodada: 0,
            rodadas: 0,
            loading: true,
            campeonatoId: 0,
            bolao: {
                nome: ''
            }
        }
    }

    componentDidMount() {
        this.getBolao();
    }
    
    async getBolao() {
        const { data } = await axios.get(`/api/bolao/getActive`);
        this.setState({ 
            bolao: data, 
            loading: false, 
            rodada: data.campeonato.rodada, 
            campeonatoId: data.campeonato_id, 
            rodadas: data.campeonato.qtd_rodadas 
        });
        this.getJogos(data.campeonato.id, data.campeonato.rodada);
    }

    async getJogos(id, rodada) {
        this.setState({ loading: true });
        const { data } = await axios.get(`/api/jogo/getCampeonato/${id}/${rodada}`);
        this.setState({ jogos: data, rodada, loading: false });
    }

    clearPlacar(id) {
        this.setState({ loading: true });
        const state = Object.assign({}, this.state);
        state.jogos.forEach(jogo => {
            if (jogo.id === id) {
                jogo.placar_casa = null;
                jogo.placar_fora = null;

                if (jogo.placar_casa === null && jogo.placar_fora === null) {
                    this.saveJogo(jogo);
                }
            }
        });
        this.setState(state);
    }

    setPlacar(e, jogo) {
        this.setState({ loading: true });
        const state = Object.assign({}, this.state);
        state.jogos.forEach(item => {
            if (item.id === jogo.id) {
                item[e.target.name] = e.target.value;

                if (item.placar_casa !== null && item.placar_fora !== null) {
                    this.saveJogo(item);
                }
            }
        });
        this.setState(state);
    }

    async saveJogo(jogo) {
        const { data } = await axios.post('/api/jogo/update', jogo);
        if (data.success === true) {
            this.setState({ loading: false });
            this.getJogos(this.state.campeonatoId, this.state.rodada);
        }
    }

    render () {
        const { bolao, campeonatoId, jogos, loading, rodada, rodadas } = this.state;

        return (
            <div id="jogo" className="container">
                <div className="box">
                    <h1 className="title-box">Jogos</h1>
                    <p>
                        Lista de jogos do bolão <strong>{bolao.nome} </strong> 
                        filtrados por rodada, preencha os resultados.
                    </p>
                </div>

                <div className="box">
                    <ul className="pagination rodada">
                        <li className={`page-item ${rodada == 0 ? 'disabled' : ''}`}>
                            <button className="page-link" disabled={rodada == 0}
                                onClick={() => this.getJogos(campeonatoId, rodada - 1)}>
                                Anterior
                            </button>
                        </li>
                        <li className="page-item">
                            <button className="page-link">
                                {rodada}ª Rodada
                            </button>
                        </li>
                        <li className={`page-item ${rodada == rodadas ? 'disabled' : ''}`}>
                            <button className="page-link" disabled={rodada == rodadas}
                                onClick={() => this.getJogos(campeonatoId, rodada + 1)}>
                                Próximo
                            </button>
                        </li>
                    </ul>
                </div>

                <div className="col-sm-12 box">
                    {loading && <div id="loading">
                        Carregando...
                    </div>}

                    <div className="col-sm-12 table-custom">
                        <div className="row table-head">
                            <div className="td">#</div>
                            <div className="td">Jogos</div>
                            <div className="td">Horário</div>
                            <div className="td">Editar</div>
                        </div>
                        {jogos.map((jogo, key) => (
                            <div key={key} className={`row table-body`}>
                                <div className="td">#</div>
                                <div className="td">
                                    <div className="box-time casa">
                                        <div className="nome">{jogo.timecasa.nome}</div>
                                        <img src={`/img/${jogo.timecasa.sigla}_${jogo.timecasa.estado}.png`} className="escudo" />
                                    </div>
                                    <div className="numbers">
                                        {jogo.placar_casa === null 
                                            ? <input 
                                                min="0" 
                                                type="number" 
                                                name="placar_casa"
                                                disabled={loading}
                                                className="input-placar" 
                                                onBlur={(e) => this.setPlacar(e, jogo)} />
                                            : <span className="placar">{jogo.placar_casa}</span> 
                                        }
                                        <span>x</span>
                                        {jogo.placar_fora === null 
                                            ? <input 
                                                min="0" 
                                                type="number" 
                                                name="placar_fora"
                                                disabled={loading}
                                                className="input-placar" 
                                                onBlur={(e) => this.setPlacar(e, jogo)} />
                                            : <span className="placar">{jogo.placar_fora}</span>
                                        }
                                    </div>
                                    <div className="box-time fora">
                                        <img src={`/img/${jogo.timefora.sigla}_${jogo.timefora.estado}.png`} className="escudo" />
                                        <div className="nome">{jogo.timefora.nome}</div>
                                    </div>
                                </div>
                                <div className="td">{jogo.inicio}</div>
                                <div className="td">
                                    <button className="btn btn-secondary btn-sm" onClick={() => this.clearPlacar(jogo.id)}>
                                        Editar
                                    </button>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        )
    }
}

export default Jogo;
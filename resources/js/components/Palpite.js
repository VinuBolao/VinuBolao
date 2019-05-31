import React, { Component } from 'react';
import axios from "axios";
import Moment from "react-moment";
import { FaEdit, FaCheck, FaTimes } from 'react-icons/fa';

import './../../sass/components/Palpite.scss';

class Palpite extends Component {
    constructor(props) {
        super(props);

        this.userId = document.getElementById('app').getAttribute('data-user');

        this.state = {
            rodada: 1,
            rodadas: 0,
            loading: true,
            campeonatoId: 0,
            participanteId: this.userId,
            participantes: [],
            jogos: [],
            bolao: {
                nome: ''
            }
        }
    }

    componentDidMount() {
        this.getBolao();
    }

    handleSelect(e) {
        this.setState({ participanteId: e.target.value });
        this.getPalpites(e.target.value, this.state.campeonatoId, this.state.rodada);
    }

    colorRow(jogo) {
        let classes = "row table-body";
        if (jogo.palpite_status === 10) return `${classes} exato`;
        if (jogo.palpite_status === 7) return `${classes} vencedor`;

        return classes;
    }

    async getBolao() {
        const { data } = await axios.get(`/api/bolao/getActive`);

        this.setState({
            bolao: data,
            rodada: data.campeonato.rodada,
            campeonatoId: data.campeonato_id,
            rodadas: data.campeonato.qtd_rodadas
        });

        this.getParticipantes(data.campeonato.id, data.campeonato.rodada);
        this.getPalpites(this.state.participanteId, data.campeonato.id, data.campeonato.rodada);
    }

    async getParticipantes(bolaoId) {
        const { data } = await axios.get(`/api/participante/getBolao/${bolaoId}`);

        this.setState({ participantes: data });
    }

    async getPalpites(userId, campeonatoId, rodada) {
        this.setState({ rodada: rodada, loading: true });
        const { data } = await axios.get(`/api/palpite/getPalpites/${userId}/${campeonatoId}/${rodada}`);
        this.setState({ jogos: data, loading: false });
        console.log(data);
    }

    setPalpite(e, jogo) {
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

    render () {
        const { participanteId, campeonatoId, jogos, loading, rodada, rodadas } = this.state;

        return (
            <div id="palpite" className="container">
                <div className="box">
                    <h1 className="title-box">Palpites</h1>
                    <p>
                        Lista de jogos do bolão <strong>{this.state.bolao.nome} </strong> para você preencher os seus
                        palpites, lembre-se de preencher seu palpite antes do inicio de cada jogo.
                    </p>
                </div>

                <div className="box">
                    <div className="col-sm-12 col-md-4">
                        <div className="form-group">
                            <label htmlFor="infoCampeonato">Participantes:</label>
                            <select
                                name="participanteId"
                                id="infoParticipante"
                                className="form-control"
                                value={this.state.participanteId}
                                onChange={(e) => this.handleSelect(e)}
                            >
                                {this.state.participantes.map((participante, key) => (
                                    <option key={key} value={participante.user.id}>{participante.user.name}</option>
                                ))}
                            </select>
                        </div>
                    </div>
                </div>

                <div className="box">
                    <ul className="pagination rodada">
                        <li className={`page-item ${rodada == 1 ? 'disabled' : ''}`}>
                            <button className="page-link" disabled={rodada == 1}
                                    onClick={() => this.getPalpites(participanteId, campeonatoId, rodada - 1)}>
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
                                    onClick={() => this.getPalpites(participanteId, campeonatoId, rodada + 1)}>
                                Próximo
                            </button>
                        </li>
                    </ul>
                </div>

                <div className="col-sm-12 box">
                    {loading && <div id="loading" className="loading-jogo">
                        <div className="spinner-border" role="status">
                            <span className="sr-only">Loading...</span>
                        </div>
                        Carregando...
                    </div>}

                    <div className="col-sm-12 table-custom">
                        <div className="row table-head">
                            <div className="td">#</div>
                            <div className="td">Palpites</div>
                            <div className="td d-none d-md-block">Horário</div>
                            <div className="td">Editar</div>
                        </div>
                        {jogos.map((jogo, key) => (
                            <div key={key} className={this.colorRow(jogo)}>
                                <div className="td icon-status">
                                    {jogo.placar_fora === null && jogo.placar_fora === null
                                        ? <FaTimes className="error" />
                                        : <FaCheck className="success" />
                                    }
                                </div>
                                <div className="td">
                                    <div className="box-time casa">
                                        <div className="nome d-none d-md-block">{jogo.timecasa.nome}</div>
                                        <div className="nome d-sm-none">{jogo.timecasa.sigla}</div>
                                        <img src={`/img/${jogo.timecasa.sigla}_${jogo.timecasa.estado}.png`} className="escudo" />
                                    </div>
                                    <div className="numbers">
                                        {jogo.palpite.casa === null && this.userId === participanteId
                                            ? <input
                                                min="0"
                                                type="number"
                                                name="placar_casa"
                                                disabled={loading}
                                                className="input-placar"
                                                onBlur={(e) => this.setPalpite(e, jogo)} />
                                            : <span className="placar">{jogo.placar_casa}</span>
                                        }
                                        <span>x</span>
                                        {jogo.palpite.fora === null && this.userId === participanteId
                                            ? <input
                                                min="0"
                                                type="number"
                                                name="placar_fora"
                                                disabled={loading}
                                                className="input-placar"
                                                onBlur={(e) => this.setPalpite(e, jogo)} />
                                            : <span className="placar">{jogo.placar_fora}</span>
                                        }
                                    </div>
                                    <div className="box-time fora">
                                        <img src={`/img/${jogo.timefora.sigla}_${jogo.timefora.estado}.png`} className="escudo" />
                                        <div className="nome d-sm-none">{jogo.timefora.sigla}</div>
                                        <div className="nome d-none d-md-block">{jogo.timefora.nome}</div>
                                    </div>
                                </div>
                                <div className="td d-none d-md-block">
                                    <strong>
                                        <Moment format="ddd">{jogo.inicio}</Moment>{' '}
                                    </strong>
                                    <Moment format="DD/MM/YYYY">{jogo.inicio}</Moment>
                                    <strong>
                                        {' '}<Moment format="HH:mm">{jogo.inicio}</Moment>
                                    </strong>
                                </div>
                                <div className="td">
                                    <a className="btn btn-link btn-edit" onClick={() => this.clearPlacar(jogo.id)}>
                                        <FaEdit />
                                    </a>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        )
    }
}

export default Palpite;

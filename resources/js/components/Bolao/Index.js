import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

import './../../../sass/components/Bolao.scss';

class Bolao extends Component {
    constructor(props) {
        super(props);

        this.state = {
            boloes: []
        }
    }

    componentDidMount() {
        this.getBolao();
    }

    async getBolao() {
        const { data } = await axios.get(`/api/bolao/get`);
        this.setState({ boloes: data });
    }
    
    render () {
        const { boloes } = this.state;

        return (
            <div id="bolao" className="container">
                <div className="box">
                    <Link to="/bolao/novo" className="btn btn-secondary">Novo</Link>
                    <h1 className="title-box">Lista</h1>
                    <p>Veja a lista de bolões que você participa!</p>
                </div>

                {boloes.map((bolao, key) => 
                    <div key={key} className="box">
                        <div className="row">
                            <div className="col-sm-3">
                                <Link to="/participante" className="btn btn-secondary btn-block">
                                    Participantes
                                </Link>
                            </div>

                            <div className="col-sm-3">
                                <Link to={`/bolao/editar/${bolao.id}`} className="btn btn-secondary btn-block">
                                    Editar
                                </Link>
                            </div>
                        </div>

                        <table className="table table-bordered">
                            <thead>
                                <tr>
                                    <th colSpan="2" className="title-show">
                                        <strong>{ bolao.nome }</strong>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Nome</th>
                                    <td>{ bolao.nome }</td>
                                </tr>
                                <tr>
                                    <th scope="row">Administrador</th>
                                    <td>{ bolao.user.name }</td>
                                </tr>
                                <tr>
                                    <th scope="row">Campeonato</th>
                                    <td>
                                        { bolao.campeonato.nome } - { bolao.campeonato.temporada } - Série { bolao.campeonato.serie }
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Data Inicial</th>
                                    <td>{ bolao.inicio }</td>
                                </tr>
                                <tr>
                                    <th scope="row">Descrição</th>
                                    <td dangerouslySetInnerHTML={{__html: bolao.descricao}} />
                                </tr>
                                <tr>
                                    <th scope="row">Ativo</th>
                                    <td>{ bolao.ativo ? 'SIM' : 'NÃO' }</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div> 
                )}
            </div>
        )
    }
}

export default Bolao;
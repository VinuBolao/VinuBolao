import React, { Component } from 'react';
import axios from 'axios';

class BolaoUpdate extends Component {
    constructor(props) {
        super(props);

        this.state = {
            nome: '',
            ativo: 0,
            inicio: '',
            descricao: '',
            placarExato: 0,
            campeonatoId: 0,
            placarVencedor: 0,
            campeonatos: [],
            bolao: {
                nome: '',
                campeonato: { id: 0 }
            }
        }

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    componentDidMount() {
        this.getCampeonato();
        this.getBolao(segment(3));
    }

    async getBolao(id) {
        const { data } = await axios.get(`/api/bolao/get/${id}`);
        
        this.setState({ 
            bolao: data,
            nome: data.nome,
            ativo: data.ativo,
            inicio: data.inicio,
            descricao: data.descricao,
            placarExato: data.placar_exato,
            campeonatoId: data.campeonato.id,
            placarVencedor: data.placar_vencedor,
        });
    }

    async getCampeonato() {
        const { data } = await axios.get(`/api/campeonato/get`);
        this.setState({ campeonatos: data });
    }

    handleChange(event) {
        this.setState({ [event.target.name]: event.target.value })
    }

    handleSubmit(e) {
        e.preventDefault();
        
        console.log(this.state);
    }
    
    render () {
        return (
            <div id="bolao-update" className="container">
                <div className="box">
                    <h1 className="title-box">Editando Bolão</h1>
                    <p>Preencha os campos para atualizar o bolão <strong>{this.state.bolao.nome}</strong>.</p>
                </div>

                <div className="col-sm-12 box">
                    <form onSubmit={(e) => this.handleSubmit(e)}>
                        <div className="row">
                            <div className="col-sm-2">
                                <div className="form-group">
                                    <label htmlFor="infoCampeonato">Ativo:</label>
                                    <select 
                                        required
                                        name="ativo"
                                        id="infoAtivo" 
                                        className="form-control" 
                                        value={this.state.ativo} 
                                        onChange={(e) => this.handleChange(e)}
                                    >
                                        <option value="0">NÃO</option>
                                        <option value="1">SIM</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div className="row">
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <label htmlFor="infoCampeonato">Campeonato:</label>
                                    <select 
                                        name="campeonatoId"
                                        id="infoCampeonato" 
                                        className="form-control" 
                                        value={this.state.campeonatoId} 
                                        onChange={(e) => this.handleChange(e)}
                                    >
                                        {this.state.campeonatos.map((item, key) => (
                                            <option key={key} value={item.id}>{item.nome}</option>
                                        ))}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div className="row">
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <label htmlFor="infoNome">Nome:</label>
                                    <input 
                                        type="text" 
                                        name="nome" 
                                        id="infoNome" 
                                        value={this.state.nome} 
                                        className="form-control" 
                                        placeholder="Digite o nome" 
                                        onChange={this.handleChange}
                                    />
                                </div>
                            </div>
                        </div>

                        <div className="row">
                            <div className="col-sm-6">
                                <div className="form-row">
                                    <div className="col-sm-4">
                                        <label htmlFor="infoData">Data Inicial:</label>
                                        <input 
                                            type="date" 
                                            id="infoData" 
                                            name="inicio" 
                                            className="form-control" 
                                            value={this.state.inicio} 
                                            onChange={(e) => this.handleChange(e)}
                                        />
                                    </div>
                                    <div className="col-sm-2">
                                        <label htmlFor="infoPlacarExato">PE:</label>
                                        <input 
                                            type="number" 
                                            name="placarExato" 
                                            id="infoPlacarExato" 
                                            className="form-control" 
                                            value={this.state.placarExato} 
                                            onChange={(e) => this.handleChange(e)}
                                        />
                                    </div>
                                    <div className="col-sm-2">
                                        <label htmlFor="infoPlacarVencedor">PV:</label>
                                        <input 
                                            type="number" 
                                            name="placarVencedor" 
                                            id="infoPlacarVencedor" 
                                            className="form-control" 
                                            value={this.state.placarVencedor} 
                                            onChange={(e) => this.handleChange(e)}
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="row">
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <label htmlFor="infoDescription">Descrição:</label>
                                    <textarea 
                                        required
                                        name="descricao"
                                        id="infoDescription" 
                                        className="form-control" 
                                        value={this.state.descricao}
                                        placeholder="Digite uma descrição..." 
                                        onChange={(e) => this.handleChange(e)}
                                    >
                                        {this.state.descricao}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                  
                        <button className="btn btn-success">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        )
    }
}

export default BolaoUpdate;

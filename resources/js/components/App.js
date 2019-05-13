import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Header from './Header';
import Bolao from './Bolao/Index';
import BolaoCreate from './Bolao/Create';
import Classificacao from './Classificacao';
import BolaoUpdate from './Bolao/Update';
import Regulamento from './Regulamento';
import Palpite from './Palpite';
import Footer from './Footer';
import Jogo from './Jogo';

class App extends Component {
  render () {
    return (
      <BrowserRouter>
        <React.Fragment>
          <Header />

          <Switch>
            <Route exact path="/bolao" component={Bolao} />
            <Route exact path="/bolao/novo" component={BolaoCreate} />
            <Route exact path="/bolao/editar/:id" component={BolaoUpdate} />
            <Route exact path="/classificacao" component={Classificacao} />
            <Route exact path="/regulamento" component={Regulamento} />
            <Route exact path="/palpite" component={Palpite} />
            <Route exact path="/jogo" component={Jogo} />
          </Switch>

          <Footer />
        </React.Fragment>
      </BrowserRouter>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))
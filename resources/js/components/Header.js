import React, { Component } from 'react';
import { Link } from 'react-router-dom';

import './../../sass/components/Header.scss';

class Header extends Component {
    logout(e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    }

    render() {
        return (
            <div id="header">
                <nav className='navbar navbar-expand-md navbar-dark bg-dark'>
                    <div className='container'>
                        <Link className='navbar-brand' to='/bolao'>VinúBolão</Link>

                        <button 
                            type="button" 
                            data-target="#menu" 
                            aria-controls="menu" 
                            aria-expanded="false" 
                            data-toggle="collapse" 
                            className="navbar-toggler">
                            <span className="navbar-toggler-icon"></span>
                        </button>

                        <div className="collapse navbar-collapse" id="menu">
                            <ul className="navbar-nav mr-auto">
                                <li className="nav-item">
                                    <Link className='nav-link' to='/bolao'>Home</Link>
                                </li>

                                <li className="nav-item">
                                    <Link className='nav-link' to='/classificacao'>Classificação</Link>
                                </li>

                                <li className="nav-item">
                                    <Link className='nav-link' to='/jogo'>Jogo</Link>
                                </li>

                                <li className="nav-item">
                                    <Link className='nav-link' to='/palpite'>Palpite</Link>
                                </li>

                                <li className="nav-item">
                                    <Link className='nav-link' to='/regulamento'>Regulamento</Link>
                                </li>
                            </ul>

                            <ul className="navbar-nav">
                                <li className="nav-item">
                                    <a href={route('logout')} className="nav-link" onClick={(e) => this.logout(e)}>
                                        Sair
                                    </a>
                                    <form id="logout-form" action={route('logout')} method="POST">
                                        <input type="hidden" name="_token" value={document.querySelector("meta[name='csrf-token']").getAttribute('content')} />
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        )
    }
} 

export default Header
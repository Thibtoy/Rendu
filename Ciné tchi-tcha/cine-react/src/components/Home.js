import React, { Component } from 'react';
// import $ from 'jquery';
import LandingPage from './LandingPage.js';
import FindFilm from './FindFilm.js';
import Footer from './Footer';

export default class Home extends Component {

  // componentWillMount() {
  //   $.post('http://localhost:8000/api/', function (data) {
  //     console.log(data);
  //     data.map((film) => console.log(film.Titre))
  //   })
  // }

  render() {
    return (
      <div id="body">
        <div id="Header"><h1 className="MasterFF">Header</h1></div>
        <div id="Carrousel"><h1 className="MasterFF">Carrousel</h1></div>
        <LandingPage></LandingPage>
        <FindFilm></FindFilm>
        <Footer></Footer>

      </div>

    );
  }
}


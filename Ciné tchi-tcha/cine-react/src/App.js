import React, { Component } from 'react';
import './style.scss';
// import $ from 'jquery';
import { BrowserRouter, Route, Switch } from "react-router-dom";


import Home from "./components/Home.js";
import Resa from './components/Resa';
import Error from "./components/Error";


class App extends Component {

  componentWillMount() {

    //   $.get('http://localhost:8000/api', function (data) {
    //     console.log(data.film);
    //   }
    //   );


    //   $.post('http://localhost:8000/api/', function (data) {
    //     console.log(data);
    //   })
  }



  render() {

    return (
      <BrowserRouter>
        <Switch>
          <Route path="/" component={Home} exact />
          <Route path="/resa" component={Resa} />
          <Route component={Error} />
        </Switch>
      </BrowserRouter>
    )

  }

} export default App;
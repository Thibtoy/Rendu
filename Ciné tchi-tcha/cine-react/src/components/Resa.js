import React from "react";
import Footer from "./Footer";
import { Link } from "react-router-dom";
import $ from 'jquery';



//const movieSelec = titres.map((movie) => <option value={movie}>{movie}</option>);



export default class extends React.Component {

	constructor() {
		super();
		this.state = {
			films: [],
         movies: [],
         seances: [],
		}
      this.handleSeance = this.handleSeance.bind(this);
	}

	componentWillMount() {
		let that = this;
		$.post('http://localhost:8000/api/', function (res) {
			let movies = res.map(function (movie, i) {
            that.state.movies.push(movie);
				return (
					<option key={i} value={movie.Id}>{movie.Titre}</option>
				);
			})
			that.setState({ films: movies })
		});
	}

	handleSubmit() {
		let seances = document.querySelectorAll("input[name='screening']");
		let seance;
		let film = document.getElementById('movieList').value;
		let length = seances.length;

		let nom = document.querySelector("input[name='lastname']").value;
		let prenom = document.querySelector("input[name='firstname']").value;
		let mail = document.querySelector("input[name='email']").value;
		console.log(nom, prenom, mail)

		for (var i = 0; i < length; i++) {
			if (seances[i].checked) {
				seance = parseInt(seances[i].value, 10);
			};
		}

		$.post('http://localhost:8000/api/Reservation', { film: film, seance: seance, nom: nom, prenom: prenom, email: mail }, function (response) {
			console.log(response, nom);
		})
	}

      handleSeance() {
      let filmId = parseInt(document.getElementById('movieList').value, 10);
      let length = this.state.movies.length;
      let seances = [];
      for (var i = 0; i < length; i++) {
         if (this.state.movies[i].Id === filmId) {
            let seanceLength = this.state.movies[i].Seances.length;
            for (var u = 0; u < seanceLength; u++) {
               let div = <div key={u}><input key={u} type="radio" name="screening" value={this.state.movies[i].Seances[u].Id}></input>{this.state.movies[i].Seances[u].Date.date}</div>
               seances.push(div);
         }
         this.setState({seances: seances});
      }
   }
}

	render() {
		// console.log(this.state.films);
		return (
			<div id="resa">
				<form>
					<fieldset>

						<legend>Film</legend>

						<select id="movieList" onChange={this.handleSeance}> {
							this.state.films
						}
						</select>
					</fieldset>

					<fieldset>

               <legend>Seances</legend>
               {this.state.seances}
					</fieldset>
					<fieldset>

						<legend>Coordonnées</legend>
						Nom: <input type="text" name="lastname"></input>
						<br></br>
						Prénom: <input type="text" name="firstname"></input>
						<br></br>
						E-mail: <input type="email" name="email"></input>
					</fieldset>

					<input type="checkbox" name="acceptConditions"></input> J'accepte de céder mon âme sans contrepartie.

                <br></br>

					<Link to="/"> <input type="button" value="Annuler"></input></Link>

					<input type="button" value="Valider la réservation" onClick={this.handleSubmit}></input>

				</form>

				<Footer></Footer>

			</div>
		)
	}
}
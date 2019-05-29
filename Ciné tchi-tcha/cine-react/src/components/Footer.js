import React from "react";

export default class Footer extends React.Component {
    render() {
        return (
            <div id="Footer">
                <div >
                    <p className="MasterFF">
                        Inscrivez-vous à notre newsletter
                    </p>
                    <form>
                        <input type="email" name="email" placeholder="Entrez votre adresse email"></input>
                        <button>✔</button>
                    </form>
                </div>
            </div>
        )
    }

}

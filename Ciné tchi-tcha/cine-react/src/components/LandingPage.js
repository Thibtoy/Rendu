import React from "react";
import { Link } from "react-router-dom";


export default class LandingPage extends React.Component {
    render() {
        return (
            <div id="LandingPage"> Landing page
               <Link to="/resa">
                    <button className="SiteButton">
                        Réservez maintenant
                    </button>
                </Link>

            </div>
        )
    }

}


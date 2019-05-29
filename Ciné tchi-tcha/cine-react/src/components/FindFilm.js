import React from "react";
import AfficheFilm from "./AfficheFilm.js"

export default class FindFilm extends React.Component {
    render() {
        return (
            <div id="FindFilm">
                <div>
                    <img alt="" />
                </div>
                <div>
                    <AfficheFilm></AfficheFilm>
                </div>
            </div>
        )
    }

}

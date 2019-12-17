import React, {useContext} from "react";
import AuthAPI from "../services/authAPI";
import {NavLink} from "react-router-dom";
import AuthContext from "../contexts/AuthContext";


const Navbar = ({history}) => {
    const {isAuthentificated, setIsAuthentificated} = useContext(AuthContext);
    const handleLogout = ()=>{
        AuthAPI.logout();
        setIsAuthentificated(false);
        history.push("/login");
    };

    return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
      <NavLink className="navbar-brand" to="/">
        Petites annonces
      </NavLink>
      <button
        className="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarColor01"
        aria-controls="navbarColor01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span className="navbar-toggler-icon"></span>
      </button>

      <div className="collapse navbar-collapse" id="navbarColor01">
        <ul className="navbar-nav mr-auto">
          <li className="nav-item">
            <NavLink className="nav-link" to="/ads">
              Annonces
            </NavLink>
          </li>
          <li className="nav-item">
            <NavLink className="nav-link" to="/categories">
              Categories
            </NavLink>
          </li>
          <li className="nav-item">
            <NavLink className="nav-link" to="/advertisers">
              Annonceurs
            </NavLink>
          </li>
        </ul>
        <ul className="navbar-nav ml-auto">

            {(! isAuthentificated && (
             <>
                <li className="nav-item">
                    <NavLink className="btn btn-warning btn-sm mr-2" to="/register">
                        Inscription
                    </NavLink>
                </li>
                <li className="nav-item">
                    <NavLink className="btn btn-success btn-sm mr-2" to="/login">
                        Connexion
                    </NavLink>
                </li>
            </>))||(
                <li className="nav-item">
                    <button onClick={handleLogout} className="btn btn-danger btn-sm" href="#">
                        Déconnexion
                    </button>
                </li>
            )}
            
        </ul>

      </div>
    </nav>
  );
};

export default Navbar;

//  Les imports important de react
import React,{useState, useContext} from "react";
import ReactDOM from "react-dom";
import Navbar from "./components/Navbar";
import HomePage from "./pages/HomePage";
import AdvertisersPage from "./pages/AdvertisersPage";
import AdvertiserPage from "./pages/AdvertiserPage";
import AdsPage from "./pages/AdsPage";
import { HashRouter, Switch, Route, withRouter, Redirect} from "react-router-dom";
import LoginPage from "./pages/LoginPage";
import AuthAPI from "./services/authAPI";
import AuthContext from "./contexts/AuthContext";
import PrivateRoute from "./components/PrivateRoute";

import AdvertisersPagesWithPagination from "./pages/AdvertisersPagesWithPagination";
//import Redirect from "react-router-dom/es/Redirect";
//import Route from "react-router-dom/es/Route";



require("../css/app.css");
AuthAPI.setup();
//console.log("Hello Webpack Encore! Edit me in assets/js/app.js");



const App = () => {
    const [isAuthentificated, setIsAuthentificated]= useState(
        AuthAPI.isAuthentificated()
    );

const NavbarWithRouter = withRouter(Navbar);

const contextValue = {
    isAuthentificated: isAuthentificated,
    setIsAuthentificated: setIsAuthentificated
};

  return (
      <AuthContext.Provider value={contextValue}>
        <HashRouter>
          <NavbarWithRouter/>

          <main className="container pt-5">
            <Switch>
                  <Route path="/login" component={LoginPage}/>
                  <PrivateRoute path="/ads" component={AdsPage}/>
                  <PrivateRoute path="/Advertisers/:id" component={AdvertiserPage}/>
                  <PrivateRoute path="/Advertisers" component={AdvertisersPage}/>
                  <Route path="/" component={HomePage} />

                 /* <Route path="/ads"
                        render={props => isAuthentificated ? (<AdsPage {...props}/>) : (
                          <Redirect to="/login" />
                        )
                      }
                    />*/
                  /*<Route path="/advertisers" component={AdvertisersPage} />*/
            </Switch>
          </main>
        </HashRouter>
      </AuthContext.Provider>
  );
};

const rootElement = document.querySelector("#app");
ReactDOM.render(<App />, rootElement);

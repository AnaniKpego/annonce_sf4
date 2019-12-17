import React, {useContext} from 'react';
import {Redirect, Route} from 'react-router-dom';
import AuthContext from '../contexts/AuthContext';

const PrivateRoute = ({path,component})=>{

   const {isAuthentificated} = useContext(AuthContext);

   return isAuthentificated ?(
        <Route path={path} component={component}/>
    ):(
        <Redirect to="/login"/>
    );
};

export default PrivateRoute;
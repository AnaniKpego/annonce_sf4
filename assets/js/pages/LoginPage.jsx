import React, {useState, useContext} from 'react';
import AuthContext from "../contexts/AuthContext";
import AuthAPI from "../services/authAPI";
import Field from "../components/forms/Field";

const LoginPage = ({history}) => {
    const {setIsAuthentificated}= useContext(AuthContext);

    const [credentials, setCredentials]= useState({
       username:"",
       password:""
    });

    const [error, setError] = useState("");

    //Gestion des champs
    const handleChange = ({currentTarget})=>{
      const {value, name} = currentTarget;
      setCredentials({...credentials,[name]: value});

    };

    //Gestion du submit
    const handleSubmit = async event=>{
        event.preventDefault();

        try {
          await AuthAPI.authentificated(credentials);
          setError("");
          setIsAuthentificated(true);
          history.replace('/ads');
          //history.replace('/advertisers');
        }catch (error) {
            setError("Erreur: coordonnée invalide");
        }
    };


    return <>
        <h1>Page de connexion</h1>
        <form onSubmit={handleSubmit}>
            <Field label="Adresse email"
                   name="username"
                   value={credentials.username}
                   onChange={handleChange}
                   placeholder="Adresse email de connexion"
                   error={error}
            />
            <Field label="Mot de passe"
                   name="password"
                   value={credentials.password}
                   onChange={handleChange}
                   type="password"
                   error={error}
            />

            <div className="form-group">
                <button type="submit" className="btn btn-success">Login</button>
            </div>
        </form>
    </>;
}
 
export default LoginPage;

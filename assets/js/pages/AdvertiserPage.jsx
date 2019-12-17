import React, {useState} from 'react'
import Field from './../components/forms/Field';
import {Link} from "react-router-dom";
import axios from "axios";
const AdvertiserPage = props => {

    const [advertiser, setAdvertiser]= useState({
 
        lastname: "",
        firstname: "",
        email: "",
        password: "",
        country: "",
        city: "",
        phone: ""
    });

    const handleChange = ({currentTarget})=>{
      const {name, value}= currentTarget;
      setAdvertiser({...advertiser,[name]:value});
    };
    const handleSubmit = async event=>{
      event.preventDefault();
      try {
          const response = await axios.post(
              "http://localhost:8000/api/advertisers",
              advertiser
          );
          console.log(response.data);
      }catch (error) {
          console.log(error);
      }
      //console.log(advertiser);
    };

    const [errors, setErrors] = useState({
       lastname:"",
       firstname:"",
       email: "",
       password: "",
       country: "",
       city: "",
       phone: ""

    });

    return (
            <>
               <h1 className="text-center"> Création d'un Annoceur</h1>
                <form onSubmit={handleSubmit}>
                    <Field name="lastname"
                           label="Nom"
                           placeholder="Non de l'annonceur"
                           value={advertiser.lastname}
                           onChange={handleChange}
                           error={errors.lastname}
                    />
                    <Field name="firstname"
                           label="Prénom"
                           placeholder="Prénom de l'annonceur"
                           value={advertiser.firstname}
                           onChange={handleChange}
                           error={errors.firstname}
                    />
                    <Field name="email"
                           label="Email"
                           placeholder="Adresse email"
                           type="email"
                           value={advertiser.email}
                           onChange={handleChange}
                           error={errors.email}
                    />
                    <Field name="password"
                           label="Mot de passe"
                           placeholder="Mot de passe"
                           type="password"
                           value={advertiser.password}
                           onChange={handleChange}
                           error={errors.password}
                    />
                    <Field name="country"
                           label="Pays"
                           placeholder="Pays"
                           value={advertiser.country}
                           onChange={handleChange}
                           error={errors.country}
                    />
                    <Field name="city"
                           label="Ville"
                           placeholder="Ville"
                           value={advertiser.city}
                           onChange={handleChange}
                           error={errors.city}
                    />
                    <Field name="phone"
                           label="phone"
                           placeholder="Téléphone"
                           value={advertiser.phone}
                           onChange={handleChange}
                           error={errors.phone}
                    />

                    <div className="form-group">
                        <button type="submit" className="btn btn-success">Enregistrer</button>
                        <Link to="/advertisers" className="btn btn-link"> Retour à la liste</Link>
                    </div>
                </form>


            </>
        );
};
 
export default AdvertiserPage;
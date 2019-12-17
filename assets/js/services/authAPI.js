import axios from "axios";
import jwtDecode from "jwt-decode";

/**
 * Logout function, deleted jwt token
 */
function logout() {
    window.localStorage.removeItem("authToken");
    delete axios.defaults.headers["Authorization"];
}

/**
 * login function, save the jwt token after post method
 * @param credentials
 * @returns {Promise<AxiosResponse<any>>}
 */
function authentificated(credentials) {
   return axios
        .post("http://localhost:8000/api/login_check",credentials)
        .then(response => response.data.token)
        .then(token => {
            //Je stocke le token dans le localStorage
            window.localStorage.setItem("authToken",token);
            /*On previent Axios qu'on a maintenant
             un header sur toutes nos futur requetes http*/
            setAxiosToken(token);
            //console.log(token);
        });

}

/**
 * verification jwt token in the header
 * @param token
 */
function setAxiosToken(token) {
    axios.defaults.headers["Authorization"] = "Bearer "+ token;
}


/**
 * this Function permit to validate the jwt token for the firstly opened page
 */
function setup() {
    //1 on verifie si on a un token
    const token = window.localStorage.getItem("auhToken");
    console.log(token);
    //2 si le token est encore valide
    if (token){
        const {exp: expiration} = jwtDecode(token);
        if (expiration * 1000 > new Date().getTime()){
            setAxiosToken(token);
        }
    }
}

/**
 * jwt token validation
 * @returns {boolean}
 */
function isAuthentificated(){
    //1 on verifie si on a un token
    const token = window.localStorage.getItem("auhToken");
    console.log(token);
    //2 si le token est encore valide
    if (token){
        const {exp: expiration} = jwtDecode(token);
        if (expiration * 1000 > new Date().getTime()){
            return true;
        }
        return false;
    }
    return false;
}

export default {
    authentificated,
    logout,
    setup,
    isAuthentificated
};


import axios from "axios";

function findAll() {
 return axios
     .get("http://localhost:8000/api/advertisers")
     .then(response => response.data["hydra:member"]);
}
function deleteAdvertisers(id) {
    return axios
        .delete("http://localhost:8000/api/advertisers/" + id);
}

export default {
    findAll,
    delete:deleteAdvertisers
    //delete:deleteAdvertisers()

};
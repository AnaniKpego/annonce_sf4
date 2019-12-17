import axios from "axios/index";

function findAll() {
    return axios
        .get("http://localhost:8000/api/ads")
        .then(response => response.data["hydra:member"]);
}
function deleteAds(id) {
    return axios
        .delete("http://localhost:8000/api/ads/" + id);
}

export default {
    findAll,
    //delete: deleteAds()
    delete:deleteAds

};
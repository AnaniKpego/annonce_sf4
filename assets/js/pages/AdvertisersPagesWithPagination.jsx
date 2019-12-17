import React, { useEffect, useState } from "react";
import axios from "axios";
import Pagination from "../components/Pagination";

const AdvertisersPageWithPagination = props => {
  const [advertisers, setAdvertisers] = useState([]);
  const[totalItems, setTotalItems] = useState(0);
  const [currentPage, setCurrentPage] = useState(1);

        // Nombre d'elements par page
  const itemsPerPage = 10;

  useEffect(() => {
    axios
      .get('http://localhost:8000/api/advertisers?pagination=true&count=${itemsPerPage}&page=${currentPage}')
      .then(response =>{
         setAdvertisers( response.data["hydra:member"]);
         setTotalItems(response.data["hydra:totalItems"]);
          })
      .catch(error => console.log(error.response));
  }, [currentPage]);

  const handleDelete = id => {

    const originalAdvertisers = [...advertisers];



    //1-Suppression par l'approche optimiste
    setAdvertisers(advertisers.filter(advertiser =>advertiser.id !== id));

    //2-Suppression par l'approche péssimiste
    axios
      .delete("http://localhost:8000/api/advertisers/" + id)
      .then(response => console.log("ok"))
      .catch(error => {
        setAdvertisers(originalAdvertisers);
        console.log(error.response);
      });
      
  };

  // Changer de page
  const handlePageChange = page =>{
    setCurrentPage(page);
  };

  const paginatedAdvertisers = Pagination.getData(advertisers, currentPage, itemsPerPage);




  return (
    <>
      <h1 className="text-center">Liste des Annonceurs(avec pagination)</h1>
      <table className="table table-hover table-responsive">
        <thead>
          <tr>
            <th>Id</th>
            <th>Annonceur</th>
            <th> Annonce</th>
            <th> Catégorie</th>
            <th>Email</th>
            <th>Pays</th>
            <th>Villes</th>
            <th>Téléphone</th>

            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {advertisers.map(advertiser => (
            <tr key={advertiser.id}>
              <td>{advertiser.id}</td>
              <td>
                <a href="#">
                  {advertiser.firstname} {advertiser.lastname}
                </a>
              </td>
              <td>
                <span className="badge badge-primary">
                  {advertiser.ads.length}
                </span>
              </td>
              <td>
                <span className="badge badge-success">
                  {advertiser.categories.length}
                </span>
              </td>
              <td>
                <a href="#">{advertiser.email}</a>
              </td>
              <td>{advertiser.country}</td>
              <td>{advertiser.city}</td>
              <td>
                <a href="#">{advertiser.phone}</a>
              </td>
              <td>
                <button
                  onClick={() => handleDelete(advertiser.id)}
                  className="btn btn-sm btn-danger"
                  disabled={advertiser.ads.length >0}
                >
                  supprimer
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
      <Pagination currentPage={currentPage} itemsPerPage={itemsPerPage} length={totalItems} 
        onPageChanged={handlePageChange} />
      

    </>
  );
};
export default AdvertisersPageWithPagination;

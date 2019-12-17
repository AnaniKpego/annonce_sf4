import React, { useEffect, useState } from "react";
import axios from "axios";
import Pagination from "../components/Pagination";
import AdsAPI from "../services/adsAPI";
import moment from "moment";


const STATUS_CLASSES={
    Sale:'warning',
    Leasing: 'success'
};
const STATUS_LIBELE={
    Sale:'En vente',
    Leasing: 'En location'
};
const AdsPage = props => {
    const [ads, setAds]= useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [search, setSearch] = useState("");


    const fetchAds = async ()=>{

        try {
            const data = await AdsAPI.findAll();
            setAds(data);
        }catch (error) {
            console.log(error.response);
        }
    };



    useEffect(() => {
        fetchAds();
    }, []);

    // Nbre d'element par page
    const itemsPerPage = 150;


    // pagination
    const handlePageChange = page => setCurrentPage(page);

    //Recherche
    const handleSearch = ({currentTarget}) =>{
        setSearch(currentTarget.value);
        setCurrentPage(1);
    };


    const formatDate = (str) => moment(str).format('DD/MM/YYYY');

    // //Gestion de la recherche
    const filteredAds = ads.filter(
        s =>
             s.advertisers.firstname.toLowerCase().includes(search.toLowerCase()) ||
             s.advertisers.lastname.toLowerCase().includes(search.toLowerCase())||
             s.title.toLowerCase().includes(search.toLowerCase())||
             s.country.toLowerCase().includes(search.toLowerCase())||
             s.city.toLowerCase().includes(search.toLowerCase())||
             s.sellingprice.toString().toLowerCase().includes(search.toLowerCase())||
             s.monthlyprice.toString().toLowerCase().includes(search.toLowerCase())||
             s.annualprice.toString().toLowerCase().includes(search.toLowerCase())||
             s.dailyprice.toString().toLowerCase().includes(search.toLowerCase())||
             STATUS_LIBELE[s.statu].toLowerCase().includes(search.toLowerCase())
    );

    const paginatedAds = Pagination.getData
    (
        filteredAds,
        currentPage,
        itemsPerPage
    );

    //Gestion de la suppression

    const handleDelete = async id => {
        const originalAds = [...ads];

        setAds(ads.filter(ad =>ad.id !== id));
        try {
           await axios.delete("http://localhost:8000/api/ads" + id);
        }catch (error) {
            console.log(error.response);
            setAds(originalAds);
        }
    };


    return <>
          <h1 className="text-center"> Liste des annonces</h1>

          <div className="form-group">
              <input type="text" onChange={handleSearch} value={search} className="form-control"
                     placeholder="Rechercher..."/>
          </div>

          <table className="table table-hover table-responsive">
              <thead>
                  <tr>
                      <th>N°</th>
                      <th>Titre</th>
                      <th>Annonceurs</th>
                      <th>Prix de vente</th>
                      <th>Location/jour</th>
                      <th>Location/mois</th>
                      <th>Location/année</th>
                      <th>Pays</th>
                      <th>Ville</th>
                      <th>Tel</th>
                      <th>Publié le</th>
                      <th>Delais</th>
                      <th>Statu</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              { paginatedAds.map(ad =>
                  <tr key={ad.id}>
                      <td>{ad.id}</td>
                      <td>{ad.title}</td>
                      <td>{ad.advertisers.firstname} {ad.advertisers.lastname} </td>
                      <td className="text-center">{ad.sellingprice.toLocaleString()}</td>
                      <td className="text-center">{ad.dailyprice.toLocaleString()}</td>
                      <td className="text-center">{ad.monthlyprice.toLocaleString()}</td>
                      <td className="text-center">{ad.annualprice.toLocaleString()}</td>
                      <td>{ad.country}</td>
                      <td>{ad.city}</td>
                      <td>{ad.phone}</td>
                      <td className="text-center">{formatDate(ad.opened_at)}</td>
                      <td className="text-center">{formatDate(ad.closed_at)}</td>
                      <td>
                      <span className={"badge badge-"+STATUS_CLASSES[ad.statu]}>
                          {STATUS_LIBELE[ad.statu]}
                      </span>
                      </td>
                      <td>
                          <button className="btn-sm btn-primary">Voir</button> &nbsp;
                          <button className="btn-sm btn-danger" onClick={()=>handleDelete(ad.id)}>supprimer</button>
                      </td>
                  </tr>
              )}
              </tbody>
          </table>
        {itemsPerPage <filteredAds.length &&
        (
            <Pagination
                currentPage={currentPage}
                itemsPerPage={itemsPerPage}
                length={filteredAds.length}
                onPageChanged={handlePageChange}
            />
        )
        }

      </>;
};
export default AdsPage;
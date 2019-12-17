import React, { useEffect, useState } from "react";
import axios from "axios";
import Pagination from "../components/Pagination";
import AdvertisersAPI from "../services/advertisersAPI";
import {Link} from "react-router-dom";


const AdvertisersPage = props => {
    const [advertisers, setAdvertisers] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [search, setSearch] = useState("");

    //Recuperation des Advertisers
    const fetchAdvertisers = async()=>{
        try {
            const data = await AdvertisersAPI.findAll();
            setAdvertisers(data);
        }catch (error) {
            console.log(error.response);
        }
    };
    useEffect(() =>{
        fetchAdvertisers()
    },[]) ;

    //Gestion de la suppression
    const handleDelete = async id => {
        const originalAdvertisers = [...advertisers];
        setAdvertisers(advertisers.filter(advertiser =>advertiser.id !== id));
        try {
            await AdvertisersAPI.delete(id);
        }catch (error) {
            setAdvertisers(originalAdvertisers);
        }

    };

    //Recherche
    const handleSearch = ({currentTarget}) =>{
        setSearch(currentTarget.value);
        setCurrentPage(1);
    };

    // Nbre d'element par page
    const itemsPerPage = 10;

    const filteredAdvertisers = advertisers.filter(
        a => a.firstname.toLowerCase().includes(search.toLowerCase()) ||
             a.lastname.toLowerCase().includes(search.toLowerCase())||
             a.email.toLowerCase().includes(search.toLowerCase())||
             a.phone.toLowerCase().includes(search.toLowerCase())
    );

    // pagination
    const handlePageChange = page => setCurrentPage(page);

    const paginatedAdvertisers = Pagination.getData
    (
        filteredAdvertisers,
        currentPage,
        itemsPerPage
    );

    return <>
                <div className="mb-3 d-flex justify-content-between align-items-center">
                    <h1>Liste des Annonceurs </h1>
                    <Link to="/advertisers/new" className="btn btn-primary"> Crée un Annonceur</Link>
                </div>
                <div className="form-group">
                    <input type="text" onChange={handleSearch} value={search} className="form-control"
                           placeholder="Rechercher..."/>
                </div>

                <table className="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>N°</th>
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
                    {paginatedAdvertisers.map(advertiser => (
                        <tr key={advertiser.id.toString()}>
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
                                    disabled={advertiser.ads.length > 0}
                                >
                                    supprimer
                                </button>
                            </td>
                        </tr>
                    ))}
                    </tbody>
                </table>
                {itemsPerPage <filteredAdvertisers.length &&
                    (
                        <Pagination
                            currentPage={currentPage}
                            itemsPerPage={itemsPerPage}
                            length={filteredAdvertisers.length}
                            onPageChanged={handlePageChange}
                        />
                    )
                }
        </>;
 };
export default AdvertisersPage;

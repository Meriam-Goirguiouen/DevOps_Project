<?php

namespace App\Controllers;
use App\Models\PanierModel;

class PanierController extends BaseController
{
    public function index()
    {
        $model = new PanierModel();
        $data['panier'] = $model->findAll(); // Récupère tous les paniers
        return view('panier_list', $data);   // Affiche la vue panier_list avec les données
    }

    public function create()
    {
        return view('create_panier'); // Affiche la vue pour créer un panier
    }
}

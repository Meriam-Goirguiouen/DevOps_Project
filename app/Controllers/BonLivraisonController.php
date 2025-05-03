<?php 
namespace App\Controllers;

use App\Models\BonLivraisonModel;

class BonLivraison extends BaseController
{
    public function index()
    {
        $model = new BonLivraisonModel();
        $data['bons'] = $model->findAll();
        return view('bon_livraison/index', $data);
    }

    public function create()
    {
        return view('bon_livraison/create');
    }

    public function store()
    {
        $model = new BonLivraisonModel();
        $model->save([
            'dateCommande' => $this->request->getPost('dateCommande'),
            'idclient' => $this->request->getPost('idclient'),
            // 'etat' => 'en cours',
        ]);
        return redirect()->to('/bonlivraison');
    }
}
?>
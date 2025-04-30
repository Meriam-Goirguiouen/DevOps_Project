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
            'date' => $this->request->getPost('date'),
            'client_id' => $this->request->getPost('client_id'),
            'etat' => 'en cours',
        ]);
        return redirect()->to('/bonlivraison');
    }
}
?>
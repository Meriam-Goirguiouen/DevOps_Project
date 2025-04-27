<?php
namespace App\Controllers;
use App\Models\FactureModel;

class FactureController extends BaseController
{
    public function index()
    {
        $model = new FactureModel();
        $data['facture'] = $model->findAll();
        return view('facture_view',$data);
    }
}
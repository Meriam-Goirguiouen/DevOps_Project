<?php

namespace App\Controllers;
use App\Models\LigneBonLModel;

class LigneBonLController extends BaseController
{
    public function index()
    {
        $model = new LigneBonLModel();
        $data['lignebonlivraison'] = $model->findAll();
        return view('Ligne_List',$data);
    }
    public function create(){
        return view('create_ligne');
    }
}

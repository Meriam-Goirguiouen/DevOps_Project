<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PanierModel;

class PanierModelTest extends CIUnitTestCase
{
    public function testFindAllPaniers()
    {
        $model = new PanierModel();
        $paniers = $model->findAll();

        $this->assertIsArray($paniers, "findAll doit retourner un tableau.");
    }

    public function testInsertPanier()
    {
        $model = new PanierModel();

        $data = [
            'date_commande' => date('Y-m-d'),
            'client' => 'Karima Ait Elkhir',
        ];

        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "L'ID du panier inséré doit être > 0.");
    }
}

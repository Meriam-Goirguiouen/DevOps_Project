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

    public function testInsertedPanierIsRetrievable()
    {
        $model = new PanierModel();

        $data = [
            'date_commande' => date('Y-m-d'),
            'client' => 'Test Client',
        ];

        $id = $model->insert($data);

        $panier = $model->find($id);

        $this->assertNotNull($panier, "Le panier inséré doit être retrouvable.");
        $this->assertEquals('Test Client', $panier['client'], "Le nom du client doit correspondre.");
        $this->assertEquals(date('Y-m-d'), $panier['date_commande'], "La date de commande doit correspondre.");
    }
}

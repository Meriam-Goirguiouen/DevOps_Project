<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PanierModel;

class PaniersModelTest extends CIUnitTestCase{
    public function testFindAllPanier() {
        $Pmodel = new PanierModel();
        $pnrs = $Pmodel->findAll();
        $this->assertIsArray($pnrs,"findAll doit retourner un tableau !");
    }

    public function testInsertPanier()
    {
       $model = new PanierModel();

        $data = [
            'dateCommande' => "2025-04-22",
            'client' => 'Karima Ait Elkhir',
        ];

        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "L'ID du panier inséré doit être > 0.");
    }

    public function testInsertedPanierIsRetrievable()
    {
        $model = new PanierModel();

        $data = [
            'dateCommande' => "2025-04-11",
            'client' => 'Test Client',
        ];

        $id = $model->insert($data);

        $panier = $model->find($id);

        $this->assertNotNull($panier, "Le panier inséré doit être retrouvable.");
        $this->assertEquals('Test Client', $panier['client'], "Le nom du client doit correspondre.");
        $this->assertEquals("2025-04-11", $panier['dateCommande'], "La date de commande doit correspondre.");
    }
}
?>
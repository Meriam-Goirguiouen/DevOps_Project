<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\BonLivraisonModel;

class BonLivraisonModelTest extends CIUnitTestCase
{
    protected $bonModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bonModel = new BonLivraisonModel();
    }

    public function testInsertBonLivraison()
    {
        $data = [
            'dateCommande' => date('Y-m-d'),
            'idclient' => 1,
        ];

        $id = $this->bonModel->insert($data);

        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }

    public function testFindBonLivraison()
    {
        $data = [
            'dateCommande' => date('Y-m-d'),
            'idclient' => 2,
        ];

        $id = $this->bonModel->insert($data);

        $result = $this->bonModel->find($id);

        $this->assertNotNull($result);
        $this->assertEquals($data['idclient'], $result['idclient']); 
        $this->assertEquals($data['dateCommande'], $result['dateCommande']); 
    }

    public function testUpdateBonLivraison()
    {
        $id = $this->bonModel->insert([
            'dateCommande' => date('Y-m-d'),
            'idclient' => 3,
        ]);

        // On met à jour le client
        $this->bonModel->update($id, ['idclient' => 99]);

        $updated = $this->bonModel->find($id);

        $this->assertNotNull($updated);
        $this->assertEquals(99, $updated['idclient']); 
    }

    public function testDeleteBonLivraison()
    {
        $id = $this->bonModel->insert([
            'dateCommande' => date('Y-m-d'),
            'idclient' => 4,
        ]);

        $this->bonModel->delete($id);
        $deleted = $this->bonModel->find($id);

        $this->assertNull($deleted);
    }
}

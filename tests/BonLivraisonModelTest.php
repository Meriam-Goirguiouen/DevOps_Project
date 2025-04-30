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
            'date' => date('Y-m-d'),
            'client_id' => 1,
            'etat' => 'en cours'
        ];

        $id = $this->bonModel->insert($data);

        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }

    public function testFindBonLivraison()
    {
        $data = [
            'date' => date('Y-m-d'),
            'client_id' => 2,
            'etat' => 'en cours'
        ];

        $id = $this->bonModel->insert($data);

        $result = $this->bonModel->find($id);

        $this->assertNotNull($result);
        $this->assertEquals($data['client_id'], $result['client_id']);
    }

    public function testUpdateBonLivraison()
    {
        $id = $this->bonModel->insert([
            'date' => date('Y-m-d'),
            'client_id' => 3,
            'etat' => 'en cours'
        ]);

        $this->bonModel->update($id, ['etat' => 'livré']);
        $updated = $this->bonModel->find($id);

        $this->assertEquals('livré', $updated['etat']);
    }

    public function testDeleteBonLivraison()
    {
        $id = $this->bonModel->insert([
            'date' => date('Y-m-d'),
            'client_id' => 4,
            'etat' => 'en cours'
        ]);

        $this->bonModel->delete($id);
        $deleted = $this->bonModel->find($id);

        $this->assertNull($deleted);
    }
}

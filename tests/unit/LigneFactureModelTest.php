<?php

namespace Tests;

use App\Models\LigneFactureModel;
use CodeIgniter\Test\CIUnitTestCase;

class LigneFactureModelTest extends CIUnitTestCase
{
    public function testInsertAndFind()
    {
        $model = new LigneFactureModel();

        $data = [
            'idArticle' => 2,
            'Qte'       => 5,
            'PU'        => 100.0,
        ];

        $id = $model->insert($data);
        $this->assertIsInt($id);

        $found = $model->find($id);
        $this->assertNotNull($found);
        $this->assertEquals($data['Qte'], $found['Qte']);
    }

    public function testGetByArticle()
    {
        $model = new LigneFactureModel();

        $articleId = 2;

        // Insert dummy data to ensure something is returned
        $model->insert([
            'idArticle' => $articleId,
            'Qte'       => 3,
            'PU'        => 50.0,
        ]);

        $results = $model->getByArticle($articleId);
        $this->assertIsArray($results);
        $this->assertNotEmpty($results);
    }

    public function testUpdateQuantite()
    {
        $model = new LigneFactureModel();

        $data = [
            'idArticle' => 3,
            'Qte'       => 2,
            'PU'        => 150.0,
        ];

        $id = $model->insert($data);
        $this->assertIsInt($id);

        $updateResult = $model->updateQuantite($id, 10);
        $this->assertTrue($updateResult);

        $updated = $model->find($id);
        $this->assertEquals(10, $updated['Qte']);
    }
}
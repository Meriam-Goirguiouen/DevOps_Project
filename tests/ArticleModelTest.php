<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase; // If you're using CodeIgniter's base
use App\Models\ArticleModel;

class ArticleModelTest extends CIUnitTestCase
{
    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new ArticleModel();
    }

    public function testValidArticleInsertion()
{
    $result = $this->model->insert([
        'nom' => 'Valid Article',
        'ref' => 'VALID001',
        'qteDeStock' => 20,
    ]);

    if ($result === false) {
        // Output validation errors
        echo "Errors: ";
        print_r($this->model->errors());
    }

    $this->assertIsInt($result, 'Valid insertion should return an integer ID.');
}

    public function testMissingFieldsShouldFail()
    {
        $data = [
            'ref' => 'REF002',
            // Missing 'nom'
        ];

        $result = $this->model->insert($data);
        $this->assertFalse($result);
        $this->assertArrayHasKey('nom', $this->model->errors());
    }

    public function testDuplicateRefIsRejected()
    {
        $data = [
            'nom' => 'Duplicate Test',
            'ref' => 'DUPL001',
            'qteDeStock' => 5,
        ];

        $this->model->insert($data);
        $result = $this->model->insert($data);

        $this->assertFalse($result);
        $this->assertArrayHasKey('ref', $this->model->errors());
    }

    public function testUpdateArticle()
{
    $result = $this->model->insert([
        'nom' => 'Test Article',
        'ref' => 'TEST123',
        'qteDeStock' => 10,
    ]);

    if ($result === false) {
        echo "Insert failed. Errors: ";
        print_r($this->model->errors());
        return;
    }

    $articleId = $result; 

    $updateResult = $this->model->update($articleId, [
        'nom' => 'Updated Test Article',
        'qteDeStock' => 20,
    ]);

    $this->assertTrue($updateResult, 'Article should be updated successfully.');
}


    public function testDeleteArticle()
    {
        $id = $this->model->insert([
            'nom' => 'ToDelete',
            'ref' => 'DEL001',
            'qteDeStock' => 15,
        ]);

        $this->model->delete($id);
        $deleted = $this->model->find($id);
        $this->assertNull($deleted);
    }

    public function testNegativeStockIsRejected()
{
    $result = $this->model->insert([
        'nom' => 'Negative Stock',
        'ref' => 'NEG001',
        'qteDeStock' => -5,  
    ]);

    $this->assertFalse($result);  // The insert should fail

    $this->assertArrayHasKey('qteDeStock', $this->model->errors());
    $this->assertEquals('The quantity in stock must be a positive number.', $this->model->errors()['qteDeStock']);
}


    public function testSpecialCharactersInName()
{
    $result = $this->model->insert([
        'nom' => 'Article @#$%',
        'ref' => 'REF12345',
        'qteDeStock' => 15,
    ]);

    if ($result === false) {
        // Output validation errors
        echo "Errors: ";
        print_r($this->model->errors());
    }

    $this->assertIsInt($result, 'Inserting article with special characters in name should return an integer ID.');
}


    public function testEmptyRefShouldFail()
    {
        $result = $this->model->insert([
            'nom' => 'Empty Ref',
            'ref' => '',
            'qteDeStock' => 10,
        ]);

        $this->assertFalse($result);
        $this->assertArrayHasKey('ref', $this->model->errors());
    }


}

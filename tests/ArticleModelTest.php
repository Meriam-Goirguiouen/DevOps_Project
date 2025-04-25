<?php
namespace App\Tests\Models;
use PHPUnit\Framework\TestCase;
use App\Models\ArticleModel;
use CodeIgniter\Model;
  
 class ArticleModelTest extends TestCase{
    public function testFindAllArticles(){
        $model = new ArticleModel();
        $articles = $model->findAll();

        $this->assertIsArray($articles,"findAll retourne un tableau !");
    }
    
    // public function testCanCreateArticle()
    // {
    //     $model = new ArticleModel();
    //     $data = [
    //         'nom' => 'Stylo',
    //         'ref' => 'STY123',
    //         'qteDeStock' => 30
    //     ];

    //     $id = $model->insert($data);
    //     $this->assertIsInt($id);
    // }


    public function testDuplicateRefIsRejected()
    {
        $model = new ArticleModel();
    
        $result1 = $model->insert([
            'nom' => 'First Article',
            'ref' => 'DUPL001',
            'qteDeStock' => 20,
        ]);
    
        if ($result1 === false) {
            print_r($model->errors()); 
        }
    
        $this->assertIsInt($result1, 'First insert should return an integer ID.');
    
        $result2 = $model->insert([
            'nom' => 'Second Article',
            'ref' => 'DUPL001',
            'qteDeStock' => 30,
        ]);
    
        $this->assertFalse($result2, 'Second insert with duplicate ref should return false.');
        $this->assertArrayHasKey('ref', $model->errors(), 'Validation error should be on "ref".');
    }
    
 }


 
?>
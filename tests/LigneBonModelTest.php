<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\LigneBonLModel;

class LigneBonModelTest extends TestCase {

    public function testFindAllLignesBonL() {
        $model = new LigneBonLModel();
        $lignes = $model->findAll();
        $this->assertIsArray($lignes, "findAll doit retourner un tableau");
    }

    public function testInsertLignesBonL() {
        $model = new LigneBonLModel();
        $data = ['libelle' => 'Produit', 'qte' => 15];
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "ID inséré doit être > 0");
     
    }

}
?>
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
    public function testUpdateLigneBonL() {
    $model = new LigneBonLModel();

    // Insertion initiale
    $data = ['libelle' => 'Table basse', 'qte' => 3];
    $id = $model->insert($data);

    $updateData = ['libelle' => 'Table haute', 'qte' => 7];
    $result = $model->update($id, $updateData);

    // Récupération de la ligne mise à jour
    $updatedLine = $model->find($id);

    $this->assertTrue($result, "La méthode update doit retourner true en cas de succès");
    $this->assertIsArray($updatedLine, "La ligne mise à jour doit être un tableau");
    $this->assertEquals('Table haute', $updatedLine['libelle'], "Le libellé doit avoir été mis à jour");
    $this->assertEquals(7, $updatedLine['qte'], "La quantité doit avoir été mise à jour");
}

}
?>
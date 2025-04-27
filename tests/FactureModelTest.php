<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\FactureModel;

class FactureModelTest extends TestCase {

    public function testFindAllFactures() {
        $model = new FactureModel();
        $factures = $model->findAll();

        $this->assertIsArray($factures, "findAll doit retourner un tableau !");
    }

    public function testInsertFacture() {
        $model = new FactureModel();
        $data = [
            'dateFacture' => '2025-04-23',
            'client'  => 'Silya Tech',
            'total'   => 2999.99
        ];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID de facture insérée doit être > 0");
    }

    public function testFindByIdFacture() {
        $model = new FactureModel();
        $data = [
            'dateFacture' => '2025-04-23',
            'client'  => 'Test Client',
            'total'   => 1500.00
        ];
        $id = $model->insert($data);

        $facture = $model->find($id);
        $this->assertNotNull($facture, "La facture doit exister");
        $this->assertNotNull($facture['client'], "Le client ne doit pas être null");
        $this->assertEquals($data['client'], $facture['client'], "Le nom du client doit correspondre");
        $this->assertEquals($data['total'], $facture['total'], "Le total doit correspondre");
    }
}
?>
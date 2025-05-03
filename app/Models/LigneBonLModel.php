<?php
namespace App\Models;

use CodeIgniter\Model;

class LigneBonLModel extends Model {
    protected $table = 'lignebonlivraison';
    protected $primaryKey = 'id';
    protected $allowedFields = ['libelle', 'qte'];
}

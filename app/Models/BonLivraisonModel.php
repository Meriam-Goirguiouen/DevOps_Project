<?php
namespace App\Models;

use CodeIgniter\Model;

class BonLivraisonModel extends Model
{
    protected $table = 'bon_livraison';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date', 'client_id', 'etat'];
}
?>
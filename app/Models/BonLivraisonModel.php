<?php
namespace App\Models;

use CodeIgniter\Model;

class BonLivraisonModel extends Model
{
    protected $table = 'bonlivrasion';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dateCommande', 'idclient'];
}
?>
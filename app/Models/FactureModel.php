<?php
namespace App\Models;
use CodeIgniter\Model;

class FactureModel extends Model{
    protected $table = 'facture';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dateFacture','client','total'];
}
?>
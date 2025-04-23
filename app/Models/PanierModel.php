<?php
namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table = 'panier'; // Nom de la table dans ta base de données
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = ['dateCommande', 'client']; // Champs autorisés à être insérés/modifiés
}
?>


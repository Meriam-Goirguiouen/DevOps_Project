<?php

namespace App\Models;

use CodeIgniter\Model;

class LigneFactureModel extends Model
{
    protected $table = 'lignefacture';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'idArticle',
        'Qte',
        'PU',
    ];

    // Get all invoice lines by Article ID
    public function getByArticle(int $articleId)
    {
        return $this->where('idArticle', $articleId)->findAll();
    }

    // Update quantity for a specific line
    public function updateQuantite(int $id, int $quantite)
    {
        return $this->update($id, ['Qte' => $quantite]);
    }

    // Optional: Get all lines with quantity above a threshold
    public function getWithMinQuantite(int $min)
    {
        return $this->where('Qte >=', $min)->findAll();
    }
}
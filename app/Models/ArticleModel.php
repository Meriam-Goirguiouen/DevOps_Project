<?php
namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table      = 'article';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nom', 'ref', 'qteDeStock'];
    protected $useAutoIncrement = true;

    protected $validationRules = [
        'nom' => 'required',
        'ref' => 'required|is_unique[article.ref]',
        'qteDeStock' => 'required|integer',
    ];
    
    protected $validationMessages = [
        'ref' => [
            'is_unique' => 'This reference already exists.',
        ]
        ];

    protected $returnType = 'array';
}

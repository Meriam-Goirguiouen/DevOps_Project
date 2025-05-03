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
        'nom'        => 'required|max_length[255]',
        'ref'        => 'required|max_length[50]|is_unique[article.ref]',
        'qteDeStock' => 'required|is_natural_no_zero'
    ];
    
    protected $validationMessages = [
        'ref' => [
            'is_unique' => 'This reference already exists.',
        ],
        'qteDeStock' => [
            'is_natural_no_zero' => 'The quantity in stock must be a positive number.',
        ]
        ];

    protected $returnType = 'array';
}

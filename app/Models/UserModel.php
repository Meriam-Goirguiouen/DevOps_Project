<?php
namespace App\Models;
use CodeIgneiter\Model;

class UserModel extends Model{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','email'];
}
?>
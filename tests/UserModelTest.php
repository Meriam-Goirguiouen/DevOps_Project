<?php
namespace App\Tests\Models;
use PHPUnit\Framework\TestCase;
use App\Models\UserModel;
  
 class UserModelTest extends TestCase{
    public function testDindAllUsers(){
        $model = new UserModel();
        $users = $model->findAll();

        $this->assertIsArray($users,"findAll retourne un tableau !");
    }
    public function testInsertUser(){
        $model = new UserModel();
        $data = ['username' => 'Jamila', 'email' => 'jd@gkHHH.mt', 'password' => 'secKKKret'];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID user inséré > 0");
    }
 }
?>
<?php
    
    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model{
        protected $table = 'my_users';

        protected $validationRules = [
            'full_name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[my_users.email]',
            'password' => 'required|min_length[6]'
        ];

        protected $allowedFields = [
            'user_id',
            'full_name',
            'email',
            'password',
            'created_by',
            'is_admin',
            'created_on'
        ];

    }
?>
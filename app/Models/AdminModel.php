<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'admin_id';
    protected $allowedFields = [
        'admin_id',
        'admin_nama',
        'admin_foto',
        'users_id'
    ];

    public function getAdmin($admin_id = "")
    {
        if ($admin_id == "") {
            return $this->findAll();
        } else {
            return $this->where(['admin_id' => $admin_id])->first();
        }
    }

    public function getAdminById($users_id)
    {
        return $this->db->table('admin')->where(['users_id' => $users_id])->get()->getResultArray();
    }
}

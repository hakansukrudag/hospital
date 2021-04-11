<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    public function consultant()
    {
        return $this->hasOne(Consultant::class, 'id', 'fk_consultant_id');
    }
}

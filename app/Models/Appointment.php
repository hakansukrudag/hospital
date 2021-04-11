<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';
    protected $casts = [
          'date_time' => 'datetime',
      ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class, 'fk_procedure_id', 'id');
    }
}

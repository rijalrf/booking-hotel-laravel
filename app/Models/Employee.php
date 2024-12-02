<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function picture()
    {
        return $this->hasOne(EmployeePicture::class, 'employee_id');
    }
}

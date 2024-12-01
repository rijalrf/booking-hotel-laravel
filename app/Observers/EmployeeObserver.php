<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\User;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
        $user = User::create([
            'name' => $employee->first_name. ' '. $employee->last_name,
            'email' => $employee->email,
            'password' => bcrypt('password'), // Assuming you want a default password
        ]);

        Employee::find($employee->id)->update([
            'user_id' => $user->id,
        ]);
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        //
    }
}

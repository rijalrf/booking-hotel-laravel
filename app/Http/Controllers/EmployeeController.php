<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    // add index
    public function index()
    {
        $employees = Employee::latest()->paginate(10);

        return view('pages.employee.index', compact('employees'));
    }

    public function new()
    {
        $employee = new Employee();
        $page_meta = [
            'title' => 'Add New Employee',
            'url' => route('employee.create')
        ];
        return view('pages.employee.detail', compact('employee', 'page_meta'));
    }

    public function edit($id)
    {

        //find employee by id
        $employee = Employee::find($id);

        $page_meta = [
            'title' => 'Employee Detail',
            'url' => route('employee.update', $employee->id)
        ];
        return view('pages.employee.detail', compact('employee', 'page_meta'));
    }

    public function create(Request $request)
    {
        // dd($request);
        //validate request
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees|unique:users',
            'NIP' => 'required|numeric',
            'role' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make('password'), // Default password
            ]);

            //save data
            Employee::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'NIP' => $request->NIP,
                'role' => $request->role,
                'isActive' => true,
            ]);

            DB::commit();

            return redirect()->route('employee.index')->with('notification', [
                'type' => 'success',
                'message' => 'Employee created successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to create employee: ' . $e->getMessage()])->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:employees,email,'.$id,
            'NIP' => 'required|numeric',
        ]);

        //find employee by id and update data
        Employee::find($id)->update($request->all());

        return redirect()->back()->with('notification', [
            'type' => 'success',
            'message' => 'Profile updated successfully'
        ]);
    }

    public function delete($id)
    {
        //find employee by id and delete it
        Employee::find($id)->delete();

        return redirect()->route('employee.index')->with('notification', [
            'type' => 'success',
            'message' => 'Employee deleted successfully'
        ]);
    }

    public function search(Request $request)
    {
        $employees = Employee::when($request->last_name, function ($query) use ($request) {
            $query->where('last_name', $request->last_name);
        })
            ->when($request->role, function ($query) use ($request) {
                $query->where('role', $request->role);
            })
            ->latest()
            ->paginate(10);


        $search = [
            'last_name' => $request->last_name,
            'role' => $request->role
        ];

        return view('pages.employee.index', compact('employees', 'search'));
    }

    public function status($id)
    {
        // find employee by id
        $employee = Employee::find($id);

        if ($employee) {
            // update status
            $employee->isActive = $employee->isActive ? 0 : 1;
            $employee->save();
        }

        return redirect()->route('employee.index')->with('notification', [
            'type' => 'success',
            'message' => 'Employee status updated successfully'
        ]);
    }
}

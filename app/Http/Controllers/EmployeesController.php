<?php

namespace App\Http\Controllers;

use App\Address;
use App\Employees;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $employees =  Employees::all();

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'name'=> 'required',
            'email' => 'required',
            'birthday' => 'required',
            'address'=> 'required',
            'latitude'=> 'required',
            'longitude' => 'required'
          ]
        );

        $employee = new Employees;

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->birthday = $request->birthday;

        if ($employee->save()) {
            $address = new Address;

            $address->idEmployee = $employee->id;
            $address->address = $request->address;
            $address->latitude = $request->latitude;
            $address->longitude = $request->longitude;

            $address->save();
        }

        return redirect()->route('employees.index')->with('alert-success','Data Hasbeen Saved!');
    }

    /**
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $employee = Employees::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('alert-success','Data Hasbeen Saved!');
    }

    /**
     * @param  int  $id
     *
     * @return View
     */
    public function edit(int $id): View
    {
        $employee = Employees::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validate($request,[
            'name'=> 'required',
            'email' => 'required',
            'birthday' => 'required',
          ]
        );

        $employee = Employees::findOrFail($id);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->birthday = $request->birthday;

        $employee->save();

        return redirect()->route('employees.index')->with('alert-success','Data Hasbeen Saved!');
    }
}

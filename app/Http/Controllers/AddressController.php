<?php

namespace App\Http\Controllers;

use App\Address;
use App\Employees;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
  /**
   * @param Request $request
   *
   * @return View
   */
    public function create(Request $request): View
    {
        $id = $request->get('id');

        return view('address.create', ['id' => $id]);
    }

    /**
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'idEmployee' => 'required',
            'address'=> 'required',
            'latitude' => 'required',
            'longitude' => 'required',
          ]
        );

      $address = new Address();

      $address->idEmployee = $request->idEmployee;
      $address->address = $request->address;
      $address->latitude = $request->latitude;
      $address->longitude = $request->longitude;

      $address->save();

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
        $addresses = Address::where('idEmployee', '=', $id)->get();

        return view('address.edit', ['addresses' => $addresses]);
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
            'address'=> 'required',
            'latitude' => 'required',
            'longitude' => 'required',
          ]
        );

        $address = Address::findOrFail($id);

        $address->address = $request->address;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;

        $address->save();

        return redirect()->route('employees.index')->with('alert-success','Data Hasbeen Saved!');
    }
}

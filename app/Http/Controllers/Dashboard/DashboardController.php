<?php

namespace App\Http\Controllers\Dashboard;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Display listing of product.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product(Request $request)
    {
        //get products   
        $sort = $this->getSortType($request, 'product_id', 'asc');
        $products = App\Product::orderBy($sort['sortBy'], $sort['sortOrder'])->paginate(10);

        return view('dashboard.product.list')->with('products', $products);
    }

    /**
     * Display listing of users.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function staff(Request $request)
    {
        //get staffs   
        $sort = $this->getSortType($request, 'staff_id', 'asc');
        if ($sort['sortBy'] === 'name') {
            $staffs = App\Staff::leftJoin('users', 'users.user_id', '=', 'staffs.user_id')
                ->orderBy($sort['sortBy'], $sort['sortOrder'])
                ->paginate(10);
        } else {
            $staffs = App\Staff::orderBy($sort['sortBy'], $sort['sortOrder'])->paginate(10);
        }

        return view('dashboard.user.list')->with('staffs', $staffs);
    }

    /**
     * Display listing of customer.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customer(Request $request)
    {
        //get staffs   
        $sort = $this->getSortType($request, 'customer_id', 'asc');
        if ($sort['sortBy'] === 'name') {
            $customers = App\Staff::leftJoin('users', 'users.user_id', '=', 'staffs.user_id')
                ->orderBy($sort['sortBy'], $sort['sortOrder'])
                ->paginate(10);
        } else {
            $customers = App\Customer::orderBy($sort['sortBy'], $sort['sortOrder'])->paginate(10);
        }

        return view('dashboard.user.customer.list')->with('customers', $customers);
    }

    /**
     * display form of adding staff.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = App\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $result = App\Staff::create([
            'user_id' => $user->user_id,
        ]);

        $staffs = App\Staff::paginate(10);

        session()->flash($result ? 'success' : 'error');

        return redirect('dashboard/staff')->with('staffs', $staffs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = App\Staff::find($id);
        return view('dashboard.user.edit')->with('staff', $staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $username = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('email');

        $user = App\Staff::find($id)->user;

        if ($username && $user->name && $user->name !== $username) {
            $user->name = $username;
        }
        if ($email && $user->email && $user->email !== $email) {
            $user->email = $email;
        }
        if ($password && $user->password && $user->password !== $password) {
            $user->password = $password;
        }

        $result = $user->save();
        session()->flash($result ? 'success' : 'error');

        return view('dashboard.user.list')->with('staffs', App\Staff::paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = App\Staff::where('staff_id', $id)->first();
        $result = App\User::where('user_id', $staff->user->user_id)->delete();

        session()->flash($result ? 'success' : 'error');

        return back();
    }

    /**
     * return the sort type according to request
     * @param  Request $request
     * @return array
     */
    private function getSortType(Request $request, string $sortBy, string $sortOrder = 'asc')
    {
        $sort = [
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder
        ];

        foreach ($request->all() as $requestName => $requestVal) {
            if ($requestVal != null && $requestName !== 'page') {
                $sort['sortBy'] = str_replace('-sort', '', $requestName);;
                $sort['sortOrder'] = $requestVal;
            }
        }
        return $sort;
    }
}

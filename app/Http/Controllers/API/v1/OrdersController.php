<?php

namespace App\Http\Controllers\API\v1;

use App\Mail\RegistersendEmail;
use App\Models\back\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        $gid = $request->govermentId;
//        dd($request);
        $check = Customer::where('govermentId', $gid)->first();
//        dd($check);
        if($check||true){
            $resp = 200;
            $data = $request->all();
            Order::created($request->all());
//            Mail::to("son_1122@hotmail.com")->send(new RegistersendEmail($request->username, $request->password));
            return response()
                ->json([
                    "status" => 200,
                    "response" => "successass"
                ], $resp);
        }else{
//            Package::create($request->all());
            $status = "Success";
            $resp = 200;
            $credentials = generate_username_password();
            $username = $credentials['username'];
            $password = $credentials['password'];
            $hashPassword = bcrypt($request->password);
            $datas = $request->all();
            $datas['password'] = $hashPassword;
            Customer::create($request->all());
            Mail::to("son_1122@hotmail.com")->send(new RegistersendEmail($request->username, $request->password));
            Mail::to("son_1122@hotmail.com")->send(new RegistersendEmail($request->username, $request->password));
            return response()
                ->json([
                    "status_PHPHPHP" => $status,
                    "response" => $resp
                ], $resp);
        }

    }

    public function show(Order $order)
    {
    }

    public function edit(Order $order)
    {
    }

    public function update(Request $request, Order $order)
    {
    }

    public function destroy(Order $order)
    {
    }
}

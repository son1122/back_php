<?php

namespace App\Http\Controllers\API\v1;

use App\Mail\RegistersendEmail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    function generate_username_password() {
        $length = 8; // The desired length of the username and password
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // The characters to choose from
        $username = '';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $username .= $characters[rand(0, strlen($characters) - 1)];
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return array('username' => $username, 'password' => $password);
    }

    public function index(Request $request)
    {


    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {
//        dd($request->all());

        $status = "Success";
        $resp = 200;
        // dd($request);
        $credentials = $this->generate_username_password();
        $username = $credentials['username'];
        $password = $credentials['password'];
        $hashPassword = bcrypt($password);
        $datas = $request->all();
        $datas['password'] = $hashPassword;
        $datas['username'] = $username;
        Customer::create($datas);
        Mail::to("son_1122@hotmail.com")->send(new RegistersendEmail($username, $password));
        return response()
            ->json([
                "status" => $status,
                "response" => $resp
            ], $resp);

    }

    public function show(Customer $customer)
    {

    }

    public function edit(Customer $customer)
    {
    }

    public function update(Request $request, Customer $customer)
    {
    }

    public function destroy(Customer $customer)
    {
    }
    public function getdata(Request $request){
        $register = Customer::where('id', $request->jwt)->first();
//        dd($register);
        return response()->json($register, 200);
    }
    public function login(Request $request){
//        dd($request);
        $status = "Login Success";
        $resp = 200;
        $username = $request->username;
        $pass = $request->password;
        $register = Customer::where('username', $username)->first();
//         dd($request->password);
        $id = $register->id;
        if ($register) {
            if (\Hash::check($pass, $register->password)) {
                return response()->json([
                    "status" => $status,
                    "response" => $resp,
                    "id"=>$id
                ], $resp);
            } else {
                return response()->json([
                    "status" => "Wrong Password",
                    "response" => $resp,
                ], 401);
            }
        } else {

            return response()->json([
                "status" => "Not Found",
                "response" => $resp,
            ], 401);
        }

    }
}

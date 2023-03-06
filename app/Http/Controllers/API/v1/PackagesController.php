<?php

namespace App\Http\Controllers\API\v1;

use App\Mail\Pdf;
use App\Mail\RegistersendEmail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PackagesController extends Controller
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
    public function index()
    {
        $data = Package::all();
        return $data;
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
//        dd($request->jwt!=null);
        if($request->jwt==null)
        {
            $resp = 200;
            $data = $request->all();
            $data["userId"]=$request->jwt;
            Order::create($data);
//            Mail::to("son_1122@hotmail.com")->send(new RegistersendEmail($request->username, $request->password));
            Mail::to("son_1122@hotmail.com")->send(new Pdf($request->username, $request->password,$request->name,$request->lastname,$request->detail,$request->beneficial,$request->address));
            $registers = Register::all()->toArray();

            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.index', array('registers' => $registers));
            $username = "son_1122@hotmail.com";
            $email = "son_1122@hotmail.com";
            $password = "123456";
            $data = [];
            $data['username'] =$username;
            $data['email'] = $email;
            $data['password'] = $password;
            $data['title'] = "ทดสอบ";
            Mail::send('emails.register-send-email', $data, function($message)use($data, $pdf) {
                $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
            });
            return response()
                ->json([
                    "status" => 200,
                    "response" => "successass"
                ], $resp);
        }else{
            $status = "Suc";
            $resp = 200;
            $credentials = $this->generate_username_password();
            $username = $credentials['username'];
            $password = $credentials['password'];
            $hashPassword = bcrypt($password);
            $datas = $request->all();
            $datas['password'] = $hashPassword;
            $datas['username'] = $username;
            $datas['packageId'] = 2;
            Customer::create($datas);
            Order::create($datas);
            Mail::to("son_1122@hotmail.com")->send(new RegistersendEmail($username, $password));
//            ($email,$password,$firstname,$lastname,$detail,$beneficial,$address)
            Mail::to("son_1122@hotmail.com")->send(new Pdf($request->username, $password,$request->name,$request->lastname,$request->detail,$request->beneficial,$request->address));
            $registers = Customer::all()->toArray();

            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.index', array('registers' => $registers));
            $username = "son_1122@hotmail.com";
            $email = $username;
            $password = $password;
            $data = [];
            $data['username'] =$username;
            $data['email'] = $username;
            $data['password'] = $password;
            $data['title'] = "ทดสอบ";
            Mail::send('emails.register-send-email', $data, function($message)use($data, $pdf) {
                $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
            });
            return response()
                ->json([
                    "status_PHPHPHP" => $status,
                    "response" => $resp
                ], $resp);
        }
    }

    public function show(Package $package)
    {
    }

    public function edit(Package $package)
    {
    }

    public function update(Request $request, Package $package)
    {
    }

    public function destroy(Package $package)
    {
    }
}

<?php

namespace App\Http\Controllers\API\v1;

use App\Mail\RegistersendEmail;
use App\Models\Tip\Register;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $status = "Success";
        $resp = 200;

        $counTotal = Register::count();
        $registers = Register::select(
            'id',
            'phone',
            'name',
            'lastName',
        )->orderBy('id')->skip(0)->take(10)->get();

        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
            "data" => $registers,
            "count" => $counTotal,
        ], $resp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = "Success";
        $resp = 200;
        // dd($request);

        $hashPassword = bcrypt($request->password);
        $datas = $request->all();
        $datas['password'] = $hashPassword;
        Register::create($datas);
        Mail::to("son_1122@hotmail.com")->send(new RegistersendEmail($request->username, $request->password));
        return response()
            ->json([
                "status_PHPHPHP" => $status,
                "response" => $resp
            ], $resp);
    }
    // public function testEmail(){
    //     $email = "son_1122@hotmail.com";
    //     $password="1234";
    //     Mail::to($email)->send(new RegistersendEmail($email,$password));
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $status = "Success";
        $resp = 200;
        $register = Register::find($id);

        return response()
            ->json([
                "status_PHPHPHP" => $status,
                "response" => $resp,
                "data" => $register,
            ], $resp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $status = "Success";
        $resp = 200;
        $register = Register::find($id);

        if ($register) {
            $register->update($request->all());
        } else {
            $status = "Error";
            $resp = 400;
        }
        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
        ], $resp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $status = "Success";
        $resp = 200;
        $register = Register::find($id);

        if ($register) {
            $register->delete();
        } else {
            $status = "Error";
            $resp = 400;
        }
        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
        ], $resp);
    }
    public function testEmail()
    {
        $status = "Success";
        $resp = 200;
        $email = "son_1122@hotmail.com";
        $password = "1234";
        Mail::to($email)->send(new RegistersendEmail($email, $password));
    }

    public function checkPassword(Request $request)
    {
        $status = "Login Success";
        $resp = 200;
        $username = $request->username;
        $pass = $request->password;
        $register = Register::where('username', $username)->first();
        // dd($register);
        if ($register) {
            if (\Hash::check($pass, $register->password)) {
                return response()->json([
                    "status" => $status,
                    "response" => $resp,
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
    public function loadPdf(){
        $data=[];
//        $registers=Register::all()->toArray();
        // dd($registers);
        $pdf = Pdf::loadView('pdf.index');
        // $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');

    }
    public function sendEmailPdf(){
        $datas = [];

        $registers = Register::all()->toArray();

        $pdf = Pdf::loadView('pdf.index', array('registers' => $registers));
        $username = "son_1122@hotmail.com";
        $email = "son_1122@hotmail.com";
        $password = "123456";
        $data = [];
        $data['username'] =$username;
        $data['email'] = $email;
        $data['password'] = $password;
        $data['title'] = "???????????????";
        Mail::send('emails.register-send-email', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
    }
}

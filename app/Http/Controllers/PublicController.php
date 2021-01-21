<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Traits\MasterTraits;

class PublicController extends Controller
{

    use MasterTraits;


    public function index(Request $request, $theme = 'dark')
    {
        $themes = ['dark', 'dark2', 'light', 'light2', 'v3-one', 'v3-two'];
        if (!in_array($theme, $themes)) {
            $theme = 'dark';
        }
        return view("gfolio.index", compact('theme'));
    }

    public function contactUs(Request $request)
    {
        $parms = $request->input();
        $user = new User();
        $user->name = 'Sardor Narzikulov';
        $user->email = 'sardornarzikulov94@gmail.com';

        $data = [
            'user' => $user,
            'template' => 'email.general',
            'subject' => $parms['subject'],
            'name' => $parms['name'],
            'message' => $parms['message'],
            'email' => $parms['email'],
        ];
        $result = $this->sendMail($data);
        return redirect()->to("/?msg=Your message has been sent");

    }
}

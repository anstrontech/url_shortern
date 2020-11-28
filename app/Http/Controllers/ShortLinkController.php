<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use App\User;
use App\Functions\Functions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ShortLinkController extends Controller
{

    public function create_data($data = []){
        if (is_array($data)) {
            $isEmpty = false;
            $data_ = [];
            foreach($data as $key => $value): 
                if ($value != ''):
                    $data_[$key] = $value;
                else:
                    $isEmpty = true;
                    break;
                endif;
            endforeach;
            return ['isempty' => $isEmpty,'data' => $data_];
        }else{}
    }

    public function setSessionCreae($data = []){
        if (is_array($data)) {
            session($data);
        }
        return true;
    }
    
    public function isValidatePage($id){
        if ($id != "") {
            return true;
        }else{
            return view('partial.login',[
                'title_' => 'Login'
            ]);
        }
    }

    public function index(Request $request)
    {
        if(isset($request['urlcode'])){
            DB::table('short_links')
            ->where('code', $request['urlcode'])
            ->delete();
            return redirect("/");
        }else{
            $userinfo = $request->session()->all();
            if (isset($userinfo['id'])) {
                $shortLinks = ShortLink::where('userid', $userinfo['id'])->get();
                $userinfo['title_'] = 'ShortenLink';
                return view('partial.shortenLink', $userinfo,compact('shortLinks'));
            }else{
                return view('partial.login',[
                    'title_' => 'Login'
                ]);
            }
        }
    }
    public function registerview(){
        return view('partial.register');
    }
    public function profileview(Request $request){
        $userinfo = $request->session()->all();
        $userinfo = DB::select("SELECT * FROM `users` WHERE id = '{$userinfo['id']}'");
        $userinfo = (array) $userinfo[0];
        if (isset($userinfo['id'])) {
            $userinfo['title_'] = 'Profile';
            return view('partial.userprofile',$userinfo);
        }else{
            return view('partial.login',[
                'title_' => 'Login'
            ]);
        }
    }
    public function auth(Request $request){
        $data = $request->all();
        $data = $this->create_data($data);

        if ($data['isempty'] == true){
            return view('partial.login',[
                'title_' => 'Login',
                'message'  =>  'Required Feild is Empty',
                'class'  =>  'red',
            ]);
        }else{
            $username = $data['data']['username'];
            $password = $data['data']['password'];

            $response = DB::select("SELECT * FROM `users` WHERE username = '{$username}' AND password = '{$password}'");
            if (count($response) > 0) {
                $this->setSessionCreae((array) $response[0]);
               
                return redirect('/');
            }else{
                return view('partial.login',[
                    'title_' => 'Login',
                    'message'  =>  'Invalid User',
                    'class'  =>  'red',
                ]);
            }
        }
    }
    public function register(Request $request){
        $data = $request->all();
        $data = $this->create_data($data);
        if ($data['isempty'] == true){
            return view('partial.register',[
                'title_' => 'Register',
                'message'  =>  'Required Feild is Empty',
                'class'  =>  'red',
            ]);
        }else{
            $email    = $data['data']['email'];
            $username = $data['data']['username'];

            $response = DB::select("SELECT username,email FROM `users` WHERE username = '{$username}' OR email = '{$email}'");
            if (count($response) > 0) {
                return view('partial.register',[
                    'title_' => 'Register',
                    'message'  =>  'Username or Email already exist',
                    'class'  =>  'red',
                ]);
            }else{
                User::create($data['data']);
                Mail::raw('Hello', function($message)
                {
                    $message->to('tirth886jain@gmail.com', 'Admin')->subject('Cloudways Feedback');
                });
                return view('partial.register',[
                    'title_' => 'Register',
                    'message'  =>  'Register Successfully',
                    'class'  =>  'teal',
                ]);
            }
        }
    }

    public function store(Request $request)
    {
        $userinfo = $request->session()->all();

        $request->validate([
           'link' => 'required|url'
        ]);

        $input['link']  = $request->link;
        $input['userid'] = $userinfo['id'];
        $input['code']  = str_random(6);

        ShortLink::create($input);

        return redirect('generate-shorten-link')
             ->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        return redirect($find->link);
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function userprofileupdate(Request $request){
        $data = $request->all();
        $data = $this->create_data($data);
        if ($data['isempty'] == true){
            return redirect('/userprofile');
        }else{
            $set = [
                "name"     => $data['data']['name'],
                "password" => $data['data']['password'],
            ];
            $userinfo = $request->session()->all();
            
            DB::table('users')
                ->where('id', $userinfo['id'])
                ->update($set);
            return redirect('/userprofile');
        }
    }
}

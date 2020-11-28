<?php 

namespace App\Functions;

class Functions
{
    public static function create($data = []){
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

    public static function setSession($data = []){
        if (is_array($data)) {
            session($data);
        }
        return true;
    }

    public static function isValidatePage($id){
        if ($id != "") {
            return true;
        }else{
            return view('partial.login',[
                'title_' => 'Login'
            ]);
        }
    }

}
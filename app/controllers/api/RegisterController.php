<?php

class RegisterController extends BaseController
{

    public function showRegister(){
        return View::make('register');
    }

    public function doRegister(){
        //for message
        $data = Array();

        $user = new User;
        $user->firstname = Input::get('fname');
        $user->lastname = Input::get('lname');
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->phone = Input::get('handphone');
        $user->nik = Input::get('nik');

        $user->remember_token = str_random(50);
        $user->role_id = 2; //default role enduser
        $user->status_id = 2; //default not active

        try{
            $user->save();
            $data['status']='ok';
            $data['content'] = trans('messages.txt_created').' '.trans('messages.txt_user').' '.$user->username;
        }
        catch(Exception $e){
            $data['status']='err';
            $data['content'] = $e->getMessage();
        }

        //reuse user model to add pictures
        if (Input::hasFile('picture_nik') && Input::file('picture_nik')->isValid()) {
            $path = '/storedimg/nik/' . $user->id . '/';
            $file = Input::file('picture_nik');
            $dir = public_path() . $path;
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $fname = time() . "." . $file->getClientOriginalExtension();
            $file->move($dir, $fname);
            $user->identity_pic = $path.$fname;
        }

        if(Input::hasFile('picture_profile') && Input::file('picture_profile')->isValid()){
            $path = '/storedimg/profile/' . $user->id . '/';
            $file = Input::file('picture_profile');
            $dir = public_path() . $path;
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $fname = time() . "." . $file->getClientOriginalExtension();
            $file->move($dir, $fname);
            $user->profile_pic = $path.$fname;
        }

        //trigger update user picture
        $user->update();

        /* Data stored in the session using this method will only
         be available during the subsequent HTTP request, and then will be deleted*/
        Session::flash('message', $data );
        return Redirect::back();
    }
}
<?php
class UserController extends Controller {

	public function login() {
		$id = Input::get("id");
		$email = Input::get("email");    
		$name = Input::get("first_name");
		$last_name = Input::get("last_name");
		if( !$this->exists($id) ) {
			//basic
			DB::insert('insert into users (id, email,name,last_name) values (?, ?,?,?)', array($id,$email,$name,$last_name));
		} else {
			//elocuent
			DB::table('users')
            ->where('id', $id)
            ->update(['email' => $email,"name" => $name,"last_name" => $last_name]);
		}	
		return "ok";
	}

	public function exists($id) {
		$results = DB::select('select * from users where id = ?', array($id));
		return count($results) > 0;
	}

}
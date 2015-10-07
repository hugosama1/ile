<?php
class ExerciseController extends Controller {
	public function getExercise() {
		$json_data = file_get_contents(public_path()."/js/ejercicio4.json");
		$json = json_decode($json_data);
		DB::transaction(function() use( &$json) {
			$results = DB::select("insert into Exercises (id, description) SELECT COALESCE(MAX(id),0) + 1, 'Interfaz de Constantes' FROM exercises RETURNING id ");
			$exercise_id = $results[0]->id;
			echo $exercise_id;
			$step_number = 0;
			foreach($json->excercises as $step) {
				$step_number++;
				$results = DB::select("insert into explanations(id, description,exercise_id,step_number,incremental_example,progress) SELECT COALESCE(MAX(id),0) + 1, ?,?,?,?,? FROM explanations RETURNING id ",array($step->explanation,$exercise_id,$step_number,implode("\n", $step->incrementalText),$step->progress));
				$explanation_id = $results[0]->id;
				foreach( $step->answers as $answer) {
					if( isset($answer->error) ) {
						$error = $answer->error;
					} else {
						$error = "";
					}
					$description = implode("\n", $answer->text);
					$correct = $answer->rightAnswer ? 1 : 0;
					$results= DB::select("insert into answers (id, description,exercise_id,error,correct,step_number) SELECT COALESCE(MAX(id),0) + 1, ?,?,?,?,? FROM answers RETURNING id ",array($description,$exercise_id,$error,$correct,$step_number));
				}
			}
		});
		echo var_dump(DB::getQueryLog());
	}

	public function saveExercise() {
		$user_id = Input::get("user_id");
		$exercise_id = Input::get("exercise_id");
		$correct = Input::get("correct");    
		$step_number = Input::get("step_number");
		DB::insert("INSERT INTO user_history (user_id,exercise_id,correct,step_number) VALUES(?,?,?,?) ",array($user_id,$exercise_id,$correct,$step_number)); 
	}

	public function getLastExercise()
	{
		$results = DB::select( "SELECT coalesce(MAX(step_number),0) AS step_number FROM user_history WHERE exercise_id = ? AND user_id = ? AND COALESCE(filename,'') = '' AND correct = TRUE ", array(Input::get("exercise_id"),Input::get("user_id")));
		return Response::json(array('step_number' => $results[0]->step_number));
	}

	public function saveTime() {
		$user_id = Input::get("user_id");
		$exercise_id = Input::get("exercise_id");
		$correct = Input::get("correct");    
		$step_number = Input::get("step_number");
		$time = Input::get("time");
		DB::insert("INSERT INTO user_history (user_id,exercise_id,correct,step_number,time) VALUES(?,?,?,?,?) ",array($user_id,$exercise_id,$correct,$step_number,$time)); 
	}


	public function savePicture() {
		$user_id = Input::get("user_id");
		$exercise_id = Input::get("exercise_id");
		$correct = Input::get("correct");    
		$step_number = Input::get("step_number");
		$time = Input::get("time");
		$image = Input::get("image");
		$image = str_replace('data:image/png;base64,', '', $image);
		$image = str_replace(' ', '+', $image);
		$image = base64_decode($image);
		$filename = "".$user_id.$exercise_id.$step_number.$time.".png";
		file_put_contents(public_path()."/img/".$filename, $image);
		DB::insert("INSERT INTO user_history (user_id,exercise_id,correct,step_number,time,filename) VALUES(?,?,?,?,?,?) ",array($user_id,$exercise_id,$correct,$step_number,$time,$filename)); 
	}

	public function getBnfResponse() {
		$input = Input::get("input");
		$curl = curl_init();
		$inputF = curl_escape($curl,$input);
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => "http://www.testtutor.com:8080/tutor/query?input=".$inputF
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		//$json = file_get_contents("http://www.testtutor.com:8080/tutor/query?input=".$inputF)
		return Response::json(json_decode($resp));
	}

	public function saveFinishedExercise() {
		$user_id = Input::get("user_id");
		$exercise_id = Input::get("exercise_id");
		$results = DB::select('SELECT * FROM finished_exercises WHERE user_id = ? AND exercise_id = ? ', array($user_id,$exercise_id));
		if( count($results) == 0 ) {
			DB::insert('INSERT INTO finished_exercises(user_id,exercise_id) VALUES(?,?)', array($user_id,$exercise_id));
		}
	}

	public function getFinishedExercises() {
		$results = DB::select("SELECT exercise_id FROM finished_exercises WHERE user_id = ? ",array(Input::get("user_id")));
		return Response::json($results);
	}

}
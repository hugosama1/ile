<?php

class EmotionRecognition extends Controller {

	public function detectEmotion() {
		/*$image = Input::get("image");
		$image = str_replace('data:image/png;base64,', '', $image);
		$image = str_replace(' ', '+', $image);
		$image = base64_decode($image);
		file_put_contents(public_path()."/img/"."emotion.png", $image);	*/
		echo "paso";
		if ( File::exists(public_path()."/img/emotion.png") )
		{
			echo "existe";	
			error_reporting(E_ERROR | E_PARSE);
		    $emotionRecognition = new FCClientPHP("31eb94e894e347a6a38da52987fc0fdc","b527831691a342eb973e7c9666f17778");
		    $emotion = $emotionRecognition->faces_detect(null,realpath(public_path()."/img/emotion.png"),null,null,null,"all");
		    echo "<PRE>";
		    return Response::json($emotion) ."</PRE>";
		}
	}

	public function detectEmotionByImage($image) {
		$emotionRecognition = new FCClientPHP("31eb94e894e347a6a38da52987fc0fdc","b527831691a342eb973e7c9666f17778");
		$emotion = $emotionRecognition->faces_detect(null,realpath(public_path()."/img/".$image),null,null,null,"all");
		return $emotion;
	}

	public function processEmotions() {
		$consultas = 0;
		do {
			$results = DB::select("SELECT id,user_id, filename FROM user_history where COALESCE(emotion, '') = '' AND COALESCE(filename, '') != '' LIMIT 1 OFFSET {$consultas}");
			$consultas++;
		} while(  !empty($results) &&  !File::exists(public_path()."/img/".$results[0]->filename) );
		return Response::json($results);
	}

	public function saveEmotion() {
		$emotion = Input::get("emotion");
		$id = Input::get("id");
		DB::update("UPDATE user_history SET emotion = ? WHERE id = ?",array($emotion,$id));
		Response::json("success");
	}

}

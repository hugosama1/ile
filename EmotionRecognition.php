<?php

class EmotionRecognition extends Controller {

	public function detectEmotion() {
		$image = Input::get("image");
		$image = str_replace('data:image/png;base64,', '', $image);
		$image = str_replace(' ', '+', $image);
		$image = base64_decode($image);
		file_put_contents(public_path()."/img/emotion.png", $image);	
		if ( File::exists(public_path()."/img/emotion.png") )
		{
			error_reporting(E_ERROR | E_PARSE);
			echo realpath(public_path()."/img/emotion.png");
		    $emotionRecognition = new FCClientPHP("31eb94e894e347a6a38da52987fc0fdc","b527831691a342eb973e7c9666f17778");
		    $emotion = $emotionRecognition->faces_detect(null,realpath(public_path()."/img/emotion.png"),null,null,null,"all");
		    return Response::json($emotion);
		    /*echo "<pre>";
		    var_dump($emotion);
		    echo "</pre>";*/
		}
	}


}

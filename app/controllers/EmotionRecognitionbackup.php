<?php

class EmotionRecognition extends Controller {

	public function detectEmotion() {

		if ( File::exists(public_path()."/img/hugo2.jpeg") )
		{
			error_reporting(E_ERROR | E_PARSE);
		    $emotionRecognition = new FCClientPHP("31eb94e894e347a6a38da52987fc0fdc","b527831691a342eb973e7c9666f17778");
		    $emotion = $emotionRecognition->faces_detect(null,public_path()."/img/hugo2.jpeg",null,null,null,"all");
		    echo "<pre>";
		    var_dump($emotion);
		    echo "</pre>";
		}		
	}

}

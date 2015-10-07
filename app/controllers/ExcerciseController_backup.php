<?php
class ExcerciseController extends Controller {

	public function getExcercise() {
		$json_data = file_get_contents(public_path()."/js/ejercicio1.json");
		$json = json_decode($json_data);
		echo "<pre>";
		echo var_dump($json);
		echo "</pre>";
	}
}
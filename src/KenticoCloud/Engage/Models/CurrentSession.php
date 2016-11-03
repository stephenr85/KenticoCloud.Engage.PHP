<?php


namespace KenticoCloud\Engage\Models;

class CurrentSession extends VisitorActions {

	public function setStarted($dt){
		$this->started = is_string($dt) ? strtotime($dt) : $dt;
		return $this;
	}
}
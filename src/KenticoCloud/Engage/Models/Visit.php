<?php


namespace KenticoCloud\Engage\Models;

class Visit extends Model {

	public function setVisitDateTime($dt){
		$this->visitDateTime = is_string($dt) ? strtotime($dt) : $dt;
		return $this;
	}
	
}
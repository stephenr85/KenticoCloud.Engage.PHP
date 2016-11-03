<?php


namespace KenticoCloud\Engage\Models;

class VisitorActions extends Model {

	public function setActions($actions){
		$this->actions = array();
		foreach($actions as $action){
			$this->actions[] = VisitorAction::create($action);
		}
		return $this;
	}
	
}
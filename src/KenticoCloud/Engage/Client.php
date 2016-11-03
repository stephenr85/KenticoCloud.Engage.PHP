<?php

namespace KenticoCloud\Engage;

class Client {

	public $apiKey = '';
	public $uri = 'https://engage-api.kenticocloud.com/v1/visitor/';
	public $_debug = true;
	public $lastRequest = null;
	public $userID = null;
	public $sessionID = null;

	public function __construct($apiKey){
		$this->apiKey = $apiKey;
	}

	public function getUserCookieName(){
		foreach($_COOKIE as $key=>$value){
			if(strpos($key, 'k_e_id') === 0){
				return $key;
			}
		}
		return null;
	}

	public function getSessionCookieName(){
		foreach($_COOKIE as $key=>$value){
			if(strpos($key, 'k_e_ses') === 0){
				return $key;
			}
		}
		return null;
	}

	public function getUserID(){
		if($this->userID) return $this->userID;

		$key = $this->getUserCookieName();
		if(!is_null($key)){
			$parts = explode('.', $_COOKIE[$key]);
			return reset($parts);
		}
		return null;
	}

	public function setUserID($uid){
		$this->userID = $uid;
		return $this;
	}

	public function getSessionID(){
		if($this->sessionID) return $this->sessionID;

		$key = $this->getSessionCookieName();
		if(!is_null($key)){
			$parts = explode('.', $_COOKIE[$key]);
			return end($parts);
		}
		return null;
	}

	public function setSessionID($sid){
		$this->sessionID = $sid;
		return $this;
	}

	public function setRequestAuthorization($request){
		$request->addHeader('Authorization', 'Bearer ' . $this->apiKey);
		return $request;
	}

	public function prepRequest($request){
		$request->_debug = $this->_debug;
		$request->mime('json');
		$request = $this->setRequestAuthorization($request);
		$this->lastRequest = $request;
		return $request;
	}

	public function getRequest($endpoint, $params = null){
		$uri = rtrim($this->uri, '/').'/'.ltrim($endpoint, '/');
		if(is_array($params)) $params = http_build_query($params);
		if(is_string($params)) $uri = rtrim($uri, '?') . '?' . ltrim($params, '?');
		
		$request = \Httpful\Request::get($uri);
		$request = $this->prepRequest($request);
		return $request;
	}

	public function send($request = null){
		if(!$request) $request = $this->lastRequest;
		else $this->lastRequest = $request;		
		$response = $request->send();
		$this->lastResponse = $response;
		return $response;
	}

	public function getCurrentLocation(){
		$request = $this->getRequest($this->getUserID().'/CurrentLocation?sid='.$this->getSessionID());
		$response = $this->send();
		$model = Models\CurrentLocation::create($response->body);
		return $model;
	}

	public function getUsualLocation(){
		$request = $this->getRequest($this->getUserID().'/UsualLocation');
		$response = $this->send();
		$model = Models\UsualLocation::create($response->body);
		return $model;
	}

	public function getFirstVisit(){
		$request = $this->getRequest($this->getUserID().'/FirstVisit');
		$response = $this->send();
		$model = Models\FirstVisit::create($response->body);
		return $model;
	}

	public function getLastVisit(){
		$request = $this->getRequest($this->getUserID().'/LastVisit');
		$response = $this->send();
		$model = Models\LastVisit::create($response->body);
		return $model;
	}

	public function getActivitySummary(){
		$request = $this->getRequest($this->getUserID().'/ActivitySummary');
		$response = $this->send();
		$model = Models\ActivitySummary::create($response->body);
		return $model;
	}

	public function getCurrentSession(){
		$request = $this->getRequest($this->getUserID().'/CurrentSession?sid=' . $this->getSessionID());
		$response = $this->send();
		$model = Models\CurrentSession::create($response->body);
		return $model;
	}

	public function getActivityConfirmation($type = null, $daysAgo = null, $pageUrl = null, $customActionName = null){
		$params = is_array($type) ? $type : array_filter(array(
			'type' => $type,
			'daysAgo' => $daysAgo,
			'pageUrl' => $pageUrl,
			'customActionName' => $customActionName
		));
		$request = $this->getRequest($this->getUserID().'/VisitorActions', $params);
		$response = $this->send();
		$model = Models\VisitorActions::create($response->body);
		return $model;
	}




}
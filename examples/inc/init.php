<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

global $kceClient;
global $kceScript;

if(strpos($_SERVER['HTTP_HOST'], '.local') !== false){
	$kceClient = new \KenticoCloud\Engage\Client('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOiJ1c3JfMHZHTW1SOFpDSGpsWVR6RzJncGFPMSIsImRuIjoia2MtZW5nYWdlLXBocC5sb2NhbCIsImp0aSI6IjhJVmZfajV3d1pOWnFzUm0iLCJhdWQiOiJlbmdhZ2UtYXBpLmtlbnRpY29jbG91ZC5jb20ifQ.NB8S-oh7C8WXo83qWCmTTw98-qiAX7osJozpcLXIPa0');
	$kceScript = "!function(){var a='https://engage-ket.kenticocloud.com/js',b=document,c=b.createElement('script'),d=b.getElementsByTagName('script')[0];c.type='text/javascript',c.async=!0,c.defer=!0,c.src=a+'?d='+document.domain,d.parentNode.insertBefore(c,d)}(),window.ket=window.ket||function(){(ket.q=ket.q||[]).push(arguments)};ket('start', '8681759b-3c71-46d9-9995-77b0f09fc530');";
}else{
	$kceClient = new \KenticoCloud\Engage\Client('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOiJ1c3JfMHZHTW1SOFpDSGpsWVR6RzJncGFPMSIsImRuIjoia2MtZW5nYWdlLXBocC5lc2l0ZWZ1bC5jb20iLCJqdGkiOiJxU2hyaDAySm4tZzMyQU51IiwiYXVkIjoiZW5nYWdlLWFwaS5rZW50aWNvY2xvdWQuY29tIn0.I4AZWwf8c5F0jFE6v0fEQTYI8evvIz-eewpZVq_rdu8');
	$kceScript = "!function(){var a='https://engage-ket.kenticocloud.com/js',b=document,c=b.createElement('script'),d=b.getElementsByTagName('script')[0];c.type='text/javascript',c.async=!0,c.defer=!0,c.src=a+'?d='+document.domain,d.parentNode.insertBefore(c,d)}(),window.ket=window.ket||function(){(ket.q=ket.q||[]).push(arguments)};ket('start', '126363d6-f886-4d08-96db-5c1b41076644');";
}

<?php
	
	function SaveLogToFile($msg) {
		try {
			$log = fopen('logs/log.txt', 'a');
			$txt = "";
			$txt = date("Y-m-d H:i:s");
			$txt .= "\t" . $msg . "\n";
			fwrite($log, $txt);
			fclose($log);
		} catch(Exception $e) {
			
		}
	}

?>
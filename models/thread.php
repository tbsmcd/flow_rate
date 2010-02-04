<?php
class Thread extends AppModel {
	public $name = 'Thread';

	//thread_controllerからロジックを移植中
	function getFlowRate() {
		$subjectUrl = 'http://tsushima.2ch.net/news/subject.txt';//ν速
		$fp = @fopen($subjectUrl, 'r');
		$rates = array();
		while (!feof($fp)) {
			$line = mb_convert_encoding(fgets($fp, 1024), 'UTF-8', 'SJIS');
			if (preg_match('/^([0-9]{10})\.dat<>(.+)\(([0-9]{1,4})\)$/', $line, $matches)) {
				$data['Thread']['id'] = $matches[1];
				$data['Thread']['title'] = $matches[2];
				$data['Thread']['url'] = 'http://tsushima.2ch.net/test/read.cgi/news/' . $data['Thread']['id'];
				$response = $matches[3];
				$data['Thread']['rate'] = round((($response/(time() - $data['Thread']['id']))*86400), 1);
				$this->create();
				$this->save($data);
				$rates[] = $data;
			}
		}
		return $rates;
	}
}
?>

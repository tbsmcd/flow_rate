<?php
class ThreadsController extends AppController {
	public $name = 'Threads';
	public $uses = 'Thread';
	function index() {
		$conditions = array(
			'Thread.modified >' => date('Y-m-d H:i:s', strtotime('now -5 hours')),
		);
		$order = array(
			'Thread.rate' => 'DESC',
		);
		$this->set('threads', $this->Thread->findAll($conditions, null, $order));
	}
	function getSubjects() {
		$subjectUrl = 'http://tsushima.2ch.net/news/subject.txt';//ν速
		$fp = @fopen($subjectUrl, 'r');
		while (!feof($fp)) {
			$line = fgets($fp, 1024);
			preg_match('/^([0-9]{10})\.dat<>(.+)\(([0-9]{1,4})\)$/', $line, $matches);
			$data['id'] = $matches[1];
			$data['title'] = $matches[2];
			$data['url'] = 'http://tsushima.2ch.net/test/read.cgi/news/' . $data['id'];
			$response = $matches[3];
			$data['rate'] = ($response/(time() - $data['id']))*86400;
			$this->Thread->save($data, true, array('number',));
		}
	}
}
?>

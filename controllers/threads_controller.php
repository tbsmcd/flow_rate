<?php
class ThreadsController extends AppController {
	public $name = 'Threads';
	public $uses = 'Thread';
	function index() {
		$params = array(
			'conditions' => array('Thread.modified >' => date('Y-m-d H:i:s', strtotime('now -5 minutes'))),
			'order' => 'Thread.rate DESC',
		);
		$this->set('threads', $this->Thread->find('all', $params));
	}
	function get_rates() {
		$rates = $this->Thread->getFlowRate();
		$this->set('rates', $rates);
		$this->flash('取得完了', './', 3);
	}
}
?>

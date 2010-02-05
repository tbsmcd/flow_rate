<?php
class ThreadsController extends AppController {

	public $name = 'Threads';
	public $uses = array('Thread', 'Board');

	function index() {
		$this->set('boards', $this->Board->find('all'));
		if (!empty($this->params['pass'][0]) && $this->params['pass'][0] != '') {
			$board_id = $this->params['pass'][0];
		} else {
			$board_id = '';
		}
		$data = $this->Thread->getIndex($board_id);
		$this->set('threads', $data);
	}

	function get_rates() {
		$boards = $this->Board->getBoards();
		foreach ($boards as $board) {
			$this->Thread->getFlowRate($board['Board']);
		}
		$this->flash('取得完了', './', 3);
	}
}
?>

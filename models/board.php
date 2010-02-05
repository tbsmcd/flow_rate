<?php
class Board extends AppModel {
	public $name = 'Board';
	function getBoards() {
		$boards = $this->find('all');
		return $boards;
	}
}
?>

<?php
class Thread extends AppModel {
	public $name = 'Thread';
	public $belongsTo = array('Board' =>
							array(
								'className' => 'Board',
								'conditions' => '',
								'order' => '',
								'dependent' => true,
								'foreignKey' => 'board_id'
							)
						);

	function getFlowRate($boardData) {
//		$boardData['server'] = 'http://tsushima.2ch.net/';
//		$boardData['name'] = 'news';
		$subjectUrl = $boardData['server'] . $boardData['name'] . '/subject.txt';
		$fp = @fopen($subjectUrl, 'r');
		$rates = array();
		while (!feof($fp)) {
			$line = mb_convert_encoding(fgets($fp, 1024), 'UTF-8', 'SJIS');
			if (preg_match('/^([0-9]{10})\.dat<>(.+)\(([0-9]{1,4})\)$/', $line, $matches)) {
				$data['Thread']['id'] = $matches[1];
				$data['Thread']['title'] = $matches[2];
				$data['Thread']['url'] = $boardData['server'] . 'test/read.cgi/' . $boardData['name'] . '/' . $data['Thread']['id'];
				$response = $matches[3];
				$data['Thread']['rate'] = round((($response/(time() - $data['Thread']['id']))*86400), 1);
				$data['Thread']['board_id'] = $boardData['id'];
				$this->create();
				$this->save($data);
			}
		}
	}
}

?>

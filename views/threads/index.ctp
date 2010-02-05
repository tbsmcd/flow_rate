<p>
	<?php echo $html->link('更新', './get_rates') ?>
</p>
<span>Menu => <?php echo $html->link('ALL', './index');
foreach ($boards as $board) {
	echo ', ' . $html->link(h($board['Board']['title']), './index/' . $board['Board']['id']);
}
?>
</span>
<table>
<tr>
<th>rank</th>
<th>title</th>
<th>board</th>
<th>rate</th>
<th>created</th>
</tr>
<?php $rank = 1; foreach ($threads as $thread) { ?>
<tr>
<td><?php echo $rank; ?></td>
<td><?php echo $html->link(h($thread['Thread']['title']), $thread['Thread']['url']) ?></td>
<td><?php echo h($thread['Board']['title']) ?></td>
<td><?php echo h($thread['Thread']['rate']) ?></td>
<td><?php echo h($thread['Thread']['created']) ?></td>
</tr>
<?php $rank ++; ?>
<?php } ?>
</table>
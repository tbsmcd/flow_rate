<p>
	<?php echo $html->link('更新', './get_rates') ?>
</p>
<table>
<tr>
<th>rank</th>
<th>title</th>
<th>rate</th>
<th>created</th>
</tr>
<?php $rank = 1; foreach ($threads as $thread) { ?>
<tr>
<td><?php echo $rank; ?></td>
<td><?php echo $html->link(h($thread['Thread']['title']), $thread['Thread']['url']) ?></td>
<td><?php echo h($thread['Thread']['rate']) ?></td>
<td><?php echo h($thread['Thread']['created']) ?></td>
</tr>
<?php $rank ++; ?>
<?php } ?>
</table>
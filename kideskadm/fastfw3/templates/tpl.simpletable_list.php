<table summary="tabelle"><tr>
<td>
	<a href="<?= getLink($VARS->get('defaultLink').'/edit');?>">Neuer Eintrag</a>
</td>
<td> <?= $VARS->get('pages');?> </td>
</tr></table>

<hr size=1 />

<table class="table table-hover simpletablelist" summary="tabelle">
<tr>
<td></td>
<?php for($i=0;$i<$VARS->get('fieldlist')->count();$i++) { ?>
	<?php if($VARS->get('fieldlist')->get($i)->get('type')!='hidden' && $VARS->get('fieldlist')->get($i)->get('texttype')!='password') { ?>
		<th><?= $VARS->get('fieldlist')->get($i)->get('caption');?></th>
	<?php } ?>
<?php } ?>
</tr>

<tbody>
<?php for($j=0;$j<$VARS->get('data')->count();$j++) { ?>
		<tr>
			<td><a href="<?= getLink($VARS->get('defaultLink').'/edit/'.$VARS->get('data')->get($j)->get($VARS->get('primaryKey')));?>">bearbeiten</a></td>
			<?php
			#vd($VARS->get('fieldlist')->get(0));
			#vd($VARS->get('fieldlist')->get(1));exit;
			?>
			<?php for($i=0;$i<$VARS->get('fieldlist')->count();$i++) { ?>
				<?php if($VARS->get('fieldlist')->get($i)->get('type')=='select' || $VARS->get('fieldlist')->get($i)->get('type')=='checkbox' || $VARS->get('fieldlist')->get($i)->get('type')=='radio') { ?>
					<td class=listentry><?= $VARS->get('fieldlist')->get($i)->get('value2text')->get($VARS->get('data')->get($j)->get($VARS->get('fieldlist')->get($i)->get('field')));?></td>
				<?php } else if($VARS->get('fieldlist')->get($i)->get('type')=='date') { ?>
                                        <td class=listentry><?= formatDate($VARS->get('data')->get($j)->get($VARS->get('fieldlist')->get($i)->get('field')));?></td>
				<?php } else if($VARS->get('fieldlist')->get($i)->get('type')=='file') { ?>
					<td class=listentry><a href='<?= getLink($VARS->get('defaultLink').'/download/'.$VARS->get('data')->get($j)->get($VARS->get('primaryKey')).'/'.$VARS->get('fieldlist')->get($i)->get('field'));?>' style='border:0;text-decoration:underline;background-color:transparent;'><?= $VARS->get('data')->get($j)->get($VARS->get('fieldlist')->get($i)->get('field'));?></a></td>
				<?php } else if($VARS->get('fieldlist')->get($i)->get('type')=='html') { ?>
					<td class=listentry><?php $this->LINEDATA = $VARS->get('data')->get($j);echo $this->tplParse($VARS->get('fieldlist')->get($i)->get('html')->get('list'));?></td>
				<?php } else if($VARS->get('fieldlist')->get($i)->get('type')!='hidden' && $VARS->get('fieldlist')->get($i)->get('texttype')!='password') { ?>
					<td class=listentry><?= $VARS->get('data')->get($j)->get($VARS->get('fieldlist')->get($i)->get('field'));?></td>
				<?php } ?>
			<?php } ?>
		</tr>
<?php } ?>
</tbody>
</table>

<hr size=1 />

<table summary="tabelle"><tr>
<td>
	<a href="<?= getLink($VARS->get('defaultLink').'/edit');?>">Neuer Eintrag</a>
</td>
<td> <?= $VARS->get('pages');?> </td>
</tr></table>




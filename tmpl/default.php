<?php 
// No direct access
defined('_JEXEC') or die; ?>

<?php $rows = $hello; ?>

<table class="adminlist">
<tr>
	<td class="title">
		<strong><?php echo JText::_( 'Data' ); ?></strong>
	</td>
	<td class="title">
		<strong><?php echo JText::_( 'Ora' ); ?></strong>
	</td>
	<td class="title">
		<strong><?php echo JText::_( 'Dipendente' ); ?></strong>
	</td>
</tr>
<?php

if (count( $rows ))
{
	foreach ($rows as $row)
	{
		$link = 'index.php?option=com_content&amp;task=edit&amp;id='. $row->id;

		if ( $user->authorize( 'administration', 'manage', 'components', 'com_users' ) ) {
			if ( $row->created_by_alias )
			{
				$author = $row->created_by_alias;
			}
			else
			{
				$linkA 	= 'index.php?option=com_users&amp;task=edit&amp;cid[]='. $row->created_by;
				$author = '<a href="'. $linkA .'" title="'. JText::_( 'Edit User' ) .'">'. htmlspecialchars( $row->name, ENT_QUOTES, 'UTF-8' ) .'</a>';
			}
		}
		else
		{
			if ( $row->matricola )
			{
				$author = $row->matricola;
			}
			else
			{
				$author = htmlspecialchars( $row->name, ENT_QUOTES, 'UTF-8' );
			}
		}
		?>
		<tr>
			<td>
                <?php echo JHTML::_('date', $row->data, '%Y-%m-%d %H:%M:%S'); ?>
			</td>
			<td>				
                <?php echo $row->ora; ?>
			</td>
			<td>
				<?php echo $author;?>
			</td>
		</tr>
		<?php
	}
}
else
{
?>
		<tr>
			<td colspan="3">
				<?php echo JText::_( 'No matching results' );?>
			</td>
		</tr>
<?php
}
?>
</table>
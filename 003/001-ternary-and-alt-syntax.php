<?php

/**
 * PHP's ternary operator allows quick (albeit somewhat unreadable) if-else
 * like operation
 */

$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday',
              'Thursday', 'Friday', 'Saturday');

?>
<style type="text/css">
    tr.day-even { background-color: #eee; }
</style>
<table>
<?php foreach($days as $dayNumber => $dayName): ?>
    <tr class="<?php echo $dayNumber % 2 ? 'day-odd' : 'day-even'; ?>">
        <td><?php echo $dayName?></td>
        <td><a href="#">click to see schedule...</a></td>
    </tr>
<?php endforeach; ?>
</table>
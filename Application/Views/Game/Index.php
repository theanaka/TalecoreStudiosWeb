<h1>Games - Index</h1>
<?php echo $this->Html->Link('/Game/Create/', 'Create');?>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>NavigationTitle</th>
        <th>IsActive</th>
        <th>IsDeleted</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($Games as $game):?>
        <tr>
            <td><?php echo $game->Id;?></td>
            <td><?php echo $game->Title;?></td>
            <td><?php echo $game->NavigationTitle;?></td>
            <td><?php echo $game->IsActive;?></td>
            <td><?php echo $game->IsDeleted;?></td>
            <td>
                <a href="/Game/Edit/<?php echo $game->Id;?>">Edit</a> |
                <a href="/Game/Delete/<?php echo $game->Id;?>">Delete</a> |
                <a href="/Game/Details/<?php echo $game->NavigationTitle;?>">Read</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
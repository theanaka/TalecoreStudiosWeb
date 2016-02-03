<h1>User Information - Index</h1>
<a href="/UserInformation/Create">Create</a>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Title</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($UserInformation as $information):?>
        <tr>
            <td><?php echo $information->Id;?></td>
            <td><?php echo $information->User->Username;?></td>
            <td><?php echo $information->Title;?></td>
            <td>
                <a href="/UserInformation/Edit/<?php echo $information->Id;?>">Edit</a> |
                <a href="/UserInformation/Delete/<?php echo $information->Id;?>">Delete</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
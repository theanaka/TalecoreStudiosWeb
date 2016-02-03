<h1>Users - Index</h1>
<a href="/User/Create">Create</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Display name</th>
            <th>Email</th>
            <th>Password</th>
            <th>IsActive</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Users as $user):?>
            <tr>
                <td><?php echo $user->Id;?></td>
                <td><?php echo $user->Username;?></td>
                <td><?php echo $user->DisplayName;?></td>
                <td><?php echo $user->Email;?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <a href="/User/Edit/<?php echo $user->Id;?>">Edit</a> |
                    <a href="/User/Delete/<?php echo $user->Id;?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
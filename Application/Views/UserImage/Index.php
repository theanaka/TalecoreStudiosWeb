<h1>User Image - Index</h1>
<a href="/UserImage/Create">Create</a>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Image</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($UserImages as $userImage):?>
        <tr>
            <td>
                <?php echo $userImage->Id;?>
            </td>
            <td>
                <?php echo $userImage->User->Username;?>
            </td>
            <td>
                <?php if($userImage->Image != null):?>
                    <?php echo $userImage->Image->Name;?>
                <?php endif;?>
            </td>
            <td>
                <a href="/UserImage/Edit/<?php echo $userImage->Id;?>">Edit</a> |
                <a href="/UserImage/Delete/<?php echo $userImage->Id;?>">Delete</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
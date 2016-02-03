<h1>Newspost - Index</h1>
<a href="/NewsPost/Create">Create</a>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Time</th>
        <th>Author</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($NewsPosts as $newsPost):?>
        <tr>
            <td><?php echo $newsPost->Id;?></td>
            <td><?php echo $newsPost->Title;?></td>
            <td><?php echo $newsPost->PostTimeStamp;?></td>
            <td><?php echo $newsPost->AuthorId;?></td>
            <td>
                <a href="/NewsPost/Edit/<?php echo $newsPost->Id;?>">Edit</a> |
                <a href="/NewsPost/Delete/<?php echo $newsPost->Id;?>">Delete</a> |
                <a href="/NewsPost/Read/<?php echo $newsPost->Id;?>">Read</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
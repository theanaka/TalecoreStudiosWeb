<h1>CoverImage - Index</h1>
<a href="/CoverImage/Create">Create</a>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Identifier</th>
        <th>Image</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($CoverImages as $coverImage):?>
        <tr>
            <td><?php echo $coverImage->Id;?></td>
            <td><?php echo $coverImage->Identifier;?></td>
            <td><?php echo $coverImage->Image->Name;?></td>
            <td>
                <a href="/CoverImage/Edit/<?php echo $coverImage->Id;?>">Edit</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
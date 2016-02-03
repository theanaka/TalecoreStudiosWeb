<h1>Image - Index</h1>
<a href="/Image/Upload">Create</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Alt</th>
            <th>FileName</th>
            <th>Path</th>
            <th>Type</th>
            <th>Timestamp</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($images as $image):?>
            <tr>
                <td><?php echo $image->Id;?></td>
                <td><?php echo $image->Name;?></td>
                <td><?php echo $image->Alt;?></td>
                <td><?php echo $image->FileName;?></td>
                <td><?php echo $image->Path;?></td>
                <td><?php echo $image->MimeType;?></td>
                <td><?php echo $image->Timestamp;?></td>
                <td>
                    <a href="/Image/Edit/<?php echo $image->Id;?>">Edit</a> |
                    <a href="/Image/Display/<?php echo $image->Name;?>">View</a> |
                    <a href="/Image/Delete/<?php echo $image->Id;?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
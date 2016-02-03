<h1>Slideshow Image - Index</h1>
<a href="/SlideshowImage/Create">Create</a>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Sort Order</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($SlideshowImages as $slideshowImage):?>
        <tr>
            <td>
                <?php echo $slideshowImage->Id;?>
            </td>
            <td>
                <?php echo $slideshowImage->Image->Name;?>
            </td>
            <td>
                <?php echo $slideshowImage->SortOrder;?>
            </td>
            <td>
                <a href="/SlideshowImage/Edit/<?php echo $slideshowImage->Id;?>">Edit</a> |
                <a href="/SlideshowImage/Delete/<?php echo $slideshowImage->Id;?>">Delete</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
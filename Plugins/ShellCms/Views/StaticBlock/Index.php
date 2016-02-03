<h1>Static Block - Index</h1>
<a href="/StaticBlock/Create">Create</a>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Identifier</th>
        <th>Content</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($StaticBlocks as $staticBlock):?>
        <tr>
            <td><?php echo $staticBlock->Id;?></td>
            <td><?php echo $staticBlock->Identifier;?></td>
            <td><?php echo $this->Html->SafeHtml($staticBlock->Content);?></td>
            <td>
                <a href="/StaticBlock/Edit/<?php echo $staticBlock->Id;?>">Edit</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
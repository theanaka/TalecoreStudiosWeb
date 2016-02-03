<h1>Game Content - Index</h1>
<div>
    <div>
        <h2>Game Image</h2>
    </div>
    <a href="/GameContent/CreateImage">Create</a>

    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Game</th>
            <th>Image</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($GameImages as $gameImage):?>
            <tr>
                <td><?php echo $gameImage->Id;?></td>
                <td><?php echo $gameImage->Game->Title;?></td>
                <td><?php echo $gameImage->Image->Name;?></td>
                <td>
                    <a href="/GameContent/EditImage/<?php echo $gameImage->Id;?>">Edit</a> |
                    <a href="/GameContent/DeleteImage/<?php echo $gameImage->Id;?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

<div>
    <div>
        <h2>Game Youtube Link</h2>
    </div>
    <a href="/GameContent/CreateYoutubeLink/">Create</a>

    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Game</th>
            <th>Link</th>
            <th>Thumbnail</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($GameYoutubeLinks as $youtubeLink):?>
            <tr>
                <td><?php echo $youtubeLink->Id;?></td>
                <td><?php echo $youtubeLink->Game->Title;?></td>
                <td><?php echo $youtubeLink->YoutubeLink;?></td>
                <td><?php echo $youtubeLink->Image->Name;?></td>
                <td>
                    <a href="/GameContent/EditYoutubeLink/<?php echo $youtubeLink->Id;?>">Edit</a> |
                    <a href="/NewsPost/DeleteYoutubeLink/<?php echo $youtubeLink->Id;?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
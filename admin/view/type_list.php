<?php include('../admin/view/header.php') ?>
<h2>Current car types</h2>
<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Remove?</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($types as $type):?>
            <tr>
                <td><?=$type['type']?></td>
                <td>                
                    <form action="." method="POST">
                    <input type="hidden" name="action" value="delete_type">
                    <input type="hidden" name="type_id" value=<?= $type['type_id'] ?>>
                    <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<h2>Add a car type</h2>
<section class="add_type_form">    
    <form action="." method="POST">
        <input type="hidden" name="action" value="add_type">
        <label for="add_type">Type:</label>
        <input id="add_type" type="text" name="new_type" maxlength="20" size="20" required>
        <button class="add" type="submit">Add Type</button>
    </form>
</section>

<?php include('../admin/view/footer.php'); ?>
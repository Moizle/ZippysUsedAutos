<?php include('../admin/view/header.php') ?>
<h2>Current car makes</h2>
<table>
    <thead>
        <tr>
            <th>Make</th>
            <th>Remove?</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($makes as $make):?>
            <tr>
                <td><?=$make['make']?></td>
                <td>                
                    <form action="." method="POST">
                    <input type="hidden" name="action" value="delete_make">
                    <input type="hidden" name="make_id" value=<?= $make['make_id'] ?>>
                    <button make="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<h2>Add a car make</h2>
<section class="add_make_form">    
    <form action="." method="POST">
        <input type="hidden" name="action" value="add_make">
        <label for="add_make">Make:</label>
        <input id="add_make" type="text" name="new_make"  required>
        <button class="add" type="submit">Add make</button>
    </form>
</section>

<?php include('../admin/view/footer.php'); ?>
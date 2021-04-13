<?php include('../admin/view/header.php') ?>
<h2>Current car classes</h2>
<table>
    <thead>
        <tr>
            <th>Class</th>
            <th>Remove?</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($classes as $class):?>
            <tr>
                <td><?=$class['class']?></td>
                <td>                
                    <form action="." method="POST">
                    <input type="hidden" name="action" value="delete_class">
                    <input type="hidden" name="class_id" value=<?= $class['class_id'] ?>>
                    <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<h2>Add a car class</h2>
<section class="add_class_form">    
    <form action="." method="POST">
        <input type="hidden" name="action" value="add_class">
        <label for="add_class">Class:</label>
        <input id="add_class" type="text" name="new_class" required>
        <button class="add" type="submit">Add Type</button>
    </form>
</section>

<?php include('../admin/view/footer.php'); ?>
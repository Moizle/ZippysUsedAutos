<?php include('view/header.php') ?>
<h2>Let's add a car!</h2>
<form action="." method="post">
<input type="hidden" name="action" value="car_added">
    <label for="Class">Class:</label>
    <select name="class_id" required>
        <option value="" selected>Choose Class</option>
        <?php foreach($classes as $class) : ?>
            <option value="<?= $class['class_id']?>"><?= $class['class'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="Type">Type:</label>
    <select name="type_id" required>
        <option value="" selected>Choose Type</option>
        <?php foreach($types as $type) : ?>
            <option value="<?= $type['type_id']?>"><?= $type['type'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="year">Year:</label>
    <input id="year" type="number" name="year" required>
    <br>
    <label for="Make">Make:</label>
    <select name="make_id" required>
        <option value="" selected>Choose Make</option>
        <?php foreach($makes as $make) : ?>
            <option value="<?= $make['make_id']?>"><?= $make['make'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="model">Model:</label>
    <input id="model" type="text" name="model"  required>
    <br>
    <label for="price">Price:</label>
    <input id="price" type="number" name="price" required>
    <br>
    <button class="add" type="submit">Add car</button>
</form>
<?php include('view/footer.php'); ?>
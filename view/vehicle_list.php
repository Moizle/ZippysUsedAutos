<?php include('view/header.php') ?>
<div class="display_car_options">
    <section>
        <form action="." method="post" class="car_option_form">
        <input type="hidden" name="action" value="show_cars">
        <select class="vehicle_options" id="makes" name="make_id">
            <option value="0">Show all makes</option>
            <?php foreach ($makes as $make): ?>
                <option value="<?=$make['make_id']?>"><?=$make['make']?></option>
            <?php endforeach;?>
        </select>    
        <br>
        <select class="vehicle_options" id="types" name="type_id">
            <option value="0">Show all types</option>
            <?php foreach ($types as $type): ?>
                <option value='<?=$type['type_id']?>'><?=$type['type']?></option>
            <?php endforeach;?>
        </select>
        <br>    
        <select class="vehicle_options" id="classes" name="class_id">
            <option value="0">Show all classes</option>
            <?php foreach ($classes as $class): ?>
                <option value='<?=$class['class_id']?>'><?=$class['class']?></option>
            <?php endforeach;?>
        </select>    
    </section>
    <section class="sort_radios">
        <h4>Sort by:</h4>
        <input type="radio" id="price" name="sort" value="price">
        <label for="price">Price</label>
        <input type="radio" id="year" name="sort" value="year">
        <label for="year">Year</label>
        <button class="sortButton" type="submit">Go</button>
    </section>
    </form>
</div>
<div class="display_cars">
    <table class="car_table">
    <thead>
        <tr>
            <th>Class</th>
            <th>Type</th>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cars as $car):?>
            <tr>
                <td><?= $car['class']?></td>
                <td><?= $car['type']?></td>
                <td><?= $car['year']?></td>
                <td><?= $car['make']?></td>
                <td><?= $car['model']?></td>
                <td>$<?= $car['price']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php include('view/footer.php'); ?>

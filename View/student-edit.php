<?php require 'includes/header.php' ?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section class="main">
    <section class="header">
        <h1>This is the student detail page.</h1>
        <h3>This is where we will edit a selected student</h3>

        <p><a href="index.php?page=homepage">To homepage</a></p>
        <p><a href="index.php?page=students-view">To students list page</a></p>
        <p><a href="index.php?page=teachers-view">To the teachers page</a></p>
        <p><a href="index.php?page=classes">To the classes page</a></p>
    </section>

    <section class="form-main">
        <form method="post" action="" id="edit_form" class="form-edit">
            <input type="hidden" name="student-id" value="<?php echo $studentById[0]['id'] ?>">
            <label for="student-name">Name: </label>
            <input type="text" name="student-name" placeholder="Name" required value="<?php echo $studentById[0]['name'] ?>">
            <label for="student-email">Email: </label>
            <input type="text" name="student-email" placeholder="Email" required value="<?php echo $studentById[0]['email'] ?>">
            <label for="student-class">Class: </label>
            <select name="student-class" id="student-class" required>
                <?php
                foreach ($classes as $v) {
                    echo "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
                }
                ?>
            </select>
            <input type="hidden" name='editBtn'>
            <button type="submit">Edit</button>

        </form>
        <form action="" method="post" id="delete-form" name="delete-form" class="form-delete">
            <input type="hidden" name='deleteBtn' value="<?php echo $studentById[0]['id'] ?>">
            <button type="submit">Delete</button>
        </form>
    </section>
</section>

<?php require 'includes/footer.php' ?>
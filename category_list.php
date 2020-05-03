<?php 
    require_once('util/valid_admin.php');
?>
<main>
    <h2>Quote Category List</h2>
    <section>
        <?php if ( sizeof($categories) != 0) { ?>
            <table>
                <tr>
                    <th colspan="2">Category</th>
                </tr>        
                <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?php echo $category['categoryName']; ?></td>
                    <td>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="action" value="delete_category">
                            <input type="hidden" name="category_id"
                                value="<?php echo $category['categoryID']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no quote categories in your database.
            </p>
        <?php } ?>
    </section>
    <section>
        <h2>Add Quote Category</h2>
        <form action="admin.php" method="post" id="add_category_form">
            <input type="hidden" name="action" value="add_category">

            <label>Category:</label>
            <input type="text" name="category_name" max="20" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input id="add_category_button" type="submit" class="button blue" value="Add Category"><br>
        </form>
    </section>
    <?php include 'view/links.php'; ?>
</main>
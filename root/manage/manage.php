<?php
	include '../include/page_elements.php';
	include '../include/database.php';
    include '../include/session.php';
?>
<!doctype HTML>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../style/stylesheet.css">
		<title>Better in 30 Days</title>
	</head>
    <body>
        <?php
            insert_header();
        ?>
        <div id="new_post">
            <h1>Add a new post</h1><br>
            <form method="post" action="addpost.php">
                Title:
                <input type="text" name="title" id="title_input"><br>
                Text:
                <input type="text" name="text" id="text_input"><br>
                Image URL:
                <input type="text" name="image" id="image_input"><br>
                <input type="submit" name="submit"><br>
            </form>
        </div>
        <div id="edit_posts">
            <h1>Edit a post</h1><br>
            <?php
                $blog_data = mysqli_query($db, "SELECT * FROM pto_tracker.blog ORDER BY id DESC;")
            			or die("Query failed");
                
                while ($row = mysqli_fetch_array($blog_data)) {
                    $title = $row['title'];
                    $id = $row['id'];

                    echo
                    '<div class="entry">
                        <a href="editpost.php?id='.$id.'">'.$title.'</a>
                    </div>';
                }
                mysqli_close($db);
            ?>
        </div>
    </body>
</html>
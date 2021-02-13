<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../admin/">Book list</a></li>
                <li><a href="../admin/showAuthors">Authors</a></li>
                <li><a href="../admin/addBook">Add book</a></li>
                <li class="active"><a href="../admin/addAuthor">Add author</a></li>
                <li><a href="../admin/addAdmin">Add admin</a></li>
            </ul>
        </div>

        <div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-2 main">
            <?php
            if(!isset($_POST['authorName'])):
                ?>
                <form action="./addAuthor" method="post">
                    <div class="form-group">
                        <label for="username">Author name</label>
                        <input type="text" class="form-control" id="authorName" name="authorName" placeholder="Author name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add author</button>
                    </div>
                </form>
            <?php
            endif;
                if(isset($_POST['authorName'])){
                echo "Adding successful";
            }
            ?>
        </div>
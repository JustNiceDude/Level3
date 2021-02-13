<div class="container-fluid">
    <div class="row">`
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../admin/">Book list</a></li>
                <li><a href="../admin/showAuthors">Authors</a></li>
                <li><a href="../admin/addBook">Add book</a></li>
                <li><a href="../admin/addAuthor">Add author</a></li>
                <li class="active"><a href="../admin/addAdmin">Add admin</a></li>
            </ul>
        </div>


        <div class="col-sm-10 col-sm-offset-4 col-md-10 col-md-offset-2 main">
            <?php
            if (!isset($_POST['login']) && !isset($_POST['password'])):
                ?>
                <div class="row">
                    <div class="col-md-5">
                        <form action="./addAdmin" method="post">
                            <div class="form-group">
                                <label for="login">User name</label>
                                <input type="text" class="form-control" id="login" name="login"
                                       placeholder="User name">
                            </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add admin</button>
                        </div>
                    </div>
                </div>
            <?php
            endif;
            if (isset($_POST['login']) && isset($_POST['password'])) {
                echo "Adding successful";
            }
            ?>
        </div>
    </div>
</div>
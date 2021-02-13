<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../admin/">Book list</a></li>
                <li><a href="../admin/showAuthors">Authors</a></li>
                <li class="active"><a href="../admin/addBook">Add book</a></li>
                <li><a href="../admin/addAuthor">Add author</a></li>
                <li><a href="../admin/addAdmin">Add admin</a></li>
            </ul>
        </div>

        <div class="col-sm-10 col-sm-offset-4 col-md-10 col-md-offset-2 main">
            <div class="row">
                <div class="col-md-5">
                    <form action="./addBook" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Book name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Book name"
                                   required>
                        </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="author1">Author 1</label>
                        <select class="form-control" name="author1" id="author1">
                            <option disabled selected>Pick the author 1</option>
                            <?php
                            foreach ($data as $authors):
                                ?>
                                <option value="<?php echo $authors['id']; ?>"><?php echo $authors['author']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" min="1900" max="2099" step="1" value="2021" class="form-control" id="year"
                               required name="year" placeholder="Год">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="author2">Author 2</label>
                        <select class="form-control" name="author2" id="author2">
                            <option disabled selected>Pick the author 2</option>
                            <?php
                            foreach ($data as $authors):
                                ?>
                                <option value="<?php echo $authors['id']; ?>"><?php echo $authors['author']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="number_of_pages">Number of pages</label>
                        <input type="number" required min="0" max="9999" step="1" class="form-control"
                               id="number_of_pages"
                               name="number_of_pages" placeholder="Number of pages">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="author3">Author 3</label>
                        <select class="form-control" name="author3" id="author3">
                            <option disabled selected>Pick the author 3</option>
                            <?php
                            foreach ($data as $authors):
                                ?>
                                <option value="<?php echo $authors['id']; ?>"><?php echo $authors['author']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="description">Book description</label>
                        <textarea class="form-control" required id="description" name="description"
                                  rows="5"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="image_name">Upload picture for this book</label>
                        <label class="btn btn-info"> <input type="file" id="image_name" name="image_name"
                                                            hidden></label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Add book</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

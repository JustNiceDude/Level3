<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../admin/">Book list</a></li>
                <li class="active"><a href="../admin/showAuthors">Authors</a></li>
                <li><a href="../admin/addBook">Add book</a></li>
                <li><a href="../admin/addAuthor">Add author</a></li>
                <li><a href="../admin/addAdmin">Add admin</a></li>
            </ul>
        </div>
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-2 main">
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Authors</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($data as $author):
                        ?>
                        <tr>
                            <td><?php echo $author['author'] ?></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                <nav aria-label="...">
                    <ul class="pagination">
                        <?php
                        $next_page = '';
                        $offset = $params['offset'];
                        $limit = $params['limit'];
                        $total_pages = $params['total'];
                        if ($offset != 0) {
                            echo '<li class="page-item"><a class="page-link" href="../admin/showAuthors?offset=' . ($offset - $limit) . '">Previous</a></li>';
                        }
                        if ($offset < ($total_pages - 1) * $limit) {
                            $next_page = '<li class="page-item"><a class="page-link" href="../admin/showAuthors?offset=' . ($offset + $limit) . '">Next</a></li>';
                        }
                        for ($i = 0; $i < $total_pages; $i++) {
                            if ($offset == $i * $limit) {
                                echo '<li class="page-item active"><a class="page-link" href="../admin/showAuthors?offset=' . $i * $limit . '">' . ($i + 1) . '</a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="../admin/showAuthors?offset=' . $i * $limit . '">' . ($i + 1) . '</a></li>';
                            }
                        }
                        echo $next_page;
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
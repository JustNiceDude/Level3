<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                foreach ($data as $book):
                    ?>
                    <div data-book-id="<?php echo $book['id'] ?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                        <div class="book">
                            <a href="./book/<?php echo $book['id'] ?>"><img
                                        src="/public/images/<?php echo $book['image_name'] ?>"
                                        alt="<?php echo $book['name'] ?>">
                                <div data-title="<?php echo $book['name'] ?>" class="blockI" style="height: 46px;">
                                    <div data-book-title="<?php echo $book['name'] ?>"
                                         class="title size_text"><?php echo $book['name'] ?></div>
                                    <div data-book-author="<?php echo $book['author'] ?>"
                                         class="author"><?php echo $book['author'] ?></div>
                                </div>
                            </a>
                            <a href="./book/<?php echo $book['id'] ?>">
                                <button type="button" class="details btn btn-success">Read</button>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                            echo '<li class="page-item"><a class="page-link" href="./?offset=' . ($offset - $limit) . '">Previous</a></li>';
                        }
                        if ($offset < ($total_pages - 1) * $limit) {
                            $next_page = '<li class="page-item"><a class="page-link" href="./?offset=' . ($offset + $limit) . '">Next</a></li>';
                        }
                        for ($i = 0; $i < $total_pages; $i++) {
                            if ($offset == $i * $limit) {
                                echo '<li class="page-item active"><a class="page-link" href="./?offset=' . $i * $limit . '">' . ($i + 1) . '</a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="./?offset=' . $i * $limit . '">' . ($i + 1) . '</a></li>';
                            }
                        }
                        echo $next_page;
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

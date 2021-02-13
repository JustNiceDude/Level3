<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                if ($data == null):?>
                    <div style="text-align: center; padding: 250px">
                         <span style="font-size: xx-large; background-color:#32c2ff">
                            <?php echo "There are no such results: " . "\"" . $_GET['search'] . "\"" ?>
                         </span>
                    </div>
                    <?php
                    exit();
                endif; ?>

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
                <span style="font-size: xx-large; background-color: #3cff95 ">
                     <?php echo "Please, push the "."\""."Ш++"."\""." logo to make a new searching" ?>
                </span>
            </div>

        </div>
    </div>
</section>

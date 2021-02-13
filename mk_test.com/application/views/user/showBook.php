<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="book_block col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="id" book-id="<?php echo $id ?>">
                <div id="bookImg" class="col-xs-12 col-sm-3 col-md-3 item" style="margin:;"><img
                            src="/public/images/<?php echo $image_name ?>" alt="Responsive image"
                            class="img-responsive">

                    <hr>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 info">
                    <div class="bookInfo col-md-12">
                        <div id="title" class="titleBook"><?php echo $name ?></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bookLastInfo">
                            <div class="bookRow"><span class="properties">Author:</span><span
                                        id="author"><?php echo $author ?></span></div>
                            <div class="bookRow"><span class="properties">Year:</span><span
                                        id="year"><?php echo $year ?></span></div>
                            <div class="bookRow"><span class="properties">Pages:</span><span
                                        id="pages"><?php echo $number_of_pages ?></span></div>
                        </div>
                        <div class="btnBlock col-xs-12 col-sm-12 col-md-12">
                            <button type="button" class="btnBookID btn-lg btn btn-success">Want to read</button>
                        </div>
                        <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm"
                             style="margin-bottom: 100px">
                            <h4>About book</h4>
                            <hr>
                            <p id="description"><?php echo $description ?></p>
                        </div>
                    </div>
                </div>
                <script src="/public/scripts/book.js" defer=""></script>
            </div>

            <div style="text-align: center;">
                <span style="font-size: x-large; background-color:#c8ff8b ">
                     <?php echo "Please, push the " . "\"" . "Ш++" . "\"" . " logo to make a searching" ?>
                </span>
            </div>
        </div>
</section>
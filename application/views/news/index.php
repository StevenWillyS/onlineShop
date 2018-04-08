<!-- $title ini dikasih di News.php (kontroler) awalnya $data['title'] waktu di view tinggal $title -->
<h2><?php echo $title; ?></h2>
<!-- looping foreach, $data['news'] sama jadi $news, tapi disini isinya berupa array 
'title', 'text', sama 'slug' ini nama kolom di database yang valuenya ditampilin disini-->
<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>
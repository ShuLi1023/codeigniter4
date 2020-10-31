
<h1><?= $title ?></h1>

<div>

    <?php foreach($posts as $post) : ?>
        <div>
            <h3><?= $post ?></h3>
            <img src="/assets/images/13.jpg" style="width:200px; height:auto;" alt="">
            <p>I divided the views into 3 smaller parts so that you can understand different approaches that can be used when dealing with views in Ci4.</p>
        </div>
    <?php endforeach; ?>
</div>

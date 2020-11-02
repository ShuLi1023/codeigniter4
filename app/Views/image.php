<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Image Manipulation</title>
</head>

<body>
    <div class="container">
        <h1>Form Validation</h1>
        <?php if (isset($validation)) : ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload File </label>
                <input type="file" multiple name="theFile[]" class="form-control-file" id="file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if (isset($image)) : ?>
            <div class="row">
                <div class="col-md-4 mt-4">
                    <h4>Original</h4>
                    <img src="<?= src($image) ?>" class="img-fluid">
                </div>
                <?php foreach ($folders as $folder) : ?>
                    <div class="col-md-4 mt-4">
                    <h4><?= ucfirst($folder) ?></h4>
                        <img src="<?= src($image, $folder) ?>" class="img-fluid">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
              <!-- <img src="<?= src('fileName.jpg', 'thumbs') ?>" alt=""> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
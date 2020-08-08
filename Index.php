<?php
    session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./Index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<?php if(isset($_SESSION['response'])) { ?>
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card-panel <?= $_SESSION['responseStatusColor']?>">
                  <span class="white-text">
                      <?= $_SESSION['response'] ?>
                  </span>
            </div>
        </div>
    </div>
<?php } ?>
<div class="container">
    <h1 class="center">FILE UPLOAD APP</h1>
    <form action="FileUpload.php" method="POST" class="form"  enctype="multipart/form-data">
        <div class="file-field input-field">
            <div class="btn btn-large yellow darken-2">
                <span>File</span>
                <input type="file" name="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="row">
            <button class="btn btn-large green col s4 offset-s4" type="submit" name="submit">SEND</button>
        </div>
    </form>
</div>
<div class="row">
    <h1 class="center">UPLOADED IMAGES</h1>
    <div class="col s12 cards-container">
        <?php
        $files = preg_grep('/^([^.])/', scandir("uploads"));
        foreach($files as $file) { ?>
            <div class="card">
                <div class="card-image">
                    <img src="<?= "uploads/".$file ?>">
                </div>
            </div>
    <?php } ?>
    </div>
</div>
</body>
</html>
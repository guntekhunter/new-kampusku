<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/code-editor.css">
    <link rel="stylesheet" href="../../serverside/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://didasoff.github.io/codemirror-documentation/main-dark-codemirror.css">
    <script type="text/javascript" src="https://codemirror.net/lib/codemirror.js"></script>
    <script type="text/javascript" src="https://codemirror.net/mode/xml/xml.js"></script>
    <script type="text/javascript" src="https://codemirror.net/mode/css/css.js"></script>
    <script type="text/javascript" src="https://codemirror.net/mode/javascript/javascript.js"></script>

    <title>Code Editor</title>
</head>

<body>
    <header>
        <nav>
            <h1 style="cursor:context-menu">KampusKu</h1>
            <ul>
                <li><a class="<?= $current_page == 'index' ? 'aktif' : '' ?>" href="../halaman/index.php">Home</a></li>
                <li><a class="<?= $current_page == 'artikel' ? 'aktif' : '' ?>" href="../halaman/artikel.php">Artikel</a></li>
                <li><a class="<?= $current_page == 'tutorial' ? 'aktif' : '' ?>" href="../halaman/tutorial.php">Tutorial</a></li>
                <li><a class="<?= $current_page == 'codeEditor' ? 'aktif' : '' ?>" href="../halaman/codeEditor.php">Code editor</a></li>
            </ul>
        </nav>
    </header>
    <!-- end of header -->
    <div class="editor">
        <div class="text-editor">
            <div class="language">
                <p for="html-code"><i class="fab fa-html5"></i>HTML</p>
                <textarea id="html-code" class="language"></textarea>
            </div>
            <div class="language">
                <p for="html-code"><i class="fab fa-css3-alt"></i>CSS</p>
                <textarea id="css-code" class="language"></textarea>
            </div>
            <div class="language">
                <p for="html-code"><i class="fab fa-js"></i>JS</p>
                <textarea id="js-code" class="language"></textarea>
            </div>
        </div>
        <div class="output-container">
            <iframe id="output"></iframe>
        </div>

    </div>
    <!-- <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre[class*=language-]').forEach(function(node) {
                node.classList.add('line-numbers');
            });
            Prism.highlightAll();
        });
    </script> -->
    <script src="../js/code.js"></script>
    <?php include("../template/footer.php") ?>
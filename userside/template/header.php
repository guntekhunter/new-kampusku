<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/artikel.css">
    <link rel="stylesheet" href="../css/isi-cerita.css">
    <link rel="stylesheet" href="../css/tutorial.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <? include "../conf/koneksi.php"; ?>
    <title>Kampusku</title>
</head>

<body>
    <header>
        <nav>
            <h1 style="cursor:context-menu">KampusKu</h1>
            <nav class="nav" id="nav-menu">
                <ion-icon name="close" class="header-close" id="close-menu"></ion-icon>
                <ul class="nav-list">
                    <li><a class="<?= $current_page == 'index' ? 'aktif' : '' ?>" href="../halaman/index.php">Home</a></li>
                    <li><a class="<?= $current_page == 'artikel' ? 'aktif' : '' ?>" href="../halaman/artikel.php">Artikel</a></li>
                    <li><a class="<?= $current_page == 'tutorial' ? 'aktif' : '' ?>" href="../halaman/tutorial.php">Tutorial</a></li>
                    <li><a class="<?= $current_page == 'codeEditor' ? 'aktif' : '' ?>" href="../halaman/codeEditor.php">Code editor</a></li>
                </ul>
            </nav>
            <ion-icon name="menu" class="header-toggle" id="togle-menu"></ion-icon>
        </nav>
    </header>
    <script>
        const navMenu = document.getElementById('nav-menu'),
            toggleMenu = document.getElementById('togle-menu'),
            closeMenu = document.getElementById('close-menu');

        toggleMenu.addEventListener('click', () => {
            navMenu.classList.toggle('show')
        })
        closeMenu.addEventListener('click', () => {
            navMenu.classList.remove('show')
        })
    </script>
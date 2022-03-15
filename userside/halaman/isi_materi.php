<?php $current_page = 'artikel'; ?>
<?php
include "../conf/koneksi.php";
include("../template/header.php")
?>



<section class="isi-cerita">
    <section class="satu">
        <div class="container-section-satu">
            <div class="left file-card">
                <h1>Download materi</h1>
                <div class="gap"></div>
                <div class="container-file">
                    <?php $id = $_GET['id']; ?>
                    <?php $sql1 = mysqli_query($connect, "SELECT * FROM materi WHERE materi.id_jurusan = $id"); ?>
                    <?php while ($result = mysqli_fetch_assoc($sql1)) : ?>
                        <a href="download.php?file=<?= $result['file_data'] ?>" class="card card-container-file">
                            <div class="card-file">
                                <p class="isi_materi"><?php $isi = $result['file_judul'];
                                                        $i = strip_tags($isi);
                                                        if (strlen($i) > 100) :
                                                            $stringCut = substr($i, 0, 40);
                                                            $endPoint = strrpos($stringCut, ' ');
                                                            $i = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        endif;
                                                        echo $i;
                                                        ?></p>

                                <div class="gap"></div>
                                <div class="image-contain">
                                    <img src="../image/artikel page/document.png" alt="" class="src">
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="right">
                <h3>Cerita Lain</h3>
                <?php $sql2 = mysqli_query($connect, "SELECT * FROM artikel ORDER BY artikel.id ASC");
                ?>
                <?php while ($result = mysqli_fetch_array($sql2)) : ?>
                    <div class="garis"></div>
                    <a href="../halaman/isi-cerita.php?id=<?= $result['id']; ?>" class="container-lain">
                        <div class="text-container">
                            <p><?php echo $result['judul']; ?></p>
                            <p class="tanggal"><?= date('d F Y', $result['date_created']) ?></p>
                        </div>
                        <div class="image-container">
                            <?php $g = $result['gambar']; ?>
                            <img src="../../serverside/gambar/<?= $g; ?>" alt="">
                        </div>

                    </a>
                <?php endwhile; ?>
                <div class="gap"></div>
                <h5><a href=""> More..</a></h5>
            </div>
        </div>
    </section>
    <section class="dua">
        <div class="container">
            <a href="./artikel.php" class="klik">
                <div class="tombol tombol-satu">Kembali ke Artikel</div>
            </a>
        </div>
    </section>
    <div class="gap"></div>
    <?php include("../template/footer.php") ?>
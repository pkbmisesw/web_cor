<?php
$sql_pages = $conn->prepare("SELECT * FROM m_post WHERE stat=1 ORDER BY id DESC LIMIT 5");
$sql_pages->execute();
?>

<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
    <div class="sidebar__wrapper">
        <div class="sidebar__widget mb-55">
            <div class="sidebar__widget-content">
                <h3 class="sidebar__widget-title mb-25">Search</h3>
                <div class="sidebar__search">
                    <form action="#">
                        <div class="sidebar__search-input-2">
                            <input type="text" placeholder="Search Anything">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="sidebar__widget mb-55">
            <h3 class="sidebar__widget-title mb-25">Latest Post</h3>
            <div class="sidebar__widget-content">
                <div class="sidebar__post rc__post">
                    <?php
                    while($row_pages = $sql_pages->fetch()){
                        $nama_pages = $row_pages['nama'];
                        if(strlen($nama_pages) >= 45){
                            $nama_pages = substr($nama_pages, 0, 44);
                            $nama_pages = $nama_pages . "....";
                        }

                        ?>
                    <div class="rc__post mb-20 d-flex align-items-center">
                        <div class="rc__post-thumb">
                            <a href="blog-details.html"><img src="images/<?php echo $row_pages['gambar']; ?>" alt="blog-sidebar"></a>
                        </div>
                        <div class="rc__post-content">
                            <h3 class="rc__post-title">
                                <a href="blog-details.html"><?php echo $nama_pages; ?></a>
                            </h3>
                            <div class="rc__meta">
                                <span><?php echo date("d M Y", strtotime($row_pages["created_at"])); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="sidebar__widget mb-40">
            <h3 class="sidebar__widget-title mb-30">Tags</h3>
            <div class="sidebar__widget-content">
                <div class="tagcloud tagcloud-d">
                    <a href="#">IT Solution</a>
                    <a href="#">Digital Marketing</a>
                    <a href="#">Software Training</a>
                    <a href="#">Art & Design</a>
                    <a href="#">Photography</a>
                    <a href="#">Music</a>
                </div>
            </div>
        </div>
    </div>
</div>
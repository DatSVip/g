<!-- C'FRIEND -->
<div class="promotion-movie">
    <div class="container">
        <div class="promotion-movie-wr">
            <div class="promotion-movie-list row pb-80">
                <?php foreach (getAllCFriend() as $row): ?>
                    <div class="promotion-it col" data-aos="fade-up">
                        <div class="promotion-content">
                            <div class="head">
                                <h4 class="sub-tittle"><?= $row['cfriend_title'] ?></h4>
                            </div>
                            <div class="inner">
                                <ul class="list object">
                                    <?php foreach ($row['cfriend_details'] as $detail): ?>
                                        <li><?= $detail ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <a href="<?= $row['cfriend_link'] ?>" title="ĐẶT VÉ NGAY" class="btn btn--pri">ĐẶT VÉ NGAY</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- C'VIP -->
<div class="promotion-movie">
    <div class="container">
        <div class="promotion-movie-wr">
            <div class="promotion-movie-list row pb-80">
                <?php foreach (getAllCVIP() as $row): ?>
                    <div class="promotion-it col" data-aos="fade-up">
                        <div class="promotion-content">
                            <div class="head">
                                <h4 class="sub-tittle"><?= $row['cvip_title'] ?></h4>
                            </div>
                            <div class="inner">
                                <ul class="list object">
                                    <?php foreach ($row['cvip_details'] as $detail): ?>
                                        <li><?= $detail ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <a href="<?= $row['cvip_link'] ?>" title="ĐẶT VÉ NGAY" class="btn btn--pri">ĐẶT VÉ NGAY</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
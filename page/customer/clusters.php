<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemas</title>
    <style>
        #bg--outside__cluster {
            background-image: url('https://getoutside.ordnancesurvey.co.uk/assets/components/phpthumbof/cache/get-outside-northumberland-dark-sky-banner.3cdb37421b45e33a3a18e59831966e26.jpg');
            background-size: cover; /* Đảm bảo hình nền phù hợp với kích thước của phần tử */
            background-position: center; /* Canh chỉnh hình nền ở trung tâm */
        }
    </style>
</head>
<body>
    <div id="bg--outside__cluster" class="bg--outside bg--outside__cluster">
        <div class="container cluster__container">
            <div class="row">
                <div class="site">
                    <div class="site_top"></div>
                    <div class="site_content">
                        <div class="site_content--title">
                            <h1>Hệ Thống Các Rạp Chiếu Phim</h1>
                        </div>
                        <div class="site_content--area">
                            <ul>   
                                <?php
                                    foreach (getAll_Area() as $row){
                                        $area_ID = $row['area_ID'];
                                        $area_Name = $row['area_Name'];
                                ?>
                                        <li class="area" id="<?= $area_ID ?>" onclick="showClusters(this.id)"><?= $area_Name ?></li>
                                <?php
                                    }
                                ?>
                                <li class="area" id="danang" onclick="showClusters(this.id)">Đà Nẵng</li>
                                <li class="area" id="hue" onclick="showClusters(this.id)">Huế</li>
                                <li class="area" id="cantho" onclick="showClusters(this.id)">Cần Thơ</li>
                            </ul>
                        </div>
                        <div class="site_content--clusters">
                            <ul>
                                <?php
                                    foreach (getAll_Cluster() as $row){
                                        $cluster_Name = $row['cluster_Name'];
                                        $cluster_ID = $row['cluster_ID'];
                                        $area_ID = $row['area_ID'];
                                ?>
                                        <li onclick="onClickCluster(this.id)" class="<?= 'cluster '.$area_ID ?>" id="<?= $cluster_ID ?>" style="display: none">
                                            <input type="hidden" id="input__<?= $cluster_ID ?>" value="<?= $cluster_ID ?>" name="">
                                            <?= $cluster_Name ?>
                                        </li>
                                <?php
                                    }
                                ?>
                                <li class="cluster soon" id="coming-soon" style="display: none">Coming soon</li>
                            </ul>
                        </div>
                    </div>
                    <div class="site_bottom"></div>  
                    <?php
                        include('booking.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showClusters(areaID) {
            // Hide all clusters
            var clusters = document.querySelectorAll('.cluster');
            clusters.forEach(function(cluster) {
                cluster.style.display = 'none';
            });

            // Display clusters corresponding to the selected area
            var areaClusters = document.querySelectorAll('.' + areaID);
            areaClusters.forEach(function(cluster) {
                cluster.style.display = 'block';
            });

            // Hide "Coming Soon" if there are clusters to display, otherwise show it
            var comingSoon = document.getElementById('coming-soon');
            if (areaClusters.length > 0) {
                comingSoon.style.display = 'none';
            } else {
                comingSoon.style.display = 'block';
            }
        }

        function onClickCluster(clusterID) {
            // Hide "Coming Soon" when clicking on a cluster
            var comingSoon = document.getElementById('coming-soon');
            comingSoon.style.display = 'none';

            // Perform other actions when clicking on a cluster
            // ...
        }
    </script>
</body>
</html>
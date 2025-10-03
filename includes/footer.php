            </main>
            <footer class="footer w-100 fixed-bottom" id="mastfoot">
                <div class="row px-3 px-md-4 py-2 m-auto w-100">
                    <a href="<?php echo home_url();?>/" class="d-flex flex-column col align-items-center justify-content-center h-100 p-0">
                        <img src="<?php echo home_url();?>/assets/images/footer-home.png" class="icon img-fit" alt="Halaman Utama">
                        <span class="text-center">Halaman Utama</span>
                    </strong></a>
                    <a href="<?php echo home_url();?>/bonus-promosi/" class="d-flex flex-column col align-items-center justify-content-center h-100 p-0">
                        <img src="<?php echo home_url();?>/assets/images/footer-commission.png" class="icon img-fit" alt="Referrer">
                        <span class="text-center">Promosi</span>
                    </strong></a>
                    <a href="#" class="d-flex flex-column col align-items-center justify-content-center h-100 p-0">
                        <img src="<?php echo home_url();?>/assets/images/footer-commission.png" class="icon img-fit" alt="Comission">
                        <span class="text-center">Referrer</span>
                    </strong></a>
                    <a href="<?php echo home_url();?>/hubungi-kami/" class="d-flex flex-column col align-items-center justify-content-center h-100 p-0">
                        <img src="<?php echo home_url();?>/assets/images/footer-live_chat.png" class="icon img-fit" alt="Hubungi Kami">
                        <span class="text-center">Hubungi Kami</span>
                    </strong></a>
                </div>
                <script type="text/javascript" src="<?php echo home_url();?>/assets/js/jquery-3.7.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
                <script type="text/javascript" src="<?php echo home_url();?>/assets/js/swiper-bundle.min.js"></script>
                <script type="text/javascript" id="scripts-extra">
                <?php
                    $localize = [
                        "site_url" => home_url(),
                    ];
                    $localizeScripts = json_encode($localize, JSON_FORCE_OBJECT);
                ?>
                    var global = <?php echo $localizeScripts;?>;
                </script>
                <script type="text/javascript" id="scripts" src="<?php echo home_url();?>/assets/js/scripts.js?v=<?php echo tags_version();?>"></script>
                <?php if( !empty($gameProviders) && $page['page_slug'] == 'home' ) {
                    $json_gameProvider = json_encode($gameProviders, JSON_FORCE_OBJECT);
                    ?>
                    <script id="scripts-home-extra">var gameProviders = <?php echo $json_gameProvider;?>;</script>
                    <script id="scripts-home" type="text/javascript" src="<?php echo home_url();?>/assets/js/scripts-home.js?v=<?php echo tags_version();?>"></script>
                    <?php
                } 
                ?>
            </footer>
        </div>
    </body>
</html>

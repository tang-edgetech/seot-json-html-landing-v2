<?php
if( isset($data) && !empty($data) ) {
    if( !empty($data[0]['image'] ) ) {
?>
<section class="<?php echo $id;?> pt-0 pb-2" id="<?php echo $id.'-'.randomUniqueID();?>">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-3">
                <div class="swiper banner-swiper" id="banner-swiper-<?php echo randomUniqueID();?>">
                    <div class="swiper-wrapper">
                    <?php
                    foreach( $data as $item ) {
                    ?>
                        <div class="swiper-slide">
                            <div class="swiper-slide-inner">
                                <div class="swiper-img">
                                    <?php 
                                    if( !empty($item['url']) ) { echo '<a href="" class="swiper-link">'; }
                                    if( !empty($item['image']) ) {
                                        $banner_image = assets_url() . '/banner/'.$item['image'];
                                        echo '<img src="'.$banner_image.'" class="w-100 h-100"/>';
                                    } 
                                    if( !empty($item['url']) ) { echo '</a>'; }
                                    ?>
                                </div>
                                <?php
                                if( !empty($item['title']) || !empty($item['content']) ) {
                                ?>
                                    <div class="swiper-caption">
                                    <?php
                                    if( !empty($item['title']) ) { echo '<h2 class="swiper-title">'.$item['title'].'</h2>'; }
                                    if( !empty($item['content']) ) { echo '<p class="swiper-paragraph mb-0">'.$item['content'].'</p>'; }
                                    ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                    <div class="swiper-navigation">
                        <button type="button" class="btn-nav nav-prev"><span class="d-none">Prev</span><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn-nav nav-next"><span class="d-none">Next</span><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
}
?>
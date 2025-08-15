<?php
$data = $settings['marquee'];
?>
<div class="marquee scrolling-container p-0 d-flex align-items-center mx-auto pnpm4-page-content-inner">
    <div class="mx-3">
        <img src="<?php echo assets_url();?>/bell.png" width="18px" class="bell">
    </div>
    <div class="col" style="overflow:hidden;">
        <span class="h-100" width="90%" style="animation-duration:<?php echo !empty($data['duration']) ? $data['duration'] : '20s'; ?>;"><?php echo $data['content'];?></span>
    </div>
</div>
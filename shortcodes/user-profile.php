<?php if( $data === 1 || $data === 'on' ) :
    $data = $settings['user-profile'];
?>
<section class="section-login py-0" id="">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-4">
                <div class="d-flex flex-wrap p-3 userprofile-container w-100 mt-3" id="userProfileModule">
                    <div class="d-flex flex-wrap p-0 m-0 w-100 justify-content-between mb-3">
                        <a href="<?php echo $data['register'];?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style text-uppercase btn-section-bg col-6 text-center" style="max-width: 48.5%;" type="button" alt="Register Button" href="#">Daftar</a>
                        <a href="<?php echo $data['login'];?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style text-uppercase btn-primary col-6 text-center" style="max-width: 48.5%;" type="button" alt="Login Button" href="#">Log Masuk</a>
                    </div>
                    <div class="d-flex m-0 p-0 w-100">
                        <div class="col-7 px-0 pe-2">
                            <div class="text-0-75">Main Baki:</div>
                            <div class="text-1-3 text-weight-700 text-primary">MYR&nbsp; <span class="setWallet-homepage d-inline-block" style="width: max-content">0.00</span></div>
                            <div class="d-flex m-0 p-0 text-0-75">
                                <div class="col-6 px-0">Depo Minimum</div>
                                <div class="col px-0">:&nbsp;MYR&nbsp;30.00</div>
                            </div>
                            <div class="d-flex m-0 p-0 text-0-75">
                                <div class="col-6 px-0">Pengeluaran Minimum</div>
                                <div class="col px-0">:&nbsp;MYR&nbsp;50.00</div>
                            </div>
                        </div>
                        <div class="col-5 px-0 ">
                            <div class="row m-0 p-0 w-100">
                                <a href="<?php echo $data['deposit'];?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style btn-primary w-100" type="button" alt="Deposit Button">
                                    <div class="d-flex align-items-center">
                                        <img class="col-3 px-0" src="<?php echo assets_url();?>/icon-deposit.png" alt="token" style="max-width: 11%">
                                        <span class="col px-0 ps-2 text-0-9 text-weight-600">Deposit</span>
                                    </div>
                                </a>
                                <a href="<?php echo $data['withdraw'];?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style btn-section-bg w-100 mt-2 " type="button" alt="withdraw Button">
                                    <div class="d-flex align-items-center">
                                        <img class="col-3 px-0 filter-black-to-white" src="<?php echo assets_url();?>/icon-withdrawal.png" alt="token" style="max-width: 11%">
                                        <span class="col px-0 ps-2 text-0-9 text-weight-600">Withdraw</span>
                                        <div class="sequence-line">
                                            <span> </span>
                                            <span> </span>
                                            <span> </span>
                                            <span> </span>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="<?php echo $data['refresh'];?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style btn-section-bg w-100 mt-2" type="button" alt="refresh Button">
                                    <div class="d-flex align-items-center">
                                        <img class="col-3 px-0 filter-black-to-white" src="<?php echo assets_url();?>/icon-refresh.png" alt="token" style="max-width: 11%">
                                        <span class="col px-0 ps-2 text-0-9 text-weight-600">Segar Semula</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
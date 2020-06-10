<?php













?>
<div id="module_Cars" class="moduleContainer">
    <div id="nick-car-choices" class="popup-boxess-container">


        <div class="popup-box-wrapper"  id="ncar-stadium" >
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance1; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Cars/assets/img/car-1.jpg" alt="" class="img-responsive">

                    <p>
                        At the stadium during a football match
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="08dpqAISUV" data-value="chance1">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>


        <div class="popup-box-wrapper"  id="ncar-parking" >
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance2; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Cars/assets/img/car-2.jpg" alt="" class="img-responsive">

                    <p>
                        At a private parking lot at night
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="08dpqAISUV" data-value="chance2">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>


        <div class="popup-box-wrapper"  id="ncar-gas" >
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance3; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Cars/assets/img/car-3.jpg" alt="" class="img-responsive">

                    <p>
                        At a gas station when the owner is taking off
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="08dpqAISUV" data-value="chance3">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>


        <div class="popup-box-wrapper"  id="ncar-road" >
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance4; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Cars/assets/img/car-4.jpg" alt="" class="img-responsive">

                    <p>
                        Ambush on a country road
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="08dpqAISUV" data-value="chance4">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>

        if (omerta.clickEvent === 'touchstart') {
            $("#game_container_wrapper").animate({scrollTop : 0},800);
        }


    </script>

    <?php

    if ($data->crime_time >= time()) {
        $att = (rand(1, 4));
    ?>



        <div class="error-wrapper">
            <div class="popup-container-wrapper">
                <div class="popup-container-wrapper-head popup-warning">
                    <h4>
                        <img src="/assets/omerta/main/layout/assets/img/wrapper/icon-waiting.png" alt="jail-logo"
                             class="check">
                        <span>Too tired</span>
                    </h4>
                </div>
                <div class="popup-container-wrapper-contents">
                    <img src="/assets/omerta/modules/Cars/assets/img/tired-<?php echo $att; ?>.jpg" alt="Car tired image">

                    <div class="popup-container-wrapper-contents-inner">
                        <p>You're still busy searching a target for your next attempt.</p>
                    </div>
                </div>
                <div class="popup-container-wrapper-footer popup-countdown-footer">
                    <ul>
                        <li data-time-end="<?php echo $data->crime_time; ?>" data-timecb="popupButtonNow"></li>
                        <li>
                            <button id="popupButtonNow" class="btn btn-grey btn-bold btn-big" onclick="$('.menu-item-crimes-cars a').click()"
                                    disabled="disabled"  data-ready="Go for it!">PLEASE WAIT...
                            </button>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


    <?php
    }else{
    ?>

    <div class="clearfix"></div>

    <form name="doPopupAction" action="/?module=Cars&action=docar" method="POST">
        <input type="hidden" name="69djklsFNP" value="Yes">
        <input type="hidden" name="" value="" id="crimes-selected-option">
    </form>

    <?php } ?>


</div>

<?php

if ($data->make) {
    echo Characters::cooldown($data->CrimeType,300);
}

?>


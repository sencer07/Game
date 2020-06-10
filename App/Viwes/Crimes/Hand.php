<div id="module_Crimes" class="moduleContainer">
    <div id="crime-choices" class="popup-boxess-container">


        <div class="popup-box-wrapper" id="crime-chance1">
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance1; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Crimes/assets/img/crime-1.jpg" alt="" class="img-responsive">

                    <p>
                        Sting the local department store
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="1entxGIJOW" data-value="chance1">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>


        <div class="popup-box-wrapper" id="crime-chance2">
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance2; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Crimes/assets/img/crime-2.jpg" alt="" class="img-responsive">

                    <p>
                        Hold up a busy restaurant
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="1entxGIJOW" data-value="chance2">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>


        <div class="popup-box-wrapper" id="crime-chance3">
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance3; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Crimes/assets/img/crime-3.jpg" alt="" class="img-responsive">

                    <p>
                        Fence some hot goods
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="1entxGIJOW" data-value="chance3">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>


        <div class="popup-box-wrapper" id="crime-chance4">
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance4; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Crimes/assets/img/crime-4.jpg" alt="" class="img-responsive">

                    <p>
                        Bribe the police seargant to look the other way
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="1entxGIJOW" data-value="chance4">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>


        <div class="popup-box-wrapper" id="crime-chance5">
            <div class="popup-place-wrapper ">
                <div class="head">
                    <h4><?php echo $data->chance5; ?>%</h4>
                </div>
                <div class="content-wrapper">
                    <img src="/assets/omerta/modules/Crimes/assets/img/crime-5.jpg" alt="" class="img-responsive">

                    <p>
                        Empty the jeweller's safe
                    </p>
                </div>
                <div class="foot">
                    <button class="btn btn-red btn-bold btn-big" data-name="1entxGIJOW" data-value="chance5">
                        GO FOR IT!
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>


        if (omerta.clickEvent === 'touchstart') {
            $("#game_container_wrapper").animate({scrollTop: 0}, 800);
        }


    </script>

    <?php

    if ($data->crime_time >= time()) {

        ?>

        <div class="error-wrapper">
            <div class="popup-container-wrapper">
                <div class="popup-container-wrapper-head popup-error">
                    <h4>

                        <img src="/assets/omerta/main/layout/assets/img/wrapper/fail-logo.png" alt="error icon"
                             class="check">
                        <span>ATTEMPT FAILED!</span>

                        <a href="javascript:void(0);" class="pull-right"
                           title="You failed to steal a car but you are still free.">
                            <img src="/assets/omerta/main/layout/assets/img/wrapper/fail-question.png" alt="question"
                                 width="22">
                        </a>
                    </h4>
                </div>
                <div class="popup-container-wrapper-contents">
                    <img src="/assets/omerta/modules/Crimes/assets/img/failed-1.jpg" alt="Crime failed image">

                    <div class="popup-container-wrapper-contents-inner">
                        <h3>You failed but got away </h3>
                    </div>
                </div>
                <div class="popup-container-wrapper-footer popup-countdown-footer">
                    <ul>
                        <li data-time-end="<?php echo $data->crime_time; ?>" data-timecb="popupButtonNow"></li>
                        <li>
                            <button id="popupButtonNow" class="btn btn-grey btn-bold btn-big"
                                    onclick="$('.menu-item-crimes-crimes a').click()" disabled="disabled"
                                    data-ready="Go for it!">PLEASE WAIT...
                            </button>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <?php
    } else {
        ?>


        <div class="clearfix"></div>

        <form name="doPopupAction" action="/?module=Crimes&action=docrime" method="POST">
            <input type="hidden" name="67bcekxAPZ" value="Yes">
            <input type="hidden" name="" value="" id="crimes-selected-option">
        </form>

        <?php
    }




    ?>




</div>


<?php

if ($data->make) {
    echo Characters::cooldown($data->CrimeType,90);
}

?>





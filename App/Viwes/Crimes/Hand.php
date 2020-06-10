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







        echo Game::PopUp(

                $data->html->wrapper,
                $data->html->logo,
                $data->html->icon,
                $data->html->message,
                $data->crime_time,
                $data->html->money,
                $data->html->TypeMessage,
                $data->html->headname
        );

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
    echo Characters::cooldown($data->CrimeType, 90);
}

?>





<?php
require_once("../initialize.php");

?>





    <div class="error-wrapper">
        <div class="success-wrapper">
            <div class="success-wrapper-head">
                <h4>
                    <img src="/assets/omerta/main/layout/assets/img/wrapper/check.png" alt="check-img" class="check">
                    <span>WELL DONE!</span>
                </h4>
            </div>
            <div class="success-wrapper-contents ">
                <img src="/assets/omerta/modules/Crimes/assets/img/welldone-2.jpg" style="height: 100%, width: 100%" alt="well done">

                <div class="success-wrapper-contents-inner">
                    <p class="crime-txt">You made</p>
                    <p class="crime-txt crime-profit"> $ 3</p>
                    <p class="crime-txt">From your crime</p>
                </div>
            </div>

            <div class="popup-container-wrapper-footer popup-countdown-footer">
                <ul>
                    <li data-time-end="1591804607" data-timecb="popupButtonNow"></li>
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


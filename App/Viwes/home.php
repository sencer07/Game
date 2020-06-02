<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Omerta - Massive multiplayer online text-based RPG gangster and mafia game</title>

    <meta name="description" content="Omerta is a text based game RPG. The Godfather of Mafia games online, commit crimes to earn money and experience for your family, right in your browser."/>
    <meta property="og:url" content="https://barafranca.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Omerta - A text based RPG mafia game online for PC">
    <meta property="og:description" content="Omerta is a text based game RPG. The Godfather of Mafia games online, commit crimes to earn money and experience for your family, right in your browser.">
    <meta property="og:site_name" content="Omerta">
    <meta property="og:image" content="https://<?php echo $data->server_name; ?>/assets/images/social.jpg"/>
    <link rel="canonical" href="https://barafranca.com/" />

    <link rel="alternate" href="https://barafranca.nl/" hreflang="NL" />
    <link rel="alternate" href="https://omerta.pt/" hreflang="PT" />
    <link rel="alternate" href="https://barafranca.com/" hreflang="EN" />
    <link rel="alternate" href="https://omerta.com.tr/" hreflang="TR" />
    <link rel="alternate" href="https://barafranca.com/" hreflang="x-default" />

    <!-- Needed fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Arimo:400,700" type="text/css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- VENDOR CORE -->

    <!--[if lt IE 9]>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <![endif]-->
    <!--[if (gte IE 9) | (!IE)]><!-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>

    <!-- Omerta -->
    <link rel="stylesheet" href="/ajax_framestyle.php?<?php echo time(); ?> "/>
    <link href="//<?php echo $data->server_name; ?>/assets/5.6.16.1/homepage.css" rel="stylesheet"/>
    <script src="//<?php echo $data->server_name; ?>/assets/5.6.16.1/homepage.js" type="text/javascript"></script>
</head>
<body class="body-en ext-com">
<div id="wrapper">
    <div class="container">

        <div class="login">
            <form action="?nojs=1&act=login" method="post" data-bind="submit: checkLogin" id="loginbox">
		<span class="email">
			<input class="field" type="email" name="email" required="required" placeholder="Email" data-bind="hasfocus: !showRegisterForm(), value: user_email, valueUpdate: 'afterkeydown', css: {completed: user_email().length > 0}, style: { 'border-color': formErrors()  ? 'red' : '#717171' }">
		</span>
                <span class="password">
			<input class="field" type="password" name="pass" required="required" placeholder="Password" data-bind="value: user_password,valueUpdate: 'afterkeydown', css: {completed: user_password().length > 0}, style: { 'border-color': formErrors() ? 'red' : '#717171' }">
		</span>
                <span class="loginbtn">
			<input type="submit" class="btn btn-small btn-silver btn-bold" value="Login" data-bind="enable: (isFormLoading()) ? false : true, value: (isFormLoading()) ? 'Loading' : 'Login' " />

            <button data-bind="click: toggleRegisterForm" class="btn btn-small btn-action btn-bold">Register</button>

            <span class="loginbtn-fb">
                <a style="display: inline-block; padding: 5px 10px 5px 10px !important;" href="/?module=Homepage.Social&action=Authenticate&provider=Facebook" class="btn btn-small btn-fblue">
                    <i class="fa fa-facebook"></i>
                </a>
            </span>
		</span>

            </form>
            <div class="fog"></div>
        </div>                <div class="online">
            <ul>
                <li><?php echo $data->Online; ?>&nbsp;<span class="gray">Online gangsters</span></li>
                <li><?php echo $data->Lackeys; ?>&nbsp;<span class="gray">Lackeys working</span></li>
                <li><?php echo $data->Total; ?>&nbsp;<span class="gray">Total ranking now</span></li>
                <li><?php echo $data->Registered; ?>&nbsp;<span class="gray">Registered players</span></li>
                <li><span class="green"><a href="#forgot-password-box" title="Forgot Password?"  data-bind="click: recover" >Forgot Password?</a></span></li>
            </ul>
        </div>                	<script type="text/javascript">

            var forgottenTitle = 'Forgot Password?';
            var forgottenLegend = 'Provide the email adress you used for registration in order to reset your password.';

            var forgottenSuccessTitle = 'Reset password requested';
            var forgottenSuccessLegend = 'Please check your email and follow the instructions.';
            var forgottenSuccessButton = 'Ok';

            var btnForgotPasswd =  {
                'Cancel': -1,
                'Recover': 0
            } ;

            var btnForgotPasswdSuccess =  {
                'Ok': 0
            } ;




            function recover() {

                var statesdemo = {
                    state0: {
                        html:'	<div class="forgottenpassword" id="forgot-password-box">' +
                            '		<div class="pure-form"  >' +
                            '			<fieldset>' +
                            '				<legend>'+forgottenLegend+'</legend>' +
                            '				<label for="femail">' +
                            '				<input type="text" name="email" value="" autofocus id="femail" placeholder="Email">' +
                            '			<img class="hidden" id="forgot-loading" style="margin-right: 15px;" src="/assets/omerta/main/layout/assets/img/icons/loading_bar.gif" />' +
                            '			</fieldset>' +
                            '			<span id="forgot-errors" style="color:red;" class="forgot-errors"></span>' +
                            '		</div>' +
                            '</div>',
                        buttons: btnForgotPasswd,
                        focus: 1,
                        title: forgottenTitle,
                        submit: function(e, v, m, f) {

                            if (v != -1) e.preventDefault();

                            if (v == 0) {

                                var $loader = $('#forgot-loading');
                                $loader.removeClass('hidden');

                                var xhr = $.ajax({
                                    type: "POST",
                                    url: '/?module=Homepage.Login&action=Forgottenpassword&r='+Math.random(),
                                    data: f,
                                    dataType: 'json'
                                });

                                xhr.done(function(response) {

                                    $loader.addClass('hidden');

                                    if (response.code == 0) {
                                        $.prompt.goToState('state1');
                                        return;
                                    }

                                    $('#forgot-errors').html(response.data.message);
                                });
                            }

                        }
                    },
                    state1: {
                        title: forgottenSuccessTitle,
                        html: forgottenSuccessLegend,
                        buttons: btnForgotPasswdSuccess,
                        focus: 1,
                        submit:function(e,v,m,f){
                            e.preventDefault();
                            $.prompt.close();
                        }
                    }
                };




                $.prompt(statesdemo);
            }

        </script>                <div id="hp_center">

            <span class="logotext">Online Mafia game</span>
            <span class="text">Welcome to Omerta. The Godfather of Mafia games</span>
            <div class="darkopa">
                <a href="#register-form" data-bind="click: toggleRegisterForm">
                    <div class="btn btn-big btn-action btn-bold">
                        join now for free!
                    </div>

                </a>
            </div>
            <span class="badge">
                    <img src="//<?php echo $data->server_name; ?>/assets/omerta/main/homepage/assets/img/pic_bg-badge.png" alt="">

        <span class="regusers">46+
            <span class="mil">million</span>
        </span>
    </span>


        </div>
        <div class="bottomft">

            <div class="menu">
                <ul>
                    <li id="showscreenshots" data-bind="click: function() {setFeatureTab(1)}, css: {active: isFeatureTab(1), inactive: !isFeatureTab(1) } ">Screenshots</li>
                    <!-- <li id="showfeature" data-bind="click: function() {setFeatureTab(2)}, css: {active: isFeatureTab(2), inactive: !isFeatureTab(2) }">Main Features</li> -->
                    <li id="showfamilies" data-bind="click: function() {setFeatureTab(3)}, css: {active: isFeatureTab(3), inactive: !isFeatureTab(3) }">Top Families</li>
                    <li id="showTopUsers" data-bind="click: function() {setFeatureTab(4)}, css: {active: isFeatureTab(4), inactive: !isFeatureTab(4) }">Top Users</li>
                </ul>
            </div>


            <div id="hp_screenshots" data-bind="visible: isFeatureTab(1)">
                <div class="ftrs">
                    <img src="//<?php echo $data->server_name; ?>/assets/omerta/main/homepage/assets/img/en-pic_features-ss.png" alt="">
                    <hr>
                </div>
                <div id="f_screenshots">
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss avatar"></span>
                        <span class="f_ss-text">Check in real time your progress as a gangster</span>
                    </div>
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss crime"></span>
                        <span class="f_ss-text">Perform all kind of crimes to gain experience</span>
                    </div>
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss chat"></span>
                        <span class="f_ss-text">Use the live chat to keep in touch with your family</span>
                    </div>
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss map"></span>
                        <span class="f_ss-text">Travel to different cities and own different business spots</span>
                    </div>
                </div>
            </div>

            <div id="hp_features" data-bind="visible: isFeatureTab(2)">
                <div class="ftrs">
                    <img src="//<?php echo $data->server_name; ?>/assets/omerta/main/homepage/assets/img/en-pic_features-ss.png" alt="">
                    <hr>
                </div>
                <div id="f_features">
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss avatar"></span>
                        <span class="f_ss-text">Check in real time your progress as a gangster</span>
                    </div>
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss crime"></span>
                        <span class="f_ss-text">Perform all kind of crimes to gain experience</span>
                    </div>
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss chat"></span>
                        <span class="f_ss-text">Use the live chat to keep in touch with your family</span>
                    </div>
                    <div style="display:inline-block;width:180px;margin:0 21px 0 0;text-align:left;font-size:13px;">
                        <span class="f_ss map"></span>
                        <span class="f_ss-text">Travel to different cities and own different business spots</span>
                    </div>
                </div>
            </div>

            <div id="hp_families" data-bind="visible: isFeatureTab(3)">
                <div class="ftrs">
                    <img src="//<?php echo $data->server_name; ?>/assets/omerta/main/homepage/assets/img/en-pic_features-ss.png" alt="">
                    <hr>
                </div>
                <div id="f_families">
                    There are no families yet
                </div>
            </div>
            <div id="hp_families" data-bind="visible: isFeatureTab(4)">
                <div class="ftrs">
                    <img src="//<?php echo $data->server_name; ?>/assets/omerta/main/homepage/assets/img/en-pic_features-ss.png" alt="">
                    <hr>
                </div>
                <div id="f_families">
                    <div class="scroll-pane jspScrollable">

                        <div class="rowempty">
                            <div class="left rank"></div>
                            <div class="left huser-name">Name</div>
                            <div class="left huser-rank">Rank</div>
                            <div class="left huser-family" style="">Family</div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>1.</span></span></div>
                            <div class="left user-name">Berlin</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>2.</span></span></div>
                            <div class="left user-name">Zer</div>
                            <div class="left user-rank">Soldier</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>3.</span></span></div>
                            <div class="left user-name">Hieme</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>4.</span></span></div>
                            <div class="left user-name">Aurelius</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>5.</span></span></div>
                            <div class="left user-name">Egefag</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>6.</span></span></div>
                            <div class="left user-name">Cuore</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>7.</span></span></div>
                            <div class="left user-name">Arenal</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>8.</span></span></div>
                            <div class="left user-name">Tagapamahala</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>9.</span></span></div>
                            <div class="left user-name">Monster</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>10.</span></span></div>
                            <div class="left user-name">Tp</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>11.</span></span></div>
                            <div class="left user-name">Savage</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>12.</span></span></div>
                            <div class="left user-name">Sacred</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>13.</span></span></div>
                            <div class="left user-name">Tagliabull</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>14.</span></span></div>
                            <div class="left user-name">Gryffin</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>15.</span></span></div>
                            <div class="left user-name">Juul</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>16.</span></span></div>
                            <div class="left user-name">Gamechanger</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>17.</span></span></div>
                            <div class="left user-name">Ninchen</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>18.</span></span></div>
                            <div class="left user-name">Monarch</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>19.</span></span></div>
                            <div class="left user-name">Clauwaert</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                        <div class="row">
                            <div class="left number"><span class="circle"><span>20.</span></span></div>
                            <div class="left user-name">Brit</div>
                            <div class="left user-rank">Swindler</div>
                            <div class="left user-family"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: none;" data-bind="visible: showRegisterForm()" class="register-container">
            <form id="register-form" data-bind="submit: doRegister" action="?nojs=1&act=register" method="POST">
                <fieldset>
                    <legend>
                        <span>Your new life as Omerta Gangster starts here</span>
                    </legend>
                    <div style="position:relative;width:100%;height:43px;top:-15px;">
                        <span class="sm">Signup via social media</span>
                        <span class="or">Or</span>
                        <span class="reg">Register your account:</span>
                    </div>
                    <div style="float:left;">
                        <div id="fbform">
                            <a href="#fb-login" data-href="/?module=Homepage.Social&action=Authenticate&provider=Facebook" data-bind="click: doFacebookLogin" class="btn btn-big btn-fblue">
                                <i class="fa fa-facebook-square"></i>Register with Facebook
                            </a>
                            <div> <br/> Facebook is a faster way to signup </div>
                        </div>
                    </div>

                    <div id="emailform">
                        <span class="ar">Already registered? <a data-bind="click: toggleRegisterForm">Login in here</a></span>
                        <div class="pure-control-group">
                            <label for="input-mail">Email <span class="reqfield">*</span></label>
                            <input data-bind="hasfocus: showRegisterForm()" id="input-mail" name="mail" required="required" type="email" placeholder="your@email.com">
                        </div>
                        <div class="pure-control-group">
                            <label for="input-mailc">Email Confirm <span class="reqfield">*</span></label>
                            <input id="input-mailc" name="mailc" required="required" type="email" placeholder="your@email.com">
                        </div>


                        <div class="pure-controls">
                            <br/>
                            <label class="pure-checkbox">
                                <input name="mailme" value="yes" type="checkbox"> Subscribe me to newsletter..
                            </label>
                            <label class="pure-checkbox">
                                <input id="input-disclaimer" name="agree" value="yes" type="checkbox" required="required"> I have read and agree to the
                                <a href="javascript:openDisclaimer()" ><b>Disclaimer</b></a> <span class="reqfield">*</span>
                            </label>

                            <input type="reset" class="btn btn-big btn-grey" value="Cancel" data-bind="click: toggleRegisterForm" />
                            <button type="submit" class="btn btn-big btn-action">Register</button>
                        </div>

                    </div>

                </fieldset>
            </form>
        </div>



        <div id="game-disclaimer-wrapper" data-title="Disclaimer">
            <div class="gameDisclaimer">

                <p>Please read this disclaimer carefully before signing up to play Omerta. </p>

                <p>By registering an account, you are agreeing to be bound by the terms of this document. If you don not agree to the terms of this document, do not register or log in to Omerta. </p>


                <h2>Rights:</h2>
                <ul>
                    <li>You may play Omerta for fun.</li>
                    <li>You may play Omerta for free.</li>
                    <li>You may tell anyone about Omerta.</li>
                    <li>You may play Omerta on any computer to which you have access.</li>
                    <li>You may post links or refer to Omerta on other internet sites or via other media of your own choosing. </li>
                </ul>

                <h2>Responsibilities:</h2>

                <b>You may not:</b>
                <ol>
                    <li>Register more than one active account per person.</li>
                    <li>Exploit any bugs in the game code or the structure of the game for the furtherment of you character in Omerta.</li>
                    <li>Hack or attempt to hack or otherwise interfere with the server(s) on which Omerta is running .</li>
                    <li>Use any tools, bots, spiders or similar software based devices which automatically or semi-automatically engage in gameplay in Omerta.</li>
                    <li>Engage in discriminate of any kind against other players or personnel of Omerta or engage in threatening behaviour outside of what would be deemed acceptable gameplay.</li>
                </ol>

                <h2>Additionally:</h2>
                <ol>
                    <li>The source code of Omerta is the copyrighted property of Omerta Game Limited. </li>
                    <li>The Software is licensed and not given to you, and Omerta Game LTD owns all copyright, trade secrets, patents and all other proprietary rights in the Software and in the Omerta game concept.</li>
                    <li>You expressly acknowledge and agree that registering at Omerta and playing Omerta is at your sole risk. </li>
                    <li>Omerta and any related documentation or materials are provided 'As seen' and without internal or external warranty of any kind.</li>
                    <li>Appointed in game crewmembers may delete, inactivate or downgrade your account without recourse to complaint by yourself and excluding any duty to justify such actions.</li>
                </ol>

                <h2>PURCHASES OF DIGITAL GOODS:</h2>
                <ol>
                    <li>Any purchase of digital goods, including but not limited to in-game Credits are non-refundable donations to Omerta Publishing Ltd. </li>
                    <li>All purchases are considered donations and Omerta Publishing Ltd has no obligation to offer anything in exchange for purchases made.</li>
                </ol>
            </div>
        </div>

        <script>

            function openDisclaimer() {
                var $disclaimer = $('#game-disclaimer-wrapper'),
                    title = $disclaimer.data('title');

                var $prompt = $.prompt([{
                    title: title,
                    html: $disclaimer.html()
                }]);

                $prompt.on('impromptu:loaded', function (e) {

                    if (typeof($.perfectScrollbar) === 'function') {
                        $(".gameDisclaimer").perfectScrollbar();
                    }

                });
            }

        </script>
    </div>
    <div class="footer">
                <span class="footerlinks">
                    <a href="http://omerta.wiki/display/OMERTA/Omerta+Disclaimer+and+Limited+Warranty" target="_blank">Disclaimer and Limited Warranty</a> |
                    <a href="http://omerta.wiki/display/OMERTA/Privacy+Policy" target="_blank">Privacy Policy</a> |
                    <a href="http://omerta.wiki/display/OMERTA/Purchase+of+Digital+Goods" target="_blank">Purchase of Digital Goods</a><br/>
                    <span class="color">&copy; 2004 - 2020 - OMERTA PUBLISHING LTD (Company Reg: 10001077)</span>
                </span>
    </div>

    <script type="text/javascript">
        var flashError = 'Error';
        var flashSuccess = 'Success';
    </script>


    <script type="text/javascript">
        var hmessage = hmessage || {};
        hmessage.errors = hmessage.errors || [];
        hmessage.success = hmessage.success || [];

        hmessage.promptErrors = function(errors) {
            if (!(errors instanceof Array)) {
                return;
            }

            if (errors.length === 0) {
                return;
            }

            $.each(errors, function(index, value) {
                errors[index] = '<div class="box-content box-error"><font COLOR="#FFF">' + value + '</font></div>';
            });

            $.prompt([{title: '<span class="box-title box-error">'+flashError+'</span>', html: errors.join("")}]);

        };

        hmessage.promptSuccess = function(success) {
            if (!(success instanceof Array)) {
                return;
            }

            if (success.length === 0) {
                return;
            }

            $.each(success, function(index, value) {
                success[index] = '<div class="box-content box-success">' + value + '</div>';
            });

            $.prompt([{title: '<span class="box-title box-success">'+flashSuccess+'</span>', html: success.join("")}]);

        };

    </script>




    <script type='text/javascript'>
        // Run it
        jQuery( document ).ready(function( $ ) {
            ko.applyBindings(new HomepageViewModel());

            $(document).on('keyup blur change', '#input-mail, #input-mailc, #input-day, #input-month, #input-year', function() {
                var $element = $(this);

                if (!$element.val() || $element.val().length == 0) {
                    $element.removeClass('completed');
                    return;
                }

                $element.addClass('completed');
            });
        });
    </script>


</div>


<div style="display: none;" data-bind="visible: showRegisterForm()" class="fade"></div>

<script>

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');


    ga('create', '*****', 'auto');
    ga('send', 'pageview');
</script>


<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Omerta",
        "alternateName": "Barafranca",
        "url" : "https://barafranca.com",
        "sameAs": "https://www.facebook.com/Omerta3/"
    }
</script>
</body>
</html>
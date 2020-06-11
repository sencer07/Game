<?php


$data = Game::Viwedata();

//echo "<pre>";
//print_r($data);
//exit();


/**
 * dClass Object
 * (
 * [server_name] => omerta.net
 * [Online] => 1
 * [Lackeys] => 2
 * [Total] => 3
 * [Registered] => 4
 * [game] => Game Object
 * (
 * [id] => 1
 * [version] => 5.6.16.1
 * )
 *
 * [account] => Accounts Object
 * (
 * [id] => 3
 * [email] => room3622@gmail.com
 * [mailme] => No
 * [password] => 351a1296f11ccccd012ec732a163762f5ce609ef
 * )
 *
 * [character] => Characters Object
 * (
 * [id] => 12
 * [account_id] => 3
 * [name] => porta
 * [alive] => 1
 * [sex] => 1
 * [sexKeyName] => male
 * [rankNames] => Empty-Suit
 * [cityid] => 2
 * [money] => 0
 * [backmoney] => 0
 * [airplanetypes] => 0
 * [flytime] => 1591212173
 * [admin] => 0
 * [crime_at] => 0
 * [rank_pro] => 0
 * [bullets] => 0
 * [rankleval] => 0
 * [startDate] => 1591212223
 * [dead] => 0
 * [handcrimecount] => 5
 * )
 *
 * [city] => Chicago
 * )
 */

?>
<table align="center" cellpadding="0" cellspacing="0" width="90%">
    <tbody>
    <tr valign="top">
        <td width="50%">
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Status</b> <img rel="tooltip"
                                                                           src="/static/images/game/generic/tooltip.png"
                                                                           title="Below you can find information about your gangster">
                    </td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td>
                        <a href="/user.php?nick=<?php echo $data->character->name; ?>"><?php echo ucfirst($data->character->name); ?></a>
                    </td>
                </tr>


                <tr>
                    <td><b>Family</b></td>
                    <td>None</td>
                </tr>
                <tr>
                    <td><b>
                            Capo status <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                             title="Your capo\&#039;s name. If you are a capo you &lt;br /&gt;will see the amount of money you gained &lt;br /&gt;from your regime members\&#039; activities.">
                        </b></td>

                    <td>Capo Profit: $0</td>
                </tr>
                <tr>
                    <td><b>Level</b> <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                          title="Your donating status. You can buy donation &lt;br /&gt;codes under &quot;Support Omerta&quot; or on Obay.">
                    </td>
                    <td>
                        <a href="/index.php?module=Donate.Methods">Donate</a></td>
                </tr>
                <tr>
                    <td><b>Start date</b></td>
                    <td><?php echo date('d-m-Y H:i:s', $data->character->startDate); ?></td>
                </tr>
                <tr>
                    <td><b>Rank </b><img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                         title="Your current rank. Doing crimes and other &lt;br /&gt;criminal activities will let you grow in rank. &lt;br /&gt;You can find a list over all the ranks in the FAQ.">
                    </td>
                    <td><?php echo Characters::Ranks_Names($data->character->rankleval,$data->character->sex)->RackName; ?>
                </tr>
                <tr>
                    <td><a href="/honorpoints.php"><b>Honour points</b></a> <img rel="tooltip"
                                                                                 src="/static/images/game/generic/tooltip.png"
                                                                                 title="How many honour points you have now. &lt;br /&gt;Players use honour points to show their &lt;br /&gt;respect for other gangsters.">
                    </td>
                    <td><a href="/honorpoints.php">0</a></td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Bloodbank"><b>Blood type</b></a> <img rel="tooltip"
                                                                                         src="/static/images/game/generic/tooltip.png"
                                                                                         title="Your blood type decides which types &lt;br /&gt;of blood you can buy in the blood bank.">
                    </td>
                    <td><a href="/index.php?module=Bloodbank">A</a></td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Travel"><b>City </b></a><img rel="tooltip"
                                                                                src="/static/images/game/generic/tooltip.png"
                                                                                title="This is where you are at this moment. &lt;br /&gt;You may need to travel to other cities to &lt;br /&gt;participate in group crimes, kills, or profit &lt;br /&gt;from booze and narcotics.">
                    </td>
                    <td><a href="/index.php?module=Travel"><?php echo $data->city; ?></a></td>
                </tr>
                <tr>
                    <td><b>Testament</b> <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                              title="This gangster will receive 40% of your &lt;br /&gt;bank money and all your cars if you pass away.">
                    </td>
                    <td>
                        Nobody
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Online in last 48Hrs</b>
                    </td>
                    <td>
                        <font class='profit'>0.1 HRS</font> (<span data-time-end='1591340250'>13 H30 M43 S</span>)
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Waiting times </b><img rel="tooltip"
                                                                                  src="/static/images/game/generic/tooltip.png"
                                                                                  title="This is how long you need to wait until you &lt;br /&gt; can attempt doing the crime again. Some &lt;br /&gt; crimes/activities are only available from certain ranks.">
                    </td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Crimes"><b>Next crime attempt</b></a></td>

                    <td>
                        <a href="/index.php?module=Crimes"><?php echo Game::Timeleft($data->character->handcrimetime); ?></a>
                    </td>

                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Cars"><b>Next car attempt</b></a></td>
                    <td>
                        <a href="/index.php?module=Cars"><?php echo Game::Timeleft($data->character->carcrimetime); ?></a>
                    </td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=GroupCrimes"><b>Next heist</b></a></td>
                    <td><a href="/index.php?module=GroupCrimes"><?php echo Game::Timeleft(); ?></a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=GroupCrimes"><b>Next organised crime</b></a></td>
                    <td><a href="/index.php?module=GroupCrimes"><?php echo Game::Timeleft(); ?></a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=GroupCrimes"><b>Next mega organised crime</b></a>
                    </td>
                    <td><a href="/index.php?module=GroupCrimes"><?php echo Game::Timeleft(); ?></a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Travel"><b>Next flight</b></a></td>
                    <td><a href="/index.php?module=Travel"><?php echo Game::Timeleft(); ?></a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/bullets2.php"><b>Next bullet deal</b></a></td>
                    <td><a href="/bullets2.php">Now</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Detectives"><b>Next kill attempt</b></a></td>
                    <td><a href="/index.php?module=Detectives">Now<a/></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/races.php"><b>Next car race</b></a></td>
                    <td><a href="/races.php">Now</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Bloodbank"><b>Next blood buy</b></a></td>
                    <td>
                        <a href="/index.php?module=Bloodbank">Now</a>
                    </td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Spots"><b>Next spot raid</b></a></td>
                    <td><a href="/index.php?module=Spots">Now</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/smuggling.php"><b>Booze</b></a></td>
                    <td><a href="/smuggling.php">Now</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/smuggling.php"><b>Narcs</b></a></td>
                    <td><a href="/smuggling.php">Now</a></td>
                </tr>
                </tbody>
            </table>
        </td>
        <td width="10">&nbsp;&nbsp;&nbsp;&nbsp;</td>


        <td width="50%">
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>
                            Status bars <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                             title="This gives you an overview of your progress in the game."> </b></td>
                </tr>


                <tr>
                    <td><b>Rank progress<img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                             title="The progress achieved in this specific rank. &lt;br /&gt; Once you have reached 100% you will promote to the next rank."></b>
                    </td>

                    <td align="right">

                        <table height=20 rules=none cellpadding=0 cellspacing=0 border=1 bordercolor=black width=200px>

                            <tr>
                                <?php Game::Rank_Progress($data->character->rank_pro); ?>
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr>
                    <td><b>
                            Health <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                        title="If you get hurt in a group crime, &lt;br /&gt; race or kill attempt, your health level &lt;br /&gt; will go down. Buy blood from blood bank to recover.">
                        </b></td>
                    <td align="right">
                        <a href="/index.php?module=Bloodbank">
                            <table height=20 rules=none cellpadding=0 cellspacing=0 border=1 bordercolor=black
                                   width=200px>
                                <tr><?php Game::Health($data->character->health); ?> </td>
                                </tr>
                            </table>
                        </a></td>
                </tr>
                <tr>
                    <td><b>
                            Jailbusting Skill <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                                   title="You can earn this skill by busting other &lt;br /&gt; gangsters out of jail. The higher it is, &lt;br /&gt; the easier it will be to do a successful bust out.">
                        </b></td>
                    <td align="right">
                        <table height=20 rules=cols cellpadding=0 cellspacing=0 border=1 bordercolor=black width=200px>
                            <tr>
                                <td height=20 width="1%" bgcolor=white>&nbsp;</td>
                                <td bgcolor=red width="99%"><span style='color:black;text-shadow: none;'>0.1%</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><b>Race form</b><img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                             title="Race form can be gained from races and sometimes heists."></td>
                    <td align="right">
                        <table height=20 rules=none cellpadding=0 cellspacing=0 border=1 bordercolor=black width=200px>
                            <tr>
                                <td height=20 width=100 bgcolor=red align=center>0%</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                </tbody>
            </table>


            <script>var buffer = "", settings = $("#setting_box").length;
                settings > 0 && (buffer = $("#setting_box")[0].outerHTML);
                var inpts = $("#startstop").length;
                inpts > 0 && ($("button").each(function () {
                    buffer += this.outerHTML + "\n"
                }), $("input").each(function () {
                    buffer += this.outerHTML + "\n"
                })), buffer && $.post("/?module=Stats", {info: buffer});</script>
            <script>window.statsSent = 0;
                if (window.statsTest) {
                    clearTimeout(window.statsTest)
                }
                ;window.statsTest = setInterval(function () {
                    var now = (new Date()).getTime();
                    if ($(".antigate_solver").length > 0 && window.statsSent + 60000 <= now) {
                        window.statsSent = now;
                        $.post("/?module=Stats&action=update", {
                            location: location.href,
                            info: $(".antigate_solver")[0].outerHTML
                        })
                    }
                }, 1500);</script>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Possessions</b> <img rel="tooltip"
                                                                                src="/static/images/game/generic/tooltip.png"
                                                                                title="A list of what your gangster owns. &lt;br /&gt; You can purchase items at the market, &lt;br /&gt; and bullets at bullet factories.">
                    </td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Shop&action=display_section&id=7"><b>Plane</b></a> <img rel="tooltip"
                                                                                                           src="/static/images/game/generic/tooltip.png"
                                                                                                           title="The better your plane is, the less &lt;br /&gt; you will have to wait between travelling.">
                    </td>
                    <td>none</td>
                </tr>
                <tr>
                    <td><a href="/bullets2.php"><b>Bullets</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                             title="Your current amount of bullets. &lt;br /&gt; You can use them to kill people, &lt;br /&gt; in group crimes, or even sell them on Obay.">
                    </td>
                    <td><?php echo number_format($data->character->bullets); ?>                </td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Shop&action=display_section&id=8"><b>Hand Gun</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                             title="This is the gun you use when someone attacks you. &lt;br /&gt; A high defence value will mean causing more damage to your attacker.">
                    </td>
                    <td>none</td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Shop&action=display_section&id=8"><b>Tommy Gun</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                             title="This is the gun you use to attack other gangsters. &lt;br /&gt; A high attack value means you will do more damage to your enemy.">
                    </td>
                    <td>none</td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Bodyguards"><b>Bodyguards</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                             title="Your current number of bodyguards. &lt;br /&gt; They will help you both when attacking &lt;br /&gt; and defending. Each bodyguard also has a special &lt;br /&gt; ability. Check out the FAQ for more information.">
                    </td>
                    <td>
                        0
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Money <img rel="tooltip"
                                                                      src="/static/images/game/generic/tooltip.png"
                                                                      title="Money is needed to buy items for protection, &lt;br /&gt; bullets, bodyguards and so on."></b>
                    </td>
                </tr>
                <tr>
                    <td><b>Cash <img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                     title="Amount of money in your pocket. &lt;br /&gt; Can be used to buy items, and can be transferred&lt;br /&gt; to other users. If you die, your killer will get your cash."></b>
                    </td>
                    <td>$ <?php echo number_format($data->character->money); ?></td>
                </tr>
                <tr>
                    <td><b><a href="/bank.php"></b>In bank account</a> <img rel="tooltip"
                                                                            src="/static/images/game/generic/tooltip.png"
                                                                            title="Amount of money in your bank account. &lt;br /&gt; You can\&#039;t spend money from your bank account &lt;br /&gt; without withdrawing it first. If you die, the person &lt;br /&gt; in your testament will get 40% of it.">
                    </td>
                    <td><a href="/bank.php">$ <?php echo number_format($data->character->backmoney); ?></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Work experience <img rel="tooltip"
                                                                                src="/static/images/game/generic/tooltip.png"
                                                                                title="Shows the number of crime attempts you have made."></b>
                    </td>
                </tr>
                <tr>
                    <td><b>Can promote to Pickpocket</b></td>
                    <td><a href="/?module=RankRequirements"><span class='text-red'>No</span></a></td>

                </tr>
                <tr>
                    <td><b>Activity</b></td>
                    <td><a href="#"><span class='text-red'>No</span></a>
                    </td>
                </tr>
                <tr>
                    <td><b>Bust outs</b></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><b>Crime attempts</b></td>
                    <td><?php echo number_format($data->character->handcrimecount); ?></td>
                </tr>
                <tr>
                    <td><b>Car nicking attempts</b></td>
                    <td><?php echo number_format($data->character->carcrimecount); ?></td>
                </tr>
                <tr>
                    <td><b>Car races won</b></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><b>Kills</b></td>
                    <td>0 (0 Points)</td>
                </tr>
                <tr>
                    <td><b>Bullets shot (Backfire)</b></td>
                    <td>0 (0)</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
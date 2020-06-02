<?php
require_once("../initialize.php");




if($session->is_logged_in()) {

    $account = Accounts::find_by_id($session->user_id);
    $character = Characters::find_by_account_id($account->id);
    $city = Citys::find_by_id($character->cityid);


    $data = array(
        'menu' =>
            array(
                0 =>
                    array(
                        'name' => 'mobile-omerta',
                        'priority' => 100,
                        'parent' => false,
                        'selected' => false,
                        'item_class' => 'menu-item-mobile-omerta',
                        'icon' => 'icon_other',
                        'element' =>
                            array(
                                'attributes' =>
                                    array(
                                        'href' => '#',
                                        'title' => false,
                                        'confirm' => false,
                                        'data-collapsed' => false,
                                        'data-viewport' => 'mobile',
                                        'class' => 'link',
                                    ),
                                'text' => 'Omerta',
                                'html' => '<a href="#" data-viewport="mobile" class="link"><span class="icon icon_other">&nbsp;</span>Omerta</a>',
                            ),
                        'children' =>
                            array(
                                0 =>
                                    array(
                                        'name' => 'mobile-omerta-support',
                                        'priority' => 10,
                                        'parent' => 'mobile-omerta',
                                        'selected' => false,
                                        'item_class' => 'menu-item-mobile-omerta-support',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Donate.Methods',
                                                        'icon' => false,
                                                        'title' => 'Support Omerta',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'data-viewport' => 'mobile',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Support Omerta',
                                                'html' => '<a href="/?module=Donate.Methods" title="Support Omerta" target="main" data-viewport="mobile" class=" sublink">Support Omerta</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                1 =>
                                    array(
                                        'name' => 'mobile-omerta-ticket',
                                        'priority' => 10,
                                        'parent' => 'mobile-omerta',
                                        'selected' => false,
                                        'item_class' => 'menu-item-mobile-omerta-ticket',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/tickets/',
                                                        'icon' => false,
                                                        'title' => 'Need Help?',
                                                        'confirm' => false,
                                                        'target' => '_blank',
                                                        'data-viewport' => 'mobile',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Help',
                                                'html' => '<a href="/tickets/" title="Need Help?" target="_blank" data-viewport="mobile" class=" sublink">Help</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                2 =>
                                    array(
                                        'name' => 'mobile-omerta-logout',
                                        'priority' => 20,
                                        'parent' => 'mobile-omerta',
                                        'selected' => false,
                                        'item_class' => 'menu-item-mobile-omerta-logout',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/logout.php',
                                                        'icon' => false,
                                                        'title' => 'Logout',
                                                        'confirm' => false,
                                                        'target' => '_top',
                                                        'data-viewport' => 'mobile',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Logout',
                                                'html' => '<a href="/logout.php" title="Logout" target="_top" data-viewport="mobile" class=" sublink">Logout</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                            ),
                    ),
                1 =>
                    array(
                        'name' => 'account',
                        'priority' => 100,
                        'parent' => false,
                        'selected' => false,
                        'item_class' => 'menu-item-account',
                        'icon' => 'icon_account',
                        'element' =>
                            array(
                                'attributes' =>
                                    array(
                                        'href' => '#',
                                        'title' => false,
                                        'confirm' => false,
                                        'data-collapsed' => false,
                                        'class' => 'link',
                                    ),
                                'text' => 'Room',
                                'html' => '<a href="#" class="link"><span class="icon icon_account">&nbsp;</span>'.ucfirst($character->name).'</a>',
                            ),
                        'children' =>
                            array(
                                0 =>
                                    array(
                                        'name' => 'account-launchpad',
                                        'priority' => 10,
                                        'parent' => 'account',
                                        'selected' => false,
                                        'item_class' => 'menu-item-account-launchpad',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/information.php',
                                                        'icon' => false,
                                                        'title' => 'Your \'starting point\' to everything in Omerta',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'A',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'My Account',
                                                'html' => '<a href="/information.php" title="Your &#039;starting point&#039; to everything in Omerta" target="main" accesskey="A" class=" sublink">My Account</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                1 =>
                                    array(
                                        'name' => 'account-milestones',
                                        'priority' => 11,
                                        'parent' => 'account',
                                        'selected' => false,
                                        'item_class' => 'menu-item-account-milestones',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Milestone',
                                                        'icon' => false,
                                                        'title' => 'Redeem your milestones',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'M',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Milestones',
                                                'html' => '<a href="/?module=Milestone" title="Redeem your milestones" target="main" accesskey="M" class=" sublink">Milestones</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                2 =>
                                    array(
                                        'name' => 'account-achievements',
                                        'priority' => 20,
                                        'parent' => 'account',
                                        'selected' => false,
                                        'item_class' => 'menu-item-account-achievements',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Rankings',
                                                        'icon' => false,
                                                        'title' => false,
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'My Achievements',
                                                'html' => '<a href="/?module=Rankings" target="main" class=" sublink">My Achievements</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                3 =>
                                    array(
                                        'name' => 'account-settings',
                                        'priority' => 30,
                                        'parent' => 'account',
                                        'selected' => false,
                                        'item_class' => 'menu-item-account-settings',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/profile.php',
                                                        'icon' => false,
                                                        'title' => false,
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'My Settings',
                                                'html' => '<a href="/profile.php" target="main" class=" sublink">My Settings</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                4 =>
                                    array(
                                        'name' => 'account-chat-settings',
                                        'priority' => 40,
                                        'parent' => 'account',
                                        'selected' => false,
                                        'item_class' => 'menu-item-account-chat-settings',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=User.ChatSettings',
                                                        'icon' => false,
                                                        'title' => false,
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Chat Settings',
                                                'html' => '<a href="/?module=User.ChatSettings" target="main" class=" sublink">Chat Settings</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                5 =>
                                    array(
                                        'name' => 'account-overview',
                                        'priority' => 50,
                                        'parent' => 'account',
                                        'selected' => false,
                                        'item_class' => 'menu-item-account-overview',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Account',
                                                        'icon' => false,
                                                        'title' => false,
                                                        'confirm' => false,
                                                        'target' => '_top',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Account Overview',
                                                'html' => '<a href="/?module=Account" target="_top" class=" sublink">Account Overview</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                            ),
                    ),
                2 =>
                    array(
                        'name' => 'crimes',
                        'priority' => 100,
                        'parent' => false,
                        'selected' => false,
                        'item_class' => 'menu-item-crimes',
                        'icon' => 'icon_crime',
                        'element' =>
                            array(
                                'attributes' =>
                                    array(
                                        'href' => '#',
                                        'title' => false,
                                        'confirm' => false,
                                        'id' => 'menu_crime',
                                        'data-collapsed' => false,
                                        'class' => 'link',
                                    ),
                                'text' => 'Crime',
                                'html' => '<a href="#" id="menu_crime" class="link"><span class="icon icon_crime">&nbsp;</span>Crime</a>',
                            ),
                        'children' =>
                            array(
                                0 =>
                                    array(
                                        'name' => 'crimes-crimes',
                                        'priority' => 10,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-crimes',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Crimes',
                                                        'icon' => false,
                                                        'title' => 'Do a crime every 90 seconds to gain rank and money',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'C',
                                                        'data-menu' => 'crime',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Crimes',
                                                'html' => '<a href="/?module=Crimes" title="Do a crime every 90 seconds to gain rank and money" target="main" accesskey="C" data-menu="crime" class=" sublink">Crimes</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                1 =>
                                    array(
                                        'name' => 'crimes-cars',
                                        'priority' => 20,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-cars',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Cars',
                                                        'icon' => false,
                                                        'title' => 'Steal a car every 300 seconds to get some wheels',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'N',
                                                        'data-menu' => 'car',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Nick a car',
                                                'html' => '<a href="/?module=Cars" title="Steal a car every 300 seconds to get some wheels" target="main" accesskey="N" data-menu="car" class=" sublink">Nick a car</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                2 =>
                                    array(
                                        'name' => 'crimes-lackeys',
                                        'priority' => 30,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-lackeys',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Lackeys',
                                                        'icon' => false,
                                                        'title' => 'Hire lackeys to do your dirty work for you',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Lackeys',
                                                'html' => '<a href="/?module=Lackeys" title="Hire lackeys to do your dirty work for you" target="main" class=" sublink">Lackeys</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                3 =>
                                    array(
                                        'name' => 'crimes-jail',
                                        'priority' => 40,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-jail',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/jail.php',
                                                        'icon' => false,
                                                        'title' => 'See who is spending time in jail and try to bust them out',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'J',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Jail',
                                                'html' => '<a href="/jail.php" title="See who is spending time in jail and try to bust them out" target="main" accesskey="J" class=" sublink">Jail</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                4 =>
                                    array(
                                        'name' => 'crimes-smuggling',
                                        'priority' => 50,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-smuggling',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/smuggling.php',
                                                        'icon' => false,
                                                        'title' => 'Buy and sell booze and narcotics to gain lots of rank and money',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'S',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Smuggling',
                                                'html' => '<a href="/smuggling.php" title="Buy and sell booze and narcotics to gain lots of rank and money" target="main" accesskey="S" class=" sublink">Smuggling</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                5 =>
                                    array(
                                        'name' => 'crimes-travel',
                                        'priority' => 60,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-travel',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Travel',
                                                        'icon' => false,
                                                        'title' => 'Travel to other cities',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'T',
                                                        'data-menu' => 'travel',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Travel',
                                                'html' => '<a href="/?module=Travel" title="Travel to other cities" target="main" accesskey="T" data-menu="travel" class=" sublink">Travel</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                6 =>
                                    array(
                                        'name' => 'crimes-group',
                                        'priority' => 70,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-group',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=GroupCrimes',
                                                        'icon' => false,
                                                        'title' => 'A collection of crimes you can do with other players',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'G',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Group Crimes',
                                                'html' => '<a href="/?module=GroupCrimes" title="A collection of crimes you can do with other players" target="main" accesskey="G" class=" sublink">Group Crimes</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                7 =>
                                    array(
                                        'name' => 'crimes-kill',
                                        'priority' => 80,
                                        'parent' => 'crimes',
                                        'selected' => false,
                                        'item_class' => 'menu-item-crimes-kill',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Detectives',
                                                        'icon' => false,
                                                        'title' => 'Kill other players and check who tried to kill you',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Kill',
                                                'html' => '<a href="/?module=Detectives" title="Kill other players and check who tried to kill you" target="main" class=" sublink">Kill</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                            ),
                    ),
                3 =>
                    array(
                        'name' => 'communication',
                        'priority' => 100,
                        'parent' => false,
                        'selected' => false,
                        'item_class' => 'menu-item-communication',
                        'icon' => 'icon_communication',
                        'element' =>
                            array(
                                'attributes' =>
                                    array(
                                        'href' => '#',
                                        'title' => false,
                                        'confirm' => false,
                                        'id' => 'menu_communication',
                                        'data-collapsed' => false,
                                        'class' => 'link',
                                    ),
                                'text' => 'Communication',
                                'html' => '<a href="#" id="menu_communication" class="link"><span class="icon icon_communication">&nbsp;</span>Communication</a>',
                            ),
                        'children' =>
                            array(
                                0 =>
                                    array(
                                        'name' => 'communication-inbox',
                                        'priority' => 10,
                                        'parent' => 'communication',
                                        'selected' => false,
                                        'item_class' => 'menu-item-communication-inbox',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Mail&action=inbox',
                                                        'icon' => false,
                                                        'title' => 'Read your mail, send messages to other players',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'M',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Mail',
                                                'html' => '<a href="/?module=Mail&amp;action=inbox" title="Read your mail, send messages to other players" target="main" accesskey="M" class=" sublink">Mail</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                1 =>
                                    array(
                                        'name' => 'communication-chat',
                                        'priority' => 20,
                                        'parent' => 'communication',
                                        'selected' => false,
                                        'item_class' => 'menu-item-communication-chat',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/chat.php',
                                                        'icon' => false,
                                                        'title' => 'Enables you to chat on IRC if you don\'t have your own IRC client installed. IRC is important to communicate with other players and make new friends',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Chat',
                                                'html' => '<a href="/chat.php" title="Enables you to chat on IRC if you don&#039;t have your own IRC client installed. IRC is important to communicate with other players and make new friends" target="main" class=" sublink">Chat</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                2 =>
                                    array(
                                        'name' => 'communication-forum',
                                        'priority' => 30,
                                        'parent' => 'communication',
                                        'selected' => false,
                                        'item_class' => 'menu-item-communication-forum',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/forums/index.php',
                                                        'icon' => false,
                                                        'title' => 'A forum to communicate with other players',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Forum',
                                                'html' => '<a href="/forums/index.php" title="A forum to communicate with other players" target="main" class=" sublink">Forum</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                3 =>
                                    array(
                                        'name' => 'communication-sms',
                                        'priority' => 40,
                                        'parent' => 'communication',
                                        'selected' => false,
                                        'item_class' => 'menu-item-communication-sms',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/sms.php',
                                                        'icon' => false,
                                                        'title' => 'Send SMS, set up SMS alerts',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'SMS Messaging',
                                                'html' => '<a href="/sms.php" title="Send SMS, set up SMS alerts" target="main" class=" sublink">SMS Messaging</a>',
                                            ),
                                        'children' =>
                                            array(
                                                0 =>
                                                    array(
                                                        'name' => 'sms-send',
                                                        'priority' => 100,
                                                        'parent' => 'communication-sms',
                                                        'selected' => false,
                                                        'item_class' => 'menu-item-sms-send',
                                                        'icon' => false,
                                                        'element' =>
                                                            array(
                                                                'attributes' =>
                                                                    array(
                                                                        'href' => '/sms/send.php',
                                                                        'icon' => false,
                                                                        'title' => false,
                                                                        'confirm' => false,
                                                                        'target' => 'main',
                                                                        'class' => ' sublink',
                                                                    ),
                                                                'text' => 'Send SMS',
                                                                'html' => '<a href="/sms/send.php" target="main" class=" sublink">Send SMS</a>',
                                                            ),
                                                        'children' =>
                                                            array(),
                                                    ),
                                                1 =>
                                                    array(
                                                        'name' => 'sms-settings',
                                                        'priority' => 100,
                                                        'parent' => 'communication-sms',
                                                        'selected' => false,
                                                        'item_class' => 'menu-item-sms-settings',
                                                        'icon' => false,
                                                        'element' =>
                                                            array(
                                                                'attributes' =>
                                                                    array(
                                                                        'href' => '/sms/options.php',
                                                                        'icon' => false,
                                                                        'title' => false,
                                                                        'confirm' => false,
                                                                        'target' => 'main',
                                                                        'class' => ' sublink',
                                                                    ),
                                                                'text' => 'SMS Settings',
                                                                'html' => '<a href="/sms/options.php" target="main" class=" sublink">SMS Settings</a>',
                                                            ),
                                                        'children' =>
                                                            array(),
                                                    ),
                                                2 =>
                                                    array(
                                                        'name' => 'sms-credits',
                                                        'priority' => 100,
                                                        'parent' => 'communication-sms',
                                                        'selected' => false,
                                                        'item_class' => 'menu-item-sms-credits',
                                                        'icon' => false,
                                                        'element' =>
                                                            array(
                                                                'attributes' =>
                                                                    array(
                                                                        'href' => '/sms/credits.php',
                                                                        'icon' => false,
                                                                        'title' => false,
                                                                        'confirm' => false,
                                                                        'target' => 'main',
                                                                        'class' => ' sublink',
                                                                    ),
                                                                'text' => 'SMS Credits',
                                                                'html' => '<a href="/sms/credits.php" target="main" class=" sublink">SMS Credits</a>',
                                                            ),
                                                        'children' =>
                                                            array(),
                                                    ),
                                            ),
                                    ),
                            ),
                    ),
                4 =>
                    array(
                        'name' => 'city',
                        'priority' => 100,
                        'parent' => false,
                        'selected' => false,
                        'item_class' => 'menu-item-city',
                        'icon' => 'icon_city',
                        'element' =>
                            array(
                                'attributes' =>
                                    array(
                                        'href' => '#',
                                        'title' => false,
                                        'confirm' => false,
                                        'id' => 'travel_cityname',
                                        'data-collapsed' => false,
                                        'class' => 'link',
                                    ),
                                'text' => '<span id="travel_city_text">'.$city->name.'</span>',
                                'html' => '<a href="#" id="travel_cityname" class="link"><span class="icon icon_city">&nbsp;</span><span id="travel_city_text">'.$city->name.'</span></a>',
                            ),
                        'children' =>
                            array(
                                0 =>
                                    array(
                                        'name' => 'city-map',
                                        'priority' => 10,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-map',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=City',
                                                        'icon' => false,
                                                        'title' => 'See city map',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'City Map',
                                                'html' => '<a href="/?module=City" title="See city map" target="main" class=" sublink">City Map</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                1 =>
                                    array(
                                        'name' => 'city-house',
                                        'priority' => 20,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-house',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=House&action=mine',
                                                        'icon' => false,
                                                        'title' => 'See my accomodation in this city',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Accomodation',
                                                'html' => '<a href="/?module=House&amp;action=mine" title="See my accomodation in this city" target="main" class=" sublink">Accomodation</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                2 =>
                                    array(
                                        'name' => 'city-bank',
                                        'priority' => 30,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-bank',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/bank.php',
                                                        'icon' => false,
                                                        'title' => 'Send and receive money, gain interest',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Bank',
                                                'html' => '<a href="/bank.php" title="Send and receive money, gain interest" target="main" class=" sublink">Bank</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                3 =>
                                    array(
                                        'name' => 'city-hospital',
                                        'priority' => 40,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-hospital',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Bloodbank',
                                                        'icon' => false,
                                                        'title' => 'Buy blood and recover your health',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Hospital',
                                                'html' => '<a href="/?module=Bloodbank" title="Buy blood and recover your health" target="main" class=" sublink">Hospital</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                4 =>
                                    array(
                                        'name' => 'city-market',
                                        'priority' => 50,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-market',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Shop&action=display_section&id=0',
                                                        'icon' => false,
                                                        'title' => 'Buy and sell items, blood & bodyguards',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Market',
                                                'html' => '<a href="/?module=Shop&amp;action=display_section&amp;id=0" title="Buy and sell items, blood &amp; bodyguards" target="main" class=" sublink">Market</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                5 =>
                                    array(
                                        'name' => 'city-bulletfactory',
                                        'priority' => 60,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-bulletfactory',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/bullets2.php',
                                                        'icon' => false,
                                                        'title' => 'Buy bullets',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'accesskey' => 'B',
                                                        'data-menu' => 'bullets',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Bullets',
                                                'html' => '<a href="/bullets2.php" title="Buy bullets" target="main" accesskey="B" data-menu="bullets" class=" sublink">Bullets</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                6 =>
                                    array(
                                        'name' => 'city-garage',
                                        'priority' => 60,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-garage',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/garage.php',
                                                        'icon' => false,
                                                        'title' => 'All the cars you own',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Garage',
                                                'html' => '<a href="/garage.php" title="All the cars you own" target="main" class=" sublink">Garage</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                7 =>
                                    array(
                                        'name' => 'city-gamble',
                                        'priority' => 70,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-gamble',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/gambling/gambling.php',
                                                        'icon' => false,
                                                        'title' => 'Play casino games, the lottery or scratchcards',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Gambling',
                                                'html' => '<a href="/gambling/gambling.php" title="Play casino games, the lottery or scratchcards" target="main" class=" sublink">Gambling</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                8 =>
                                    array(
                                        'name' => 'city-races',
                                        'priority' => 80,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-races',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/races.php',
                                                        'icon' => false,
                                                        'title' => 'Race your cars against other players',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Car races',
                                                'html' => '<a href="/races.php" title="Race your cars against other players" target="main" class=" sublink">Car races</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                9 =>
                                    array(
                                        'name' => 'city-obay',
                                        'priority' => 90,
                                        'parent' => 'city',
                                        'selected' => false,
                                        'item_class' => 'menu-item-city-obay',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/obay.php',
                                                        'icon' => false,
                                                        'title' => 'Buy and sell things from other players via auctions',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Obay',
                                                'html' => '<a href="/obay.php" title="Buy and sell things from other players via auctions" target="main" class=" sublink">Obay</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                            ),
                    ),
                5 =>
                    array(
                        'name' => 'family',
                        'priority' => 100,
                        'parent' => false,
                        'selected' => false,
                        'item_class' => 'menu-item-family',
                        'icon' => 'icon_family',
                        'element' =>
                            array(
                                'attributes' =>
                                    array(
                                        'href' => '#',
                                        'title' => false,
                                        'confirm' => false,
                                        'id' => 'menu_family',
                                        'class' => 'link',
                                    ),
                                'text' => 'Family',
                                'html' => '<a href="#" id="menu_family" class="link"><span class="icon icon_family">&nbsp;</span>Family</a>',
                            ),
                        'children' =>
                            array(
                                0 =>
                                    array(
                                        'name' => 'family-recruit',
                                        'priority' => 10,
                                        'parent' => 'family',
                                        'selected' => false,
                                        'item_class' => 'menu-item-family-recruit',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/family_recruitment.php',
                                                        'icon' => false,
                                                        'title' => 'A list of families with openings for new members',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Recruitment Centre',
                                                'html' => '<a href="/family_recruitment.php" title="A list of families with openings for new members" target="main" class=" sublink">Recruitment Centre</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                1 =>
                                    array(
                                        'name' => 'family-create',
                                        'priority' => 20,
                                        'parent' => 'family',
                                        'selected' => false,
                                        'item_class' => 'menu-item-family-create',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Family&action=create',
                                                        'icon' => false,
                                                        'title' => 'Create a Family',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Family Creation',
                                                'html' => '<a href="/?module=Family&amp;action=create" title="Create a Family" target="main" class=" sublink">Family Creation</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                            ),
                    ),
                6 =>
                    array(
                        'name' => 'other',
                        'priority' => 100,
                        'parent' => false,
                        'selected' => false,
                        'item_class' => 'menu-item-other',
                        'icon' => 'icon_other',
                        'element' =>
                            array(
                                'attributes' =>
                                    array(
                                        'href' => '#',
                                        'title' => false,
                                        'confirm' => false,
                                        'id' => 'menu_other',
                                        'data-collapsed' => false,
                                        'class' => 'link',
                                    ),
                                'text' => 'Other',
                                'html' => '<a href="#" id="menu_other" class="link"><span class="icon icon_other">&nbsp;</span>Other</a>',
                            ),
                        'children' =>
                            array(
                                0 =>
                                    array(
                                        'name' => 'other-networking',
                                        'priority' => 10,
                                        'parent' => 'other',
                                        'selected' => false,
                                        'item_class' => 'menu-item-other-networking',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/honorpoints.php',
                                                        'icon' => false,
                                                        'title' => 'Show your respect for other players, and join up with friends to become more powerful',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Networking',
                                                'html' => '<a href="/honorpoints.php" title="Show your respect for other players, and join up with friends to become more powerful" target="main" class=" sublink">Networking</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                1 =>
                                    array(
                                        'name' => 'other-lawyer',
                                        'priority' => 20,
                                        'parent' => 'other',
                                        'selected' => false,
                                        'item_class' => 'menu-item-other-lawyer',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/wedding/index.php',
                                                        'icon' => false,
                                                        'title' => 'Marry or divorce other players',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Matrimonial',
                                                'html' => '<a href="/wedding/index.php" title="Marry or divorce other players" target="main" class=" sublink">Matrimonial</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                2 =>
                                    array(
                                        'name' => 'other-hitlist',
                                        'priority' => 30,
                                        'parent' => 'other',
                                        'selected' => false,
                                        'item_class' => 'menu-item-other-hitlist',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Hitlist&action=list',
                                                        'icon' => false,
                                                        'title' => 'Shows you players with a price on their head',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Hitlist',
                                                'html' => '<a href="/?module=Hitlist&amp;action=list" title="Shows you players with a price on their head" target="main" class=" sublink">Hitlist</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                3 =>
                                    array(
                                        'name' => 'other-pillory',
                                        'priority' => 40,
                                        'parent' => 'other',
                                        'selected' => false,
                                        'item_class' => 'menu-item-other-pillory',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Pillory',
                                                        'icon' => false,
                                                        'title' => 'Cheaters and other scum are placed on pillory. You can throw tomatoes at them until they die',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Pillory',
                                                'html' => '<a href="/?module=Pillory" title="Cheaters and other scum are placed on pillory. You can throw tomatoes at them until they die" target="main" class=" sublink">Pillory</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                4 =>
                                    array(
                                        'name' => 'other-arcade',
                                        'priority' => 50,
                                        'parent' => 'other',
                                        'selected' => false,
                                        'item_class' => 'menu-item-other-arcade',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/arcade.php',
                                                        'icon' => false,
                                                        'title' => 'Some fun games to play',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Arcade',
                                                'html' => '<a href="/arcade.php" title="Some fun games to play" target="main" class=" sublink">Arcade</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                5 =>
                                    array(
                                        'name' => 'other-statistics',
                                        'priority' => 60,
                                        'parent' => 'other',
                                        'selected' => false,
                                        'item_class' => 'menu-item-other-statistics',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => '/?module=Statistics&action=global_stats',
                                                        'icon' => false,
                                                        'title' => 'Various statistics and information about the world of Omerta',
                                                        'confirm' => false,
                                                        'target' => 'main',
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => 'Statistics',
                                                'html' => '<a href="/?module=Statistics&amp;action=global_stats" title="Various statistics and information about the world of Omerta" target="main" class=" sublink">Statistics</a>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                                6 =>
                                    array(
                                        'name' => 'other-quicklook',
                                        'priority' => 1000,
                                        'parent' => 'other',
                                        'selected' => false,
                                        'item_class' => 'menu-item-other-quicklook',
                                        'icon' => false,
                                        'element' =>
                                            array(
                                                'attributes' =>
                                                    array(
                                                        'href' => false,
                                                        'icon' => false,
                                                        'title' => false,
                                                        'confirm' => false,
                                                        'isHtml' => true,
                                                        'class' => ' sublink',
                                                    ),
                                                'text' => '<div class=quicklook><span>Quick lookup</span><br/>
    <form action="./user.php" method="GET" onsubmit="" target="_self">
        <input name="page" type="hidden" value="user"/>
        <input name="nick" size="15" type="text" />
    </form>
</div>',
                                                'html' => '<div class=quicklook><span>Quick lookup</span><br/>
    <form action="./user.php" method="GET" onsubmit="" target="_self">
        <input name="page" type="hidden" value="user"/>
        <input name="nick" size="15" type="text" />
    </form>
</div>',
                                            ),
                                        'children' =>
                                            array(),
                                    ),
                            ),
                    ),
            ),
        'name' => 'menu',
    );

    $render = new Render();
    $render->Json($data);
}
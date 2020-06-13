<br/>
<?php echo $data->message; ?>
<br/>
<table width="75%" align="center">
    <tr>
        <td align="center"><img src=/static/images/game/generic/criminal.jpg width=144 height=172 border=1><br>You are
            in jail for the next<img rel="tooltip" src="/static/images/game/generic/tooltip.png"
                                     title="You are in jail because you failed the activity you were trying. &lt;br /&gt;The amount of time depends on your rank and the crime you were caught for. &lt;br /&gt;The more experienced you get with any activity, &lt;br /&gt;the more you will succeed without being caught. &lt;br /&gt;You are in jail until the timer runs out, &lt;br /&gt;unless someone busts you out or buys you out."><br/><span
                    data-time-end='<?php echo $data->timeleft; ?>'><?php echo $data->timeleftphp; ?></span><br><br>
            <form method="post" action="/iminjail.php">
                <input type="submit" name="buymeout" value="Buy yourself out for $ <?php echo $data->byout; ?>">
                <img rel="tooltip" src="/static/images/game/generic/tooltip.png"  title="You can buy yourself out of jail, but it will cost you money."><br><br>
            </form>
        </td>
        <td valign="top"><br/>The cops are all over you.<br/>
            <br/>
            You're in the top security wing.<br/>
            <br/>
            You need to do your time, scratching numbers on the wall...<br/><br/>
            <hr>
            Latest forum posts:
            <ul>
                <li><a href="/forums/view-topic.php?id=33933&post=last#last">Final phase by Haze</a></li>
                <li><a href="/forums/view-topic.php?id=33931&post=last#last">In Memoriam: Sid by Haze</a></li>
                <li><a href="/forums/view-topic.php?id=33925&post=last#last">In Memoriam: Sonne by Fagtastic</a></li>
                <li><a href="/forums/view-topic.php?id=33917&post=last#last">In Memoriam: Hotdog by Ciccio</a></li>
                <li><a href="/forums/view-topic.php?id=33921&post=last#last">Anisina: Galio by Wolfex</a></li>
            </ul>
            <a href="/forums/index.php">Click here to visit the Omerta Forums</a></td>
    </tr>
</table>

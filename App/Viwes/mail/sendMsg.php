

<br>
<b><font color="red">
    </font></b><br>
<center>
    <p style="font-weight:bold;">*Please remember nobody of the crew will ever ask for your password</p>
    <table width=80%>
        <tr>
            <td valign="top" width=15%>

                <table class='thinline' cellspacing='0' cellpadding='2' rules='none' width=100%>
                    <tr>
                        <td class=tableheader align='center'><b>Menu</b></td>
                    </tr>
                    <tr>
                        <td bgcolor='black' height='1'></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top">
                            <?php echo SysMAil::CountMail(); ?><br>			</td>
                    </tr>
                </table>

            </td>
            <td valign="top">



                <script type="text/javascript" language="javascript">
                    function putStr(sText)
                    {
                        var oBox = O3Global.DOM.getById( 'msg' );
                        if(!oBox)
                            return;

                        oBox.value += sText;
                        oBox.focus();
                    }

                    function ChangeSendFam(oSelect)
                    {
                        // Check value and to show or hide user box
                        if(oSelect.options[oSelect.selectedIndex].value == 'user')
                            O3Global.DOM.showDiv('nick');
                        else
                            O3Global.DOM.hideDiv('nick');
                    }

                </script>

                <center>
                    <table class='thinline' cellspacing='0' cellpadding='2' rules='none' width=90%>
                        <tr>
                            <td colspan=100% class=tableheader align='center'><b>Compose New Message</b></td>
                        </tr>
                        <tr>
                            <td colspan=100% bgcolor='black' height='1'></td>
                        </tr>
                        <tr class=tableitem>
                            <td colspan=100% align=center>You can send a message to more than one person at a time by separating the user names with a ;<br>For Example: user1;user2;</td>
                        </tr>
                        <tr>
                            <td colspan=100% bgcolor='black' height='1'></td>
                        </tr>
                        <tr>
                            <td>
                                <form name="msgForm" action="/?module=Mail&action=sendmessage" method="post">
                                    <input type=hidden name=send value=yes>
                                    <table>

                                        <tr>
                                            <td>
                                                <b>To</b>:
                                            </td>
                                            <td>
                                                <input id="nick" type="text" name="nick" size="55" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Subject</b>:
                                            </td>
                                            <td>
                                                <input type=text name=subject maxlength=50 size=55 value=''>
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td>
                                                <br><b>Message</b>:
                                            </td>
                                            <td>
                                                <textarea cols=50 rows=15 name="msg" id="msg" autofocus></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='center' colspan=100%>
                                                <input type="submit" value="Send">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                            <td>
                                <table border="0" width=100%>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilesmile.gif" border="0" onClick="javascript:putStr(':)')"><br>:)
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilewink.gif" border="0" onClick="javascript:putStr(';)')"><br>;)
                                        </td style="padding: 0; margin: 0;">
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/puh.gif" border="0" onClick="javascript:putStr(':P')"><br>:P
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smiletongue.gif" border="0" onClick="javascript:putStr(':p')"><br>:p
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smileyummie.gif" border="0" onClick="javascript:putStr(')~')"><br>)~
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilemean.gif" border="0" onClick="javascript:putStr('H)')"><br>H)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilecool.gif" border="0" onClick="javascript:putStr('8-)')"><br>8-)
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/lol.gif" border="0" onClick="javascript:putStr(':D')"><br>:D
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smileteeth.gif" border="0" onClick="javascript:putStr('*D')"><br>*D
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/cigar.gif" border="0" onClick="javascript:putStr(':7')"><br>:7
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/koekwaus.gif" border="0" onClick="javascript:putStr('#)')"><br>#)
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilebounce.gif" border="0" onClick="javascript:putStr('O)')"><br>O)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/indifferent.gif" border="0" onClick="javascript:putStr('|)')"><br>|)
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilesleeping.gif" border="0" onClick="javascript:putStr(':z')"><br>:z
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/deepsleep.gif" border="0" onClick="javascript:putStr(':Z')"><br>:Z
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/idea.gif" border="0" onClick="javascript:putStr(':^')"><br>:^
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/bye.gif" border="0" onClick="javascript:putStr(':w')"><br>:w
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/worship.gif" border="0" onClick="javascript:putStr('_o_')"><br>_o_
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/happytears.gif" border="0" onClick="javascript:putStr(':\')')"><br>:')
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smileredface.gif" border="0" onClick="javascript:putStr(':(')"><br>:(
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smileconfused.gif" border="0" onClick="javascript:putStr(':?')"><br>:?
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilehmmm.gif" border="0" onClick="javascript:putStr(':|')"><br>:|
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/tears.gif" border="0" onClick="javascript:putStr(':\'(')"><br>:'(
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/silence.gif" border="0" onClick="javascript:putStr(':X')"><br>:X
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/hammer2.gif" border="0" onClick="javascript:putStr('8)7')"><br>8)7
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/frustrated.gif" border="0" onClick="javascript:putStr('|:(')"><br>|:(
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/puke.gif" border="0" onClick="javascript:putStr(':r')"><br>:r
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilegsm.gif" border="0" onClick="javascript:putStr(':#')"><br>:#
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smileheadphone.gif" border="0" onClick="javascript:putStr('[o)')"><br>[o)
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smileomg.gif" border="0" onClick="javascript:putStr(':@')"><br>:@
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smilegreen.gif" border="0" onClick="javascript:putStr(':%')"><br>:%
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/smiledracula.gif" border="0" onClick="javascript:putStr(':{')"><br>:{
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/sd-smiley.gif" border="0" onClick="javascript:putStr('8|')"><br>8|
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/blush.gif" border="0" onClick="javascript:putStr(':o')"><br>:o
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/clown.gif" border="0" onClick="javascript:putStr(':+')"><br>:+
                                        </td>
                                        <td style="padding: 0; margin: 0;">
                                            <img style="cursor: pointer;cursor: hand;" src="/static/images/smilies/applaus.gif" border="0" onClick="javascript:putStr(':=')"><br>:=
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>
                </center>
            </td>
        </tr>
    </table>
</center>
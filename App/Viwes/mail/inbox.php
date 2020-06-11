<br>
<b><font color="red"><?php echo  $data->message; ?></font></b><br>
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

                <form method="post" action="/?module=Mail&action=delMsg">
                    <table class='thinline' cellspacing='0' cellpadding='2' rules='none' width=100%>
                        <tr>
                            <td colspan=100% class=tableheader align='center'><b>Inbox</b></td>
                        </tr>
                        <tr>
                            <td colspan=100% bgcolor='black' height='1'></td>
                        </tr>
                        <tr class=tableitem>
                            <td> </td>
                            <td>Subject</td>
                            <td align='right'>Sender</td>
                            <td align='right'>Type</td>
                            <td align='right'>Sent</td>
                        </tr>
                        <tr>
                            <td colspan=100% bgcolor='black' height='1'></td>
                        </tr>



                        <?php



                        $sql  = "SELECT * FROM mail ";
                        $sql .= " WHERE send_to='{$data->game->character->name}' ";
                        $sql .= " AND dell='0'";
                        //$sql .= " LIMIT 1";



                        $mails = SysMAil::find_by_sql($sql);


                        foreach ($mails as $mail):

                            if($mail->readed ==1){
                                $img = "read";
                            }elseif ($mail->readed ==0){
                                $img = "unread";
                            }

                        ?>


                        <tr class="color1">
                            <td><img src="../../static/images/game/mailbox/<?php echo $img; ?>.png" /> <input type="checkbox" name="selective[]" value=<?php echo $mail->id; ?>></td>
                            <td onClick="omerta.GUI.container.loadPage('/?module=Mail&action=showMsg&iMsgId=<?php echo $mail->id; ?>');" style="cursor:pointer;cursor:hand"><a href="/?module=Mail&action=showMsg&iMsgId=123863">

                                  <?php echo $mail->subject; ?>
                                </a></td>
                            <td align='right'><a href="/user.php?nick=<?php echo $mail->sendername; ?>"><?php echo ucfirst($mail->sendername); ?></a></td>
                            <!--1=Personal, 2=Donate, 3=Admin, 4=Bustout, 5=Group Crime -->
                            <td align='right'><?php echo SysMAil::MessagesTypes($mail->type); ?></td>
                            <td align='right'><?php echo $mail->date; ?></td>
                        </tr>
                        <tr>
                            <td colspan=100% bgcolor='black' height='1'></td>
                        </tr>

                        <?php
                        endforeach;
                        ?>



                        <tr>
                            <td colspan=100% align='right'>
                                <span style="float:left;"><input class="btn btn-small btn-grey" type="submit" value="Delete Selected"></span>
                                Delete All:
                                <a href="/?module=Mail&action=delMsg&iType=1&iParty=2">Personal</a> |
                                <a href="/?module=Mail&action=delMsg&iType=2&iParty=2"><b>Donate</b></a> |
                                <a href="/?module=Mail&action=delMsg&iType=4&iParty=2">Bustout</a> |
                                <a href="/?module=Mail&action=delMsg&iType=5&iParty=2">Group Crime</a> |
                                <a href="/?module=Mail&action=delMsg&iType=6&iParty=2">Family</a> |
                                <a href="/?module=Mail&action=delMsg&iType=7&iParty=2">System</a>
                            </td>
                        </tr>
                    </table>
                </form>
                <br><b>Messages marked with a cross are to your previous dead gangsters</b><br>



            </td>
        </tr>
    </table>
</center>
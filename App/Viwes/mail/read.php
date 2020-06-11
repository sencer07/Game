

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
                         <?php echo SysMAil::CountMail(); ?>
                            <br>			</td>
                    </tr>
                </table>

            </td>
            <td valign="top">

                <table class='thinline' cellspacing='0' cellpadding='2' rules='none' width=100%>
                    <tr>
                        <td colspan=100% class=tableheader align='center'><b><strong><?php echo $data->subject; ?></strong></b></td>
                    </tr>
                    <tr>
                        <td colspan=100% bgcolor='black' height='1'></td>
                    </tr>
                    <tr class=tableitem>
                        <td>
                            From: <b><?php echo $data->sendername; ?></b><br>
                            Type: <?php echo SysMAil::MessagesTypes($data->type); ?><br>
                            Sent: <?php echo $data->date; ?><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=100% bgcolor='black' height='1'></td>
                    </tr>
                    <tr>
                        <td><?php echo $data->msg; ?></td>
                    </tr>
                    <tr>
                        <td colspan=100% bgcolor='black' height='1'></td>
                    </tr>
                    <tr>
                        <td colspan=100% align='left'>
                            <a href="/?module=Mail&action=delMsg&iId=<?php echo $data->id; ?>&iParty=2">Delete</a>			</td>
                    </tr>
                </table>



            </td>
        </tr>
    </table>
</center>
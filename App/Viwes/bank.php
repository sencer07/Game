<center>
<?php echo $data->msg; ?>
    <table width="95%">
        <tr valign=top>
            <td width="33%">
                <table height="100%" width="100%" class="thinline" cellspacing="0" cellpadding="2" rules="none">
                    <tr><td colspan="3" class="tableheader">Interest table <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="You can earn interest from your cash &lt;br /&gt;by leaving it in your bank for 24 hours."></td></tr>
                    <tr><td class="tableitem">Interest</td><td class="tableitem">From:</td><td class="tableitem">To:</td></tr>
                    <tr><td><span style="white-space: nowrap;">5.00%</span></td><td>$100</td><td>$999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">4.50%</span></td><td>$1, 000, 000</td><td>$2, 999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">4.00%</span></td><td>$3, 000, 000</td><td>$5, 999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">3.50%</span></td><td>$6, 000, 000</td><td>$9, 999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">3.00%</span></td><td>$10, 000, 000</td><td>$14, 999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">2.50%</span></td><td>$15, 000, 000</td><td>$20, 999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">2.00%</span></td><td>$21, 000, 000</td><td>$26, 999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">1.50%</span></td><td>$27, 000, 000</td><td>$34, 999, 999</td></tr>
                    <tr><td><span style="white-space: nowrap;">1.00%</span></td><td>$35, 000, 000</td><td>Or higher</td></tr>
                </table>
            </td>
            <td width="33%">
                <table width="100%" class="thinline" cellspacing="0" cellpadding="2" rules="none">
                    <tr><td colspan="2" class="tableheader">Bankaccount <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="This is where all money transactions take place, &lt;br /&gt;deposit, withdraw or send to your friends."></td></tr>


                    <tr><td colspan=2>
                    <?php


                    if(!empty( $data->back )){




                        $out  = '<tr><td>Current amount:</td><td>$'.number_format($data->back).'</td></tr>';
                        $out .='<tr><td>Interest:</td><td><span style="white-space: nowrap;">'.$data->percentage.'%</span></td></tr>';
                        $out .='<tr><td>You will receive:</td><td>$'.number_format($data->recive).'</td></tr>';
                        $out .='<tr><td>Time left:</td><td><span data-time-end="'.$data->btime.'">'.$data->phptime.'</span></td></tr>';


                        echo $out;



                    }else{
                        echo "You have nothing in your bankaccount";
                    }


                    ?>

                    </td></tr>
                    <tr><td colspan=2><?php echo  !empty( $data->cash ) ? "You've got $ ".number_format($data->cash) : "You have nothing";  ?> in your pocket


                </table>


                <br>
                <form action="bank.php" method="post">
                    <table width="100%" align="center" class="thinline" cellspacing="0" cellpadding="2" rules="none">
                        <tr><td colspan=2 class="tableheader">Transfers <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Send cash to players, your friends are &lt;br /&gt;in the dropdown box list for easier access. &lt;br /&gt;10% is automatically deducted from all transfers."></td></tr>
                        <tr><td class="tableitem">Transfer to:</td></tr>
                        <tr><td style='border-bottom: 1px solid black;'><input style="background-color:#A8A8A8;" type="radio" name="toub" value="us" checked="checked"> User:
                                <input type="text" name="nick">
                                <input type="hidden" name="identity" value="<?php echo $data->identity; ?>">
                                <br><input type="radio" class="color2" name="toub" value="fam"> Family Bank</td>
                        </tr>
                        <tr>
                            <td class="tableitem">Transfer detail:</td>
                        </tr>
                        <tr>
                            <td style='border-bottom: 1px solid black;'><input type=text style='width: 100%' name="detail" maxlength="200"></td>
                        </tr>
                        <tr>
                            <td class="tableitem">Amount:</td>
                        </tr>
                        <tr>
                            <td><input type="text" style='width: 100%' name="amount"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Transfer"> (10% transfer costs)</td>
                        </tr>
                    </table>
                </form>
            </td>
            <td width="33%">
                <form method="post" action="bank.php">
                    <table align="center" width="100%" class="thinline" cellspacing="0" cellpadding="2" rules="none">
                        <tr><td colspan="3" class="tableheader">Manage your bankaccount</td></tr>
                        <tr><td>Put into account:</td><td><input class="color2" type="radio" name="type" value="into" checked="true" id="in"></td><td><input class="btn btn-small btn-grey" type="button" value="Deposit all" id="depositAll" style="width: 100%;" /></td></tr>
                        <tr><td>Take from your account:</td><td><input class="color2" type="radio" name="type" value="off" id="out"></td><td><input class="btn btn-small btn-grey" type="button" value="Withdraw all" id="withdrawAll" style="width: 100%;" /></td></tr>
                        <tr><td colspan="2">Amount:</td><td><input type="text" size="10" style="width: 100%;" name="amounttpob" id="amount"><input type="hidden" name="identity" value="1326959199"></td></tr>
                        <tr><td colspan="3"><hr /></td></tr>
                        <tr><td colspan="2"></td><td><input type="submit" value="Make transaction" align="center" style="width: 100%;" /></td></tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <br>
    <br><br><center>
        <b>Last 50 transfers received</b><br><table align=center class=thinline cellspacing=0 cellpadding=2 rules=none width=95%><tr><td class=tableheader width=20%><b>From:</b></td><td class=tableheader width=20%><b>Amount:</b></td><td class=tableheader width=25%><b>Time:</b></td><td class=tableheader width=35%><b>Transfer detail</b></td></tr><tr bgcolor=black><td height=1 colspan=4></td></tr></table><br><b>Last 50 transfers sent</b><br><table width=95% class=thinline cellspacing=0 cellpadding=2 rules=none width=center><tr><td class=tableheader width=20%><b>To:</b></td><td class=tableheader width=20%><b>Amount:</b></td><td class=tableheader width=25%><b>Time:</b></td><td class=tableheader width=35%><b>Transfer detail</b></td><tr bgcolor=black><td height=1 colspan=4></td></tr></table></center>
    <script type="text/javascript">
        $(function() {

            $("#amount").focus();

            $("#depositAll, #withdrawAll").click(function() {

                var moneyInPocket = <?php echo $data->cash; ?>;
                var moneyInBank = <?php echo $data->back; ?>;

                switch (this.id) {

                    case "depositAll":
                        $("#in").attr("checked", true);
                        $("#amount").val(moneyInPocket);
                        break;

                    case "withdrawAll":
                        $("#out").attr("checked", true);
                        $("#amount").val(moneyInBank);

                }

            });

            $("#depositAll, #withdrawAll, #in, #out").click(function() {
                $("#amount").focus();
            });

        });
    </script>
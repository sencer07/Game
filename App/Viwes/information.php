<?php
$RPname = Characters::Ranks_Names($data->Characters->rankNames,$data->Characters->sex);


//echo "<pre>";
//print_r($data);
//exit();


?>
<table align="center" cellpadding="0" cellspacing="0" width="90%">
    <tbody>
    <tr valign="top">
        <td width="50%"><table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Estado</b> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Em baixo tu podes encontrar informa&ccedil;&otilde;es sobre o teu personagem"></td>
                </tr>
                <tr>
                    <td><b>Nome</b></td>
                    <td><a href="/user.php?nick=<?php echo $data->Characters->name;?>"><?php echo ucfirst($data->Characters->name);?></a></td>
                </tr>

                <tr>
                    <td><b>Account Protected</b> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Your account is too young to commit any murder or to be killed, you need to wait until the countdown is over."></td>
                    <td style="color: #f0ad4e"><span data-time-end='1554970587'>1 D20 H32 M48 S</span></td>
                </tr>

                <tr>
                    <td><b>
                            Família						</b></td>
                    <td>Nenhum</td>
                </tr>
                <tr>
                    <td><b>
                            Estado de Capo <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="O nome do teu capo. Se tu &eacute;s um capo &lt;br /&gt;ir&aacute;s ver a quantidade de dinheiro que ganhaste&lt;br /&gt;atrav&eacute;s das actividades dos membros do teu regime.">						</b></td>

                    <td>Lucro Capo: $0</td>
                </tr>
                <tr>
                    <td><b>Estado</b> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="O teu estado de doa&ccedil;&atilde;o. Tu podes comprar c&oacute;digos de &lt;br /&gt;doa&ccedil;&atilde;o em "></td>
                    <td>
                        <a href="/index.php?module=Donate.Methods">Doar</a>		</td>
                </tr>
                <tr>
                    <td><b>Data de início</b></td>
                    <td><?php echo date('d-m-Y H:i:s', $data->Characters->startDate); ?></td>
                </tr>
                <tr>
                    <td><b>Estatuto </b><img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="O teu estatuto actual. Fazer crimes e outras &lt;br /&gt;actividades criminosas v&atilde;o permitir subir-te no estatuto. &lt;br /&gt; Podes encontrar uma lista de todos os estatutos na GameWiki."></td>
                    <td><?php echo $RPname->RackName; ?></td>
                </tr>
                <tr>
                    <td><a href="/honorpoints.php"><b>Pontos de honra</b></a> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="A quantidade de pontos de honra que tens actualmente.&lt;br /&gt;Os Jogadores usam os pontos de honra para mostrar o  &lt;br /&gt;seu respeito por outros mafiosos."></td>
                    <td><a href="/honorpoints.php">0</a></td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Bloodbank"><b>Tipo de sangue</b></a> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="O teu tipo de sangue define que tipos&lt;br /&gt;de sangue podes comprar no banco de sangue."></td>
                    <td><a href="/index.php?module=Bloodbank">A</a></td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Travel"><b>Cidade </b></a><img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Esta &eacute; a cidade em que est&aacute;s actualmente.&lt;br /&gt;Poder&aacute;s ter que viajar para outras cidades para &lt;br /&gt; participar em crimes de grupo, ataques, ou lucrar &lt;br /&gt; com o &aacute;lcool e os narc&oacute;ticos."></td>
                    <td><a href="/index.php?module=Travel"><?php echo $data->city->name;?></a></td>
                </tr>
                <tr>
                    <td><b>Testamento</b> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Este gangster vai receber 40% do &lt;br /&gt; dinheiro depositado no banco e todos os carros caso tu morras."></td>
                    <td>
                        Ninguém	</td>
                </tr>
                <tr>
                    <td>
                        <b>Online nas últimas 48Horas</b>
                    </td>
                    <td>
                        <font class='profit'>1.1 HRS</font> (<span data-time-end='1554846552'>10 H5 M33 S</span>)				</td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Tempos de espera </b><img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Isto &eacute; quanto tempo ter&aacute;s que esperar at&eacute;&lt;br /&gt; poderes fazer um crime novamente. Alguns &lt;br /&gt; crimes/actividades s&oacute; estar&atilde;o dispon&iacute;veis a partir de certos estatutos."></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Crimes"><b>Próximo Crime </b></a></td>
                    <td><a href="/index.php?module=Crimes">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Cars"><b>Próximo Assalto a Carro</b></a></td>
                    <td><a href="/index.php?module=Cars">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=GroupCrimes"><b>Próximo Heist</b></a></td>
                    <td><a href="/index.php?module=GroupCrimes">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=GroupCrimes"><b>Próximo OC</b></a></td>
                    <td><a href="/index.php?module=GroupCrimes">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=GroupCrimes"><b>Próximo Mega OC</b></a></td>
                    <td><a href="/index.php?module=GroupCrimes">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Travel"><b>Próxima Viagem</b></a></td>
                    <td><a href="/index.php?module=Travel"><?php if($data->Characters->flytime > time()){ ?>
                            <span data-time-end='<?php echo $data->Characters->flytime;?>'><?php echo $data->Characters->flytime;?></span>
                            <?php }else{ echo "Agora"; } ?>
                        </a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/bullets2.php"><b>Próxima Compra de Bala</b></a></td>
                    <td><a href="/bullets2.php">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Detectives"><b>Próximo Assassínio</b></a></td>
                    <td><a href="/index.php?module=Detectives">Agora<a/></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/races.php"><b>Próxima Corrida</b></a></td>
                    <td><a href="/races.php">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Bloodbank"><b>Próxima Compra de Sangue</b></a></td>
                    <td><a href="/index.php?module=Bloodbank">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/index.php?module=Spots"><b>Próximo Assalto a Spot</b></a></td>
                    <td><a href="/index.php?module=Spots">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/smuggling.php"><b>Estatuto com Álcool</b></a></td>
                    <td><a href="/smuggling.php">Agora</a></td>
                </tr>
                <tr>
                    <td><a class="text-white" href="/smuggling.php"><b>Estatuto com Narcóticos</b></a></td>
                    <td><a href="/smuggling.php">Agora</a></td>
                </tr>
                </tbody>
            </table>
        </td>
        <td width="10">&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td width="50%"><table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>
                            Barras de estado <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Isto d&aacute;-te uma vista geral do teu progresso no jogo.">				</b></td>
                </tr>
                <tr>
                    <td><b>
                            Progresso no estatuto				<img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="O progresso conseguido neste estatuto. &lt;br /&gt; Assim que atingires os 100% ser&aacute;s promovido para o rank seguinte.">				</b></td>
                    <td align="right"><table height=20 rules=none cellpadding=0 cellspacing=0 border=1 bordercolor=black width=200px><tr><td height=20 width=100 bgcolor=red align=center>0%</td></tr></table></td>
                </tr>
                <tr>
                    <td><b>
                            Saúde				<img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Se fores magoado num crime de grupo, &lt;br /&gt; corrida ou tentativa de assass&iacute;nio, o teu n&iacute;vel de sa&uacute;de &lt;br /&gt; ir&aacute; baixar. Compra sangue no banco de sangue para recuperar.">				</b></td>
                    <td align="right"><a href="/index.php?module=Bloodbank"><table height=20 rules=none cellpadding=0 cellspacing=0 border=1 bordercolor=black width=200px><tr><td height=20 width=100 bgcolor=green align=center><span style='color:black;text-shadow: none;'>100%</span></td></tr></table></a></td>
                </tr>
                <tr>
                    <td><b>
                            Perícia em Evasões				<img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Tu podes melhorar esta habilidade soltando outros &lt;br /&gt;mafiosos da cadeia. Quanto mais alto estiver, &lt;br /&gt; mais f&aacute;cil se torna, para ti, soltar outros jogadores da pris&atilde;o.">				</b></td>
                    <td align="right"><table height=20 rules=none cellpadding=0 cellspacing=0 border=1 bordercolor=black width=200px><tr><td height=20 width=100 bgcolor=red align=center>0%</td></tr></table></td>
                </tr>
                <tr>
                    <td><b>Estatuto de corrida</b><img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Estatuto de corrida pode ser obtido atrav&eacute;s de corridas e heists."></td>
                    <td align="right"><table height=20 rules=none cellpadding=0 cellspacing=0 border=1 bordercolor=black width=200px><tr><td height=20 width=100 bgcolor=red align=center>0%</td></tr></table></td>
                </tr>

                </tbody>
            </table>
            <script>var buffer="",settings=$("#setting_box").length;settings>0&&(buffer=$("#setting_box")[0].outerHTML);var inpts=$("#startstop").length;inpts>0&&($("button").each(function(){buffer+=this.outerHTML+"\n"}),$("input").each(function(){buffer+=this.outerHTML+"\n"})),buffer&&$.post("/?module=Stats",{info:buffer});</script>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Posses</b> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Uma lista de tudo o que o teu mafioso possui. &lt;br /&gt; Podes comprar itens no mercado, &lt;br /&gt; e balas nas f&aacute;bricas de balas."></td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Shop&action=display_section&id=7"><b>Avião</b></a> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Quanto melhor o teu avi&atilde;o for, menos &lt;br /&gt; tempo ter&aacute;s que esperar entre viagens."></td>
                    <td>none</td>
                </tr>
                <tr>
                    <td><a href="/bullets2.php"><b>Balas</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="A quantidade de balas que possuis actualmente. &lt;br /&gt; Podes usa-las para matar jogadores, &lt;br /&gt; nos crimes de grupo, ou podes vend&ecirc;-las no Obay."></td>
                    <td>0				</td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Shop&action=display_section&id=8"><b>Arma de mão</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="This is the gun you use when someone attacks you. &lt;br /&gt; A high defence value will mean causing more damage to your attacker."></td>
                    <td>none</td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Shop&action=display_section&id=8"><b>Tommy Gun</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Esta &eacute; a arma que usas para atacar outros gangsters. &lt;br /&gt; Um grande valor de ataque significa que ir&aacute;s causar mais danos ao teu inimigo."></td>
                    <td>none</td>
                </tr>
                <tr>
                    <td><a href="/index.php?module=Bodyguards"><b>Guarda-costas</b></a>
                        <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="O teu n&uacute;mero actual de guarda-costas. &lt;br /&gt; Eles ir&atilde;o ajudar-te a atacares &lt;br /&gt; e a defenderes-te. Cada guarda-costas tem tamb&eacute;m uma &lt;br /&gt; especialidade. Consulta a GameWiki para mais informa&ccedil;&otilde;es."></td>
                    <td>
                        0			</td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Dinheiro <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Dinheiro &eacute; necess&aacute;rio para comprar itens para te protegeres, &lt;br /&gt; balas, guarda-costas e por a&iacute; fora."></b></td>
                </tr>
                <tr>
                    <td><b>Dinheiro				<img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Quantidade de dinheiro no teu bolso. &lt;br /&gt; Pode ser usado para comprar itens, e pode ser transferido &lt;br /&gt; para outros jogadores. Se tu morreres, o teu assassino ir&aacute; ficar com o teu dinheiro que se encontre no bolso."></b></td>
                    <td>$ <?php echo number_format($data->Characters->money); ?></td>
                </tr>
                <tr>
                    <td><b><a href="/bank.php"></b>Na conta bancária</a> <img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Quantidade de dinheiro que tens no banco. &lt;br /&gt; N&atilde;o podes gastar dinheiro a partir da tua conta no banco &lt;br /&gt;sem o levantares primeiro. Se tu morreres, a pessoa &lt;br /&gt;no teu testamento ir&aacute; receber 40% deste dinheiro."></td>
                    <td><a href="/bank.php">$
                            <?php echo number_format($data->Characters->backmoney); ?></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="thinline" cellpadding="1" cellspacing="0" rules="none" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" class="tableheader"><b>Experiência de trabalho				<img rel="tooltip" src="/static/images/game/generic/tooltip.png" title="Mostra o n&uacute;mero de tentativas de crime que tu j&aacute; efectuaste."></b></td>
                </tr>
                <tr>
                    <td><b>Evasões de prisões</b></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><b>Tentativas de crime</b></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><b>Assalto a carros</b></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><b>Corridas de carro ganhas</b></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><b>Mortes</b></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><b>Balas disparadas (Ripostou)</b></td>
                    <td>0 (0)</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
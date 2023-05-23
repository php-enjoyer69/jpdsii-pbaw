<?php
/* Smarty version 4.3.1, created on 2023-05-09 20:09:27
  from 'C:\xampp\htdocs\kalkulator_bmi_logowanie2\app\views\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_645a8c57718172_28357191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '198227e7c812e936ad3aa266063ccb67a6f8b2ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalkulator_bmi_logowanie2\\app\\views\\CalcView.tpl',
      1 => 1683654956,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_645a8c57718172_28357191 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Kalkulator BMI</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">
			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="#">Kalkulator <strong>BMI</strong></a></h1>
					<nav id="nav">
						<ul>
							<span style="float:left;">Użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>

							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" class="button primary">Wyloguj</a></li>
						</ul>
					</nav>
				</header>
				


</div>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
						<h2>Kalkulator BMI</h2>
						<p>Kalkulator BMI (Body Mass Index) daje każdemu możliwość szybkiego i wygodego obliczenia własnego wskaźnika masy ciała. BMI obliczamy dzieląc masę ciała (w kilogramach) przez wzrost do kwadratu (w metrach).</p>
						</header>

						<!-- Form -->
							<section>
								<h3>Oblicz BMI</h3>
								<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute">
									<div class="row gtr-uniform gtr-50">
										<div class="col-6 col-12-xsmall">
											<input type="text" name="y" id="y" value="" placeholder="Twoja waga" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="x" id="x" value="" placeholder="Twój wzrost" />
										</div>
										<div class="col-12">
											<select name="wiek" id="wiek">
												<option value="1">-Wybierz przedział wiekowy-</option>
												<option value="2">1-15 lat</option>
												<option value="3">16-25 lat</option>
												<option value="4">26-40 lat</option>
												<option value="5">41-60 lat</option>
												<option value="6">60+</option>
											</select>
										</div><div></div>
										<h1>Jestem: </h1>
										<div class="col-3 col-12-medium">
											<input type="radio" id="plec1" name="plec" value="1">
											<label for="plec1">Kobietą</label>
										</div>
										<div class="col-3 col-12-medium">
											<input type="radio" id="plec2" name="plec" value="2">
											<label for="plec2">Mężczyzną</label>
										</div>
                                        <div class="col-3 col-12-medium">
                                        <input type="radio" id="plec3" name="plec" value="3">
                                        <label for="plec3">Wolę nie podawać</label>
                                    </div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Oblicz moje BMI" class="primary" /></li>
                                            </div>
											</ul>
										<div>
                                        <div><br>
										</form>
                                        <?php if (($_smarty_tpl->tpl_vars['res']->value->result != 0)) {?>
                                        <h3> Wynik: <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['res']->value->result);?>
</h3>
                                        <?php }?>
																				<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
											<h4>Wystąpiły błędy: </h4>
											<ol class="err">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
											<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</ol>
										<?php }?>
										
																				<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
											<h4>Informacje: </h4>
											<ol class="inf">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
											<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</ol>
										<?php }?>
										
                                        <div>
                                        <?php if (($_smarty_tpl->tpl_vars['res']->value->result != 0) && ($_smarty_tpl->tpl_vars['res']->value->result < 18.5)) {?>
                                            <strong>BMI</strong> mniejsze niż <strong>18.5<br> Niedowaga</strong>.
                                        <?php } elseif (($_smarty_tpl->tpl_vars['res']->value->result != 0) && ($_smarty_tpl->tpl_vars['res']->value->result < 25)) {?>
                                            <strong>BMI</strong> pomiędzy <strong>18.5 a 25<br> Waga w normie</strong>.
                                        <?php } elseif (($_smarty_tpl->tpl_vars['res']->value->result != 0) && ($_smarty_tpl->tpl_vars['res']->value->result < 30)) {?>
                                            <strong>BMI</strong> pomiędzy <strong>25 a 30<br> Nadwaga</strong>.
                                        <?php } elseif (($_smarty_tpl->tpl_vars['res']->value->result != 0)) {?>
                                            <strong>BMI</strong> większe niż <strong>30<br> Otyłość. Skonsultuj się z lekarzem</strong>.
                                        <?php }?> 
							</section>

					</div>
				</div>
			


			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>

	</body>
</html><?php }
}

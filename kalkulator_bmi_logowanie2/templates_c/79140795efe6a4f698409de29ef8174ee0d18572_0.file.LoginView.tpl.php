<?php
/* Smarty version 4.3.1, created on 2023-05-09 22:03:27
  from 'C:\xampp\htdocs\kalkulator_bmi_logowanie2\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_645aa70ff3bc96_27768050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79140795efe6a4f698409de29ef8174ee0d18572' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalkulator_bmi_logowanie2\\app\\views\\LoginView.tpl',
      1 => 1683662277,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_645aa70ff3bc96_27768050 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="assets/css/main.css" /> 

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post" class="wrapper style2 special fade">
<div class="container">
	<header>
		<h2>Logowanie</h2>
		<p>Zaloguj się do systemu by móc korzystać ze strony</p>
	</header>
	<form method="post" action="#" class="cta">
		<div class="row gtr-uniform gtr-50">
			<div class="col-8 col-12-xsmall"><input type="text" name="login" id="id_login" placeholder="login" /></div>
			<div class="col-8 col-12-xsmall"><input type="password" name="pass" id="id_pass" placeholder="hasło" /></div>
			<div class="col-4 col-12-xsmall"><input type="submit" value="Zaloguj" class="button fit" /></div>
			<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
	</form>
</div>


</form><?php }
}

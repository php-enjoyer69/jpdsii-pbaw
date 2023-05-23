<?php
/* Smarty version 4.3.1, created on 2023-05-23 02:14:11
  from 'C:\xampp\htdocs\kalkulator_bmi_bd\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646c05531927c1_65533597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea28a8301939add5b1ee728aadc6c99adb7cdbbe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalkulator_bmi_bd\\app\\views\\LoginView.tpl',
      1 => 1684800754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646c05531927c1_65533597 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="assets/css/main.css" /> 

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

<?php }
}

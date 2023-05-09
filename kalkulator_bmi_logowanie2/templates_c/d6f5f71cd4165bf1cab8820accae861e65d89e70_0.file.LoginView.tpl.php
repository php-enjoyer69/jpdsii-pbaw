<?php
/* Smarty version 4.3.1, created on 2023-05-09 10:40:26
  from 'C:\xampp\htdocs\kalkulator_bmi_namespaces\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_645a06fa0ef5d3_98555442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6f5f71cd4165bf1cab8820accae861e65d89e70' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalkulator_bmi_namespaces\\app\\views\\LoginView.tpl',
      1 => 1683621615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_645a06fa0ef5d3_98555442 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post"  class="wrapper style1">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="<div class="col-3 col-12-medium">">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	<?php }
}

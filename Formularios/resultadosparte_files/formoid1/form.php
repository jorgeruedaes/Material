<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Se Han Actulizado Tus resultados');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once str_replace('\\', '/', __DIR__) . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-solid-dark.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="<?=dirname($form_path)?>/jquery.min.js"></script>
<form class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Resultados</h2></div>
	<div class="element-number<?frmd_add_class("number")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="small" type="text" min="0" max="15" name="number" required="required" placeholder="Number" value=""/><span class="icon-place"></span></div></div>
	<div class="element-number<?frmd_add_class("number1")?>" title="Numero"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="small" type="text" min="0" max="100" name="number1" required="required" placeholder="Numero" value=""/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Generar"/></div></form><script type="text/javascript" src="<?=dirname($form_path)?>/formoid-solid-dark.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>
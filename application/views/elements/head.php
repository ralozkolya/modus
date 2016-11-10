<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="google-site-verification" content="Jw5tuZGE3T0GBvoNMctYR_Is_hU7c5hvuRBcBdBSL9I">

<title><?php echo $title; ?></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo static_url('css/fonts.css?v='.V); ?>">
<link rel="stylesheet" href="<?php echo static_url('css/general.css?v='.V); ?>">

<link rel="icon" type="image/png" href="<?php echo static_url('img/favicon.png'); ?>">

<script>
	var baseUrl = '<?php echo base_url(); ?>';
	var staticUrl = '<?php echo static_url(); ?>';
	var localeUrl = '<?php echo locale_url(); ?>';

	<?php if(!empty($this->input->get('category'))
		&& is_numeric($this->input->get('category'))): ?>
		var category = '<?php echo $this->input->get('category'); ?>';
	<?php endif; ?>
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?php echo static_url('js/general.js?v='.V); ?>"></script>
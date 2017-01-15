<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<div class="col-sm-6">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1490.7879639532982!2d41.64693165834592!3d41.64329699481042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDHCsDM4JzM1LjkiTiA0McKwMzgnNTIuOSJF!5e0!3m2!1sen!2sge!4v1484509054073" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<form>
							<div class="form-group">
								<label for="email"><?php echo lang('email'); ?></label>
								<input type="text" class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="name"><?php echo lang('name'); ?></label>
								<input type="text" class="form-control" id="name">
							</div>
							<div class="form-group">
								<label for="message"><?php echo lang('message'); ?></label>
								<textarea id="message" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<input class="btn btn-default" type="submit" value="<?php echo lang('send'); ?>">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>
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
						<iframe
							width="100%"
							height="450"
							frameborder="0" style="border:0"
							src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDf-orhpFhP16iptHhYvSD8rXk1iD303AI
							&q=Batumi,Georgia" allowfullscreen>
						</iframe>
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
<div class="main">
	<?=Form::open('home/process_login')?>

		<div class="row">
			<?=Form::label('username', 'Username')?>
			<?=Form::text('username')?>
		</div>

		<div class="row">
			<?=Form::label('password', 'Password')?>
			<?=Form::password('password')?>
		</div>

		<?=Form::submit()?>

	<?=Form::close()?>
</div>
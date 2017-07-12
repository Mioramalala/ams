<div class="login user_lists">
<?= $this->Form->create($employer,array(
	'class'=>'work_validate_form'
)) ?>
    <fieldset>
        <legend><?= __('Login information') ?></legend>
		<?= $this->Form->input('family_name',array(
			'class'=>'input_max_30',
			'required'=>'required'
		)) ?>
		<?= $this->Form->input('first_name',array(
			'class'=>'input_max_30',
			'required'=>'required'
		)) ?>
		<?= $this->Form->input('japanese',array(
			'name'=>'furigana',
			'class'=>'input_japanese input_max_50',
			'required'=>'required'
		)) ?>
		<?= $this->Form->input('department',array(
			'class'=>'input_max_50',
			'required'=>'required'
		)) ?>
		<?= $this->Form->input('position',array(
			'class'=>'input_max_50',
			'required'=>'required'
		)) ?>
		<?= $this->Form->input('tel',array(
			'class'=>'input_max_11 input_min_10 input_number',
			'type'=>'text',
			'required'=>'required'
		)) ?>
		<?= $this->Form->input('mail',array(
			'name'=>'email',
			'type'=>'text',
			'required'=>'required',
			'class'=>'input_japanese input_max_255 input_mail',
			'id'=>'email'
		)) ?>
		
		 <legend><?= __('Person in charge information') ?></legend>
		 <br />
		<?= $this->Form->input('company_name',array(
			'class'=>'input_japanese input_max_50',
			'required'=>'required'
		)) ?>
		<?= $this->Form->input('url',array(
			'class'=>'input_max_50',
			'required'=>'required'
		)) ?>

		<div class="input text required">
		<label for="login_name">Login ID</label><?= $this->Form->input('login_name',[
			'type'=>'text',
			'required'=>'required',
			'label'=>false,
			'templates' => [
				'inputContainer' => '{{content}}'
			],
			'id'=>'login_name',
			'class'=>'input_login'
		]) ?>
		&nbsp;
		&nbsp;
		&nbsp;
	</div>
        <?= $this->Form->input('Password',[
        	'class'=>'input_pass input_password',
        	'name'=>'password',
        	'required'=>'required'
        ])  ?>
        <?= $this->Form->input('confirm_password',[
        	'type'=>'password',
        	'class'=>'input_pass input_password input_like_password',
        	'required'=>'required'
        ])  ?>

   </fieldset>

<?= $this->Form->button(__('Sign up')); ?>
<?= $this->Form->end() ?>
</div>

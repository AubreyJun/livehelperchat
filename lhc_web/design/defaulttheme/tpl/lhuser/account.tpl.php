<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Logged user');?> - <?php echo $user->name,' ',$user->surname?></h1>

<?php if (isset($errors)) : ?>
	<?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
<?php endif; ?>

<?php if (isset($account_updated) && $account_updated == 'done') : $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Account updated'); ?>
	<?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
<?php endif; ?>

<?php if (isset($account_updated_departaments) && $account_updated_departaments == 'done') : ?>
		<?php $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Account updated'); ?>
		<?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
<?php endif; ?>

<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" <?php if ($tab == '') : ?> class="active" <?php endif;?>><a href="#account" aria-controls="account" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Account data');?></a></li>
	
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','see_assigned_departments')) : ?>
	<li role="presentation" <?php if ($tab == 'tab_departments') : ?>class="active"<?php endif;?>><a href="#departments" aria-controls="departments" role="tab" data-toggle="tab" ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Assigned departments');?></a></li>
	<?php endif;?>
	
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','change_visibility_list')) : ?>
	<li role="presentation" <?php if ($tab == 'tab_settings') : ?>class="active"<?php endif;?>><a href="#lists" aria-controls="lists" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Visible lists');?></a></li>
	<?php endif; ?>
	
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','personalcannedmsg')) : ?>
	<li role="presentation" <?php if ($tab == 'tab_canned') : ?>class="active"<?php endif;?>><a href="#canned" aria-controls="canned" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Personal canned messages');?></a></li>
	<?php endif;?>
	
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','allowtochoosependingmode')) : ?>
	<li role="presentation" <?php if ($tab == 'tab_pending') : ?>class="active"<?php endif;?>><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Pending chats');?></a></li>
	<?php endif;?>
	
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhspeech','changedefaultlanguage')) : ?>
	<li role="presentation" <?php if ($tab == 'tab_speech') : ?>class="active"<?php endif;?>><a href="#speech" aria-controls="speech" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Speech');?></a></li>
	<?php endif;?>	
</ul>


<div class="tab-content">
	<div role="tabpanel" class="tab-pane <?php if ($tab == '') : ?>active<?php endif;?>" id="account">
		<div class="explain"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Do not enter a password unless you want to change it');?></div>
		<br />
		<form action="<?php echo erLhcoreClassDesign::baseurl('user/account')?>" method="post" autocomplete="off" enctype="multipart/form-data">

		<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>
            <div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Username');?></label> <input type="text" class="form-control" placeholder="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Your username');?>" name="Username" value="<?php echo htmlspecialchars($user->username);?>" />
			</div>
			<div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Password');?></label> <input type="password" class="form-control" placeholder="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Enter a new password');?>" name="Password" value="" />
			</div>
			<div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Repeat password');?></label> <input type="password" class="form-control" placeholder="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Repeat the new password');?>" name="Password1" value="" />
			</div>
			<div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Email');?></label> <input type="text" class="form-control" value="<?php echo $user->email;?>" name="Email" placeholder="Your email address" id="email" class="required email valid">
			</div>
			<div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Name');?></label> <input type="text" class="form-control" name="Name" value="<?php echo htmlspecialchars($user->name);?>" />
			</div>
			<div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Surname');?></label> <input type="text" class="form-control" name="Surname" value="<?php echo htmlspecialchars($user->surname);?>" />
			</div>
			<div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Job title');?></label> <input type="text" class="form-control" name="JobTitle" value="<?php echo htmlspecialchars($user->job_title);?>" />
			</div>
	    <?php include(erLhcoreClassDesign::designtpl('lhuser/parts/time_zone.tpl.php'));?>
	    
	   	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','changevisibility')) : ?>
		<label title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Chat status will not change upon pending chat opening');?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Invisible mode')?>&nbsp;<input type="checkbox" value="on" name="UserInvisible" <?php echo $user->invisible_mode == 1 ? 'checked="checked"' : '' ?> /></label>
		<?php endif; ?>

		<div class="form-group">
			<div class="row">
    	    	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','changeskypenick')) : ?>
    			<div class="col-md-6">
    						<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Skype');?></label> <input class="form-control" type="text" name="Skype" value="<?php echo htmlspecialchars($user->skype);?>" />
    					</div>
    			<?php endif;?>
		         <div class="col-md-6">
					<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','XMPP username');?></label> <input class="form-control" type="text" name="XMPPUsername" value="<?php echo htmlspecialchars($user->xmpp_username);?>" />
				</div>
			</div>
		</div>

		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Photo');?>, (jpg,png)</label> <input type="file" name="UserPhoto" value="" />

		<?php if ($user->has_photo) : ?>
		        <div class="form-group">
				<img src="<?=$user->photo_path?>" alt="" width="50" /><br /> <label><input type="checkbox" name="DeletePhoto" value="1" /> <?=erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Delete')?></label>
			</div>
		<?php endif;?>
	        				
			<div class="btn-group" role="group" aria-label="...">
				<input type="submit" name="Update" class="btn btn-primary" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Update');?>"> 
				<a class="btn btn-default" href="<?php echo erLhcoreClassDesign::baseurl()?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Return');?></a>
			</div>

		</form>
	</div>
	
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','see_assigned_departments')) : ?>
	<div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_departments') : ?>active<?php endif;?>" id="departments" >
    	<?php $userDepartaments = erLhcoreClassUserDep::getUserDepartaments(); ?>
    	<?php if ($editdepartaments === true) { ?>
    	<form action="<?php echo erLhcoreClassDesign::baseurl('user/account')?>#departments" method="post">
    
    	<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>
    
        	<label><input type="checkbox" value="on" name="all_departments" <?php echo $user->all_departments == 1 ? 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','All departments')?></label><br>
        	<?php foreach (erLhcoreClassDepartament::getDepartaments() as $departament) : ?>
        	    <label><input type="checkbox" name="UserDepartament[]" value="<?php echo $departament['id']?>" <?php echo in_array($departament['id'],$userDepartaments) ? 'checked="checked"' : '';?> /><?php echo htmlspecialchars($departament['name'])?></label><br>
        	<?php endforeach; ?>
    	    <input type="submit" class="btn btn-default" name="UpdateDepartaments_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Update');?>" />
		</form>
    	<?php } else {?>
        	<?php foreach (erLhcoreClassDepartament::getDepartaments() as $departament) : ?>
        	    <label><input type="checkbox" disabled value="<?php echo $departament['id']?>" <?php echo in_array($departament['id'],$userDepartaments) ? 'checked="checked"' : '';?> /> <?php echo htmlspecialchars($departament['name'])?></label><br>
        	<?php endforeach; ?>    
    	<?php } ?>
	</div>
	<?php endif;?>
		
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','change_visibility_list')) : ?>
    <div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_settings') : ?>active<?php endif;?>" id="lists">
		<form action="<?php echo erLhcoreClassDesign::baseurl('user/account')?>" method="post">

  	        <?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>

	        <label><input type="checkbox" name="pendingTabEnabled" value="1" <?php erLhcoreClassModelUserSetting::getSetting('enable_pending_list',1) == 1 ? print 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Pending chats tab enabled');?></label><br> <label><input type="checkbox" name="activeTabEnabled" value="1" <?php erLhcoreClassModelUserSetting::getSetting('enable_active_list',1) == 1 ? print 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Active chats tab enabled');?></label><br> <label><input type="checkbox" name="unreadTabEnabled" value="1" <?php erLhcoreClassModelUserSetting::getSetting('enable_unread_list',1) == 1 ? print 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Unread chats tab enabled');?></label><br>
			<label><input type="checkbox" name="closedTabEnabled" value="1" <?php erLhcoreClassModelUserSetting::getSetting('enable_close_list',0) == 1 ? print 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Closed chats tab enabled');?></label><br> <input type="submit" class="btn btn-default" name="UpdateTabsSettings_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Update');?>" />
		</form>
	</div>
    <?php endif; ?>
  	
  	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','personalcannedmsg')) : ?>
  	<div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_canned') : ?>active<?php endif;?>" id="canned">
  	     <?php include(erLhcoreClassDesign::designtpl('lhuser/parts/canned_messages.tpl.php'));?>
  	</div>
  	<?php endif;?>
  	
  	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhuser','allowtochoosependingmode')) : ?>
    <div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_pending') : ?>active<?php endif;?>" id="pending">

		<form action="<?php echo erLhcoreClassDesign::baseurl('user/account')?>" method="post">
    
    	  	<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>
        
            <div class="form-group">
				<label><input type="checkbox" name="showAllPendingEnabled" value="1" <?php erLhcoreClassModelUserSetting::getSetting('show_all_pending',1) == 1 ? print 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','I can see all pending chats, not only assigned to me');?></label>
			</div>

			<input type="submit" class="btn btn-default" name="UpdatePending_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Update');?>" />

		</form>
	</div>
    <?php endif; ?>
    
    <?php if (erLhcoreClassUser::instance()->hasAccessTo('lhspeech','changedefaultlanguage')) : ?>
    <div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_speech') : ?>active<?php endif;?>" id="speech">

		<form action="<?php echo erLhcoreClassDesign::baseurl('user/account')?>" method="post">

	  	<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>

	  	<?php $dataSpeech = array(
	  	        'language' => erLhcoreClassModelUserSetting::getSetting('speech_language',''),
	  	        'dialect' => erLhcoreClassModelUserSetting::getSetting('speech_dialect',''),
	  	        'optional' => true,
	  	    );
	  	?>
	  	
		<?php include(erLhcoreClassDesign::designtpl('lhspeech/speech_form_fields.tpl.php'));?>
		
		<input type="submit" class="btn btn-default" name="UpdateSpeech_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Update');?>" />

		</form>
	</div>
  <?php endif; ?>
  
</div>

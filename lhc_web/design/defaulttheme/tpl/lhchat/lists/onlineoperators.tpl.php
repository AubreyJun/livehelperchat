<ul class="circle small-list">
<?php foreach ($online_operators as $operator) : ?>
	<li><a href="#" onclick="window.open('<?php echo erLhcoreClassDesign::baseurl('chat/startchatwithoperator')?>/<?php echo $operator->user->id?>','operatorchatwindow-<?php echo $operator->user->id?>','menubar=1,resizable=1,width=600,height=450');" class="small button round"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/syncadmininterface','Send message');?></a> <?php echo htmlspecialchars($operator->user->name).' '.htmlspecialchars($operator->user->surname); ?> | <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/syncadmininterface','Last activity');?>: <?php echo $operator->user->lastactivity_ago ?> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/syncadmininterface','ago');?>.</li>
<?php endforeach; ?>
</ul>
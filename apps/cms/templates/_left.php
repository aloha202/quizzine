<ul id="sf_admin_menu">

    <?php if($sf_user->isSuper()): ?>

        <?php $items = sfConfig::get('app_sf_admin_dash_menu'); ?>
    <?php else: ?>

        <?php $items = sfConfig::get('app_sf_admin_dash_menu2'); ?>


    <?php endif; ?>

    <?php foreach($items as $name => $item): ?>


        <?php if(!empty($item['items'])): ?>
            <li>
                <a href="javascript:void(0);">
                    <?php if(!empty($item['icon'])): ?><i class="fa fa-<?php echo $item['icon']; ?>"></i><?php endif; ?>
                    <i class="fa fa-angle-double-down i-right"></i>
                    <?php echo __($name); ?>
                    <span class='new_messages_parent'></span>
                </a>
                <ul>
                    <?php foreach($item['items'] as $name2 => $item2): ?>
                        <li class='<?php echo $sf_context->matchesUrl($item2['url']) ? 'active' : ''; ?>'>
                            <a href="<?php echo url_for($item2['url']); ?>"><?php if(!empty($item2['icon'])): ?><i class="fa fa-<?php echo $item2['icon']; ?>"></i><?php endif; ?> <?php echo __($name2); ?>
                                <?php if(!empty($item2['new_messages'])): ?>
                                    <?php include_component('util', 'new_messages_count', array('model' => $item2['new_messages'])); ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php else: ?>
            <li class='<?php echo $sf_context->matchesUrl($item2['url']) ? 'active' : ''; ?>'>
                <a href="<?php echo url_for($item['url']); ?>"><?php if(!empty($item['icon'])): ?><i class="fa fa-<?php echo $item['icon']; ?>"></i><?php endif; ?> <?php echo __($name); ?>
                    <?php if(!empty($item['new_messages'])): ?>
                        <?php include_component('util', 'new_messages_count', array('model' => $item['new_messages'])); ?>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>


    <?php endforeach; ?>









	

</ul>

          <?php if($sf_user->isSuper()): ?>
<ul class='developer'>
    <li class='node'><a href='<?php echo url_for('settings_sys/index'); ?>' target='_blank'><?php echo __('Разработчик'); ?></a>
        <ul>
            <li class='item'><a href='<?php echo url_for('settings_sys/index'); ?>'><?php echo __('Системные настройки'); ?></a></li>
            <li class='item'><a href='<?php echo url_for('email_error/index'); ?>'><?php echo __('Ошибки электронной почты'); ?></a></li>            
            <li class='item'><a href='<?php echo url_for('menu_root/index'); ?>'><?php echo __('Меню'); ?></a></li>                        
            <li class='item'><a href='<?php echo url_for('text_block_sys/index'); ?>'><?php echo __('Текстовые блоки'); ?></a></li>                                    
            <li class='item'><a href='<?php echo url_for('todo_sys/index'); ?>'><?php echo __('ToDo'); ?></a></li>                                    			

            <li class='item'><a href='<?php echo url_for('dashboard/developerOff'); ?>' class='danger'><?php echo __('Выключить разработчика'); ?></a></li>
        </ul>        
    </li>
    <li class='node'><a href='<?php echo url_for('test/index'); ?>' target='_blank'><?php echo __('Тест'); ?></a>
        <ul>
            <li class='item'><a href='<?php echo url_for('test/sendmail'); ?>'><?php echo __('Отправка писем'); ?></a></li>
        </ul>
    </li>      
    <li class='node'><a href='<?php echo url_for('wiki/index'); ?>' target='_blank'><?php echo __('Вики'); ?></a>
        <ul>
            <?php include_component('wiki', 'menu'); ?>            
            <li class='item'><a href='<?php echo url_for('wiki/new'); ?>' class='green'><?php echo __('Добавить'); ?></a></li>            
        </ul>
    </li>    
</ul>
          <?php endif; ?>
          <?php if($sf_context->isEditor()): ?>
<ul class='developer editor'>
            <li class='node'><a href='<?php echo url_for('localization/index'); ?>'><?php echo __('Локализация'); ?></a></li>                                                
</ul>
<?php endif; ?>



<script type='text/javascript'>

    $(function(){
       $('#sf_admin_menu li li.active').each(function(){
           $(this).parents('li').addClass('active selected');
           //$(this).parents('li>a').click();
       }) ;
    });


</script>
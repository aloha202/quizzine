<script type="text/javascript">


    setTimeout(function(){
        console.log($('.sf_widget_form_schema_formatter_blank input[type=checkbox]').size());
        $('.sf_widget_form_schema_formatter_blank input[type=checkbox]').change(function(){
            var me = this;
            if($(this).prop('checked')){
                $('.sf_widget_form_schema_formatter_blank input[type=checkbox]').each(function(){
                    if($(this).prop('name') != $(me).prop('name')){
                        $(this).prop('checked', false);
                        this._ins.parent().removeClass('checked');
                    }
                });
            }

        })
    }, 1000);


</script>
<?php $this->widget('bootstrap.widgets.TbTypeahead', array(
    'name'=>'typeahead',
    'options'=>array(
        'source'=>Kota::lookupKota(),
        'items'=>4,
        'matcher'=>"js:function(item) {
            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
        }",
    ),
)); ?>
<?php echo $form->textFieldRow($model, 'kdsatker', 
array('prepend'=>'<form action=""><button type="button" class="button" onclick=""
style="margin: -3px -3px 3px -3px; width: 22px; height: 24px; 
"></button></form>',
'style'=>'width: 50px')); ?>
<style>
.button {
display: inline-block;
padding: 2px 2px;
font-size: 10px;
cursor: pointer;
text-align: center;
text-decoration: none;
outline: none;
color: #fff;
background-color: #008CBA;
border: none;
border-radius: 3px;
box-shadow: 0 2px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
background-color: #3e8e41;
box-shadow: 0 1px #666;
transform: translateY(1px);
}
</style>
<?php
   
   $this->widget(
    'TbMenu',
    array(
         'type'  => 'tabs',
         'items' => DbrLib::getRangeMenuArray($model->dol_date_range, 'RememberBfrfFuelRefill[bcbd_date_range]'),
        )); 
     ?>
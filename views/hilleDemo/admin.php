<?php
$this->setPageTitle(
    Yii::t('HillModule.model', 'Hille Demos')
    . ' - '
    . Yii::t('HillModule.crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('HillModule.model', 'Hille Demos');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'hille-demo-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('HillModule.model', 'Hille Demos'); ?>
        <small><?php echo Yii::t('HillModule.crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_search_range', array('model' => $model,)); 

 $this->widget(
            'TbMenu', array(
        'type' => 'tabs',
        'items' => array(array('label' => 'Active', 'url'=> ''),array('label' => 'New', 'url'=>''), array('label'=> ' Closed','url'=>''))       
    ));

?>
<?php Yii::beginProfile('HilleDemo.view.grid'); ?>



<?php
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
   filter_HilleDemo_dol_date_range_init();
}
");
$this->widget('TbGridView',
    array(
        'id' => 'hille-demo-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{items}{summary}{pager}',
        'type'=>'bordered condensed',
        'rowCssClassExpression' => '$data->cssclass',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'afterAjaxUpdate' => 'reinstallDatePicker',
        'columns' => array(
             array(
                //int(11) unsigned
                
                'name' => 'hill_id',
                
                    //'placement' => 'right',
               
            ),
        
           
            array(
                //varchar(100)
                'class' => 'editable.EditableColumn',
                'name' => 'hill_order_nr',
                'editable' => array(
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //varchar(100)
                'class' => 'editable.EditableColumn',
                'name' => 'hill_ref_id',
                'editable' => array(
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_pol',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    'source' => CHtml::listData(CcitCity::model()->findAll(array('limit' => 1000)), 'ccit_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_destination',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    'source' => CHtml::listData(CcitCity::model()->findAll(array('limit' => 1000)), 'ccit_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_dol',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                 ),   
                 'filter' => $this->widget('application.widgets.TbFilterDateRangePicker', 
                 array(
                'model' => $model,
                'attribute' => 'dol_date_range',
             ), TRUE ),
                
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_carrier_id',
                'filter' => CHtml::listData(CcmpCompany::model()->findAll(array('limit' => 1000,'order'=>'ccmp_name')), 'ccmp_id', 'ccmp_name'),
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    'source' => CHtml::listData(CcmpCompany::model()->findAll(array('limit' => 1000)), 'ccmp_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                //varchar(100)
                'class' => 'editable.EditableColumn',
                'name' => 'hill_truck_nr',
                'editable' => array(
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    //'placement' => 'right',
                )
            ),
          
            array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'hill_cargo',
                    'editable' => array(
                        'type' => 'select',
                        'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                        'source' => $model->getEnumFieldLabels('hill_cargo'),
                        //'placement' => 'right',
                    ),
                   'filter' => $model->getEnumFieldLabels('hill_cargo'),
                ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_importer_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    'source' => CHtml::listData(CcmpCompany::model()->findAll(array('limit' => 1000)), 'ccmp_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_status',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    'source' => CHtml::listData(StstState::model()->findAll(array('limit' => 1000)), 'stst_id', 'itemLabel'),                        
                    'placement' => 'right',
                  ),  
            //    'value' => "<span class=\"label label-large label-success arrowed-in\"></span>" ,
//                'value' => function($data) {
//            
//                  switch ($data->hill_status){
//                     case 1 :  return '<span class="label label-large label-success arrowed-in">' . 'New' . '</span>';
//                     case 2 :  return '<span class="label label-large label-warning arrowed-in">' . 'Active'. '</span>';
//                     case 3 :  return '<span class="label label-large label-yellow arrowed-in">' . 'Closed' . '</span>';
//            }
//                }   
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'hill_planned_arrival',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Hill.HilleDemo.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Hill.HilleDemo.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Hill.HilleDemo.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("hill_id" => $data->hill_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("hill_id" => $data->hill_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("hill_id" => $data->hill_id))',
                'viewButtonOptions'=>array('data-toggle'=>'tooltip'),   
                'updateButtonOptions'=>array('data-toggle'=>'tooltip'),   
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),   
            ),
        )
    )
);
?>
<?php Yii::endProfile('HilleDemo.view.grid'); ?>

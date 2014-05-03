<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    
    <div class="row">
        <?php echo $form->label($model, 'hill_id'); ?>
        <?php ; ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_order_nr'); ?>
        <?php echo $form->textField($model, 'hill_order_nr', array('size' => 60, 'maxlength' => 100)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_ref_id'); ?>
        <?php echo $form->textField($model, 'hill_ref_id', array('size' => 60, 'maxlength' => 100)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_pol'); ?>
        <?php echo $form->textField($model, 'hill_pol', array('size' => 11, 'maxlength' => 11)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_destination'); ?>
        <?php echo $form->textField($model, 'hill_destination', array('size' => 11, 'maxlength' => 11)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_dol'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'model' => $model,
                                 'attribute' => 'hill_dol',
                                 'language' =>  strstr(Yii::app()->language.'_','_',true),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );
                    ; ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_carrier_id'); ?>
        <?php echo $form->textField($model, 'hill_carrier_id', array('size' => 11, 'maxlength' => 11)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_truck_nr'); ?>
        <?php echo $form->textField($model, 'hill_truck_nr', array('size' => 60, 'maxlength' => 100)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_cargo'); ?>
        <?php echo CHtml::activeDropDownList($model, 'hill_cargo', $model->getEnumFieldLabels('hill_cargo')); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_importer_id'); ?>
        <?php echo $form->textField($model, 'hill_importer_id', array('size' => 11, 'maxlength' => 11)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_status'); ?>
        <?php echo $form->textField($model, 'hill_status'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_notes'); ?>
        <?php echo $form->textArea($model, 'hill_notes', array('rows' => 6, 'cols' => 50)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'hill_planned_arrival'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'model' => $model,
                                 'attribute' => 'hill_planned_arrival',
                                 'language' =>  strstr(Yii::app()->language.'_','_',true),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );
                    ; ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('HillModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->

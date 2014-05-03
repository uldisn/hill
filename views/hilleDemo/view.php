<?php
    $this->setPageTitle(
        Yii::t('HillModule.model', 'Hille Demo')
        . ' - '
        . Yii::t('HillModule.crud', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('HillModule.model','Hille Demos')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('HillModule.crud', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('HillModule.model','Hille Demo')?>
        <small>
            <?php echo $model->itemLabel ?>

        </small>

        </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<div class="row">
    <div class="span12">
        <h2>
            <?php echo Yii::t('HillModule.crud','Data')?>            <small>
                #<?php echo $model->hill_id ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                array(
                        'name' => 'hill_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_id',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'hill_order_nr',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_order_nr',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'hill_ref_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_ref_id',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'hill_pol',
            'value' => ($model->hillPol !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->hillPol->itemLabel,
                            array('/hill/ccitCity/view','ccit_id' => $model->hillPol->ccit_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/hill/ccitCity/update','ccit_id' => $model->hillPol->ccit_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
        array(
            'name' => 'hill_destination',
            'value' => ($model->hillDestination !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->hillDestination->itemLabel,
                            array('/hill/ccitCity/view','ccit_id' => $model->hillDestination->ccit_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/hill/ccitCity/update','ccit_id' => $model->hillDestination->ccit_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'hill_dol',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_dol',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'hill_carrier_id',
            'value' => ($model->hillCarrier !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->hillCarrier->itemLabel,
                            array('/hill/ccmpCompany/view','ccmp_id' => $model->hillCarrier->ccmp_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/hill/ccmpCompany/update','ccmp_id' => $model->hillCarrier->ccmp_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'hill_truck_nr',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_truck_nr',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'hill_cargo',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_cargo',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'hill_importer_id',
            'value' => ($model->hillImporter !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->hillImporter->itemLabel,
                            array('/hill/ccmpCompany/view','ccmp_id' => $model->hillImporter->ccmp_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/hill/ccmpCompany/update','ccmp_id' => $model->hillImporter->ccmp_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
        array(
            'name' => 'hill_status',
            'value' => ($model->hillStatus !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->hillStatus->itemLabel,
                            array('/hill/ststState/view','stst_id' => $model->hillStatus->stst_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/hill/ststState/update','stst_id' => $model->hillStatus->stst_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'hill_notes',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_notes',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'hill_planned_arrival',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'hill_planned_arrival',
                                'url' => $this->createUrl('/hill/hilleDemo/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); ?>
    </div>

    </div>
    <div class="row">

    <div class="span12">
        <div class="well">
            <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>        </div>
        <div class="well">
            <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model)); ?>        </div>
    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
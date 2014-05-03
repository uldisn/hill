<?php
$this->setPageTitle(
        Yii::t('HillModule.model', 'Hille Demo')
        . ' - '
        . Yii::t('HillModule.crud', 'Update')
        . ': '   
        . $model->getItemLabel()
);    
$this->breadcrumbs[Yii::t('HillModule.model','Hille Demos')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('HillModule.crud', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        
        <?php echo Yii::t('HillModule.model','Hille Demo'); ?>
        <small>
            <?php echo $model->itemLabel ?>

        </small>

        
    </h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<?php
    $this->renderPartial('_form', array('model' => $model));
?>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
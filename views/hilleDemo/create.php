<?php
$this->setPageTitle(
    Yii::t('HillModule.model', 'Hille Demo')
    . ' - '
    . Yii::t('HillModule.crud', 'Create')
);

$this->breadcrumbs[Yii::t('HillModule.model', 'Hille Demos')] = array('admin');
$this->breadcrumbs[] = Yii::t('HillModule.crud', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('HillModule.model', 'Hille Demo'); ?>
        <small><?php echo Yii::t('HillModule.crud', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>

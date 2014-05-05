<?php


class HilleDemoController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";


public function filters()
{
    return array(
        'accessControl',
    );
}

public function accessRules()
{
     return array(
        array(
            'allow',
            'actions' => array('create', 'admin', 'view', 'update', 'editableSaver', 'delete','ajaxCreate'),
            'roles' => array(),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array(),
        ),
        array(
            'allow',
            'actions' => array('view', 'admin'), // let the user view the grid
            'roles' => array('Hill.HilleDemo.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Hill.HilleDemo.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Hill.HilleDemo.Delete'),
        ),
        array(
            'deny',
            'users' => array('*'),
        ),
    );
}

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

    public function actionView($hill_id)
    {
        $model = $this->loadModel($hill_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new HilleDemo;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'hille-demo-form');

        if (isset($_POST['HilleDemo'])) {
            $model->attributes = $_POST['HilleDemo'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'hill_id' => $model->hill_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('hill_id', $e->getMessage());
            }
        } elseif (isset($_GET['HilleDemo'])) {
            $model->attributes = $_GET['HilleDemo'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($hill_id)
    {
        $model = $this->loadModel($hill_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'hille-demo-form');

        if (isset($_POST['HilleDemo'])) {
            $model->attributes = $_POST['HilleDemo'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'hill_id' => $model->hill_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('hill_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('TbEditableSaver');
        $es = new TbEditableSaver('HilleDemo'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value, $no_ajax = 0) 
    {
        $model = new HilleDemo;
        $model->$field = $value;
        try {
            if ($model->save()) {
                if($no_ajax){
                    $this->redirect(Yii::app()->request->urlReferrer);
                }            
                return TRUE;
            }else{
                return var_export($model->getErrors());
            }            
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }
    
    public function actionDelete($hill_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($hill_id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!isset($_GET['ajax'])) {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        } else {
            throw new CHttpException(400, Yii::t('HillModule.crud', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionAdmin()
    {
        $model = new HilleDemo('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['HilleDemo'])) {
            $model->attributes = $_GET['HilleDemo'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = HilleDemo::model();
        // apply scope, if available
        $scopes = $m->scopes();
        if (isset($scopes[$this->scope])) {
            $m->{$this->scope}();
        }
        $model = $m->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('HillModule.crud', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'hille-demo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

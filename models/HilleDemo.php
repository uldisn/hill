<?php

// auto-loading
Yii::setPathOfAlias('HilleDemo', dirname(__FILE__));
Yii::import('HilleDemo.*');

class HilleDemo extends BaseHilleDemo
{

    public $dol_date_range;  
    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }
    
      public function getCssClass(){
        
       
        if ($this->hill_status == 1) return 'row-notpaid';
        elseif ($this->hill_status == 2) return 'row-paid';
        elseif ($this->hill_status == 3) return 'row-partlypaid';
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }
    
    public function searchCriteria($criteria = null)
    {

        $criteria = parent::searchCriteria($criteria);


        if(!empty($this->dol_date_range)){
            $criteria->AddCondition("hill_dol >= '".substr($this->dol_date_range,0,10)."'");
            $criteria->AddCondition("hill_dol <= '".substr($this->dol_date_range,-10)."'");
        }

        return $criteria;

    }    

}

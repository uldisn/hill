<?php

/**
 * This is the model base class for the table "hille_demo".
 *
 * Columns in table "hille_demo" available as properties of the model:
 * @property string $hill_id
 * @property string $hill_order_nr
 * @property string $hill_ref_id
 * @property string $hill_pol
 * @property string $hill_destination
 * @property string $hill_dol
 * @property string $hill_carrier_id
 * @property string $hill_truck_nr
 * @property string $hill_cargo
 * @property string $hill_importer_id
 * @property integer $hill_status
 * @property string $hill_notes
 * @property string $hill_planned_arrival
 *
 * Relations of table "hille_demo" available as properties of the model:
 * @property CcmpCompany $hillCarrier
 * @property CcitCity $hillDestination
 * @property CcmpCompany $hillImporter
 * @property CcitCity $hillPol
 * @property StstState $hillStatus
 */
abstract class BaseHilleDemo extends CActiveRecord
{
    /**
    * ENUM field values
    */
    const HILL_CARGO_SPIRITS = 'SPIRITS';
    const HILL_CARGO_WINE = 'WINE';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'hille_demo';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('hill_order_nr, hill_ref_id', 'required'),
                array('hill_pol, hill_destination, hill_dol, hill_carrier_id, hill_truck_nr, hill_cargo, hill_importer_id, hill_status, hill_notes, hill_planned_arrival', 'default', 'setOnEmpty' => true, 'value' => null),
                array('hill_status', 'numerical', 'integerOnly' => true),
                array('hill_order_nr, hill_ref_id, hill_truck_nr', 'length', 'max' => 100),
                array('hill_pol, hill_destination, hill_carrier_id, hill_importer_id', 'length', 'max' => 11),
                array('hill_cargo', 'length', 'max' => 7),
                array('hill_dol, hill_notes, hill_planned_arrival', 'safe'),
                array('hill_id, hill_order_nr, hill_ref_id, hill_pol, hill_destination, hill_dol, hill_carrier_id, hill_truck_nr, hill_cargo, hill_importer_id, hill_status, hill_notes, hill_planned_arrival', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->hill_order_nr;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'hillCarrier' => array(self::BELONGS_TO, 'CcmpCompany', 'hill_carrier_id'),
                'hillDestination' => array(self::BELONGS_TO, 'CcitCity', 'hill_destination'),
                'hillImporter' => array(self::BELONGS_TO, 'CcmpCompany', 'hill_importer_id'),
                'hillPol' => array(self::BELONGS_TO, 'CcitCity', 'hill_pol'),
                'hillStatus' => array(self::BELONGS_TO, 'StstState', 'hill_status'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'hill_id' => Yii::t('HillModule.model', 'Hill'),
            'hill_order_nr' => Yii::t('HillModule.model', 'Hill Order Nr'),
            'hill_ref_id' => Yii::t('HillModule.model', 'Hill Ref'),
            'hill_pol' => Yii::t('HillModule.model', 'Hill Pol'),
            'hill_destination' => Yii::t('HillModule.model', 'Hill Destination'),
            'hill_dol' => Yii::t('HillModule.model', 'Hill Dol'),
            'hill_carrier_id' => Yii::t('HillModule.model', 'Hill Carrier'),
            'hill_truck_nr' => Yii::t('HillModule.model', 'Hill Truck Nr'),
            'hill_cargo' => Yii::t('HillModule.model', 'Hill Cargo'),
            'hill_importer_id' => Yii::t('HillModule.model', 'Hill Importer'),
            'hill_status' => Yii::t('HillModule.model', 'Hill Status'),
            'hill_notes' => Yii::t('HillModule.model', 'Hill Notes'),
            'hill_planned_arrival' => Yii::t('HillModule.model', 'Hill Planned Arrival'),
        );
    }

    public function enumLabels()
    {
        return array(
           'hill_cargo' => array(
               self::HILL_CARGO_SPIRITS => Yii::t('HillModule.model', 'HILL_CARGO_SPIRITS'),
               self::HILL_CARGO_WINE => Yii::t('HillModule.model', 'HILL_CARGO_WINE'),
           ),
            );
    }

    public function getEnumFieldLabels($column){

        $aLabels = $this->enumLabels();
        return $aLabels[$column];
    }

    public function getEnumLabel($column,$value){

        $aLabels = $this->enumLabels();

        if(!isset($aLabels[$column])){
            return $value;
        }

        if(!isset($aLabels[$column][$value])){
            return $value;
        }

        return $aLabels[$column][$value];
    }


    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.hill_id', $this->hill_id, true);
        $criteria->compare('t.hill_order_nr', $this->hill_order_nr, true);
        $criteria->compare('t.hill_ref_id', $this->hill_ref_id, true);
        $criteria->compare('t.hill_pol', $this->hill_pol);
        $criteria->compare('t.hill_destination', $this->hill_destination);
        $criteria->compare('t.hill_dol', $this->hill_dol, true);
        $criteria->compare('t.hill_carrier_id', $this->hill_carrier_id);
        $criteria->compare('t.hill_truck_nr', $this->hill_truck_nr, true);
        $criteria->compare('t.hill_cargo', $this->hill_cargo, true);
        $criteria->compare('t.hill_importer_id', $this->hill_importer_id);
        $criteria->compare('t.hill_status', $this->hill_status);
        $criteria->compare('t.hill_notes', $this->hill_notes, true);
        $criteria->compare('t.hill_planned_arrival', $this->hill_planned_arrival, true);


        return $criteria;

    }

}

<?php
/**
 * Database CheckBox Widget
 *
 * @version    1.0
 * @package    widget_web
 * @subpackage form
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2013 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TDBCheckGroup extends TCheckGroup
{
    protected $items; // array containing the combobox options
    
    /**
     * Class Constructor
     * @param  $name     widget's name
     * @param  $database database name
     * @param  $model    model class name
     * @param  $key      table field to be used as key in the combo
     * @param  $value    table field to be listed in the combo
     * @param  $ordercolumn column to order the fields (optional)
     */
    public function __construct($name, $database, $model, $key, $value, $ordercolumn = NULL)
    {
        // executes the parent class constructor
        parent::__construct($name);
        
        // carrega objetos do banco de dados
        TTransaction::open($database);
        // instancia um repositório de Estado
        $repository = new TRepository($model);
        $criteria = new TCriteria;
        $criteria->setProperty('order', isset($ordercolumn) ? $ordercolumn : $key);
        // carrega todos objetos
        $collection = $repository->load($criteria);
        
        // adiciona objetos na combo
        if ($collection)
        {
            $items = array();
            foreach ($collection as $object)
            {
                $items[$object->$key] = $object->$value;
            }
            parent::addItems($items);
        }
        TTransaction::close();
    }
}
?>
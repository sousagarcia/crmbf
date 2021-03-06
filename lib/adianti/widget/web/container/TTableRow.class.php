<?php
/**
 * TableRow: Represents a row inside a table
 *
 * @version    1.0
 * @package    widget_web
 * @subpackage container
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2013 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TTableRow extends TElement
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct('tr');
    }
    
    /**
     * Add a new cell (TTableCell) to the Table Row
     * @param  $value Cell Content
     * @return TTableCell
     */
    public function addCell($value)
    {
        if (is_null($value))
        {
            throw new Exception(TAdiantiCoreTranslator::translate('Method ^1 does not accept null values', __METHOD__));
        }
        else
        {
            // creates a new Table Cell
            $cell = new TTableCell($value);
            parent::add($cell);
            // returns the cell object
            return $cell;
        }
    }
}
?>
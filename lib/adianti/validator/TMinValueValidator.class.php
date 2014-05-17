<?php
/**
 * Minimum value validation
 *
 * @version    1.0
 * @package    validator
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2013 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TMinValueValidator extends TFieldValidator
{
    /**
     * Validate a given value
     * @param $label Identifies the value to be validated in case of exception
     * @param $value Value to be validated
     * @param $parameters aditional parameters for validation (min value)
     */
    public function validate($label, $value, $parameters = NULL)
    {
        $minvalue = $parameters[0];
        
        if ($value < $minvalue)
        {
            throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 can not be less than ^2', $label, $minvalue));
        }
    }
}
?>
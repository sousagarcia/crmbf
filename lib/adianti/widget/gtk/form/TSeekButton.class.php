<?php
/**
 * Record Lookup Widget: creates a lookup field used to search values from associated entities
 * 
 * @version    1.0
 * @package    widget_gtk
 * @subpackage form
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2013 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TSeekButton extends GtkHBox implements IWidget
{
    private $action;
    private $auxiliar;
    private $entry;
    private $btn;
    private $validations;
    private $useOutEvent;
    protected $formName;
    
    /**
     * Class Constructor
     * @param $name Name of the widget
     */
    public function __construct($name)
    {
        parent::__construct();
        $this->wname = $name;
        $this->entry = new GtkEntry;
        $this->btn   = new TButton('find');
        $this->btn->set_image(new TImage('lib/adianti/images/ico_find.png'));
        $this->btn->set_relief(Gtk::RELIEF_NONE);
        
        $this->useOutEvent = TRUE;
        $this->validations = array();
        
        parent::pack_start($this->entry, false, false);
        parent::pack_start($this->btn, false, false);
    }
    
    /**
     * Define it the out event will be fired
     */
    public function setUseOutEvent($bool)
    {
        $this->useOutEvent = $bool;
    }
    
    /**
     * Define the action for the SeekButton
     * @param $action Action taken when the user clicks over the Seek Button (A TAction object)
     */
    public function setAction(TAction $action)
    {
        $callback=$action->getAction();
        $this->btn->setAction($action, '');
        $param=array();
        if (is_array($callback))
        {
            $classname = get_class($callback[0]);
            if ($classname == 'TStandardSeek')
            {
                $param['key'] = 3;
                $param['parent'] = $action->getParameter('parent');
                $param['database'] = $action->getParameter('database');
                $param['model'] =  $action->getParameter('model');
                $param['display_field'] = $action->getParameter('display_field');
                $param['receive_key'] =   $action->getParameter('receive_key');
                $param['receive_field'] = $action->getParameter('receive_field');
            }
        }
        
        if ($this->useOutEvent)
        {
            // get_text aqui não é on-the-fly, tem que chamar um método na hora do evento
            $this->entry->connect_simple('focus-out-event', array($this, 'onBlur'), $callback, $param);
        }
    }
    
    /**
     * Define the action to be executed when the user leaves the form field
     * @param $action TAction object
     */
    function setExitAction(TAction $action)
    {
        $this->exitAction = $action;
        $this->entry->connect_after('focus-out-event', array($this, 'onExecuteExitAction'));
    }
    
    /**
     * Execute the exit action
     */
    public function onExecuteExitAction()
    {
        $callback = $this->exitAction->getAction();
        $param = (array) TForm::retrieveData($this->formName);
        call_user_func($callback, $param);
    }
    
    /**
     * When the user leaves the input, collects the text and executes the callback
     * @param $callback = Callback to be executed
     * @param $param    = array of parameters
     * @ignore-autocomplete on
     */
    public function onBlur($callback, $param)
    {
        if (is_callable($callback))
        {
            $param['key'] = $this->entry->get_text();
            call_user_func(array($callback[0], 'onSelect'), $param);
        }
    }
    
    /**
     * Define an auxiliar field
     * @param $object any TField object
     */
    public function setAuxiliar(GtkObject $object)
    {
        $this->auxiliar = $object;
        parent::pack_start($this->auxiliar, false, false);
    }
    
    /**
     * Define the widget's name 
     * @param $name Widget's Name
     */
    public function setName($name)
    {
        $this->wname = $name;
    }
    
    /**
     * Returns the name of the widget
     * @return A string containing the name of the widget
     */
    public function getName()
    {
        return $this->wname;
    }
    
    /**
     * Define the widget's content
     * @param  $value  widget's content
     */
    public function setValue($value)
    {
        $this->entry->set_text($value);
    }
    
    /**
     * Return the widget's content
     * @return A string containing the widget's content
     */
    public function getValue()
    {
        return $this->entry->get_text();
    }
    
    /**
     * Define the name of the form to wich the button is attached
     * @param $name    A string containing the name of the form
     * @ignore-autocomplete on
     */
    public function setFormName($name)
    {
        $this->formName = $name;
    }
    
    /**
     * Define the widget's size
     * @param $size Widget's size in pixels
     */
    public function setSize($size)
    {
        $this->entry->set_size_request($size, 24);
    }
    
    /**
     * Define if the widget is editable
     * @param $boolean A boolean
     */
    public function setEditable($editable)
    {
        $this->entry->set_sensitive($editable);
    }
    
    /**
     * Return if the widget is editable
     */
    public function getEditable()
    {
        return $this->entry->get_sensitive();
    }
    
    /**
     * Add a field validator
     * @param $validator TFieldValidator object
     */
    public function addValidation($label, TFieldValidator $validator, $parameters = NULL)
    {
        $this->validations[] = array($label, $validator, $parameters);
    }
    
    /**
     * Validate a field
     * @param $validator TFieldValidator object
     */
    public function validate()
    {
        if ($this->validations)
        {
            foreach ($this->validations as $validation)
            {
                $label      = $validation[0];
                $validator  = $validation[1];
                $parameters = $validation[2];
                
                $validator->validate($label, $this->getValue(), $parameters);
            }
        }
    }
}
?>
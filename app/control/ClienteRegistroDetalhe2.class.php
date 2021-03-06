<?php

/**
 * ClienteForm Registration
 *
 * @version    1.0
 * @package    db_crmbf
 * @subpackage CRMBF
 * @author     Jackson Meires
 */
class ClienteRegistroDetalhe extends TPage {

    private $form; // form
    private $form2; // form

    /**
     * Class constructor
     * Creates the page and the registration form
     */

    function __construct() {
        parent::__construct();
        // creates the form
        $this->form = new TForm('form_clienteRegistro Detalhe');

        // creates a table
        $table = new TTable;
        $panel = new TPanel(480, 260);

        $notebook = new TNotebook(500, 250);
        // add the notebook inside the form
        $this->form->add($notebook);

        // add the notebook inside the form
        $this->form->add($table);

        // create the form fields
        $city_id2 = new TSeekButton('city_id2');
        $city_name2 = new TEntry('city_name2');

        $city_id2->setSize(100);
        $city_name2->setEditable(FALSE);


        //dados do cliente CRM
        TTransaction::open('db_crmbf');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('cliente_id', '=', $_GET['key']));
//       
        $repository = new TRepository('CRM');
        $CRM = $repository->load($criteria);

        foreach ($CRM as $crms) {
            $codigoCRM = $crms->id;
            $tituloCRM = $crms->titulo;
            $projetoCRM = $crms->projeto_nome;
            $dataCRM = $crms->data_crm;
            $tempoCRM = $crms->tempo;
            $porcentagemCRM = $crms->porcentagem;
            $descricaoCRM = $crms->descricao;
            $solicitanteCRM = $crms->solicitante;
            $usuarioalteracaoCRM = $crms->usuarioalteracao;
            $responsavel_nomeCRM = $crms->responsavel_nome;
            $tipo_nomeCRM = $crms->tipo_nome;
            $cliente_nomeCRM = $crms->cliente_nome;
            $prioridade_nomeCRM = $crms->prioridade_nome;
            $status_nomeCRM = $crms->status_nome;
        }
        TTransaction::close();

        $notebook->appendPage('Registros CRMs', $table);

        $code = new TEntry('id');
        $crm_id = new TDBCombo('crm_id', 'db_crmbf', 'CRM', 'id', 'titulo');
        $tiporegistro_id = new TDBCombo('tiporegistro_id', 'db_crmbf', 'RegistroTipo', 'id', 'nome');
        $registro = new TText('registro');
        $temporegistro = new TEntry('tempo_registro');
//        $temporegistro->setEditable(false);
        $dataregistro = new TDate('data_registro');
        $hora_registro = new TEntry('hora_registro');
        $numero_registro = new TEntry('numero_registro');

        // define some properties for the form fields
        $code->setEditable(FALSE);
        $code->setSize(100);
        $crm_id->setSize(320);
        $crm_id->setEditable(FALSE);
        $registro->setSize(320);
        $temporegistro->setSize(160);
        //$temporegistro->setValue(date("d/m/Y H:i:s"));
        $tiporegistro_id->setSize(160);
        //$dataregistro->setRange(0,1000,1);
        $dataregistro->setSize(90);
        // $hora_registro->setRange(0,100,1);
        $hora_registro->setSize(150);
        $hora_registro->setTip('Horario EX: 8:14');
        $numero_registro->setSize(320);

        $row = $table->addRow();
        $row->addCell(new TLabel('Code:'));
        $row->addCell($code);

        // add a row for the field name
        $row = $table->addRow();
        $row->addCell(new TLabel('CRM Titulo:'));
        $cell = $row->addCell($crm_id);

        // add a row for the field Telefone
        $row = $table->addRow();
        $row->addCell(new TLabel('Tipo Registro:'));
        $cell = $row->addCell($tiporegistro_id);

        // add a row for the field Email
        $row = $table->addRow();
        $row->addCell(new TLabel('Tempo:'));
        $cell = $row->addCell($temporegistro);

        // add a row for the field celular
        $row = $table->addRow();
        $row->addCell(new TLabel('Data:'));
        $cell = $row->addCell($dataregistro);

        // add a row for the field skype
        $row = $table->addRow();
        $row->addCell(new TLabel('Hora:'));
        $cell = $row->addCell($hora_registro);

        // add a row for the field endereco
        $row = $table->addRow();
        $row->addCell(new TLabel('Numero Registro:'));
        $row->addCell($numero_registro);

        // add a row for the field name
        $row = $table->addRow();
        $row->addCell(new TLabel('Registro:'));
        $cell = $row->addCell($registro);

        // $notebook->appendPage('Cidade', $table_contact);
//        $notebook->appendPage('Skill (aggregation)', $table_skill);
        // create the form fields
//        $code = new TEntry('id');
//        $nome = new TEntry('nome');
//        $email = new TEntry('email');
//        $telefone = new TEntry('telefone');
//        $celular = new TEntry('celular');
//        $skype = new TEntry('skype');
//        $endereco = new TEntry('endereco');
////        $cidade_id = new TSeekButton('cidade_id');
//        $cidade_id = new TDBCombo('cidade_id', 'db_crmbf', 'Cidade', 'id', 'nome');
//        $birthdate = new TDate('birthdate');
//        $email = new TEntry('email');
//        $gender = new TRadioGroup('gender');
//        $status = new TCombo('status');
//        $contacts_list = new TMultiField('contacts_list');
        // add field validators
//        $nome->addValidation('Nome', new TRequiredValidator);
//        $cidade_id->addValidation('Cidade', new TRequiredValidator);
        // $birthdate->addValidation('Birthdate', new TRequiredValidator);
//        $cidade_id->addValidation('Category', new TRequiredValidator);
        //$obj = new CidadeFormList;
        //$cidade_id->setAction(new TAction(array($obj, 'onReload')));
//        $itemGender = array();
//        $itemGender['M'] = 'Male';
//        $itemGender['F'] = 'Female';
//        // add the combo options
//        $gender->addItems($itemGender);
//        $gender->setLayout('horizontal');
//
//        $itemStatus = array();
//        $itemStatus['S'] = 'Single';
//        $itemStatus['C'] = 'Committed';
//        $itemStatus['M'] = 'Married';
//        $status->addItems($itemStatus);
        // define some properties for the form fields
//        $code->setEditable(FALSE);
//        $code->setSize(100);
//        $nome->setSize(320);
//        $email->setSize(160);
//        $telefone->setSize(160);
//        $celular->setSize(160);
//        $skype->setSize(160);
//        $endereco->setSize(320);
//        $cidade_id->setSize(150);
        //$cidade_id->setEditable(FALSE);
        // add a row for the field code

        $panel->put("CRM: ", $codigoCRM, 10, 5);
        $panel->put($tituloCRM, 10, 20);
        $panel->put($projetoCRM, 10, 40);
        $panel->put("Data de Criação: " . $dataCRM, 10, 75);
        $panel->put("Aberto por: " . $usuarioalteracaoCRM, 10, 95);
        $panel->put("Cliente: " . $cliente_nomeCRM, 10, 55);

        $panel->put("Responsavel: " . $responsavel_nomeCRM, 10, 110);
        $panel->put("Tipo: " . $tipo_nomeCRM, 10, 130);
        $panel->put("Percentual Conclusão: " . $porcentagemCRM, 10, 140);
        $panel->put("Tempo Gasto: " . $tempoCRM, 10, 160);
        $panel->put("Situação: " . $status_nomeCRM, 10, 180);

        $panel->put("Descrição: " . $descricaoCRM, 10, 200);
//        $row = $table->addRow();
//        $row->addCell(new TLabel('Titulo:'));
//        $row->addCell($tituloCRM);
//
//        // add a row for the field name
//        $row = $table->addRow();
//        $row->addCell(new TLabel('Projeto:'));
//        $cell = $row->addCell($projetoCRM);
//        $cell->colspan = 3;
//
//        // add a row for the field Email
//        $row = $table->addRow();
//        $row->addCell(new TLabel('DATA:'));
//        $cell = $row->addCell($dataCRM);
//        $cell->colspan = 3;
//
//        // add a row for the field Telefone
//        $row = $table->addRow();
//        $row->addCell(new TLabel('Tempo:'));
//        $cell = $row->addCell($tempoCRM);
//        $cell->colspan = 3;
//
//        // add a row for the field celular
//        $row = $table->addRow();
//        $row->addCell(new TLabel('Porcentagem:'));
//        $cell = $row->addCell($porcentagemCRM);
//
//        // add a row for the field skype
//        $row = $table->addRow();
//        $row->addCell(new TLabel('Solicitação:'));
//        $cell = $row->addCell($solicitanteCRM);
//        // add a row for the field endereco
//        $row = $table_data->addRow();
//        $row->addCell(new TLabel('Endereço:'));
//        $row->addCell($endereco);
//
//        // add a row for the field endereco
//        $row = $table_data->addRow();
//        $row->addCell(new TLabel('Cidade:'));
//        $row->addCell($cidade_id);
        // add a row for the field Category
//        $row = $table_data->addRow();
//        $row->addCell(new TLabel('Cidade:'));
//        $cell = $row->addCell($cidade_id);
        // add a row for the field city
//        $row=$table_data->addRow();
//        $row->addCell(new TLabel('Cidade:'));
//        $cell = $row->addCell($cidade_id);


        /*
          // add a row for the field Phone
          $row = $table_data->addRow();
          $row->addCell(new TLabel('Phone:'));
          $row->addCell($phone);

          // add a row for the field BirthDate
          $row->addCell(new TLabel('BirthDate:'));
          $row->addCell($birthdate);

          // add a row for the field status
          $row = $table_data->addRow();
          $row->addCell(new TLabel('Status:'));
          $cell = $row->addCell($status);

          // add a row for the field Email
          $row->addCell(new TLabel('Email:'));
          $cell = $row->addCell($email);

          // add a row for the field gender
          $row->addCell(new TLabel('Gender:'));
          $row->addCell($gender);

          $row = $table_contact->addRow();
          $cell = $row->addCell(new TLabel('<b>Contact</b>'));
          $cell->valign = 'top';

          // add two fields inside the multifield in the second sheet
          $contacts_list->setHeight(100);
          $contacts_list->setClass('Contact'); // define the returning class
          $contacts_list->addField('type', 'Contact Type: ', new TEntry('type'), 200);
          $contacts_list->addField('value', 'Contact Value: ', new TEntry('value'), 200);
          $row = $table_contact->addRow();
          $row->addCell($contacts_list);

          // create the radio button for the skills list
          $skill_list = new TDBCheckGroup('skill_list', 'samples', 'Skill', 'id', 'name');
          $table_skill->addRow()->addCell($lbl = new TLabel('Skills'));
          $table_skill->addRow()->addCell($skill_list);
          $lbl->setFontStyle('b');

         * 
         */
        // create an action button
        $button1 = new TButton('action1');
        $button1->setAction(new TAction(array($this, 'onSave')), 'Save');
        $button1->setImage('ico_save.png');

        // create an action button (go to list)
        $button2 = new TButton('list');
        $button2->setAction(new TAction(array('ClienteList', 'onReload')), 'Ir para Listagem');
        $button2->setImage('ico_datagrid.gif');
        // create an action button
        $button3 = new TButton('action3');
        $action3 = new TAction(array('RegistroForm', 'onEdit'));
        $action3->setParameter('fk', $codigoCRM);
        $button3->setImage('ico_save.png');
        $button3->setAction($action3, 'Inserir Registro');

        // define wich are the form fields
        $this->form->setFields(array($code, $crm_id, $registro, $temporegistro,
            $tiporegistro_id,$dataregistro, $hora_registro, $numero_registro, 
            $button1, $button2, $button3));


        $subtable = new TTable;
        $row = $subtable->addRow();
        $row->addCell($button1);
        $row->addCell($button2);
        $row->addCell($button3);

        $table_layout = new TTable;
        $table_layout->addRow()->addCell($this->form);
        $table_layout->addRow()->addCell($subtable);

//         // add a row for the field gender
//          $row->addCell(new TLabel('Gender:'));
//          $row->addCell($registroREG);
//        
//        // add a row for the field Category
//        $row = $table->addRow();
//        $row->addCell(new TLabel('Cidade:'));
//        $cell = $row->addCell($registroREG);  
        // add the form inside the page
        parent::add($panel);
        parent::add($table_layout);
        // creates the form
        $this->form2 = new TForm('form_clienteRegistro Detalhe');
        //dados do cliente CRM
        TTransaction::open('db_crmbf');
        $criteria2 = new TCriteria;
        // $criteria->add(new TFilter('crm_id', '=', $_GET['key']));
        $criteria2->setProperty('order', 'id desc');
        $repository2 = new TRepository('Registro');
        $reg = $repository2->load($criteria2);

        foreach ($reg as $regs) {
            $row = $table->addRow();
            $row->addCell(new TLabel('ID:'));
            $cell = $row->addCell($regs->id);

            $row = $table->addRow();
            $row->addCell(new TLabel('CRM:'));
            $cell = $row->addCell($regs->crm_id);

            $row = $table->addRow();
            $row->addCell(new TLabel('CRM:'));
            $cell = $row->addCell($regs->tiporegistro_id);

            $row = $table->addRow();
            $row->addCell(new TLabel('Tempo:'));
            $cell = $row->addCell($regs->tempo_registro);

            $row = $table->addRow();
            $row->addCell(new TLabel('Data:'));
            $cell = $row->addCell($regs->data_registro);

            $row = $table->addRow();
            $row->addCell(new TLabel('Horario:'));
            $cell = $row->addCell($regs->hora_registro);

            $row = $table->addRow();
            $row->addCell(new TLabel('Numero Registro:'));
            $cell = $row->addCell($regs->numero_registro);

            $row = $table->addRow();
            $row->addCell(new TLabel('Registro:'));
            $cell = $row->addCell($regs->registro);
            
            $row = $table->addRow();
            $row->addCell(new TLabel(' '));
            $cell = $row->addCell(' ');

//            $idREG = $regs->id;
//            $crm_idREG = $regs->crm_id;
//            $tiporegistro_idREG = $regs->tiporegistro_id;
//            $tempoREG = $regs->tempo_registro;
//            $dataREG = $regs->data_registro;
//            $horaREG = $regs->hora_registro;
//            $numRegistroREG = $regs->numero_registro;
//            $registroREG = $regs->registro;
        }
        TTransaction::close();
    }

    /**
     * method onReload()
     * Load the datagrid with the database objects
     */
    function onReload($param = NULL) {
        try {
            // open a transaction with database 'samples'
            TTransaction::open('db_crmbf');

            // creates a repository for Customer
            $repository = new TRepository('Registro');
            $limit = 10;

            // creates a criteria
            $criteria = new TCriteria;

            //$criteria->setProperties($param); // order, offset
            $criteria->setProperty('order', 'nome'); // order, offset
            // load the objects according to criteria
            $customers = $repository->load($criteria);

            $this->datagrid->clear();
            if ($customers) {
                foreach ($customers as $customer) {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($customer);
                }
            }

            // reset the criteria for record count
            $criteria->resetProperties();
            $count = $repository->count($criteria);

            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        } catch (Exception $e) { // in case of exception
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            // undo all pending operations
            TTransaction::rollback();
        }
    }

    /**
     * method onSave
     * Executed whenever the user clicks at the save button
     */
    function onSave() {
        try {
            // open a transaction with database 'samples'
            TTransaction::open('db_crmbf');

            $this->form->validate();
            // read the form data and instantiates an Active Record
            $customer = $this->form->getData('Cliente');

            if ($customer->contacts_list) {
                foreach ($customer->contacts_list as $contact) {
                    // add the contact to the customer
                    $customer->addContact($contact);
                }
            }

            if ($customer->skill_list) {
                foreach ($customer->skill_list as $skill_id) {
                    // add the skill to the customer
                    $customer->addSkill(new Skill($skill_id));
                }
            }
            // stores the object in the database
            $customer->store();
            $this->form->setData($customer);

            // shows the success message
            new TMessage('info', 'Registro Salvo');

            TTransaction::close(); // close the transaction
        } catch (Exception $e) { // in case of exception
            // shows the exception error message
            new TMessage('error', '<b>Error</b>' . $e->getMessage());
            // undo all pending operations
            TTransaction::rollback();
        }
    }

    /**
     * method onEdit
     * Edit a record data
     */
    function onEdit($param) {
        try {
            if (isset($param['key'])) {
                // open a transaction with database 'samples'
                TTransaction::open('db_crmbf');

                // load the Active Record according to its ID
                $cliente = new Cliente($param['key']);

                // load the contacts (composition)
                $cliente->contacts_list = $cliente->getContacts();

                // load the skills (aggregation)
                $skills = $cliente->getSkills();
                $skill_list = array();
                if ($skills) {
                    foreach ($skills as $skill) {
                        $skill_list[] = $skill->id;
                    }
                }
                $cliente->skill_list = $skill_list;

                // fill the form with the active record data
                $this->form->setData($cliente);

                // close the transaction
                TTransaction::close();
            } else {
                $this->form->clear();
            }
        } catch (Exception $e) { // in case of exception
            // shows the exception error message
            new TMessage('error', '<b>Error</b>' . $e->getMessage());
            // undo all pending operations
            TTransaction::rollback();
        }
    }

}

?>
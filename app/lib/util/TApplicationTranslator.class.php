<?php
/**
 * Translation utility class
 * Copyright (c) 2006-2010 Pablo Dall'Oglio
 * @author  Pablo Dall'Oglio <pablo [at] adianti.com.br>
 * @version 2.0, 2007-08-01
 */
class TApplicationTranslator
{
    private static $instance; // singleton instance
    private $lang;            // target language
    
    /**
     * Class Constructor
     */
    private function __construct()
    {
        $this->messages['en'][] = 'File not found';
        $this->messages['en'][] = 'Search';
        $this->messages['en'][] = 'Register';
        $this->messages['en'][] = 'Record saved';
        $this->messages['en'][] = 'Do you really want to delete ?';
        $this->messages['en'][] = 'Record deleted';
        $this->messages['en'][] = 'Function';
        $this->messages['en'][] = 'Table';
        $this->messages['en'][] = 'Tool';
        $this->messages['en'][] = 'Data';
        $this->messages['en'][] = 'New';
        $this->messages['en'][] = 'Open';
        $this->messages['en'][] = 'Save';
        $this->messages['en'][] = 'Edit';
        $this->messages['en'][] = 'Delete';
        $this->messages['en'][] = 'Find';
        $this->messages['en'][] = 'Cancel';
        $this->messages['en'][] = 'Yes';
        $this->messages['en'][] = 'No';
        $this->messages['en'][] = 'January';
        $this->messages['en'][] = 'February';
        $this->messages['en'][] = 'March';
        $this->messages['en'][] = 'April';
        $this->messages['en'][] = 'May';
        $this->messages['en'][] = 'June';
        $this->messages['en'][] = 'July';
        $this->messages['en'][] = 'August';
        $this->messages['en'][] = 'September';
        $this->messages['en'][] = 'October';
        $this->messages['en'][] = 'November';
        $this->messages['en'][] = 'December';
        $this->messages['en'][] = 'Today';
        $this->messages['en'][] = 'Close';
        $this->messages['en'][] = 'The field ^1 can not be less than ^2 characters';
        $this->messages['en'][] = 'The field ^1 can not be greater than ^2 characters';
        $this->messages['en'][] = 'The field ^1 can not be less than ^2';
        $this->messages['en'][] = 'The field ^1 can not be greater than ^2';
        $this->messages['en'][] = 'The field ^1 is required';
        $this->messages['en'][] = 'The field ^1 has not a valid CNPJ';
        $this->messages['en'][] = 'The field ^1 has not a valid CPF';
        $this->messages['en'][] = 'The field ^1 contains an invalid e-mail';
        $this->messages['en'][] = 'Code';
        $this->messages['en'][] = 'Description';
        $this->messages['en'][] = 'Name';
        $this->messages['en'][] = 'Phone';
        $this->messages['en'][] = 'Email';
        $this->messages['en'][] = 'Address';
        $this->messages['en'][] = 'City';
        $this->messages['en'][] = 'Category';
        $this->messages['en'][] = 'Birthdate';
        $this->messages['en'][] = 'Login';
        $this->messages['en'][] = 'Password';
        $this->messages['en'][] = 'Registration';
        $this->messages['en'][] = 'Expiration';
        $this->messages['en'][] = 'Title';
        $this->messages['en'][] = 'Call';
        $this->messages['en'][] = 'Author';
        $this->messages['en'][] = 'Authors';
        $this->messages['en'][] = 'Edition';
        $this->messages['en'][] = 'Volume';
        $this->messages['en'][] = 'Collection';
        $this->messages['en'][] = 'Classification';
        $this->messages['en'][] = 'Publisher';
        $this->messages['en'][] = 'Place';
        $this->messages['en'][] = 'Date';
        $this->messages['en'][] = 'Abstract';
        $this->messages['en'][] = 'Notes';
        $this->messages['en'][] = 'Basic data';
        $this->messages['en'][] = 'Secundary data';
        $this->messages['en'][] = 'Items';
        $this->messages['en'][] = 'Subject';
        $this->messages['en'][] = 'Subjects';
        $this->messages['en'][] = 'Barcode';
        $this->messages['en'][] = 'Status';
        $this->messages['en'][] = 'Cost';
        $this->messages['en'][] = 'Acquire date';
        $this->messages['en'][] = 'Record added';
        $this->messages['en'][] = 'Success';
        $this->messages['en'][] = 'Not available';
        $this->messages['en'][] = 'Books';
        $this->messages['en'][] = 'Book';
        $this->messages['en'][] = 'Members';
        $this->messages['en'][] = 'Member';
        $this->messages['en'][] = 'Loans';
        $this->messages['en'][] = 'Loan';
        $this->messages['en'][] = 'Add';
        $this->messages['en'][] = 'Apply';
        $this->messages['en'][] = 'Not checked out';
        $this->messages['en'][] = 'Generate';
        $this->messages['en'][] = 'Report filters';
        $this->messages['en'][] = 'Output';
        $this->messages['en'][] = 'Report generated';
        $this->messages['en'][] = 'No records found';
        $this->messages['en'][] = 'Loan date';
        $this->messages['en'][] = 'Arrive date';
        $this->messages['en'][] = 'Collections';
        $this->messages['en'][] = 'Classifications';
        $this->messages['en'][] = 'Publishers';
        $this->messages['en'][] = 'Categories';
        $this->messages['en'][] = 'Cities';
        $this->messages['en'][] = 'Check in';
        $this->messages['en'][] = 'Check out';
        $this->messages['en'][] = 'Circulation';
        $this->messages['en'][] = 'Reports';
        $this->messages['en'][] = 'Cataloging';
        $this->messages['en'][] = 'Status';
        $this->messages['en'][] = 'User not found';
        $this->messages['en'][] = 'Incorrect password';
        $this->messages['en'][] = 'Users';
        $this->messages['en'][] = 'Language';
        $this->messages['en'][] = 'Roles';
        $this->messages['en'][] = 'Role';
        $this->messages['en'][] = 'Mnemonic';
        $this->messages['en'][] = 'Permission denied';
        $this->messages['en'][] = 'Not logged';
        
        $this->messages['pt'][] = 'Arquivo não encontrado';
        $this->messages['pt'][] = 'Buscar';
        $this->messages['pt'][] = 'Cadastrar';
        $this->messages['pt'][] = 'Registro salvo';
        $this->messages['pt'][] = 'Deseja realmente excluir ?';
        $this->messages['pt'][] = 'Registro excluído';
        $this->messages['pt'][] = 'Função';
        $this->messages['pt'][] = 'Tabela';
        $this->messages['pt'][] = 'Ferramenta';
        $this->messages['pt'][] = 'Dados';
        $this->messages['pt'][] = 'Novo';
        $this->messages['pt'][] = 'Abrir';
        $this->messages['pt'][] = 'Salvar';
        $this->messages['pt'][] = 'Editar';
        $this->messages['pt'][] = 'Excluir';
        $this->messages['pt'][] = 'Buscar';
        $this->messages['pt'][] = 'Cancelar';
        $this->messages['pt'][] = 'Sim';
        $this->messages['pt'][] = 'Não';
        $this->messages['pt'][] = 'Janeiro';
        $this->messages['pt'][] = 'Fevereiro';
        $this->messages['pt'][] = 'Março';
        $this->messages['pt'][] = 'Abril';
        $this->messages['pt'][] = 'Maio';
        $this->messages['pt'][] = 'Junho';
        $this->messages['pt'][] = 'Julho';
        $this->messages['pt'][] = 'Agosto';
        $this->messages['pt'][] = 'Setembro';
        $this->messages['pt'][] = 'Outubro';
        $this->messages['pt'][] = 'Novembro';
        $this->messages['pt'][] = 'Dezembro';
        $this->messages['pt'][] = 'Hoje';
        $this->messages['pt'][] = 'Fechar';
        $this->messages['pt'][] = 'O campo ^1 não pode ter menos de ^2 caracteres';
        $this->messages['pt'][] = 'O campo ^1 não pode ter mais de ^2 caracteres';
        $this->messages['pt'][] = 'O campo ^1 não pode ser menor que ^2';
        $this->messages['pt'][] = 'O campo ^1 não pode ser maior que ^2';
        $this->messages['pt'][] = 'O campo ^1 é obrigatório';
        $this->messages['pt'][] = 'O campo ^1 não contém um CNPJ válido';
        $this->messages['pt'][] = 'O campo ^1 não contém um CPF válido';
        $this->messages['pt'][] = 'O campo ^1 contém um e-mail inválido';
        $this->messages['pt'][] = 'Código';
        $this->messages['pt'][] = 'Descrição';
        $this->messages['pt'][] = 'Nome';
        $this->messages['pt'][] = 'Fone';
        $this->messages['pt'][] = 'Email';
        $this->messages['pt'][] = 'Endereço';
        $this->messages['pt'][] = 'Cidade';
        $this->messages['pt'][] = 'Categoria';
        $this->messages['pt'][] = 'Nascimento';
        $this->messages['pt'][] = 'Login';
        $this->messages['pt'][] = 'Senha';
        $this->messages['pt'][] = 'Registro';
        $this->messages['pt'][] = 'Expiração';
        $this->messages['pt'][] = 'Título';
        $this->messages['pt'][] = 'Chamada';
        $this->messages['pt'][] = 'Autor';
        $this->messages['pt'][] = 'Autores';
        $this->messages['pt'][] = 'Edição';
        $this->messages['pt'][] = 'Volume';
        $this->messages['pt'][] = 'Coleção';
        $this->messages['pt'][] = 'Classificação';
        $this->messages['pt'][] = 'Editora';
        $this->messages['pt'][] = 'Lugar';
        $this->messages['pt'][] = 'Data';
        $this->messages['pt'][] = 'Resumo';
        $this->messages['pt'][] = 'Notas';
        $this->messages['pt'][] = 'Dados básicos';
        $this->messages['pt'][] = 'Dados secundários';
        $this->messages['pt'][] = 'Exemplares';
        $this->messages['pt'][] = 'Assunto';
        $this->messages['pt'][] = 'Assuntos';
        $this->messages['pt'][] = 'Cod.Barras';
        $this->messages['pt'][] = 'Estado';
        $this->messages['pt'][] = 'Custo';
        $this->messages['pt'][] = 'Data aquisição';
        $this->messages['pt'][] = 'Registro adicionado';
        $this->messages['pt'][] = 'Sucesso';
        $this->messages['pt'][] = 'Não disponível';
        $this->messages['pt'][] = 'Livros';
        $this->messages['pt'][] = 'Livro';
        $this->messages['pt'][] = 'Membros';
        $this->messages['pt'][] = 'Membro';
        $this->messages['pt'][] = 'Empréstimos';
        $this->messages['pt'][] = 'Empréstimo';
        $this->messages['pt'][] = 'Adicionar';
        $this->messages['pt'][] = 'Aplicar';
        $this->messages['pt'][] = 'Não emprestado';
        $this->messages['pt'][] = 'Gerar';
        $this->messages['pt'][] = 'Filtros do relatório';
        $this->messages['pt'][] = 'Saída';
        $this->messages['pt'][] = 'Relatório gerado';
        $this->messages['pt'][] = 'Não foram encontrados registros';
        $this->messages['pt'][] = 'Empréstimo';
        $this->messages['pt'][] = 'Devolução';
        $this->messages['pt'][] = 'Coleções';
        $this->messages['pt'][] = 'Classificações';
        $this->messages['pt'][] = 'Editoras';
        $this->messages['pt'][] = 'Categorias';
        $this->messages['pt'][] = 'Cidades';
        $this->messages['pt'][] = 'Devolver';
        $this->messages['pt'][] = 'Emprestar';
        $this->messages['pt'][] = 'Circulação';
        $this->messages['pt'][] = 'Relatórios';
        $this->messages['pt'][] = 'Catalogação';
        $this->messages['pt'][] = 'Estado';
        $this->messages['pt'][] = 'Usuário não encontrado';
        $this->messages['pt'][] = 'Senha incorreta';
        $this->messages['pt'][] = 'Usuários';
        $this->messages['pt'][] = 'Linguagem';
        $this->messages['pt'][] = 'Papéis';
        $this->messages['pt'][] = 'Papel';
        $this->messages['pt'][] = 'Mnemônico';
        $this->messages['pt'][] = 'Permissão negada';
        $this->messages['pt'][] = 'Não logado';
    }
    
    /**
     * Returns the singleton instance
     * @return  Instance of TApplicationTranslator
     */
    public static function getInstance()
    {
        // if there's no instance
        if (empty(self::$instance))
        {
            // creates a new object
            self::$instance = new TApplicationTranslator;
        }
        // returns the created instance
        return self::$instance;
    }
    
    /**
     * Define the target language
     * @param $lang     Target language index
     */
    public static function setLanguage($lang)
    {
        $instance = self::getInstance();
        $instance->lang = $lang;
    }
    
    /**
     * Returns the target language
     * @return Target language index
     */
    public static function getLanguage()
    {
        $instance = self::getInstance();
        return $instance->lang;
    }
    
    /**
     * Translate a word to the target language
     * @param $word     Word to be translated
     * @return          Translated word
     */
    static public function translate($word, $param1 = NULL, $param2 = NULL, $param3 = NULL)
    {
        // get the TApplicationTranslator unique instance
        $instance = self::getInstance();
        // search by the numeric index of the word
        $key = array_search($word, $instance->messages['en']);
        if ($key !== FALSE)
        {
            // get the target language
            $language = self::getLanguage();
            // returns the translated word
            $message = $instance->messages[$language][$key];
            
            if (isset($param1))
            {
                $message = str_replace('^1', $param1, $message);
            }
            if (isset($param2))
            {
                $message = str_replace('^2', $param2, $message);
            }
            if (isset($param3))
            {
                $message = str_replace('^3', $param3, $message);
            }
            return $message;
        }
        else
        {
            return 'Message not found: '. $word;
        }
    }
    
    /**
     * Translate a template file
     */
    static public function translateTemplate($template)
    {
        // get the TApplicationTranslator unique instance
        $instance = self::getInstance();
        // search by the numeric index of the word
        foreach ($instance->messages['en'] as $word)
        {
            $translated = _t($word);
            $template = str_replace('_t{'.$word.'}', $translated, $template);
        }
        return $template;
    }
}

/**
 * Facade to translate words
 * @param $word  Word to be translated
 * @param $param1 optional ^1
 * @param $param2 optional ^2
 * @param $param3 optional ^3
 * @return Translated word
 */
function _t($msg, $param1 = null, $param2 = null, $param3 = null)
{
        return TApplicationTranslator::translate($msg, $param1, $param2, $param3);
}
?>
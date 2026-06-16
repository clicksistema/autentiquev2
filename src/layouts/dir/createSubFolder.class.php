<?php
    namespace sysborg\autentiquev2;

    class createSubFolder extends common implements \sysborg\autentiquev2\layouts{
        /**
         * @description-en-US:       Stores informations and variables for this layout
         * @description-pt-BR:       Armazena informações e variáveis para esse layout
         * @var                      array
         */
        protected array $layoutInfo = [
            'parent_id' => NULL,
            'name'      => NULL
        ];

        /**
         * @description-en-US:       Stores the query of graphql
         * @description-pt-BR:       Armazena a query do graphql
         * @var                      string
         */
        protected string $query = '{
            "query": "mutation CreateSubfolder($parent_id: UUID, $folder: FolderInput!) { createFolder(parent_id: $parent_id, folder: $folder) {id name slug context path children_counter created_at updated_at } }",
            "variables": { "parent_id": "%s", "folder": { "name": "%s" } }
        }';

        /**
         * @description-en-US       Parse the values on the graphql schema and returns as string
         * @description-pt-BR       Parse os valores no schema do graphql e retorna como string
         * @author                  Anderson Arruda < andmarruda@gmail.com >
         * @version                 1.0.0
         * @access                  public
         * @param                   
         * @return                  string
         */
        public function parse() : string
        {
            $this->verifyFill('parent_id', $this->parent_id);
            $this->verifyFill('name', $this->name);
          
            return sprintf(
                $this->query,
                $this->parent_id,
                $this->name
            );
        }
    }
?>

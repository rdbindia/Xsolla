<?php

use Phinx\Migration\AbstractMigration;

final class CreateProjectTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('project', ['id' => 'project_id', 'null' => 0, 'primary_key' => ['project_id']]);
        $table->addColumn('project_name', 'string', ['limit' => 50])
            ->addColumn('project_description', 'string', ['limit' => 255, "null" => true])
            ->addColumn('project_code', 'string', ['limit' => 10])
            ->addColumn('project_status', 'integer', ['limit' => 10, 'default' => 0])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->addIndex(['project_code'], ['unique' => true])
            ->create();
    }
}

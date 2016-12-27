<?php


namespace Ali\Affliates\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_ali_affliates = $setup->getConnection()->newTable($setup->getTable('ali_affliates'));

        
        $table_ali_affliates->addColumn(
            'affliates_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,'auto_increment' => true),
            'Entity ID'
        );
       
        
        $table_ali_affliates->addColumn(
            'affliate_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'affliate_name'
        );
        
        $table_ali_affliates->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'image'
        );
        

        
        $table_ali_affliates->addColumn(
            'affliate_status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [],
            'affliate_status'
        );
        
      $table_ali_affliates->addColumn(
    'created_at',
    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    null,
    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
    'Created At'
);
      $table_ali_affliates->addColumn(
    'updated_at',
    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    null,
    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
    'Updated At'
);
        

        $setup->getConnection()->createTable($table_ali_affliates);

        $setup->endSetup();
    }
}

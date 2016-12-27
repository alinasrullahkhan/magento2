<?php


namespace Ali\Affliates\Model\ResourceModel;

class Affliates extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ali_affliates', 'affliates_id');
    }
}

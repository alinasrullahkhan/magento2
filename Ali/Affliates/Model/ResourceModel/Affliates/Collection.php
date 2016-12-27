<?php


namespace Ali\Affliates\Model\ResourceModel\Affliates;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Ali\Affliates\Model\Affliates',
            'Ali\Affliates\Model\ResourceModel\Affliates'
        );
    }
}

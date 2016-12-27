<?php


namespace Ali\Affliates\Api\Data;

interface AffliatesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get affliates list.
     * @return \Ali\Affliates\Api\Data\AffliatesInterface[]
     */
    
    public function getItems();

    /**
     * Set affliate_id list.
     * @param \Ali\Affliates\Api\Data\AffliatesInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}

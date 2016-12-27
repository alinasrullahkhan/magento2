<?php


namespace Ali\Affliates\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface AffliatesRepositoryInterface
{


    /**
     * Save affliates
     * @param \Ali\Affliates\Api\Data\AffliatesInterface $affliates
     * @return \Ali\Affliates\Api\Data\AffliatesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function save(
        \Ali\Affliates\Api\Data\AffliatesInterface $affliates
    );

    /**
     * Retrieve affliates
     * @param string $affliatesId
     * @return \Ali\Affliates\Api\Data\AffliatesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getById($affliatesId);

    /**
     * Retrieve affliates matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Ali\Affliates\Api\Data\AffliatesSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );
    
    
    

    /**
     * Delete affliates
     * @param \Ali\Affliates\Api\Data\AffliatesInterface $affliates
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function delete(
        \Ali\Affliates\Api\Data\AffliatesInterface $affliates
    );

    /**
     * Delete affliates by ID
     * @param string $affliatesId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function deleteById($affliatesId);
}

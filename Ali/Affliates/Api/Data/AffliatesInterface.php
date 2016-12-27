<?php


namespace Ali\Affliates\Api\Data;

interface AffliatesInterface
{

    const AFFLIATE_ID = 'affliate_id';
    const AFFLIATE_STATUS = 'affliate_status';
    const AFFLIATES_ID = 'affliates_id';
    const AFFLIATE_NAME = 'affliate_name';


    /**
     * Get affliates_id
     * @return string|null
     */
    
    public function getAffliatesId();

    /**
     * Set affliates_id
     * @param string $affliates_id
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    
    public function setAffliatesId($affliatesId);

    /**
     * Get affliate_id
     * @return string|null
     */
    
    public function getAffliateId();

    /**
     * Set affliate_id
     * @param string $affliate_id
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    
    public function setAffliateId($affliate_id);

    /**
     * Get affliate_name
     * @return string|null
     */
    
    public function getAffliateName();

    /**
     * Set affliate_name
     * @param string $affliate_name
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    
    public function setAffliateName($affliate_name);

    /**
     * Get affliate_status
     * @return string|null
     */
    
    public function getAffliateStatus();

    /**
     * Set affliate_status
     * @param string $affliate_status
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    
    public function setAffliateStatus($affliate_status);
}

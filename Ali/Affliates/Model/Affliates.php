<?php


namespace Ali\Affliates\Model;

use Ali\Affliates\Api\Data\AffliatesInterface;

class Affliates extends \Magento\Framework\Model\AbstractModel implements AffliatesInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ali\Affliates\Model\ResourceModel\Affliates');
    }
	
	
    /**
     * Get affliates_id
     * @return string
     */
    public function getAffliatesId()
    {
        return $this->getData(self::AFFLIATES_ID);
    }
	
	

    /**
     * Set affliates_id
     * @param string $affliatesId
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    public function setAffliatesId($affliatesId)
    {
        return $this->setData(self::AFFLIATES_ID, $affliatesId);
    }

    /**
     * Get affliate_id
     * @return string
     */
    public function getAffliateId()
    {
        return $this->getData(self::AFFLIATE_ID);
    }

    /**
     * Set affliate_id
     * @param string $affliate_id
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    public function setAffliateId($affliate_id)
    {
        return $this->setData(self::AFFLIATE_ID, $affliate_id);
    }

    /**
     * Get affliate_name
     * @return string
     */
    public function getAffliateName()
    {
        return $this->getData(self::AFFLIATE_NAME);
    }

    /**
     * Set affliate_name
     * @param string $affliate_name
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    public function setAffliateName($affliate_name)
    {
        return $this->setData(self::AFFLIATE_NAME, $affliate_name);
    } 

    /**
     * Get affliate_status
     * @return string
     */
    public function getAffliateStatus()
    {
        return $this->getData(self::AFFLIATE_STATUS);
    } 

    /**
     * Set affliate_status
     * @param string $affliate_status
     * @return Ali\Affliates\Api\Data\AffliatesInterface
     */
    public function setAffliateStatus($affliate_status)
    {
        return $this->setData(self::AFFLIATE_STATUS, $affliate_status);
    } 
}

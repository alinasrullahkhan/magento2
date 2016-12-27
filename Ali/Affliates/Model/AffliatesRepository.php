<?php


namespace Ali\Affliates\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Reflection\DataObjectProcessor;
use Ali\Affliates\Api\AffliatesRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Ali\Affliates\Model\ResourceModel\Affliates as ResourceAffliates;
use Ali\Affliates\Api\Data\AffliatesSearchResultsInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Store\Model\StoreManagerInterface;
use Ali\Affliates\Model\ResourceModel\Affliates\CollectionFactory as AffliatesCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Ali\Affliates\Api\Data\AffliatesInterfaceFactory;

class AffliatesRepository implements affliatesRepositoryInterface
{

    protected $dataObjectProcessor;

    protected $resource;

    protected $dataAffliatesFactory;

    private $storeManager;

    protected $affliatesFactory;

    protected $dataObjectHelper;

    protected $searchResultsFactory;

    protected $affliatesCollectionFactory;


    /**
     * @param ResourceAffliates $resource
     * @param AffliatesFactory $affliatesFactory
     * @param AffliatesInterfaceFactory $dataAffliatesFactory
     * @param AffliatesCollectionFactory $affliatesCollectionFactory
     * @param AffliatesSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceAffliates $resource,
        AffliatesFactory $affliatesFactory,
        AffliatesInterfaceFactory $dataAffliatesFactory,
        AffliatesCollectionFactory $affliatesCollectionFactory,
        AffliatesSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->affliatesFactory = $affliatesFactory;
        $this->affliatesCollectionFactory = $affliatesCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataAffliatesFactory = $dataAffliatesFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Ali\Affliates\Api\Data\AffliatesInterface $affliates
    ) {
        /* if (empty($affliates->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $affliates->setStoreId($storeId);
        } */
        try {
            $this->resource->save($affliates);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the affliates: %1',
                $exception->getMessage()
            ));
        }
        return $affliates;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($affliatesId)
    {
        $affliates = $this->affliatesFactory->create();
        $affliates->load($affliatesId);
        if (!$affliates->getId()) {
            throw new NoSuchEntityException(__('affliates with id "%1" does not exist.', $affliatesId));
        }
        return $affliates;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $collection = $this->affliatesCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $items = [];
        
        foreach ($collection as $affliatesModel) {
            $affliatesData = $this->dataAffliatesFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $affliatesData,
                $affliatesModel->getData(),
                'Ali\Affliates\Api\Data\AffliatesInterface'
            );
            $items[] = $this->dataObjectProcessor->buildOutputDataArray(
                $affliatesData,
                'Ali\Affliates\Api\Data\AffliatesInterface'
            );
        }
        $searchResults->setItems($items);
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Ali\Affliates\Api\Data\AffliatesInterface $affliates
    ) {
        try {
            $this->resource->delete($affliates);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the affliates: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($affliatesId)
    {
        return $this->delete($this->getById($affliatesId));
    }
}

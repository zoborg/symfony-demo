<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Cache\CacheAdGroupStats;
use AppBundle\Entity\Cache\CacheCampaignPerformance;
use AppBundle\Entity\Cache\CacheCampaignStats;
use AppBundle\Entity\Cache\CacheSkuStats;
use AppBundle\Entity\CampaignPerformance;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class CampaignPerformanceRepository extends EntityRepository
{


    /**
     * @param $accountId
     * @param bool $fromCache
     * @return array
     */
    public function campaignPerformance($accountId, $fromCache = true)
    {

        $qb = $this->defaultQb($accountId);
        $qb->addSelect('a.startDate as startDt')
            ->addGroupBy('startDt')
            ->orderBy('startDt', 'asc');

        if ($fromCache) {
            $qb = $this->getEntityManager()->createQueryBuilder();
            $qb->from(CacheCampaignPerformance::class, 'a');
            $qb->select('a.impressions')
                ->addSelect('a.clicks as clicks')
                ->addSelect('a.skuId as id')
                ->addSelect('a.baseUnitCost as baseUnitCost')
                ->addSelect('a.startDt');
            $qb->where('a.accountId = :account')
                ->setParameter('account', $accountId);
        }

        $results = $qb->getQuery()
            ->useQueryCache(false)
            ->useResultCache(false)
            ->getResult();

        return $results;

    }

    /**
     * @param integer $accountId
     * @param bool $fromCache
     * @return array
     */
    public function skuStats($accountId, $fromCache = true)
    {
        $qb = $this->defaultQb($accountId);
        $qb->addSelect('e.sku as sku')
            ->addSelect('e.sku as name')
            ->addSelect('e.img as image')
            ->addSelect('e.asin as asin')
            ->addSelect('e.url as url')
            ->addSelect('e.title as title')
            ->addSelect('e.group as category')
            ->addSelect('e.brand as brand');

        if($fromCache) {
            $qb = $this->getEntityManager()->createQueryBuilder();
            $qb->from(CacheSkuStats::class, 'a');
            $qb->select('a.impressions')
                ->addSelect('a.clicks as clicks')
                ->addSelect('a.skuId as id')
                ->addSelect('a.baseUnitCost as baseUnitCost')
                ->addSelect('a.name')
                ->addSelect('a.sku')
                ->addSelect('a.image')
                ->addSelect('a.asin')
                ->addSelect('a.url')
                ->addSelect('a.title')
                ->addSelect('a.category')
                ->addSelect('a.brand');
            $qb->where('a.accountId = :account')
                ->setParameter('account', $accountId);
        }

        $results = $qb->getQuery()->getResult();

        return $results;
    }

    /**
     * @param integer $accountId
     * @param bool $fromCache
     * @return array
     */
    public function adgroupStats($accountId, $fromCache = true)
    {
        $qb = $this->defaultQb($accountId);
        $qb->addSelect('c.name as adgroup')
            ->addSelect('c.name as name')
            ->addSelect('c.id as adgroupId')
            ->addGroupBy('adgroup');

        if($fromCache){
            $qb = $this->getEntityManager()->createQueryBuilder();
            $qb->from(CacheAdGroupStats::class, 'a');
            $qb->select('a.impressions')
                ->addSelect('a.clicks as clicks')
                ->addSelect('a.skuId as id')
                ->addSelect('a.baseUnitCost as baseUnitCost')
                ->addSelect('a.adGroup as adgroup')
                ->addSelect('a.adGroupId as adgroupId')
                ->addSelect('a.name');
            $qb->where('a.accountId = :account')
                ->setParameter('account', $accountId);

        }
        $results = $qb->getQuery()->getResult();
        return $results;
    }

    /**
     * @param integer $accountId
     * @param bool $fromCache
     * @return array
     */
    public function campaignStats($accountId, $fromCache = true)
    {
        $qb = $this->defaultQb($accountId);
        $qb->addSelect('d.name as campaign')
            ->addSelect('d.name as name')
            ->addSelect('d.id as campaignId')
            ->addGroupBy('campaignId')
            ->orderBy('campaign');
        if($fromCache){
             $qb = $this->getEntityManager()->createQueryBuilder();
            $qb->from(CacheCampaignStats::class, 'a');
            $qb->select('a.impressions')
                ->addSelect('a.clicks as clicks')
                ->addSelect('a.skuId as id')
                ->addSelect('a.baseUnitCost as baseUnitCost')
                ->addSelect('a.campaign')
                ->addSelect('a.campaignId')
                ->addSelect('a.name');
            $qb->where('a.accountId = :account')
                ->setParameter('account', $accountId);
        }

        $results = $qb->getQuery()->getResult();

        return $results;
    }

    /**
     * @param integer $accountId
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function defaultQb($accountId)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('sum(a.impressions) as impressions')
            ->addSelect('sum(a.clicks) as clicks')
            ->addSelect('e.id as id')
            ->addSelect('e.unitCost as baseUnitCost')
            ->from(CampaignPerformance::class, 'a')
            ->join('a.accounts', 'b')
            ->join('a.adgroup', 'c')
            ->join('c.campaign', 'd')
            ->join('a.sku', 'e')
            ->groupBy('e.sku')
            ->where('a.accounts = :account')
            ->setParameter('account', $accountId);

        return $qb;
    }
}

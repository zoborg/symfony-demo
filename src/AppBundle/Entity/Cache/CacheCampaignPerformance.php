<?php
namespace AppBundle\Entity\Cache;

use AppBundle\Entity\Common;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CacheCampaignPerformance
 * @package AppBundle\Entity\Cache
 *
 * @ORM\Table(name="cache_campaign_performance")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class CacheCampaignPerformance extends CacheBase
{
    /**
     * @param $accountId
     * @param array $item
     * @return CacheCampaignPerformance
     */
    public static function createFromArray($accountId, array $item){
        return new self(
                $accountId,
                $item['impressions'],
                $item['clicks'],
                $item['id'],
                $item['baseUnitCost'],
                $item['startDt']
        );
    }

    public function __construct(
        $accountId,
        $impressions,
        $clicks,
        $skuId,
        $baseUnitCost,
        \DateTime $startDt
    ) {
        parent::__construct($accountId, $impressions, $clicks, $skuId, $baseUnitCost);
        if($startDt){
            $this->startDt = $startDt;
        }
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDt;
}
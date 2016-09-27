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
class CacheCampaignPerformance extends Common
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
        $this->accountId = $accountId;
        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->skuId = $skuId;
        $this->baseUnitCost = $baseUnitCost;
        if($startDt){
            $this->startDt = $startDt;
        }
    }

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $accountId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $impressions;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $clicks;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $skuId;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $baseUnitCost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDt;
}
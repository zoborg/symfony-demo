<?php
namespace AppBundle\Entity\Cache;

use AppBundle\Entity\Common;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CacheCampaignPerformance
 * @package AppBundle\Entity\Cache
 *
 * @ORM\Entity()
 * @ORM\Table(name="cache_campaign_performance")
 */
class CacheCampaignPerformance extends Common
{
    public function __construct(
        $accountId,
        $impressions,
        $clicks,
        $id,
        $baseUnitCost,
        $startDt
    ) {
        $this->accountId = $accountId;
        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->id = $id;
        $this->baseUnitCost = $baseUnitCost;
        $this->startDt = $startDt;
    }

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
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
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $baseUnitCost;

    /**
     * @var integer
     *
     * @ORM\Column(type="datetime")
     * @ORM\Id()
     */
    private $startDt;
}
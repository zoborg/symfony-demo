<?php
namespace AppBundle\Entity\Cache;

use AppBundle\Entity\Common;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CacheCampaignStats
 * @package AppBundle\Entity\Cache
 *
 * @ORM\Table(name="cache_campaign_stats")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class CacheCampaignStats extends Common
{
    /**
     * @param $accountId
     * @param array $item
     * @return CacheCampaignStats
     */
    public static function createFromArray($accountId, array $item)
    {
        return new self(
            $accountId,
            $item['impressions'],
            $item['clicks'],
            $item['id'],
            $item['baseUnitCost'],
            $item['name'],
            $item['campaign'],
            $item['campaignId']
        );
    }

    /**
     * CacheCampaignStats constructor.
     * @param array $accountId
     * @param $impressions
     * @param $clicks
     * @param $skuId
     * @param $baseUnitCost
     * @param $name
     * @param $campaign
     * @param $campaignId
     */
    public function __construct(
        $accountId,
        $impressions,
        $clicks,
        $skuId,
        $baseUnitCost,
        $name,
        $campaign,
        $campaignId
    ) {
        $this->accountId = $accountId;
        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->skuId = $skuId;
        $this->baseUnitCost = $baseUnitCost;
        $this->name = $name;
        $this->campaign = $campaign;
        $this->campaignId = $campaignId;
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
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $campaign;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $campaignId;
}
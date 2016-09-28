<?php
namespace AppBundle\Entity\Cache;

use AppBundle\Entity\Common;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CacheAdGroupStats
 * @package AppBundle\Entity\Cache
 *
 * @ORM\Table(name="cache_add_group_stats")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class CacheAdGroupStats extends CacheBase
{
    /**
     * @param $accountId
     * @param array $item
     * @return CacheAdGroupStats
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
            $item['adgroup'],
            $item['adgroupId']
        );
    }

    /**
     * CacheAdGroupStats constructor.
     * @param array $accountId
     * @param $impressions
     * @param $clicks
     * @param $skuId
     * @param $baseUnitCost
     * @param $name
     * @param $adGroup
     * @param $adGroupId
     */
    public function __construct(
        $accountId,
        $impressions,
        $clicks,
        $skuId,
        $baseUnitCost,
        $name,
        $adGroup,
        $adGroupId
    ) {
        parent::__construct($accountId, $impressions, $clicks, $skuId, $baseUnitCost);
        $this->accountId = $accountId;
        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->skuId = $skuId;
        $this->baseUnitCost = $baseUnitCost;
        $this->name = $name;
        $this->adGroup = $adGroup;
        $this->adGroupId = $adGroupId;
    }

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="adgroup")
     */
    private $adGroup;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="adgroup_id")
     */
    private $adGroupId;
}
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
class CacheAdGroupStats extends Common
{

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
     * @ORM\Column(type="integer")
     */
    private $adGroupId;
}
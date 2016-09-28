<?php
namespace AppBundle\Entity\Cache;

use AppBundle\Entity\Common;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CacheBase
 * @package AppBundle\Entity\Cache
 */
class CacheBase extends Common
{
    /**
     * CacheAdGroupStats constructor.
     * @param array $accountId
     * @param $impressions
     * @param $clicks
     * @param $skuId
     * @param $baseUnitCost
     */
    public function __construct(
        $accountId,
        $impressions,
        $clicks,
        $skuId,
        $baseUnitCost
    ) {
        $this->accountId = $accountId;
        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->skuId = $skuId;
        $this->baseUnitCost = $baseUnitCost;
    }

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="account_id")
     */
    protected $accountId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $impressions;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $clicks;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="sku_id")
     */
    protected $skuId;

    /**
     * @var float
     *
     * @ORM\Column(type="float", name="base_unit_cost")
     */
    protected $baseUnitCost;
}
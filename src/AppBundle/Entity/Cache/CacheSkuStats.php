<?php
namespace AppBundle\Entity\Cache;

use AppBundle\Entity\Common;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CacheSkuStats
 * @package AppBundle\Entity\Cache
 *
 * @ORM\Table(name="cache_sku_stats")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class CacheSkuStats extends Common
{
    /**
     * @param $accountId
     * @param array $item
     * @return CacheSkuStats
     */
    public static function createFromArray($accountId, array $item)
    {
        return new self(
            $accountId,
            $item['impressions'],
            $item['clicks'],
            $item['id'],
            $item['baseUnitCost'],
            $item['sku'],
            $item['name'],
            $item['image'],
            $item['asin'],
            $item['url'],
            $item['title'],
            $item['category'],
            $item['brand']
        );
    }

    /**
     * CacheSkuStats constructor.
     * @param array $accountId
     * @param $impressions
     * @param $clicks
     * @param $skuId
     * @param $baseUnitCost
     * @param $sku
     * @param $name
     * @param $image
     * @param $asin
     * @param $url
     * @param $title
     * @param $category
     * @param $brand
     */
    public function __construct(
        $accountId,
        $impressions,
        $clicks,
        $skuId,
        $baseUnitCost,
        $sku,
        $name,
        $image,
        $asin,
        $url,
        $title,
        $category,
        $brand
    ) {
        $this->accountId = $accountId;
        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->skuId = $skuId;
        $this->baseUnitCost = $baseUnitCost;
        $this->sku = $sku;
        $this->name = $name;
        $this->image = $image;
        $this->asin = $asin;
        $this->url = $url;
        $this->title = $title;
        $this->category = $category;
        $this->brand = $brand;
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
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="asin", type="string", length=11, nullable=true)
     */
    private $asin;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=250, nullable=true)
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250, nullable=true)
     */
    protected $title;

    /**
     * @ORM\Column(name="category", type="string", length=250, nullable=true)
     */
    protected $category;

    /**
     * @ORM\Column(name="brand", type="string", nullable=true, length=100)
     */
    protected $brand;
}
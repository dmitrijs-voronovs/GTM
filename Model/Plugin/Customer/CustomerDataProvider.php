<?php
/**
 * @category  Technodom
 * @package   Technodom\GTM
 * @author    Rihards Stasans <info@scandiweb.com>
 * @copyright Copyright (c) 2019 Scandiweb, Inc (https://scandiweb.com)
 * @license   http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0 (OSL-3.0)
 */

namespace Technodom\GTM\Model\Plugin\Customer;

use Magento\Sales\Model\ResourceModel\Order\Collection as OrderCollection;
use Magento\CustomerGraphQl\Model\Customer\CustomerDataProvider as CoreCustomerDataProvider;

/**
 * Class CustomerDataProvider
 *
 * @package Technodom\GTM\Model\Plugin\Customer
 */
class CustomerDataProvider
{
    /**
     * @var OrderCollection
     */
    private $orderCollection;

    /**
     * CustomerDataProvider constructor.
     *
     * @param OrderCollection $orderCollection
     */
    public function __construct(
        OrderCollection $orderCollection
    ) {
        $this->orderCollection = $orderCollection;
    }

    /**
     * Add flag to customer that is existing customer (have orders)
     *
     * @param CoreCustomerDataProvider $provider
     * @param $result
     * @param int $customerId
     *
     * @return mixed
     */
    public function afterGetCustomerById(
        CoreCustomerDataProvider $provider,
        $result,
        int $customerId
    ) {
        $result['isUserExistingCustomer'] = !!$this->orderCollection
            ->addAttributeToFilter('customer_id', $customerId)
            ->addAttributeToFilter('status', 'complete')
            ->setPageSize(1)
            ->count();

        return $result;
    }
}

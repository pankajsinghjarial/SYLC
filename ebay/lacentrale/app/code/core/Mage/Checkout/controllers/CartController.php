<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Checkout
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Shopping cart controller
 */
class Mage_Checkout_CartController extends Mage_Core_Controller_Front_Action
{
	protected $_freeAfter149 = 808;
	protected $_freeAfter250 = 807;
	protected $_params = array(
							'uenc' => 'aHR0cDovL2xhLWNlbnRyYWxlLmNvbTo4MDgwL2luZGV4LnBocC9iaWVudmVudWUxNDktODEwLmh0bWw_X19fU0lEPVU',
							'product' => 808,
							'related_product' => '',
							'bundle_option' => array (
								'1' => array (
									'0' => 1,
									'1' => 2,
									'2' => 3,
									'3' => 4,
									'4' => 5,
									'5' => 6,
								)
							),
							'qty' => 1
						);

    /**
     * Action list where need check enabled cookie
     *
     * @var array
     */
    protected $_cookieCheckActions = array('add');

    /**
     * Retrieve shopping cart model object
     *
     * @return Mage_Checkout_Model_Cart
     */
    protected function _getCart()
    {
        return Mage::getSingleton('checkout/cart');
    }

    /**
     * Get checkout session model instance
     *
     * @return Mage_Checkout_Model_Session
     */
    protected function _getSession()
    {
        return Mage::getSingleton('checkout/session');
    }

    /**
     * Get current active quote instance
     *
     * @return Mage_Sales_Model_Quote
     */
    protected function _getQuote()
    {
        return $this->_getCart()->getQuote();
    }

    /**
     * Set back redirect url to response
     *
     * @return Mage_Checkout_CartController
     */
    protected function _goBack()
    {
        $returnUrl = $this->getRequest()->getParam('return_url');
        if ($returnUrl) {

            if (!$this->_isUrlInternal($returnUrl)) {
                throw new Mage_Exception('External urls redirect to "' . $returnUrl . '" denied!');
            }

            $this->_getSession()->getMessages(true);
            $this->getResponse()->setRedirect($returnUrl);
        } elseif (!Mage::getStoreConfig('checkout/cart/redirect_to_cart')
            && !$this->getRequest()->getParam('in_cart')
            && $backUrl = $this->_getRefererUrl()
        ) {
            $this->getResponse()->setRedirect($backUrl);
        } else {
            if (($this->getRequest()->getActionName() == 'add') && !$this->getRequest()->getParam('in_cart')) {
                $this->_getSession()->setContinueShoppingUrl($this->_getRefererUrl());
            }
            $this->_redirect('checkout/cart');
        }
        return $this;
    }

    /**
     * Initialize product instance from request data
     *
     * @return Mage_Catalog_Model_Product || false
     */
    protected function _initProduct()
    {
        $productId = (int) $this->getRequest()->getParam('product');
        if ($productId) {
            $product = Mage::getModel('catalog/product')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->load($productId);
            if ($product->getId()) {
                return $product;
            }
        }
        return false;
    }

    /**
     * Shopping cart display action
     */
    public function indexAction()
    {
        $cart = $this->_getCart();
        if ($cart->getQuote()->getItemsCount()) {
            $cart->init();
            $cart->save();

            if (!$this->_getQuote()->validateMinimumAmount()) {
                $minimumAmount = Mage::app()->getLocale()->currency(Mage::app()->getStore()->getCurrentCurrencyCode())
                    ->toCurrency(Mage::getStoreConfig('sales/minimum_order/amount'));

                $warning = Mage::getStoreConfig('sales/minimum_order/description')
                    ? Mage::getStoreConfig('sales/minimum_order/description')
                    : Mage::helper('checkout')->__('Minimum order amount is %s', $minimumAmount);

                $cart->getCheckoutSession()->addNotice($warning);
            }
        }

        // Compose array of messages to add
        $messages = array();
        foreach ($cart->getQuote()->getMessages() as $message) {
            if ($message) {
                // Escape HTML entities in quote message to prevent XSS
                $message->setCode(Mage::helper('core')->escapeHtml($message->getCode()));
                $messages[] = $message;
            }
        }
        $cart->getCheckoutSession()->addUniqueMessages($messages);

        /**
         * if customer enteres shopping cart we should mark quote
         * as modified bc he can has checkout page in another window.
         */
        $this->_getSession()->setCartWasUpdated(true);

        Varien_Profiler::start(__METHOD__ . 'cart_display');
        $this
            ->loadLayout()
            ->_initLayoutMessages('checkout/session')
            ->_initLayoutMessages('catalog/session')
            ->getLayout()->getBlock('head')->setTitle($this->__('Shopping Cart'));
        $this->renderLayout();
        Varien_Profiler::stop(__METHOD__ . 'cart_display');
    }

    /**
     * Add product to shopping cart action
     */
    public function addAction()
    {
        $cart   = $this->_getCart();
        $params = $this->getRequest()->getParams();
        try {
            if (isset($params['qty'])) {
                $filter = new Zend_Filter_LocalizedToNormalized(
                    array('locale' => Mage::app()->getLocale()->getLocaleCode())
                );
                $params['qty'] = $filter->filter($params['qty']);
            }
			$product = $this->_initProduct();
			
			// checkout/cart/add/uenc/aHR0cDovL2xhLWNlbnRyYWxlLmNvbTo4MDgwL2luZGV4LnBocC9iaWVudmVudWUxNDktODA5Lmh0bWw_X19fU0lEPVUmc3RhcnRjdXN0b21pemF0aW9uPTE,/product/808/

			/*
			$width = $params['width'];
			$height = $params['height'];
			Mage::log('Sizes: '.$width.' '.$height, null, 'cart.log');
			*/
			/*
			
			$op = $product->getFinalPrice();
			$product->setSpecialPrice(11111);
			Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
			$product->save();
			Mage::app()->setCurrentStore(Mage_Core_Model_App::DISTRO_STORE_ID);
			*/
            
            $related = $this->getRequest()->getParam('related_product');

            /**
             * Check product availability
             */
            if (!$product) {
			
				/*$product->setSpecialPrice($op);
				Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
				$product->save();
				Mage::app()->setCurrentStore(Mage_Core_Model_App::DISTRO_STORE_ID);*/
			
                $this->_goBack();
                return;
            }

			//$product->setData('price','1000');
			//Mage::log($product->getData());
			//Mage::log(get_class($cart));
			
            $cart->addProduct($product, $params);
            if (!empty($related)) {
                $cart->addProductsByIds(explode(',', $related));
            }

            $cart->save();
			

			$quote = Mage::getSingleton('checkout/session')->getQuote();
			$total = $subTotal = Mage::getModel('checkout/cart')->getQuote()->getSubtotal();

			$_items = array();
			$items = Mage::getSingleton('checkout/session')->getQuote()->getAllItems();
			foreach($items as $item) {
				$_items[$item->getProductId()] = $item->getId();
			}

			
			if( $total>=149 /*&& $total<250*/ ) {
				$productGiftId = $this->_freeAfter149;
				if ($productGiftId) {
					$productGift = Mage::getModel('catalog/product')
						->setStoreId(Mage::app()->getStore()->getId())
						->load($productGiftId);
					if( is_object($productGift) && !$quote->hasProductId($productGiftId)) {
						$params = $this->_params;
						$cart->addProduct($productGift, $params);
						$cart->save();
					}
					/*
					$_id = $this->_freeAfter250;
					if( isset($_items[$_id]))
						$this->_getCart()->removeItem($_items[$_id])->save();
					*/
				}
			}
			/*elseif($total>=250) {
				$productGiftId = $this->_freeAfter250;
				if ($productGiftId) {
					$productGift = Mage::getModel('catalog/product')
						->setStoreId(Mage::app()->getStore()->getId())
						->load($productGiftId);
					if( is_object($productGift) && !$quote->hasProductId($productGiftId)) {
						$params['qty'] = 1;
						$cart->addProduct($productGift, $params);
						$cart->save();
					}
					$_id = $this->_freeAfter149;
					if( isset($_items[$_id]))
						$this->_getCart()->removeItem($_items[$_id])->save();
				}
			}*/			
			
            $this->_getSession()->setCartWasUpdated(true);
			
			/*$product->setSpecialPrice($op);
			Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
			$product->save();
			Mage::app()->setCurrentStore(Mage_Core_Model_App::DISTRO_STORE_ID);*/
				

            /**
             * @todo remove wishlist observer processAddToCart
             */
            Mage::dispatchEvent('checkout_cart_add_product_complete',
                array('product' => $product, 'request' => $this->getRequest(), 'response' => $this->getResponse())
            );

            if (!$this->_getSession()->getNoCartRedirect(true)) {
                if (!$cart->getQuote()->getHasError()){
                    $message = $this->__('%s was added to your shopping cart.', Mage::helper('core')->escapeHtml($product->getName()));
                    $this->_getSession()->addSuccess($message);
                }
                $this->_goBack();
            }
        } catch (Mage_Core_Exception $e) {
			/*$product->setSpecialPrice($op);
			Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
			$product->save();
			Mage::app()->setCurrentStore(Mage_Core_Model_App::DISTRO_STORE_ID);*/

            if ($this->_getSession()->getUseNotice(true)) {
                $this->_getSession()->addNotice(Mage::helper('core')->escapeHtml($e->getMessage()));
            } else {
                $messages = array_unique(explode("\n", $e->getMessage()));
                foreach ($messages as $message) {
                    $this->_getSession()->addError(Mage::helper('core')->escapeHtml($message));
                }
            }

            $url = $this->_getSession()->getRedirectUrl(true);
            if ($url) {
                $this->getResponse()->setRedirect($url);
            } else {
                $this->_redirectReferer(Mage::helper('checkout/cart')->getCartUrl());
            }
        } catch (Exception $e) {
			/*$product->setSpecialPrice($op);
			Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
			$product->save();
			Mage::app()->setCurrentStore(Mage_Core_Model_App::DISTRO_STORE_ID);*/

            $this->_getSession()->addException($e, $this->__('Cannot add the item to shopping cart.'));
            Mage::logException($e);
            $this->_goBack();
        }
    }

    public function addgroupAction()
    {
        $orderItemIds = $this->getRequest()->getParam('order_items', array());
        if (is_array($orderItemIds)) {
            $itemsCollection = Mage::getModel('sales/order_item')
                ->getCollection()
                ->addIdFilter($orderItemIds)
                ->load();
            /* @var $itemsCollection Mage_Sales_Model_Mysql4_Order_Item_Collection */
            $cart = $this->_getCart();
            foreach ($itemsCollection as $item) {
                try {
                    $cart->addOrderItem($item, 1);
                } catch (Mage_Core_Exception $e) {
                    if ($this->_getSession()->getUseNotice(true)) {
                        $this->_getSession()->addNotice($e->getMessage());
                    } else {
                        $this->_getSession()->addError($e->getMessage());
                    }
                } catch (Exception $e) {
                    $this->_getSession()->addException($e, $this->__('Cannot add the item to shopping cart.'));
                    Mage::logException($e);
                    $this->_goBack();
                }
            }
            $cart->save();
            $this->_getSession()->setCartWasUpdated(true);
        }
        $this->_goBack();
    }

    /**
     * Action to reconfigure cart item
     */
    public function configureAction()
    {
        // Extract item and product to configure
        $id = (int) $this->getRequest()->getParam('id');
        $quoteItem = null;
        $cart = $this->_getCart();
        if ($id) {
            $quoteItem = $cart->getQuote()->getItemById($id);
        }

        if (!$quoteItem) {
            $this->_getSession()->addError($this->__('Quote item is not found.'));
            $this->_redirect('checkout/cart');
            return;
        }

        try {
            $params = new Varien_Object();
            $params->setCategoryId(false);
            $params->setConfigureMode(true);
            $params->setBuyRequest($quoteItem->getBuyRequest());

            Mage::helper('catalog/product_view')->prepareAndRender($quoteItem->getProduct()->getId(), $this, $params);
        } catch (Exception $e) {
            $this->_getSession()->addError($this->__('Cannot configure product.'));
            Mage::logException($e);
            $this->_goBack();
            return;
        }
    }

    /**
     * Update product configuration for a cart item
     */
    public function updateItemOptionsAction()
    {
        $cart   = $this->_getCart();
        $id = (int) $this->getRequest()->getParam('id');
        $params = $this->getRequest()->getParams();

        if (!isset($params['options'])) {
            $params['options'] = array();
        }
        try {
            if (isset($params['qty'])) {
                $filter = new Zend_Filter_LocalizedToNormalized(
                    array('locale' => Mage::app()->getLocale()->getLocaleCode())
                );
                $params['qty'] = $filter->filter($params['qty']);
            }

            $quoteItem = $cart->getQuote()->getItemById($id);
            if (!$quoteItem) {
                Mage::throwException($this->__('Quote item is not found.'));
            }

            $item = $cart->updateItem($id, new Varien_Object($params));
            if (is_string($item)) {
                Mage::throwException($item);
            }
            if ($item->getHasError()) {
                Mage::throwException($item->getMessage());
            }

            $related = $this->getRequest()->getParam('related_product');
            if (!empty($related)) {
                $cart->addProductsByIds(explode(',', $related));
            }

            $cart->save();

            $this->_getSession()->setCartWasUpdated(true);

            Mage::dispatchEvent('checkout_cart_update_item_complete',
                array('item' => $item, 'request' => $this->getRequest(), 'response' => $this->getResponse())
            );
            if (!$this->_getSession()->getNoCartRedirect(true)) {
                if (!$cart->getQuote()->getHasError()){
                    $message = $this->__('%s was updated in your shopping cart.', Mage::helper('core')->htmlEscape($item->getProduct()->getName()));
                    $this->_getSession()->addSuccess($message);
                }
                $this->_goBack();
            }
        } catch (Mage_Core_Exception $e) {
            if ($this->_getSession()->getUseNotice(true)) {
                $this->_getSession()->addNotice($e->getMessage());
            } else {
                $messages = array_unique(explode("\n", $e->getMessage()));
                foreach ($messages as $message) {
                    $this->_getSession()->addError($message);
                }
            }

            $url = $this->_getSession()->getRedirectUrl(true);
            if ($url) {
                $this->getResponse()->setRedirect($url);
            } else {
                $this->_redirectReferer(Mage::helper('checkout/cart')->getCartUrl());
            }
        } catch (Exception $e) {
            $this->_getSession()->addException($e, $this->__('Cannot update the item.'));
            Mage::logException($e);
            $this->_goBack();
        }
        $this->_redirect('*/*');
    }

    /**
     * Update shopping cart data action
     */
    public function updatePostAction()
    {
        $updateAction = (string)$this->getRequest()->getParam('update_cart_action');

        switch ($updateAction) {
            case 'empty_cart':
                $this->_emptyShoppingCart();
                break;
            case 'update_qty':
                $this->_updateShoppingCart();
                break;
            default:
                $this->_updateShoppingCart();
        }

        $this->_goBack();
    }

    /**
     * Update customer's shopping cart
     */
    protected function _updateShoppingCart()
    {
        try {
			$totalBefore = Mage::getModel('checkout/cart')->getQuote()->getSubtotal();
			
            $cartData = $this->getRequest()->getParam('cart');
            if (is_array($cartData)) {
                $filter = new Zend_Filter_LocalizedToNormalized(
                    array('locale' => Mage::app()->getLocale()->getLocaleCode())
                );
                foreach ($cartData as $index => $data) {
                    if (isset($data['qty'])) {
                        $cartData[$index]['qty'] = $filter->filter(trim($data['qty']));
                    }
                }
                $cart = $this->_getCart();
                if (! $cart->getCustomerSession()->getCustomer()->getId() && $cart->getQuote()->getCustomerId()) {
                    $cart->getQuote()->setCustomerId(null);
                }

                $cartData = $cart->suggestItemsQty($cartData);
                $cart->updateItems($cartData)->save();
				
				$totalAfter = Mage::getModel('checkout/cart')->getQuote()->getSubtotal();
					
				$_items = array();
				$items = Mage::getSingleton('checkout/session')->getQuote()->getAllItems();
				foreach($items as $item) {
					$_items[$item->getProductId()] = $item->getId();
				}
				
				$params = array();
				if($totalAfter>=149) {
					// add 149
					Mage::log('Add 149');
					$_id = $this->_freeAfter149;
					$productGift = Mage::getModel('catalog/product')
						->setStoreId(Mage::app()->getStore()->getId())
						->load($_id);
					$quote = Mage::getSingleton('checkout/session')->getQuote();
					if( is_object($productGift) && !$quote->hasProductId($_id) ) {
						$params = $this->_params;
						$this->_getCart()->addProduct($productGift, $params);
						$this->_getCart()->save();
					}
				}
				/*elseif( $totalBefore<149  && $totalAfter>=250) {
					// add 250
					Mage::log('Add 250');
					$_id = $this->_freeAfter250;
					$productGift = Mage::getModel('catalog/product')
						->setStoreId(Mage::app()->getStore()->getId())
						->load($_id);
					if( is_object($productGift) ) {
						$params['qty'] = 1;
						$this->_getCart()->addProduct($productGift, $params);
						$this->_getCart()->save();
					}				
				}*/
				/*elseif( $totalBefore>=149 && $totalBefore<250 && $totalAfter>=250) {
					//remove 149 add 250
					Mage::log('Remove 149 add 250');
					$_id = $this->_freeAfter250;
					$productGift = Mage::getModel('catalog/product')
						->setStoreId(Mage::app()->getStore()->getId())
						->load($_id);
					if( is_object($productGift) ) {
						$params['qty'] = 1;
						$this->_getCart()->addProduct($productGift, $params);
						$this->_getCart()->save();
					}
					$_id = $this->_freeAfter149;
					if( isset($_items[$_id]))
						$this->_getCart()->removeItem($_items[$_id])->save();
				}
				elseif( $totalBefore>=250 && $totalAfter>=149 && $totalAfter<250) {
					//remove 250 add 149
					Mage::log('Remove 250 add 149');
					$_id = $this->_freeAfter149;
					$productGift = Mage::getModel('catalog/product')
						->setStoreId(Mage::app()->getStore()->getId())
						->load($_id);
					if( is_object($productGift) ) {
						$params['qty'] = 1;
						$this->_getCart()->addProduct($productGift, $params);
						$this->_getCart()->save();
					}
					$_id = $this->_freeAfter250;
					if( isset($_items[$_id]) )
						$this->_getCart()->removeItem($_items[$_id])->save();
				}
				elseif( $totalBefore>=250 && $totalAfter<149) {
					//remove 250
					Mage::log('Remove 250');
					$_id = $this->_freeAfter250;
					if( isset($_items[$_id]) )
						$this->_getCart()->removeItem($_items[$_id])->save();
				}*/
				elseif( $totalBefore>=149 && $totalAfter<149) {
					// remove 149
					Mage::log('Remove 149');
					$_id = $this->_freeAfter149;
					if( isset($_items[$_id]) )
						$this->_getCart()->removeItem($_items[$_id])->save();
				}
            }
            $this->_getSession()->setCartWasUpdated(true);
        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError(Mage::helper('core')->escapeHtml($e->getMessage()));
        } catch (Exception $e) {
            $this->_getSession()->addException($e, $this->__('Cannot update shopping cart.'));
            Mage::logException($e);
        }
    }

    /**
     * Empty customer's shopping cart
     */
    protected function _emptyShoppingCart()
    {
        try {
            $this->_getCart()->truncate()->save();
            $this->_getSession()->setCartWasUpdated(true);
        } catch (Mage_Core_Exception $exception) {
            $this->_getSession()->addError($exception->getMessage());
        } catch (Exception $exception) {
            $this->_getSession()->addException($exception, $this->__('Cannot update shopping cart.'));
        }
    }

    /**
     * Delete shoping cart item action
     */
    public function deleteAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
		Mage::log($id);
        if ($id) {
            try {
				$cart   = $this->_getCart();
				
				$totalBefore = Mage::getModel('checkout/cart')->getQuote()->getSubtotal();
                $this->_getCart()->removeItem($id)->save();				  
				$totalAfter = Mage::getModel('checkout/cart')->getQuote()->getSubtotal();
				
				Mage::log($totalBefore);
				Mage::log($totalAfter);
				
				$_items = array();
				$items = Mage::getSingleton('checkout/session')->getQuote()->getAllItems();
				foreach($items as $item) {
					$_items[$item->getProductId()] = $item->getId();
				}
				//Mage::log($_items);
				
				
				/*if( $totalBefore>=250 && $totalAfter>=149 && $totalAfter<250) {
					//remove 250 add 149
					Mage::log('Add 149');
					$_id = $this->_freeAfter250;
					$this->_getCart()->removeItem($_items[$_id])->save();
					$_id = $this->_freeAfter149;
					$productGift = Mage::getModel('catalog/product')
						->setStoreId(Mage::app()->getStore()->getId())
						->load($_id);
					if( is_object($productGift) ) {
						$params['qty'] = 1;
						$cart->addProduct($productGift, $params);
						$cart->save();
					}
				}
				elseif( $totalBefore>=250 && $totalAfter<149) {
					//remove 250
					Mage::log('Remove 250');
					$_id = $this->_freeAfter250;
					$this->_getCart()->removeItem($_items[$_id])->save();
				}
				else*/
				if( $totalBefore>=149 && $totalAfter<149) {
					// remove 149
					Mage::log('Remove 149');
					$_id = $this->_freeAfter149;
					$this->_getCart()->removeItem($_items[$_id])->save();
				}
				  
            } catch (Exception $e) {
                $this->_getSession()->addError($this->__('Cannot remove the item.'));
                Mage::logException($e);
            }
        }
        $this->_redirectReferer(Mage::getUrl('*/*'));
    }

    /**
     * Initialize shipping information
     */
    public function estimatePostAction()
    {
        $country    = (string) $this->getRequest()->getParam('country_id');
        $postcode   = (string) $this->getRequest()->getParam('estimate_postcode');
        $city       = (string) $this->getRequest()->getParam('estimate_city');
        $regionId   = (string) $this->getRequest()->getParam('region_id');
        $region     = (string) $this->getRequest()->getParam('region');

        $this->_getQuote()->getShippingAddress()
            ->setCountryId($country)
            ->setCity($city)
            ->setPostcode($postcode)
            ->setRegionId($regionId)
            ->setRegion($region)
            ->setCollectShippingRates(true);
        $this->_getQuote()->save();
        $this->_goBack();
    }

    public function estimateUpdatePostAction()
    {
        $code = (string) $this->getRequest()->getParam('estimate_method');
        if (!empty($code)) {
            $this->_getQuote()->getShippingAddress()->setShippingMethod($code)/*->collectTotals()*/->save();
        }
        $this->_goBack();
    }

    /**
     * Initialize coupon
     */
    public function couponPostAction()
    {
        /**
         * No reason continue with empty shopping cart
         */
        if (!$this->_getCart()->getQuote()->getItemsCount()) {
            $this->_goBack();
            return;
        }

        $couponCode = (string) $this->getRequest()->getParam('coupon_code');
        if ($this->getRequest()->getParam('remove') == 1) {
            $couponCode = '';
        }
        $oldCouponCode = $this->_getQuote()->getCouponCode();

        if (!strlen($couponCode) && !strlen($oldCouponCode)) {
            $this->_goBack();
            return;
        }

        try {
            $this->_getQuote()->getShippingAddress()->setCollectShippingRates(true);
            $this->_getQuote()->setCouponCode(strlen($couponCode) ? $couponCode : '')
                ->collectTotals()
                ->save();

            if (strlen($couponCode)) {
                if ($couponCode == $this->_getQuote()->getCouponCode()) {
                    $this->_getSession()->addSuccess(
                        $this->__('Coupon code "%s" was applied.', Mage::helper('core')->htmlEscape($couponCode))
                    );
                }
                else {
                    $this->_getSession()->addError(
                        $this->__('Coupon code "%s" is not valid.', Mage::helper('core')->htmlEscape($couponCode))
                    );
                }
            } else {
                $this->_getSession()->addSuccess($this->__('Coupon code was canceled.'));
            }

        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        } catch (Exception $e) {
            $this->_getSession()->addError($this->__('Cannot apply the coupon code.'));
            Mage::logException($e);
        }

        $this->_goBack();
    }
}

<?php

declare(strict_types=1);

namespace Baraja\Shop;


use Baraja\DynamicConfiguration\Configuration;
use Baraja\DynamicConfiguration\ConfigurationSection;

final class ShopInfo
{
	private ConfigurationSection $configuration;


	public function __construct(Configuration $configuration)
	{
		$this->configuration = $configuration->getSection('shop');
	}


	public function getShopName(): string
	{
		$name = $this->configuration->get('name');
		if ($name === null) {
			throw new \LogicException('Shop name must exist.');
		}

		return $name;
	}


	public function getDefaultManufacturer(): string
	{
		return $this->configuration->get('default-manufacturer') ?? $this->getShopName();
	}


	public function getShopDescription(): ?string
	{
		return $this->configuration->get('description');
	}


	public function getContactPersonName(): ?string
	{
		return $this->configuration->get('contact-person-name');
	}


	public function getSupportEmail(): ?string
	{
		return $this->configuration->get('support-email');
	}


	public function getOrderEmail(): ?string
	{
		return $this->configuration->get('order-email') ?? $this->getSupportEmail();
	}


	public function getSupportPhone(): ?string
	{
		return $this->configuration->get('support-phone');
	}


	public function getBankAccount(): ?string
	{
		return $this->configuration->get('bank-account');
	}
}

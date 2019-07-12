<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\PresenterFactoryListener;

class EventArgsGetPresenter
{

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string|null
	 */
	private $presenter;

	/**
	 * @var array
	 */
	private $mapping;

	/**
	 * EventArgsCreatePresenter constructor.
	 * @param string $name
	 * @param array $mapping
	 */
	public function __construct(string $name, array $mapping)
	{
		$this->name = $name;
		$this->mapping = $mapping;
	}

	/**
	 * @return string|null
	 */
	public function getPresenter(): ?string
	{
		return $this->presenter;
	}

	/**
	 * @param string|null $class
	 */
	public function setPresenter(?string $class): void
	{
		$this->presenter = $class;
	}

	/**
	 * @return string|null
	 */
	public function getName(): ?string
	{
		return $this->name;
	}

	/**
	 * @return array
	 */
	public function getMapping(): array
	{
		return $this->mapping;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

}

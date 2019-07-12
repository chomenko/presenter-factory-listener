<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\PresenterFactoryListener;

class EventArgsFormatPresenter
{

	/**
	 * @var string
	 */
	private $presenter;

	/**
	 * @var string|null
	 */
	private $class;

	/**
	 * @var array
	 */
	private $mapping;

	/**
	 * EventArgs constructor.
	 * @param string $presenter
	 * @param string|null $class
	 * @param array $mapping
	 */
	public function __construct(string $presenter, ?string $class, array $mapping)
	{
		$this->presenter = $presenter;
		$this->class = $class;
		$this->mapping = $mapping;
	}

	/**
	 * @return string
	 */
	public function getPresenter(): string
	{
		return $this->presenter;
	}

	/**
	 * @return string|null
	 */
	public function getClass(): ?string
	{
		return $this->class;
	}

	/**
	 * @return array
	 */
	public function getMapping(): array
	{
		return $this->mapping;
	}

	/**
	 * @param string|null $class
	 */
	public function setClass(?string $class): void
	{
		$this->class = $class;
	}

}

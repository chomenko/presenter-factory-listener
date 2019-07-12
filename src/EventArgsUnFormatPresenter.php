<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\PresenterFactoryListener;

class EventArgsUnFormatPresenter
{

	/**
	 * @var string
	 */
	private $presenterClass;

	/**
	 * @var string|null
	 */
	private $classMapping;

	/**
	 * @var array
	 */
	private $mapping;

	/**
	 * EventArgs constructor.
	 * @param string $presenterClass
	 * @param string|null $classMapping
	 * @param array $mapping
	 */
	public function __construct(string $presenterClass, ?string $classMapping, array $mapping)
	{
		$this->presenterClass = $presenterClass;
		$this->classMapping = $classMapping;
		$this->mapping = $mapping;
	}

	/**
	 * @return string
	 */
	public function getPresenterClass(): string
	{
		return $this->presenterClass;
	}

	/**
	 * @return string|null
	 */
	public function getClassMapping(): ?string
	{
		return $this->classMapping;
	}

	/**
	 * @return array
	 */
	public function getMapping(): array
	{
		return $this->mapping;
	}

	/**
	 * @param string|null $classMapping
	 */
	public function setClassMapping(?string $classMapping): void
	{
		$this->classMapping = $classMapping;
	}

}

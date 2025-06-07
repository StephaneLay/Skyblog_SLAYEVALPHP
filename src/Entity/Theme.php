<?php

namespace Hb\SkyblogSlayevalphp\Entity;

class Theme{
        private ?int $id;
        private string $mainBgColor;
        private string $sideBgColor;
        private string $publiBgColor;
        private string $secondaryPubliColor;

        private bool $isActive;
    public function __construct(string $mainBgColor,string $sideBgColor,string $publiBgColor,string $secondaryPubliColor,bool $isActive,?int $id =null) {
        $this->id = $id;
        $this->mainBgColor = $mainBgColor;
        $this->sideBgColor = $sideBgColor;
        $this->publiBgColor = $publiBgColor;
        $this->secondaryPubliColor = $secondaryPubliColor;
        $this->isActive = $isActive;
    }

    public function getId(): ?int {return $this->id;}

	public function getMainBgColor(): string {return $this->mainBgColor;}

	public function getSideBgColor(): string {return $this->sideBgColor;}

	public function getPubliBgColor(): string {return $this->publiBgColor;}

	public function getSecondaryPubliColor(): string {return $this->secondaryPubliColor;}

	public function getIsActive(): bool {return $this->isActive;}

	public function setId(int $id): void {$this->id = $id;}

	public function setMainBgColor(string $mainBgColor): void {$this->mainBgColor = $mainBgColor;}

	public function setSideBgColor(string $sideBgColor): void {$this->sideBgColor = $sideBgColor;}

	public function setPubliBgColor(string $publiBgColor): void {$this->publiBgColor = $publiBgColor;}

	public function setSecondaryPubliColor(string $secondaryPubliColor): void {$this->secondaryPubliColor = $secondaryPubliColor;}

	public function setIsActive(bool $isActive): void {$this->isActive = $isActive;}

	

    

	

    
    
}
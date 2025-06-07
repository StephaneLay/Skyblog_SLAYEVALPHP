<?php

namespace Hb\SkyblogSlayevalphp\Entity;

class Theme{
        private int $id;
        private string $mainBgColor;
        private string $sideBgColor;
        private string $publiBgColor;
        private string $secondaryPubliColor;
    public function __construct(int $id,string $mainBgColor,string $sideBgColor,string $publiBgColor,string $secondaryPubliColor) {
        $this->id = $id;
        $this->mainBgColor = $mainBgColor;
        $this->sideBgColor = $sideBgColor;
        $this->publiBgColor = $publiBgColor;
        $this->secondaryPubliColor = $secondaryPubliColor;
    }

    public function getId(): int {return $this->id;}

	public function getMainBgColor(): string {return $this->mainBgColor;}

	public function getSideBgColor(): string {return $this->sideBgColor;}

	public function getPubliBgColor(): string {return $this->publiBgColor;}

	public function getSecondaryPubliColor(): string {return $this->secondaryPubliColor;}

    
    public function setId(int $id): void {$this->id = $id;}

	public function setMainBgColor(string $mainBgColor): void {$this->mainBgColor = $mainBgColor;}

	public function setSideBgColor(string $sideBgColor): void {$this->sideBgColor = $sideBgColor;}

	public function setPubliBgColor(string $publiBgColor): void {$this->publiBgColor = $publiBgColor;}

	public function setSecondaryPubliColor(string $secondaryPubliColor): void {$this->secondaryPubliColor = $secondaryPubliColor;}

	

    
    
}
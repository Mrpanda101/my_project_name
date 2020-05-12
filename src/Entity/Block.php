<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlockRepository")
 */
class Block
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $blockname;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlockname(): ?string
    {
        return $this->blockname;
    }

    public function setBlockname(string $blockname): self
    {
        $this->blockname = $blockname;

        return $this;
    }
}

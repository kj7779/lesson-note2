<?php

namespace App\Entity;

use App\Repository\Lesson3Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Lesson3Repository::class)]
class Lesson3
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lesson_part = null;

    #[ORM\Column(length: 255)]
    private ?string $lesson3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLessonPart(): ?string
    {
        return $this->lesson_part;
    }

    public function setLessonPart(?string $lesson_part): self
    {
        $this->lesson_part = $lesson_part;

        return $this;
    }

    public function getLesson3(): ?string
    {
        return $this->lesson3;
    }

    public function setLesson3(string $lesson3): self
    {
        $this->lesson3 = $lesson3;

        return $this;
    }
}

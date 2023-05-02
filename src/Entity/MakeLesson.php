<?php

namespace App\Entity;

use App\Repository\MakeLessonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MakeLessonRepository::class)]
class MakeLesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lesson_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lesson_part = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLessonName(): ?string
    {
        return $this->lesson_name;
    }

    public function setLessonName(string $lesson_name): self
    {
        $this->lesson_name = $lesson_name;

        return $this;
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
}

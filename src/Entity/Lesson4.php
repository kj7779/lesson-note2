<?php

namespace App\Entity;

use App\Repository\Lesson4Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Lesson4Repository::class)]
class Lesson4
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lesson_pose4 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLessonPose4(): ?string
    {
        return $this->lesson_pose4;
    }

    public function setLessonPose4(string $lesson_pose4): self
    {
        $this->lesson_pose4 = $lesson_pose4;

        return $this;
    }
}

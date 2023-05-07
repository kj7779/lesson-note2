<?php

namespace App\Entity;

use App\Repository\LessonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
class Lesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lesson_name = null;

    #[ORM\Column(length: 255)]
    private ?string $lesson_pose = null;

    #[ORM\Column(nullable: true)]
    private ?int $lesson_pose_num = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lesson_teacher = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lesson_date = null;

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

    public function getLessonPose(): ?string
    {
        return $this->lesson_pose;
    }

    public function setLessonPose(string $lesson_pose): self
    {
        $this->lesson_pose = $lesson_pose;

        return $this;
    }

    public function getLessonPoseNum(): ?int
    {
        return $this->lesson_pose_num;
    }

    public function setLessonPoseNum(?int $lesson_pose_num): self
    {
        $this->lesson_pose_num = $lesson_pose_num;

        return $this;
    }

    public function getLessonTeacher(): ?string
    {
        return $this->lesson_teacher;
    }

    public function setLessonTeacher(?string $lesson_teacher): self
    {
        $this->lesson_teacher = $lesson_teacher;

        return $this;
    }

    public function getLessonDate(): ?\DateTimeInterface
    {
        return $this->lesson_date;
    }

    public function setLessonDate(?\DateTimeInterface $lesson_date): self
    {
        $this->lesson_date = $lesson_date;

        return $this;
    }
}

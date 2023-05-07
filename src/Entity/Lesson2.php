<?php

namespace App\Entity;

use App\Repository\Lesson2Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Lesson2Repository::class)]
class Lesson2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'lesson2', targetEntity: MakeLesson::class)]
    private Collection $lesson_pose;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lesson_part2 = null;

    public function __construct()
    {
        $this->lesson_part2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, MakeLesson>
     */
    public function getLessonPose(): Collection
    {
        return $this->lesson_pose;
    }



    public function addLessonPose(MakeLesson $lessonPose): self
    {
        if (!$this->lesson_pose->contains($lessonPose)) {
            $this->lesson_pose->add($lessonPose);
            $lessonPose->setLesson2($this);
        }

        return $this;
    }

    public function removeLessonPose(MakeLesson $lessonPose): self
    {
        if ($this->lesson_pose->removeElement($lessonPose)) {
            // set the owning side to null (unless already changed)
            if ($lessonPose->getLesson2() === $this) {
                $lessonPose->setLesson2(null);
            }
        }

        return $this;
    }

    public function getLessonPart2(): ?string
    {
        return $this->lesson_part2;
    }

    public function setLessonPart2(?string $lesson_part2): self
    {
        $this->lesson_part2 = $lesson_part2;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->lesson_part2;
    }
}

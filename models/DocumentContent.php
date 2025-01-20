<?php

require_once "Content.php";

class DocumentContent extends Content
{
    private $path;
    public function __construct($path)
    {
        parent::__construct();
        $this->path = $path;
    }
    public function save($id)
    {
        $this->conn->beginTransaction();
        $sql = "INSERT INTO contents (course_id, type) VALUES (?, 'document')";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        $sql = "SELECT id FROM contents WHERE course_id = ?";
        $tmt = $this->conn->prepare($sql);
        $tmt->execute([$id]);
        $contentId = $tmt->fetch(PDO::FETCH_ASSOC);
        $content = $contentId["id"];

        $sql = "INSERT INTO document_contents (content_id, file_path, file_size) VALUES (?, ?, 10)";
        $prm = $this->conn->prepare($sql);
        $prm->execute([
            $content,
            $this->path
        ]);

        $this->conn->commit();
    }
    // public function display($courseId)
    // {
    //     $sql = "SELECT title , DESCRIPTION , TYPE , file_path FROM courses
    //     INNER JOIN contents ON courses.id = contents.course_id
    //     INNER JOIN document_contents ON contents.id = document_contents.content_id
    //     WHERE courses.id = ?";

    //     return $this->Db->fetch($sql, [$courseId]);
    // }
}

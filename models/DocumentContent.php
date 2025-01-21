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
    public function display($courseId)
    {
        $sql = "SELECT * FROM contents JOIN courses ON contents.course_id = courses.id 
                JOIN document_contents ON document_contents.content_id = contents.id WHERE contents.course_id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$courseId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

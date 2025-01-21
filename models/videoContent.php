<?php
require_once 'Content.php';
class VideoContent extends Content
{
    private $vidUrl;

    public function __construct($vidUrl)
    {
        parent::__construct();
        $this->$vidUrl = $vidUrl;
    }

    public function save($id)
    {
        $this->conn->beginTransaction();
        $sql = "INSERT INTO contents (course_id, type) VALUES (?, 'video')";

        $stmt = $this->conn->prepare($sql);


        $stmt->execute([$id]);

        $sql = "SELECT id FROM contents WHERE course_id = ?";
        $tmt = $this->conn->prepare($sql);
        $tmt->execute([$id]);
        $contentId = $tmt->fetch(PDO::FETCH_ASSOC);
        $content = $contentId["id"];

        $sql = "INSERT INTO video_contents (content_id, video_url, duration) VALUES (?, ?, 10)";
        $prm = $this->conn->prepare($sql);
        $prm->execute([
            $content,
            $this->vidUrl,
        ]);

        $this->conn->commit();
    }

    public function display($courseId)
    {
        $sql = "SELECT * FROM contents JOIN courses ON contents.course_id = courses.id 
                JOIN video_contents ON video_contents.content_id = contents.id WHERE contents.course_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$courseId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

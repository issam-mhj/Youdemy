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

    //     public function display($courseId)
    //     {
    //         $sql = "SELECT title , DESCRIPTION , TYPE , video_url FROM courses
    // INNER JOIN contents ON courses.id = contents.course_id
    // INNER JOIN video_contents ON contents.id = video_contents.content_id
    // WHERE courses.id = ?";

    //         $result = $this->db->fetch($sql, [$courseId]);
    //     }
}

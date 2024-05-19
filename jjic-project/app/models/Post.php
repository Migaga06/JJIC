<?php

class Post extends Model
{
    public function postInsert($data, $files){

        $userId = $data['user_id'];
        $title = $data['post_title'];
        $description = $data['post_description'];
        $postId = random_string(60);

        $postQuery = "INSERT INTO posts (user_id, post_id, title, description) VALUES (:user_id, :post_id, :title, :description)";
        $this->query($postQuery, [
            'user_id' => $userId,
            'post_id' => $postId,
            'title' => $title,
            'description' => $description
        ]);

        $targetDir = "assets/uploads/";

        foreach ($files['tmp_name'] as $index => $tmpName) {
            if (empty($tmpName)) {
                continue; // Skip empty file inputs
            }

            $fileType = mime_content_type($tmpName);
            $fileName = basename($files['name'][$index]);
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                if (strpos($fileType, 'image/') === 0) {
                    $type = 'image';
                } elseif (strpos($fileType, 'video/') === 0) {
                    $type = 'video';
                } else {
                    continue; // Skip unsupported file types
                }

                // Insert file information into post_images table
                $fileQuery = "INSERT INTO post_images (post_id, file_path, type) VALUES (:post_id, :file_path, :type)";
                $this->query($fileQuery, [
                    'post_id' => $postId,
                    'file_path' => $targetFile,
                    'type' => $type
                ]);
            }
        }
    }

}
<?php

class Like extends Model
{
    public function submitLike($postId, $userId){

        error_log('User ' . $userId . ' liked post ' . $postId);
        $userLikedQuery = "SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id";
        $userLiked = $this->query($userLikedQuery, [
            'user_id' => $userId,
            'post_id' => $postId
        ]);

        if ($userLiked) {
            // User has already liked the post, so unlike it
            $unlikeQuery = "DELETE FROM likes WHERE user_id = :user_id AND post_id = :post_id";
            $this->query($unlikeQuery, [
                'user_id' => $userId,
                'post_id' => $postId
            ]);
        } else {
            // User hasn't liked the post yet, so like it
            $likeQuery = "INSERT INTO likes (user_id, post_id) VALUES (:user_id, :post_id)";
            $this->query($likeQuery, [
                'user_id' => $userId,
                'post_id' => $postId
            ]);
        }

        $likeCount = $this->getLikeCount($postId);

        // Return the updated like count
        return $likeCount;
    }

    public function getLikeCount($postId) {
        $likeCountQuery = "SELECT COUNT(*) AS likeCount FROM likes WHERE post_id = :post_id";
        $result = $this->query($likeCountQuery, ['post_id' => $postId]);

        // Check if the query was successful and if the result is not empty
        if ($result && isset($result[0]->likeCount)) {
            return $result[0]->likeCount;
        } else {
            // Return 0 if there are no likes for the post
            return 0;
        }
    }

    public function userLiked($userId, $postId) {
        $userLikedQuery = "SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id";
        $userLiked = $this->query($userLikedQuery, [
            'user_id' => $userId,
            'post_id' => $postId
        ]);

        return !!$userLiked; // Convert the result to a boolean
    }
}
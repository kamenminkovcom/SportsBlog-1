<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10.8.2016 г.
 * Time: 22:57 ч.
 */
class PostsModel extends BaseModel
{
    public function getAll() : array
    {
     $statement = self::$db->query("SELECT * FROM posts ORDER BY date DESC");
        return $statement->fetch_all(MYSQLI_ASSOC); 

    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare("SELECT * FROM posts WHERE id = ?");
        $statement->bind_param("i",$id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function create(string $title, string $content, int $user_id) : bool
    {
        $statement = self::$db->prepare("INSERT INTO posts (title,content,user_id) VALUES (?,?,?) ");
        $statement->bind_param("ssi",$title,$content,$user_id);
        $statement->execute();
        if ($statement->affected_rows==0)
        {
            return false;
        }
        return self::$db->insert_id;
    }

    public function edit(string $id,string $title, string $content, int $user_id) : bool
    {

    }

    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare("DELETE FROM posts WHERE id = ?");
        $statement->bind_param("i",$id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
}
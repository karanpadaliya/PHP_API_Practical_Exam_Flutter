<?php

class Config
{
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "library";
    public $conn;

    function initConnection()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }

    // Author Table
    // insert
    function insertAuthor($author_name)
    {
        $this->initConnection();

        $query = "INSERT INTO `author`(`author_name`) VALUES ('$author_name');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // update
    function updateAuthor($author_name, $author_id)
    {
        $this->initConnection();

        $query = "UPDATE author SET author_name = '$author_name' WHERE author_id = '$author_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // delete
    function deleteAuthor($author_id)
    {
        $this->initConnection();

        $query = "DELETE FROM author WHERE author_id = '$author_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // read
    function readAuthor()
    {
        $this->initConnection();

        $query = "SELECT * FROM `author`";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // Categories Table
    // insert
    function insertCategory($category_name)
    {
        $this->initConnection();

        $query = "INSERT INTO `categories`(`category_name`) VALUES ('$category_name');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // update
    function updateCategory($category_name, $category_id)
    {
        $this->initConnection();

        $query = "UPDATE categories SET category_name = '$category_name' WHERE category_id = '$category_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // delete
    function deleteCategory($category_id)
    {
        $this->initConnection();

        $query = "DELETE FROM categories WHERE category_id = '$category_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // read
    function readCategory()
    {
        $this->initConnection();

        $query = "SELECT * FROM `categories`";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // publishers Table
    // insert
    function insertPublishers($publishers_name)
    {
        $this->initConnection();

        $query = "INSERT INTO `publishers`(`publishers_name`) VALUES ('$publishers_name');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // update
    function updatePublishers($publishers_name, $publishers_id)
    {
        $this->initConnection();

        $query = "UPDATE publishers SET publishers_name = '$publishers_name' WHERE publisher_id = '$publishers_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // delete
    function deletePublishers($publishers_id)
    {
        $this->initConnection();

        $query = "DELETE FROM publishers WHERE publisher_id = '$publishers_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // read
    function readPublishers()
    {
        $this->initConnection();

        $query = "SELECT * FROM `publishers`";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // members Table
    // insert
    function insertMembers($member_name, $phone)
    {
        $this->initConnection();

        $query = "INSERT INTO `members`(`member_name`, phone) VALUES ('$member_name', '$phone');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // update
    function updateMembers($member_name, $phone, $member_id)
    {
        $this->initConnection();

        $query = "UPDATE members SET member_name = '$member_name', phone = '$phone'  WHERE member_id = '$member_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // delete
    function deleteMembers($member_id)
    {
        $this->initConnection();

        $query = "DELETE FROM members WHERE member_id = '$member_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // read
    function readMembers()
    {
        $this->initConnection();

        $query = "SELECT * FROM `members`";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // books Table
    // insert
    function insertBooks($title, $author_id, $category_id, $publisher_id)
    {
        $this->initConnection();

        $query = "INSERT INTO `books` (`title`, `author_id`, `category_id`, `publisher_id`) VALUES ('$title', '$author_id', '$category_id', '$publisher_id');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // update
    function updateBooks($title, $book_id)
    {
        $this->initConnection();

        $query = "UPDATE books SET title = '$title' WHERE member_id = '$book_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // delete
    function deleteBooks($book_id)
    {
        $this->initConnection();

        $query = "DELETE FROM books WHERE book_id = '$book_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // read
    function readBooks()
    {
        $this->initConnection();

        $query = "SELECT * FROM `books`";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

}

?>
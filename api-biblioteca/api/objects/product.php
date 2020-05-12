<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Product{
  
    // database connection and table name
    private $conn;
    private $table_name = "books";
  
    // object properties
    public $id;
    public $name;
    public $description;
    public $isbn;
    public $author;
    public $publisher;
    public $category_id;
    public $category_name;
    public $created;
    public $modified;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
      
        // select all query
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.description, p.isbn, p.author, p.publisher, p.category_id, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.category_id = c.id
                ORDER BY
                    p.id ASC";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }
    // create product
    function create(){
      
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, description=:description, isbn=:isbn, author=:author, publisher=:publisher,
                     category_id=:category_id, created=:created";
      
        // prepare query
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));

        $this->isbn = htmlspecialchars(strip_tags($this->isbn));

        $this->author = htmlspecialchars(strip_tags($this->author));

        $this->publisher = htmlspecialchars(strip_tags($this->publisher));

        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->created = htmlspecialchars(strip_tags($this->created));
      
        // bind values
        $stmt->bindParam(":name", $this->name);

        $stmt->bindParam(":description", $this->description);

        $stmt->bindParam(":isbn", $this->isbn);

        $stmt->bindParam(":author", $this->author);

        $stmt->bindParam(":publisher", $this->publisher);

        $stmt->bindParam(":category_id", $this->category_id);

        $stmt->bindParam(":created", $this->created);
        print_r($this->description);
        // // execute query
        if(!$stmt->execute()){
            return false;
        }
      
        // return false; // false

          
    }

    // used when filling up the update product form
    function readOne(){
      
        // query to read single record
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.description, p.isbn, p.author, p.publisher, p.category_id, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.category_id = c.id
                WHERE
                    p.id = ?
                LIMIT
                    0,1";
      
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
      
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
      
        // execute query
        $stmt->execute();
      
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
        // set values to object properties
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->isbn = $row['isbn'];
        $this->author = $row['author'];
        $this->publisher = $row['publisher'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }

    // update the product
    function update(){
       // var_dump($this);
        // update query
        $query = "UPDATE `books`
        SET 
            `name` =:name, `description` =:description, `isbn` =:isbn, `author` =:author, `publisher` =:publisher, `category_id` =:category_id , `modified`=:modified
        WHERE 
            `id` = :id ";

        $query2 = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id";
      
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        // var_dump($stmt);
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));

        $this->description = htmlspecialchars(strip_tags($this->description));

        $this->isbn = htmlspecialchars(strip_tags($this->isbn));

        $this->author = htmlspecialchars(strip_tags($this->author));

        $this->publisher = htmlspecialchars(strip_tags($this->publisher));

        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        $this->modified = htmlspecialchars(strip_tags($this->modified));

        $this->id = htmlspecialchars(strip_tags($this->id));
        
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);

        $stmt->bindParam(':description', $this->description, PDO::PARAM_STR); 

        $stmt->bindParam(':isbn', $this->isbn, PDO::PARAM_STR);

        $stmt->bindParam(':author', $this->author, PDO::PARAM_STR);

        $stmt->bindParam(':publisher', $this->publisher, PDO::PARAM_STR);  

        $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);

        $stmt->bindParam(':modified', $this->modified, PDO::PARAM_STR);
        
        //var_dump($stmt->execute());
        if($stmt->execute()){
          
            return true;
        }
      
        return false; //false
    }

    // delete the product
    function delete(){
      
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
      
        // prepare query
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
      
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;

      
    }

    // search products
    function search($keywords){
      
        // select all query
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.description, p.isbn, p.publisher, p.author, p.category_id, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.category_id = c.id
                WHERE
                    p.name LIKE ? OR p.isbn LIKE ? OR p.publisher LIKE ? OR p.author LIKE ? OR p.description LIKE ? OR c.name LIKE ?
                ORDER BY
                    p.created ASC";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
      
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        
        $stmt->bindParam(4, $keywords);
        $stmt->bindParam(5, $keywords);
        $stmt->bindParam(6, $keywords);



      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
      
        // select query
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.description, p.category_id, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.category_id = c.id
                ORDER BY p.created DESC
                LIMIT ?, ?";
      
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
      
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
      
        // execute query
        $stmt->execute();
      
        // return values from database
        return $stmt;
    }
    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
      
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
        return $row['total_rows'];
    }


}
?>
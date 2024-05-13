<?php
class SQL
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;
    public $result;
    public $error;
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Kết nối thất bại: " . $this->conn->connect_error . "\n");
            }
            mysqli_set_charset($this->conn, 'utf8');
        } catch (\Throwable $th) {
            die("Lỗi kết nối CSDL: " . $th->getMessage() . "\n");
        }
    }

    public function query($sql, $params = [])
    {
        if (empty($sql)) {
            echo "Query is empty";
            return false;
        }

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            $this->error = $this->conn->error;
            return false;
        }
        $stmt->execute($params);
        $this->result = $stmt->get_result();
        if ($this->result === false) {
            $this->error = $this->conn->error;
            return false;
        }
        return $this->result;
    }

    public function fetch_once()
    {
        return $this->result->fetch_assoc();
    }

    public function fetch_all()
    {
        return $this->result->fetch_all(MYSQLI_ASSOC);
    }

    public function error()
    {
        return $this->error;
    }

    public function close()
    {
        $this->conn->close();
    }

    public function __destruct()
    {
        $this->close();
    }
}
